
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO agencias (AgeCdg, AgeDsc, AgeDscAbr, AgeDir, AgeFon, AgeFax, AgeCto, AgeUsuAdd, AgeFecAdd, AgeTimAdd, AgeUsuChg, AgeFecChg, AgeTimChg, AgeRuc, AgeFon2, AgeNex, AgeCelMov, AgeCelCla) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['AgeCdg'], "text"),
                       GetSQLValueString($_POST['AgeDsc'], "text"),
                       GetSQLValueString($_POST['AgeDscAbr'], "text"),
                       GetSQLValueString($_POST['AgeDir'], "text"),
                       GetSQLValueString($_POST['AgeFon'], "text"),
                       GetSQLValueString($_POST['AgeFax'], "text"),
                       GetSQLValueString($_POST['AgeCto'], "text"),
                       GetSQLValueString($_POST['AgeUsuAdd'], "text"),
                       GetSQLValueString($_POST['AgeFecAdd'], "date"),
                       GetSQLValueString($_POST['AgeTimAdd'], "text"),
                       GetSQLValueString($_POST['AgeUsuChg'], "text"),
                       GetSQLValueString($_POST['AgeFecChg'], "date"),
                       GetSQLValueString($_POST['AgeTimChg'], "text"),
                       GetSQLValueString($_POST['AgeRuc'], "int"),
                       GetSQLValueString($_POST['AgeFon2'], "text"),
                       GetSQLValueString($_POST['AgeNex'], "text"),
                       GetSQLValueString($_POST['AgeCelMov'], "text"),
                       GetSQLValueString($_POST['AgeCelCla'], "text"));


  $Result1 = query_db($insertSQL) ;
}


$query_insert = "SELECT EmpCdg, AgeCdg, AgeDsc, AgeDscAbr, AgeDir, AgeFon, AgeFax, AgeCto, AgeFecAdd, AgeTimAdd, AgeRuc, AgeFon2, AgeNex, AgeCelMov, AgeCelCla FROM agencias";
$insert = query_db($query_insert) ;
$row_insert = query_db_assoc($insert);
$totalRows_insert = query_db_num($insert);

?>

<p>&nbsp;</p>
