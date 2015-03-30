
<?php
$maxRows_agencias = 10;
$pageNum_agencias = 0;
if (isset($_GET['pageNum_agencias'])) {
  $pageNum_agencias = $_GET['pageNum_agencias'];
}
$startRow_agencias = $pageNum_agencias * $maxRows_agencias;


$query_agencias = "SELECT * FROM agencias";
$query_limit_agencias = sprintf("%s LIMIT %d, %d", $query_agencias, $startRow_agencias, $maxRows_agencias);
$agencias = query_db($query_limit_agencias);
$row_agencias = query_db_assoc($agencias);

if (isset($_GET['totalRows_agencias'])) {
  $totalRows_agencias = $_GET['totalRows_agencias'];
} else {
  $all_agencias = query_db($query_agencias);
  $totalRows_agencias = query_db_num($all_agencias);
}
$totalPages_agencias = ceil($totalRows_agencias/$maxRows_agencias)-1;

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
  $insertSQL = sprintf("INSERT INTO agencias (EmpCdg, AgeCdg, AgeDsc, AgeDscAbr, AgeDir, AgeFon, AgeFax, AgeCto, AgeUsuAdd, AgeFecAdd, AgeTimAdd, AgeUsuChg, AgeFecChg, AgeTimChg, AgeRuc, Color1, Color2, AgeFon2, AgeNex, AgeCelMov, AgeCelCla, Rng) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['EmpCdg'], "text"),
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
                       GetSQLValueString($_POST['Color1'], "int"),
                       GetSQLValueString($_POST['Color2'], "int"),
                       GetSQLValueString($_POST['AgeFon2'], "text"),
                       GetSQLValueString($_POST['AgeNex'], "text"),
                       GetSQLValueString($_POST['AgeCelMov'], "text"),
                       GetSQLValueString($_POST['AgeCelCla'], "text"),
                       GetSQLValueString($_POST['Rng'], "text"));


  $Result1 = query_db($insertSQL);

  $insertGoTo = "../quote.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
 // header(sprintf("Location: %s", $insertGoTo));
}
$query_agencias = "SELECT * FROM agencias";
$agencias = query_db($query_agencias);
$row_agencias = query_db_assoc($agencias);
$totalRows_agencias = query_db_num($agencias);
?>
<SCRIPT language=JavaScript>
function nuevoAjax(){
	var xmlhttp=false;
 	try {
 		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 	} catch (e) {
 		try {
 			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 		} catch (E) {
 			xmlhttp = false;
 		}
  	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
 		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function ajaxFunction(pCtrl){
	var t1, t2, t3,t8,contenedor;
	//contenedor = document.getElementById('contenedor');	
	
	t3 = document.getElementById(pCtrl).name;//example dat[3]
	
	t1 = document.getElementById(pCtrl).value;	
	t8=(t3.substring(0,6)); //send true or false for a checkbox not the value
	if (t8=='action')	{ t1 = document.getElementById(pCtrl).checked;	}
	//alert(t8);
	
	//if t3=='action'
	ajax=nuevoAjax();
	t2="quote.php?aj="+t1+"&ajj="+t3 ;	
	ajax.open("GET",t2 ,true);
	//alert(t2);
	
	
	ajax.onreadystatechange=function()
	 {
		if (ajax.readyState==4) {
		//contenedor.innerHTML = ajax.responseText
	 	}
	}
	ajax.send(null)
	
}
</script>

<!-- jQuery -->
		<script type="text/javascript" src="includes/jquery.min.js"></script>
        
        <!-- required plugins -->
		<script type="text/javascript" src="includes/date.js"></script>
		<!--[if IE]><script type="text/javascript" src="scripts/jquery.bgiframe.min.js"></script><![endif]-->
        
        <!-- jquery.datePicker.js -->
		<script type="text/javascript" src="includes/jquery.datePicker.js"></script>
        
        <!-- datePicker required styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="includes/datePicker.css">
		
        <!-- page specific styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="includes/demo.css">
        
        <!-- page specific scripts -->
		<script type="text/javascript" charset="utf-8">
<!--

$(function()
            {
				$('.date-pick').datePicker();
            });
//-->
</script>


<?php if ($authz<>'TRUE') exit;
$rtcv=$_SERVER['PHP_SELF'];

function saca($a)		
{
$b=strpos($a,'[',0);
$r=substr($a,0,$b);
return $r;

}

function sacaI($a)		
{
$b=strpos($a,'[',0);
$c=strpos($a,']',0);
$r=substr($a,$b+1,$c-$b-1);
return $r;
}
//============================AJAX Listener sets vars at session

    if ( isset($_GET['aj']))//value
	{
	$namm=saca( trim($_GET['ajj'] )); 	//name of var
	$nn=(int) sacaI(trim($_GET['ajj'])); 
	
	 $in= 2; //casting to number
	 $in=$in+$nn-2;	 
	 $gt=trim($_GET['aj']); //the value
	$_SESSION[$namm][$nn]= trim($_GET['aj']);
	//patch 	
	//exit;	
	//$_SESSION['serv'][1]=22;
	}
//==============================
//selectiong catalog
    if ( isset($_GET['catalog']))
	{
	$catalog=$_GET['catalog'];	
	
$_SESSION['catalog1']=$_GET['catalog'];
   }


//=========preparing to fill prices and remember service codes
    if ( isset($_GET['j']))
	{
	$mx=$_GET['j'];	
	
   $_SESSION['serv'][$mx]=$_GET['service'];
   }

if (isset( $_POST['sub']))
{
FOR ($i = COUNT($_POST['pass']); $i >= '1'; $i--)					
 {
       $sub_total[$i]=''; //0 pass
	   $pasajeros= urldecode( stripslashes( $_POST['pass'][$i]));
	   $gg= $_POST['serv_h'][$i]; //get service code
	   	   
	   
	   if ( $pasajeros ==1)
	   {
	   $query582 = "	SELECT  pre FROM tarifasdetalle where  SerCdg ='$gg' and Paxini='1' and PaxFin='1'";	 
	   $result582 = query_db($query582);	
	   $row3x8=query_db_row( $result582);
   	   $sub_total[$i]=$row3x8[0];
	   }
	   else
	   { //>1
	   		 if ( $pasajeros >1)
	   		{
	   		$query582 = "	SELECT  pre FROM tarifasdetalle where  SerCdg ='$gg' and  ( ('$pasajeros'>=PaxIni)  and ('$pasajeros' >=PaxFin)  )";	 
	    	$result582 = query_db($query582);	
	    	$row3x88=query_db_row( $result582);
			$sub_total[$i]=$row3x8[0];
			}
	   }		

 
 }


}
//=========Ending of preparing to fill prices
	  
$maxRows_Recordset1 =$users_display; //Number of results per page
$pageNum_Recordset1 = 0;
$currentPage = $_SERVER["PHP_SELF"];
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1']; 
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
$_SESSION['start']=$startRow_Recordset1+1;
$_SESSION['end']= $currentPage*$maxRows_Recordset1  + $totalRows_contenido;
?>
<link href="styles.css" rel="stylesheet" type="text/css">

<div align="right"></div>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<p>
   
  <span class="comment3">   </span></p>
  <p align="center">Listar</p>

  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr class="comment3">
      <td>&nbsp;</td>
      <td>C&oacute;digo</td>
      <td>Nombre</td>
      <td>Direcci&oacute;n</td>
      <td>Tel.</td>
      <td>Fax</td>
      <td>Contact</td>
      <td>Fecha inicio </td>
      <td>RUC</td>
      <td>Telf. 24h </td>
      <td>Nextel</td>
      <td>Movistar</td>
      <td>Claro</td>
      <td>Editar</td>
      <td>Borrar</td>
    </tr>
    <?php do { ?>
    <tr class="comment4">
      <td>&nbsp;</td>
      <td><?php echo $row_agencias['AgeCdg']; ?></td>
      <td><?php echo $row_agencias['AgeDsc']; ?></td>
      <td><?php echo $row_agencias['AgeDir']; ?></td>
      <td><?php echo $row_agencias['AgeFon']; ?></td>
      <td><?php echo $row_agencias['AgeFax']; ?></td>
      <td><?php echo $row_agencias['AgeCto']; ?></td>
      <td><?php echo $row_agencias['AgeFecAdd']; ?></td>
      <td><?php echo $row_agencias['AgeRuc']; ?></td>
      <td><?php echo $row_agencias['AgeFon2']; ?></td>
      <td><?php echo $row_agencias['AgeNex']; ?></td>
      <td><?php echo $row_agencias['AgeCelMov']; ?></td>
      <td><?php echo $row_agencias['AgeCelCla']; ?></td>
      <td><img src="../images/edit.png" width="16" height="16"></td>
      <td><img src="../images/delete.png" width="16" height="16"></td>
    </tr>
    <?php } while ($row_agencias = query_db_assoc($agencias)); ?>
  </table>
  <p>&nbsp;</p>