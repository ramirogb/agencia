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

//============================AJAX Listener sets vars at session

    if ( isset($_GET['aj']))//value
	{
	$namm=saca($_GET['ajj'] ); 	//name of var
	$nn=(int) sacaI($_GET['ajj']); 
	
	 $in= 2; //casting to number
	 $in=$in+$nn-2;	 
	 $gt=$_GET['aj']; //the value
	$_SESSION[$namm][$nn]= $_GET['aj'];
	//patch 
	
		
	exit;	
	}
//==============================


//=========preparing to fill prices
    if ( isset($_GET['j']))
	{
	$mx='s'.$_GET['j'];	
   $_SESSION[$mx]=$_GET['service'];
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
	   $query582 = "	SELECT  imp FROM tarifas where  SerCdg ='$gg' and Paxini='1' and PaxFin='1'";	 
	   $result582 = query_db($query582);	
	   $row3x8=query_db_row( $result582);
   	   $sub_total[$i]=$row3x8[0];
	   }
	   else
	   { //>1
	   		 if ( $pasajeros >1)
	   		{
	   		$query582 = "	SELECT  imp FROM tarifas where  SerCdg ='$gg' and  ( ('$pasajeros'>=PaxIni)  and ('$pasajeros' >=PaxFin)  )";	 
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
<script src="includes/over/overlibmws.js" type="text/javascript"></script>
<p>Su cotizaci&oacute;n fue enviada por email</p>
<p>Gracias por usar nuestros servicios</p>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
  <span class="text"><span class="boxborder text"> </span></span>
<p align="left">&nbsp;</p>
