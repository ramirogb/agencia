<?php 
session_start();
include('../config.php');
$db_server   = $_SESSION['host_db'];
$db_name     =$_SESSION['database_db'];
$db_username = $_SESSION['user_db'];
$db_password = $_SESSION['pass_db'];
$filename           = 'dump.sql';     // Specify the dump filename to suppress the file selection dialog
$csv_insert_table   = '';     // Destination table for CSV files
$csv_preempty_table = false;  // true: delete all entries from table specified in $csv_insert_table before processing
$ajax               = true;   // AJAX mode: import will be done without refreshing the website
$linespersession    = 3000;   // Lines to be executed per one import session
$delaypersession    = 0;      // You can specify a sleep time in milliseconds after each session
                              // Works only if JavaScript is activated. Use to reduce server overrun

// Allowed comment delimiters: lines starting with these strings will be dropped by BigDump

$comment[]='#';                       // Standard comment lines are dropped by default
$comment[]='-- ';
// $comment[]='---';                  // Uncomment this line if using proprietary dump created by outdated mysqldump
// $comment[]='CREATE DATABASE';      // Uncomment this line if your dump contains create database queries in order to ignore them
$comment[]='/*!';                  // Or add your own string to leave out other proprietary things
$db_connection_charset = '';
if ($ajax)
  ob_start();

define ('VERSION','0.31b');
define ('DATA_CHUNK_LENGTH',16384);  // How many chars are read per time
define ('MAX_QUERY_LINES',300);      // How many lines may be considered to be one query (except text lines)
define ('TESTMODE',false);           // Set to true to process the file without actually accessing the database


@ini_set('auto_detect_line_endings', true);
@set_time_limit(0);

if (function_exists("date_default_timezone_set") && function_exists("date_default_timezone_get"))
  @date_default_timezone_set(@date_default_timezone_get());
foreach ($_REQUEST as $key => $val) 
{
  $val = preg_replace("/[^_A-Za-z0-9-\.&= ]/i",'', $val);
  $_REQUEST[$key] = $val;
}


$error = false;
$file  = false;

// Check PHP version

if (!$error && !function_exists('version_compare'))
{ echo ("PHP 5 required");
  $error=true;
}

// Check if mysql extension is available

if (!$error && !function_exists('mysql_connect'))
{ echo ("<p class=\"error\">There is no mySQL extension available in your PHP installation. Sorry!</p>\n");
  $error=true;
}

// Calculate PHP max upload size (handle settings like 10M or 100K)

if (!$error)
{ $upload_max_filesize=ini_get("upload_max_filesize");
  if (preg_match("/([0-9]+)K/i",$upload_max_filesize,$tempregs)) $upload_max_filesize=$tempregs[1]*1024;
  if (preg_match("/([0-9]+)M/i",$upload_max_filesize,$tempregs)) $upload_max_filesize=$tempregs[1]*1024*1024;
  if (preg_match("/([0-9]+)G/i",$upload_max_filesize,$tempregs)) $upload_max_filesize=$tempregs[1]*1024*1024*1024;
}

// Get the current directory

if (isset($_SERVER["CGIA"]))
  $upload_dir=dirname($_SERVER["CGIA"]);
else if (isset($_SERVER["ORIG_PATH_TRANSLATED"]))
  $upload_dir=dirname($_SERVER["ORIG_PATH_TRANSLATED"]);
else if (isset($_SERVER["ORIG_SCRIPT_FILENAME"]))
  $upload_dir=dirname($_SERVER["ORIG_SCRIPT_FILENAME"]);
else if (isset($_SERVER["PATH_TRANSLATED"]))
  $upload_dir=dirname($_SERVER["PATH_TRANSLATED"]);
else 
  $upload_dir=dirname($_SERVER["SCRIPT_FILENAME"]);

// Handle file upload

if (!$error && isset($_REQUEST["uploadbutton"]))
{ if (is_uploaded_file($_FILES["dumpfile"]["tmp_name"]) && ($_FILES["dumpfile"]["error"])==0)
  { 
    $uploaded_filename=str_replace(" ","_",$_FILES["dumpfile"]["name"]);
    $uploaded_filename=preg_replace("/[^_A-Za-z0-9-\.]/i",'',$uploaded_filename);
    $uploaded_filepath=str_replace("\\","/",$upload_dir."/".$uploaded_filename);

    if (file_exists($uploaded_filename))
    { echo ("<p class=\"error\">File $uploaded_filename already exist! Delete and upload again!</p>\n");
    }
    else if (!preg_match("/(\.(sql|gz|csv))$/i",$uploaded_filename))
    { echo ("<p class=\"error\">You may only upload .sql .gz or .csv files.</p>\n");
    }
    else if (!@move_uploaded_file($_FILES["dumpfile"]["tmp_name"],$uploaded_filepath))
    { echo ("<p class=\"error\">Error moving uploaded file ".$_FILES["dumpfile"]["tmp_name"]." to the $uploaded_filepath</p>\n");
      echo ("<p>Check the directory permissions for $upload_dir (must be 777)!</p>\n");
    }
    else
    { echo ("<p class=\"success\">Uploaded file saved as $uploaded_filename</p>\n");
    }
  }
  else
  { echo ("<p class=\"error\">Error uploading file ".$_FILES["dumpfile"]["name"]."</p>\n");
  }
}


// Handle file deletion (delete only in the current directory for security reasons)

if (!$error && isset($_REQUEST["delete"]) && $_REQUEST["delete"]!=basename($_SERVER["SCRIPT_FILENAME"]))
{ if (preg_match("/(\.(sql|gz|csv))$/i",$_REQUEST["delete"]) && @unlink(basename($_REQUEST["delete"])))
    echo ("<p class=\"success\">".$_REQUEST["delete"]." was removed successfully</p>\n");
  else
    echo ("<p class=\"error\">Can't remove ".$_REQUEST["delete"]."</p>\n");
}

// Connect to the database

if (!$error && !TESTMODE)
{ $dbconnection = @mysql_connect($db_server,$db_username,$db_password);
  if ($dbconnection) 
    $db = mysql_select_db($db_name);
  if (!$dbconnection || !$db) 
  { echo ("<p class=\"error\">Database connection failed due to ".mysql_error()."</p>\n");
    echo ("<p>Edit the database settings in ".$_SERVER["SCRIPT_FILENAME"]." or contact your database provider.</p>\n");
    $error=true;
  }
  if (!$error && $db_connection_charset!=='')
    @query_db("SET NAMES $db_connection_charset", $dbconnection);
}
else
{ $dbconnection = false;
}

// echo("<h1>Checkpoint!</h1>");if (!$error && !isset($_REQUEST["fn"]) && $filename=="")
{ if ($dirhandle = opendir($upload_dir)) 
  { $dirhead=false;
    while (false !== ($dirfile = readdir($dirhandle)))
    { if ($dirfile != "." && $dirfile != ".." && $dirfile!=basename($_SERVER["SCRIPT_FILENAME"]))
      { if (!$dirhead)
        {
          $dirhead=true;
        }
        echo ("<tr><td>$dirfile</td><td class=\"right\">".filesize($dirfile)."</td><td>".date ("Y-m-d H:i:s", filemtime($dirfile))."</td>");

        if (preg_match("/\.sql$/i",$dirfile))
          echo ("<td>SQL</td>");
        elseif (preg_match("/\.gz$/i",$dirfile))
          echo ("<td>GZip</td>");
        elseif (preg_match("/\.csv$/i",$dirfile))
          echo ("<td>CSV</td>");
        else
          echo ("<td>Misc</td>");

        if ((preg_match("/\.gz$/i",$dirfile) && function_exists("gzopen")) || preg_match("/\.sql$/i",$dirfile) || preg_match("/\.csv$/i",$dirfile))
          echo ("<td><a href=\"".$_SERVER["PHP_SELF"]."?start=1&amp;fn=".urlencode($dirfile)."&amp;foffset=0&amp;totalqueries=0\">Start Import</a> into $db_name at $db_server</td>\n <td><a href=\"".$_SERVER["PHP_SELF"]."?delete=".urlencode($dirfile)."\">Delete file</a></td></tr>\n");
        else
          echo ("<td>&nbsp;</td>\n <td>&nbsp;</td></tr>\n");
      }

    }
    if ($dirhead) echo ("</table>\n");
    else echo ("<p>No uploaded files found in the working directory</p>\n");
    closedir($dirhandle); 
  }
  else
  { echo ("<p class=\"error\">Error listing directory $upload_dir</p>\n");
    $error=true;
  }
}

// Single file mode
if (!$error && !isset ($_REQUEST["fn"]) && $filename!="")
{ echo ("<p><a href=\"".$_SERVER["PHP_SELF"]."?start=1&amp;fn=".urlencode($filename)."&amp;foffset=0&amp;totalqueries=0\">Start Import</a> from $filename into $db_name at $db_server</p>\n");
}
// File Upload Form
if (!$error && !isset($_REQUEST["fn"]) && $filename=="")
{ 
// Test permissions on working directory
  do { $tempfilename=time().".tmp"; } while (file_exists($tempfilename));
  if (!($tempfile=@fopen($tempfilename,"w")))
  {
  }
  else
  { fclose($tempfile);
    unlink ($tempfilename);    
?>
<?php
  }
}

// Print the current SQL connection charset
if (!$error && !TESTMODE && !isset($_REQUEST["fn"])){ 
  $result = query_db("SHOW VARIABLES LIKE 'character_set_connection';");
  $row = query_db_assoc($result);
  if ($row) 
  { $charset = $row['Value'];    
  }
}

// Open the file

if (!$error && isset($_REQUEST["start"]))
{ 
// Set current filename ($filename overrides $_REQUEST["fn"] if set)

  if ($filename!="")
    $curfilename=$filename;
  else if (isset($_REQUEST["fn"]))
    $curfilename=urldecode($_REQUEST["fn"]);
  else
    $curfilename="";

// Recognize GZip filename

  if (preg_match("/\.gz$/i",$curfilename)) 
    $gzipmode=true;
  else
    $gzipmode=false;

  if ((!$gzipmode && !$file=@fopen($curfilename,"rt")) || ($gzipmode && !$file=@gzopen($curfilename,"rt")))
  { echo ("<p class=\"error\">Can't open ".$curfilename." for import</p>\n");
    echo ("<p>Please, check that your dump file name contains only alphanumerical characters, and rename it accordingly, for example: $curfilename.");
    $error=true;
  }

// Get the file size (can't do it fast on gzipped files, no idea how)

  else if ((!$gzipmode && @fseek($file, 0, SEEK_END)==0) || ($gzipmode && @gzseek($file, 0)==0))
  { if (!$gzipmode) $filesize = ftell($file);
    else $filesize = gztell($file);                   // Always zero, ignore
  }
  else
  { echo ("<p class=\"error\">I can't seek into $curfilename</p>\n");
    $error=true;
  }
}

// *******************************************************************************************
// START IMPORT SESSION HERE
// *******************************************************************************************

if (!$error && isset($_REQUEST["start"]) && isset($_REQUEST["foffset"]) && preg_match("/(\.(sql|gz|csv))$/i",$curfilename))
{

// Check start and foffset are numeric values

  if (!is_numeric($_REQUEST["start"]) || !is_numeric($_REQUEST["foffset"]))
  { echo ("<p class=\"error\">UNEXPECTED: Non-numeric values for start and foffset</p>\n");
    $error=true;
  }

// Empty CSV table if requested

  if (!$error && $_REQUEST["start"]==1 && $csv_insert_table != "" && $csv_preempty_table)
  { 
    $query = "DELETE FROM $csv_insert_table";
    if (!TESTMODE && !query_db(trim($query), $dbconnection))
    { echo ("<p class=\"error\">Error when deleting entries from $csv_insert_table.</p>\n");
      echo ("<p>Query: ".trim(nl2br(htmlentities($query)))."</p>\n");
      echo ("<p>MySQL: ".mysql_error()."</p>\n");
      $error=true;
    }
  }

  
// Print start message

  if (!$error)
  { $_REQUEST["start"]   = floor($_REQUEST["start"]);
    $_REQUEST["foffset"] = floor($_REQUEST["foffset"]);
  
    if (TESTMODE) 
      echo ("<p class=\"centr\">TEST MODE ENABLED</p>\n");
    echo ("<p class=\"centr\">Processing file: <b>".$curfilename."</b></p>\n");
    echo ("<p class=\"smlcentr\">Starting from line: ".$_REQUEST["start"]."</p>\n");	
 
  }

// Check $_REQUEST["foffset"] upon $filesize (can't do it on gzipped files)

  if (!$error && !$gzipmode && $_REQUEST["foffset"]>$filesize)
  { echo ("<p class=\"error\">UNEXPECTED: Can't set file pointer behind the end of file</p>\n");
    $error=true;
  }

// Set file pointer to $_REQUEST["foffset"]

  if (!$error && ((!$gzipmode && fseek($file, $_REQUEST["foffset"])!=0) || ($gzipmode && gzseek($file, $_REQUEST["foffset"])!=0)))
  { echo ("<p class=\"error\">UNEXPECTED: Can't set file pointer to offset: ".$_REQUEST["foffset"]."</p>\n");
    $error=true;
  }

// Start processing queries from $file

  if (!$error)
  { $query="";
    $queries=0;
    $totalqueries=$_REQUEST["totalqueries"];
    $linenumber=$_REQUEST["start"];
    $querylines=0;
    $inparents=false;

// Stay processing as long as the $linespersession is not reached or the query is still incomplete

    while ($linenumber<$_REQUEST["start"]+$linespersession || $query!="")
    {

// Read the whole next line

      $dumpline = "";
      while (!feof($file) && substr ($dumpline, -1) != "\n" && substr ($dumpline, -1) != "\r")
      { if (!$gzipmode)
          $dumpline .= fgets($file, DATA_CHUNK_LENGTH);
        else
          $dumpline .= gzgets($file, DATA_CHUNK_LENGTH);
      }
      if ($dumpline==="") break;


// Stop if csv file is used, but $csv_insert_table is not set
      if (($csv_insert_table == "") && (preg_match("/(\.csv)$/i",$curfilename)))
      {
        $error=true;
        break;
      }
     
// Create an SQL query from CSV line

      if (($csv_insert_table != "") && (preg_match("/(\.csv)$/i",$curfilename)))
        $dumpline = 'INSERT INTO '.$csv_insert_table.' VALUES ('.$dumpline.');';

// Handle DOS and Mac encoded linebreaks (I don't know if it will work on Win32 or Mac Servers)

      $dumpline=str_replace("\r\n", "\n", $dumpline);
      $dumpline=str_replace("\r", "\n", $dumpline);
            
// DIAGNOSTIC
// echo ("<p>Line $linenumber: $dumpline</p>\n");

// Skip comments and blank lines only if NOT in parents

      if (!$inparents)
      { $skipline=false;
        reset($comment);
        foreach ($comment as $comment_value)
        { if (!$inparents && (trim($dumpline)=="" || strpos ($dumpline, $comment_value) === 0))
          { $skipline=true;
            break;
          }
        }
        if ($skipline)
        { $linenumber++;
          continue;
        }
      }

// Remove double back-slashes from the dumpline prior to count the quotes ('\\' can only be within strings)
      
      $dumpline_deslashed = str_replace ("\\\\","",$dumpline);

// Count ' and \' in the dumpline to avoid query break within a text field ending by ;
// Please don't use double quotes ('"')to surround strings, it wont work

      $parents=substr_count ($dumpline_deslashed, "'")-substr_count ($dumpline_deslashed, "\\'");
      if ($parents % 2 != 0)
        $inparents=!$inparents;

// Add the line to query

      $query .= $dumpline;

// Don't count the line if in parents (text fields may include unlimited linebreaks)
      
      if (!$inparents)
        $querylines++;
      
// Stop if query contains more lines as defined by MAX_QUERY_LINES

      if ($querylines>MAX_QUERY_LINES)
      {
        $error=true;
        break;
      }

// Execute query if end of query detected (; as last character) AND NOT in parents

      if (preg_match("/;$/",trim($dumpline)) && !$inparents)
      { if (!TESTMODE && !query_db(trim($query), $dbconnection))
        { echo ("<p class=\"error\">Error at the line $linenumber: ". trim($dumpline)."</p>\n");
          echo ("<p>Query: ".trim(nl2br(htmlentities($query)))."</p>\n");
          echo ("<p>MySQL: ".mysql_error()."</p>\n");
          $error=true;
          break;
        }
        $totalqueries++;
        $queries++;
        $query="";
        $querylines=0;
      }
      $linenumber++;
    }
  }

// Get the current file position

  if (!$error)
  { if (!$gzipmode) 
      $foffset = ftell($file);
    else
      $foffset = gztell($file);
    if (!$foffset)
    { echo ("<p class=\"error\">UNEXPECTED: Can't read the file pointer offset</p>\n");
      $error=true;
    }
  }

// Print statistics

}

?><title>e-tour</title><style type="text/css">
<!--
body {
	background-image: url(../../tickets/images/bg_setup.jpg);
	margin-left: 10px;
	margin-right: 10px;
}
-->
</style>
<h1><a href="../install.php?action=final">Installation Step 2 of 3</a></h1>
<p><a href="../install.php?action=final">Continue here </a></p>
