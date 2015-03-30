<?php
$allowreg = 'ON';@include('configuration.php');@include('../configuration.php'); $DBName = $data;$DBUser = $user; $DBPassword = $pass; $DBHost = $host;global $hostname_conexionxcz1;
global $database_conexionxcz1;global $username_conexionxcz1;global $password_conexion1xcz;$hostname_conexion1=$DBHost;$database_conexion1=$DBName;$username_conexion1=$DBUser;
$password_conexion1=$DBPassword;global $conexionxcz1;$conexionxcz1 = @mysql_connect($hostname_conexion1, $username_conexion1, $password_conexion1) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($data,$conexionxcz1);

function begin_trans()
{ global   $conexionxcz1;	
 $query = "START TRANSACTION";
 $Result1 = query_db($query); 
}
function end_trans()
{
global   $conexionxcz1,$errors_db,$last_msg;	
if( $errors_db==false)
	  {
	  $query = "COMMIT";
	 $last_msg.='Ok';
	   }
	 else {
	 $query = "ROLLBACK";
	  echo $last_msg .='Roll Back';
	   }
	$Result1 = query_db($query);
	
}
function query_db($query)
{
global   $errors_db,$conexionxcz1;global $hostname_conexion1;global $database_conexion1;global $username_conexion1;global $password_conexion1;
mysql_select_db($database_conexion1,$conexionxcz1);		$t=mysql_query($query,$conexionxcz1)or print(mysql_error());		
		if ( mysql_errno()==0  ) 
		{	}	else {	$errors_db=true;}return $t;}
		
function query_db_num($result){global   $errors_db,$conexionxcz1;return mysql_num_rows($result);}
function query_db_assoc($result){global   $errors_db,$conexionxcz1;return mysql_fetch_assoc($result);}
function query_db_row($result){global   $errors_db,$conexionxcz1;return mysql_fetch_row($result);}
function query_db_array($result)  {  global   $errors_db,$conexionxcz1;  return mysql_fetch_array($result);
  }function query_affected_rows($result)
  { global   $errors_db,$conexionxcz1;return mysql_affected_rows($conexionxcz1);
  }
function query_db_insert_id()
{
global   $errors_db,$conexionxcz1;return    mysql_insert_id($conexionxcz1);
	
}

    $maintablewidth = '100%';    $maintablealign = 'center';    // MAIN TITLE BAR
    $background =  '#E0EBF5';     $backover   = '#AABBDD';  $backout    =   '#057BFE'; 
    // DATE FORMATS
    $dformatemail   = 'D d M Y H:i:s';          // CHANGES THE DATE FORMAT WITHIN THE EMAILS	
$encoding=	 'Content-type: text/html;charset=ISO-8859-1';

	 // ALLOWED TYPES COPY THE RELEVANT ITEM TO THIS STRING
				    $filetypes =    array (
                'image/pjpeg'       => '.jpg',
                'image/jpeg'        => '.jpg',
               'image/gif'     => '.gif',
               'image/x-png'     => '.png',
              'application/msword'    => '.doc',
              'application/pdf'   => '.pdf',
	      'application/x-zip-compressed' => '.zip'			   
                );
    $allowedtypes = array(
                'image/pjpeg',         
                'image/jpeg',
                'image/gif',
               'image/x-png',
               'application/msword',
               'application/pdf',
               'application/x-zip-compressed'
                );
   	   $my_version='1.2';				
?>