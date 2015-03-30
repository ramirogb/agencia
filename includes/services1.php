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
            $(function()
            {
				$('.date-pick').datePicker();
            });
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
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<script src="includes/over/overlibmws.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore)
{ //v3.0
var segunx;
//if (   selObj.selectedIndex==0) { segunx=60; }
//if (  selObj.selectedIndex==1) { segunx=300; }
//if (  selObj.selectedIndex==2) { segunx=900; }
//if (  selObj.selectedIndex==3) { segunx=1800; }

if (  selObj.selectedIndex>0) 
{ 
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
 }

//  if (restore) selObj.selectedIndex=0;


}

function MM_jumpMenu2(targ,selObj,restore)
{ //v3.0
var segunx;
//if (   selObj.selectedIndex==0) { segunx=60; }
//if (  selObj.selectedIndex==1) { segunx=300; }
//if (  selObj.selectedIndex==2) { segunx=900; }
//if (  selObj.selectedIndex==3) { segunx=1800; }


  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
//  if (restore) selObj.selectedIndex=0;


}


//-->
</script>
<p>Our servicesggg</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=us" Method="post" enctype="multipart/form-data">
    <div align="right"><span class="text"><span class="boxborder text">    </span></span>        <span class="text"><span class="boxborder text">        </span></span>
    </div>
    <table width="<?php echo $maintablewidth ?>" cellspacing="0" cellpadding="0" class="boxborder" align="<?php echo $maintablealign ?>">
  <tr style="padding-bottom:2px">
    <td colspan="3" bgcolor="#AACCEE" class="text boxborder"  style="padding-left:5px"><strong> Services</strong><span class="text"></span><span class="text"><strong></strong></span></td>
    <td colspan="8" bgcolor="#AACCEE" class="text boxborder"  style="padding-left:5px"><div align="right">Visit My<a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=chart"> chart</a> for making a quotation or reservation</div></td>
    <td width="67" bgcolor="#AACCEE" class="boxborder text">&nbsp;</td>
  </tr>
  <tr bgcolor="#EEEEEE">
    <td width="17" bgcolor="#EEEEEE" class="boxborder text">N&ordm;</td>
    <td width="162" class="boxborder text"><b><b>Date</b></b></td>
    <td width="81" class="boxborder text"><b><b>Local Hour</b></b></td>
    <td width="135" class="boxborder text"><b><b><span class="text boxborder"><strong>Service</strong></span></b></b></td>
    <td width="79" class="text boxborder"><span class="boxborder text"><b><b>Descripci&oacute;n</b></b></span></td>
    <td width="40" class="boxborder text"><b>Type</b></td>
    <td width="40" class="boxborder text"><b>Lang</b></td>
    <td width="41" class="boxborder text"><b>  $ </b></td>
    <td width="75" class="boxborder text"><b>Passagers</b></td>
    <td width="28" class="boxborder text">&nbsp;</td>
    <td width="211" class="text boxborder"><div align="center"><strong>Comments</strong></div></td>
    <td class="text boxborder"><strong>Sub Total</strong></td>
  </tr>
  <?php
  //to create pages select this
			$query = '	SELECT  * FROM users
					ORDER BY username';
					

{
			$query = "	SELECT  * FROM servicios ORDER BY SerDsc";
}					
$query_limit = sprintf("%s LIMIT %d, %d",$query, $startRow_Recordset1, $maxRows_Recordset1); 				
			$result = query_db($query_limit);
			$totalRows_contenido = query_db_num($result);
  //to create pages select this	
			
			$j =$_SESSION['start'];
			
			WHILE ($row = query_db_array($result))

				{
				IF ($row['status'] == '1')
					{
					$status = 'Active';
					}
				IF ($row['status'] == '0')
					{
					$status = 'Suspened';
					}	
				IF ($row['status'] == '2')
					{
					$status = 'Banned';
					}
?>

    <tr bgcolor="<?php echo UseColor() ?>">
      <td class="boxborder text"><?php 
	  echo $j; 
	  ?></td>               
      <td  style="padding-right:3px" class="boxborder"><span class="boxborder text">
        <?php  ?> 
        <span class="text">
        <input name="dat[<?php echo $j; ?>]"    onChange="ajaxFunction('dat[<?php echo $j; ?>]');"  type="text" class="date-pick" value="<?php  echo $_SESSION['dat'][$j]; ?>" size="10" maxlength="10">
        </span>
              <input name="username" type="hidden" id="username" value="<?php echo $row['username']; ?>">
      </span> </td>
      <td  style="padding-right:3px" class="boxborder"><span class="boxborder text">
        <select name="hour[<?php echo $j; ?>]"  onChange="ajaxFunction('hour[<?php echo $j; ?>]');"  id="hour[<?php echo $j; ?>]">
          <option value="00"<?php     

		  $hor=$_SESSION['hour'][$j];
		  
		  if (!(strcmp("00", $limit_tickets ) ) ) {echo "SELECTED"; } ?> ><?php echo '0h'; ?></option>
<option value="01"<?php     if (!(strcmp("01", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '01h'; ?></option>
<option value="02"<?php     if (!(strcmp("02", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '02h'; ?></option>
<option value="03"<?php     if (!(strcmp("03", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '03h'; ?></option>
<option value="04"<?php     if (!(strcmp("04", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '04h'; ?></option>
<option value="05"<?php     if (!(strcmp("05", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '05h'; ?></option>
<option value="06"<?php     if (!(strcmp("06", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '06h'; ?></option>
<option value="07"<?php     if (!(strcmp("07", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '07h'; ?></option>
<option value="08"<?php     if (!(strcmp("08", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '08h'; ?></option>
<option value="09"<?php     if (!(strcmp("09", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '09h'; ?></option>
<option value="10"<?php     if (!(strcmp("10", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '10h'; ?></option>
<option value="11"<?php     if (!(strcmp("11", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '11h'; ?></option>
<option value="12"<?php     if (!(strcmp("12", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '12h'; ?></option>
<option value="13"<?php     if (!(strcmp("13", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '13h'; ?></option>
<option value="14"<?php     if (!(strcmp("14", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '14h'; ?></option>
<option value="15"<?php     if (!(strcmp("15", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '15h'; ?></option>
<option value="16"<?php     if (!(strcmp("16", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '16h'; ?></option>
<option value="17"<?php     if (!(strcmp("17", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '17h'; ?></option>
<option value="18"<?php     if (!(strcmp("18", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '18h'; ?></option>
<option value="19"<?php     if (!(strcmp("19", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '19h'; ?></option>
<option value="20"<?php     if (!(strcmp("20", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '20h'; ?></option>
<option value="21"<?php     if (!(strcmp("21", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '21h'; ?></option>
<option value="22"<?php     if (!(strcmp("22", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '22h'; ?></option>
<option value="23"<?php     if (!(strcmp("23", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '23h'; ?></option>         

        </select>      
        <select name="minutes[<?php 
		  $min=$_SESSION['minutes'][$j];
		echo $j; ?>]" onChange="ajaxFunction('minutes[<?php echo $j; ?>]');" id="minutes[<?php echo $j; ?>]">
        <option value="15"<?php     if (!(strcmp("15", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '15m'; ?></option>
        <option value="30"<?php     if (!(strcmp("30", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '30m'; ?></option>
        <option value="45"<?php     if (!(strcmp("45", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '45'; ?></option>
        <option value="00"<?php if (!(strcmp("00", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '00'; ?></option>
      </select>
</span></td>
      <td class="comment3"   >       <select    name="s[<?php echo $j; ?>]" id="s[<?php echo $j; ?>]" onChange="MM_jumpMenu('parent',this,0)"> 
		<option value="-1"selected >&nbsp;</option>
        <?php			
	$query577 = "	SELECT  * FROM servicios ORDER BY SerDsc desc";	 
	$result577 = query_db($query577);	
	$row3x=query_db_assoc( $result577);	
   $mmx='s'.$j;		
			 do { ?>
        <option    value="<?php   echo $rtcv; ?>?service=<?php echo $row3x['SerCdg']; ?>&j=<?php echo $j; ?>" <?php if (!(strcmp( trim($_SESSION[$mmx]), $row3x['SerCdg'] ) ) ) {echo "SELECTED"; } ?>><?php echo  substr($row3x['SerDsc'] ,0,20);  ?></option>
		<?php } while ($row3x=query_db_assoc(	$result577)); ?>		
      </select>
        <span class="boxborder text">
        <input name="serv_h[<?php echo $j; ?>]" type="hidden" id="se[<?php echo $j; ?>]" value="<?php  echo $_SESSION[$mmx]; ?>">
      </span> </td>
 <?php     
	  	  $tgt=$_SESSION[$mmx];
	  $query578 = "	SELECT  tarifas.imp,servicios.SerDsc FROM tarifas,servicios where  servicios.SerCdg ='$tgt' and tarifas.SerCdg='$tgt' and tarifas.Paxini='1'";	 
	$result578 = query_db($query578);	
	$row3x8=query_db_row( $result578);	
	$sale= $row3x8[1];
	?>	  <td    onMouseOver="return overlib('<?php echo $sale; ?>',DECODE,AUTOSTATUS)"	 onmouseout="return nd()"; class="boxborder">  D</td>
      <td class="boxborder"><select name="tipe[<?php echo $j; ?>]" onChange="ajaxFunction('tipe[<?php echo $j; ?>]');" id="tipe[<?php 
	   $ti=$_SESSION['tipe'][$j];
	  echo $j; ?>]">
        <option value="TRUE"<?php  if (!(strcmp("TRUE", $ti ) ) ) {echo "SELECTED"; } ?> ><?php echo 'PRIVATE'; ?></option>
        <option value="FALSE"<?php if (!(strcmp("FALSE", $ti ) ) ) {echo "SELECTED"; } ?> ><?php echo 'NORMAL'; ?></option>
      </select></td>
      <td class="boxborder"><select name="lang[<?php echo $j; ?>]"  onChange="ajaxFunction('lang[<?php echo $j; ?>]');" id="lang[<?php 
	    $ti=$_SESSION['lang'][$j];
	  echo $j; ?>]">
        <option value="en"<?php if (!(strcmp("en", $ti ) ) ) {echo "SELECTED"; } ?> ><?php echo 'English'; ?></option>
        <option value="es"<?php if (!(strcmp("es", $ti ) ) ) {echo "SELECTED"; } ?> ><?php echo 'Espanish'; ?></option>
        <option value="fr"<?php if (!(strcmp("fr", $ti ) ) ) {echo "SELECTED"; } ?> ><?php echo 'French'; ?></option>
        <option value="gm"<?php if (!(strcmp("gm", $ti ) ) ) {echo "SELECTED"; } ?> ><?php echo 'German'; ?></option>
        <option value="it"<?php if (!(strcmp("it", $ti ) ) ) {echo "SELECTED"; } ?> ><?php echo 'Italian'; ?></option>
        <option value="ch"<?php if (!(strcmp("ch", $ti ) ) ) {echo "SELECTED"; } ?> ><?php echo 'Chinese'; ?></option>
      </select></td>
      <td class="boxborder text"><?php 
	  


	  echo $row3x8[0];
	   ?>
          <input name="bp[<?php echo $j; ?>]" type="hidden" id="bp[<?php echo $j; ?>]" value="1"></td>
      <td class="boxborder text"><input name="pass[<?php echo $j; ?>]" type="text" id="pass[<?php echo $j; ?>]"  onChange="ajaxFunction('pass[<?php echo $j; ?>]');" value="<?php echo $_SESSION['passengern'][$j]; ?>" size="4" maxlength="4"></td>
      <td class="text"><input name="action[<?php echo $j; ?>]" type="checkbox" id="action[<?php echo $j; ?>]"  onChange="ajaxFunction('action[<?php echo $j; ?>]');" value="true" <?php if  (  $_SESSION['action'][$j] =='true') echo 'checked'; ?>>
        <span class="boxborder text">        </span></td>
      <td class="text"><span class="boxborder text">
        <input name="com[<?php echo $j; ?>]" type="text" id="com[<?php echo $j; ?>]" size="30" maxlength="255">
      </span></td>
      <td bgcolor="<?php echo UseColor() ?>" class="text"><span class="boxborder text">
  <?php 
       //if $_
        echo $sub_total[$j];

?> 
  <input name="sub[<?php echo $j;  ?>]" type="hidden" id="sub[<?php echo $j;  ?>]" value="<?php  echo $sub_total[$j];  ?>">
      </span></td>
    </tr> <?php
				$j++;
				}
?>
    <tr bgcolor="<?php echo UseColor() ?>">
      <td rowspan="3" class="boxborder text">&nbsp;</td>
      <td rowspan="3" class="boxborder"  style="padding-right:3px">&nbsp;</td>
      <td rowspan="3" class="boxborder"  style="padding-right:3px">&nbsp;</td>
      <td rowspan="3" class="comment3"   >&nbsp;</td>
      <td rowspan="3" class="boxborder">&nbsp;</td>
      <td rowspan="3" class="boxborder">&nbsp;</td>
      <td rowspan="3" class="boxborder">&nbsp;</td>
      <td rowspan="3" class="boxborder text">&nbsp;</td>
      <td rowspan="3" class="boxborder text">&nbsp;</td>
      <td rowspan="3" class="text">&nbsp;</td>
      <td class="text"><div align="right">Valor Venta:</div></td>
      <td bgcolor="<?php echo UseColor() ?>" class="text"><span class="boxborder text">
        <input name="sub[<?php echo $j;  ?>]" type="hidden" id="sub[<?php echo $j;  ?>]" value="<?php  

		
		  $ggx=0;
		  FOR ($i = 0;  $i <= '30'; $i++)
		  {
		  if ($_POST['action'][$i]==true)	  $ggx=$ggx+$sub_total[$i];
		  
		  }
		echo $ggx;  
		    ?>">
        <?php 
       
        echo  $ggx;

?>
      </span></td>
    </tr>
    <tr bgcolor="<?php echo UseColor() ?>">
      <td class="text"><div align="right">I.G.V.</div></td>
      <td bgcolor="<?php echo UseColor() ?>" class="text"><span class="boxborder text">
        <?php 
       //if $_
        echo $taxes=$ggx*0.19;

?>
        <input name="sub[<?php echo $j;  ?>]" type="hidden" id="sub[<?php echo $j;  ?>]" value="<?php  echo $taxes;  ?>">
      </span></td>
    </tr>
    <tr bgcolor="<?php echo UseColor() ?>">
      <td class="text"><div align="right"><span class="boxborder text">
        <input name="Clear"   style="margin:4px " type="submit" class="comment4" id="Clear" value="Update">
      </span>Total: </div></td>
      <td bgcolor="<?php echo UseColor() ?>" class="text"><?php echo $ggx+$taxes;
?>
        <div align="right"><span class="boxborder text">
          <input name="sub[<?php echo $j;  ?>]" type="hidden" id="sub[<?php echo $j;  ?>]" value="<?php  echo $$ggx+$taxes;  ?>">
        </span></div></td>
    </tr>
  
 
</table>

    <div align="left">
      <input name="sub" type="hidden" id="sub" value="5">
      <span class="text"><span class="boxborder text">
      <input name="Clear" type="reset"  style="margin:10px; margin-left:600px " class="comment4" id="Clear" value="Clear">
      </span></span>
      <span class="text"><span class="boxborder text">      </span></span>
    </div>
</form>
<span class="text"><span class="boxborder text">
</span></span>
<p align="left">
  <?php

$_SESSION['end']= $currentPage*$maxRows_Recordset1  + $totalRows_contenido;
if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = query_db($query);
  $totalRows_Recordset1 = query_db_num($all_Recordset1);
  $_SESSION['total']=$totalRows_Recordset1;
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
 $totalRows_contenido=$totalPages_Recordset1; 

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);





 ?>
  <?php echo $_SESSION['total'].' users'; ?></p>
<p align="right">&nbsp; </p>
<p><span class="testo Estilo2"> <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">&laquo;&laquo;</a> <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">&laquo;</a> <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">&raquo;</a> <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">&raquo;&raquo;</a> </span>
    <?php
   $qas= ceil(  ($_SESSION['total']/$maxRows_Recordset1) );
   echo 'Result page: ';   
   $time = round($endtime*100)/100;   
   for ($zz=0;  $zz < $qas; $zz +=1)
   { //for
   ?>
    <span class="testo"> <a href="<?php printf("%s?pageNum_Recordset1=%d%s",$currentPage,$zz,$queryString_Recordset1); ?>"><?php echo $zz; ?></a> </span>
    <?php
   } //of the for
   ?>
</p>
