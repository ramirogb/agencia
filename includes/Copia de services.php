
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

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
   <script type="text/javascript"> 
function hideshow(which,elid){
var a,b;
if (!document.getElementById)
return
if (which.style.display=="block")
	{
		pCtrl="com["+elid+"]";
	which.style.display="none";
	 t1 = document.getElementById(pCtrl).size=3;
	}
else
	{	
	pCtrl="com["+elid+"]";
	 t1 = document.getElementById(pCtrl).size=30;
	which.style.display="block";
	
	}
}


function hideshow2(which,elid){pCtrl="s["+elid+"]";
if (!document.getElementById)
return
if (which.style.display=="block")
	{	which.style.display="none";
	document.getElementById(pCtrl).style.display="block";
		}
else
	{which.style.display="block";
	document.getElementById(pCtrl).style.display="none";
	}
}

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

    if ( isset($_GET['aj']))//value crea un valor de sesion con el mismo nombre de la variable 
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
	$indice=$_GET['j'];
//$_SESSION['catalog1']=$_GET['catalog'];
$_SESSION['cate'][$indice]=$_GET['catalog']; 

   }

if (isset($_GET['filter']) ) //controls if show al services from catalog or only those selected for the agency
{
$_SESSION['filter']=$_GET['filter'];
}
//=========preparing to fill prices and remember service codes
    if ( isset($_GET['j']))
	{
	$mx=$_GET['j'];	
	
   $_SESSION['serv'][$mx]=$_GET['service'];
   }
//if (isset( $_POST['sub']))
{
FOR ($i = COUNT($_SESSION['passengern']); $i >= '1'; $i--)					
 { 
       $sub_total[$i]=''; //0 pass
	   $pasajeros= urldecode( stripslashes(  $_SESSION['passengern'][$i]));
	   $gg= $_SESSION['serv'][$i]; //$_POST['serv_h'][$i]; //get service code	   
$tipo=$_POST['tipe'][$i];	 
	   		 if ( $pasajeros >=1)
	   		{
	   	  $query582 = "	SELECT  pre FROM tarifasdetalle where  SerCdg ='$gg' and  ( $pasajeros BETWEEN PaxIni and PaxFin) and serv_type='$tipo'";	 
	    	$result582 = query_db($query582);	
	    	$row3x88=query_db_row( $result582);
			$sub_total[$i]=$row3x88[0];
		   $price_individual[$i]=$row3x88[0];
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

        <style type="text/css">
<!--
.Estilo2 {font-weight: bold}
-->
        </style>
        <div align="right"></div>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
  <p><script src="includes/over/overlibmws.js" type="text/javascript"></script>
  </p>
  <p>
    <script language="JavaScript" type="text/JavaScript">
<!--

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
    

  </p> 
    <span  style="padding-left:100px; margin-top:10px" class="minititle"><?php echo $select_catalog; ?>
    <?php ?>
    <?php 
  
	echo $filter;
  
  ?>
    <select name="filter"  onChange="MM_jumpMenu('parent',this,0)"  id="filter">
      <option value=" "> </option>
      <option value="<?php   echo $rtcv; ?>?catalog=<?php echo $_SESSION['cata']; ?>&filter=1"  <?php if ($_SESSION['filter']=='1') { echo 'selected';} ?>>Mostrar todo</option>
      <option value="<?php   echo $rtcv; ?>?catalog=<?php echo $_SESSION['cata']; ?>&filter=2"<?php if ($_SESSION['filter']=='2') { echo 'selected';} ?>>Solo mis servicios</option>
    </select>
    <span >
    <?php 
  
	echo $coin;
  
  ?>
    </span>
<p>&nbsp;</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=us" Method="post" enctype="multipart/form-data" name="forma" id="forma">
    <table width="1020" cellspacing="0" cellpadding="0" class="boxborder" align="<?php echo $maintablealign ?>">
  <tr style="padding-bottom:2px">
    <td colspan="5" bgcolor="#AACCEE"   style="padding-left:5px"><strong> <?php echo $services?></strong></td>
    <td colspan="7" bgcolor="#AACCEE"   style="padding-left:5px"><div align="right"></div></td>
    <td width="119" bgcolor="#AACCEE" >&nbsp;</td>
  </tr>
  <tr bgcolor="#EEEEEE">
    <td width="22" bgcolor="#EEEEEE" ><div align="center"><strong>N&ordm;</strong></div></td>
    <td width="150" ><div align="center"><strong><?php echo $date_reserv ?> </strong></div></td>
    <td width="106" ><strong> <?php echo $hour_reserv ?></strong></td>
    <td colspan="2" ><strong>Cat</strong></td>
    <td width="73" ><div align="center"><strong><?php echo $text_titleclo
 ?></strong></div></td>
    <td width="70"><strong><?php echo $type_reserv
 ?></strong></td>
    <td width="100" ><strong><?php echo $lang_reserv
 ?></strong></td>
    <td width="64" ><strong>Paxes</strong></td>
    <td width="20" ><div align="center"><strong><?php echo $unit_price
 ?></strong></div></td>
    <td width="61" ><div align="center"><strong>Inc.</strong></div></td>
    <td width="226" ><div align="center"><strong><?php echo $comment
 ?></strong></div></td>
    <td ><div align="center"><strong>Sub Total</strong></div></td>
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
			$totalRows_contenido =20;		
			$j = 1+$_GET['pageNum_Recordset1']*$tickets_display ;		
			
						for ($www=0; $www<$tickets_display; $www++)
				{				
?>

    <tr bgcolor="<?php echo UseColor() ?>" >
      <td class="boxborder text"><?php 
	  echo $j; 
	  ?></td>               
      <td  style="padding-right:1px" >
        <?php  if  ($_SESSION['action'][$j]=='true') 
		{  show_warning($err);
		}
 ?>        
        <input name="dat[<?php echo $j; ?>]"  type="text" class="date-pick"  id="dat[<?php echo $j; ?>]" onChange="ajaxFunction('dat[<?php echo $j; ?>]');"  value="<?php  echo $_SESSION['dat'][$j]; ?>" size="8" maxlength="10">
        <input name="username" type="hidden" id="username" value="<?php echo $row['username']; ?>">      </td>
      <td width="150" class="boxborder text"  style="padding-right:3px">
        <select name="hour[<?php echo $j; ?>]" class="comment3"  style="width:37px"  onChange="ajaxFunction('hour[<?php echo $j; ?>]');"  id="hour[<?php echo $j; ?>]">
          <option value="00"<?php     

		  $hor=$_SESSION['hour'][$j];
		  
		  if (!(strcmp("00", $hor ) ) ) {echo "SELECTED"; } ?> SELECTED><?php echo '0h'; ?></option>
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
        <select class="comment3"  name="minutes[<?php 
		  $min=$_SESSION['minutes'][$j];
		echo $j; ?>]"   style="width:35px" onChange="ajaxFunction('minutes[<?php echo $j; ?>]');" id="minutes[<?php echo $j; ?>]">
		<option value="00"<?php if (!(strcmp("00", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '00'; ?></option>
        <option value="15"<?php     if (!(strcmp("15", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '15m'; ?></option>
        <option value="30"<?php     if (!(strcmp("30", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '30m'; ?></option>
        <option value="45"<?php     if (!(strcmp("45", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '45'; ?></option>        
      </select>
</td>
      <td bgcolor="<?php echo UseColor() ?>"  style="padding-right:3px" ><div align="right"><a href="javascript:hideshow2(document.getElementById('adivCat2[<?php echo $j; ?>]'),<?php echo $j; ?>)"><img src="images/plus.gif" width="14" height="14" border="0"></a>
      </div></td>
      <td bgcolor="<?php echo UseColor() ?>"  style="padding-right:1px" ><span  id="adivCat2[<?php echo $j; ?>]"; style="font:10px bold; display: block; display:none"   >
	  <select    name="tarif[<?php echo $j; ?>]" id="tarif[<?php echo $j; ?>]" onChange="MM_jumpMenu('parent',this,0)">
        <option value="./quote.php?catalog=-1&j=<?php echo $j; ?>" selected >&nbsp;</option>
        <?php			
	$query577 = "	SELECT  * FROM tarifarios ORDER BY id desc";	 
	$result577 = query_db($query577);	
	$row3x=query_db_assoc( $result577);	   	
	
	
	
			 do { ?>
        <option    value="<?php   echo $rtcv; ?>?catalog=<?php echo $row3x['tarif_cdg']; ?>&j=<?php echo $j; ?>" <?php 
			if (!(strcmp( trim($_SESSION['cate'][$j]), $row3x['tarif_cdg'] ) ) ) {echo "SELECTED"; 
			$_SESSION['cate'][$j]=$row3x['tarif_cdg']; }
			 ?>><?php echo  substr($row3x['descript'] ,0,30);  ?></option>
        <?php } while ($row3x=query_db_assoc(	$result577)); ?>
      </select></span></td>
      <td    >
	  <?php 		
	  ?>           <select    name="s[<?php echo $j; ?>]"   class="comment3"     id="s[<?php echo $j; ?>]" onChange="MM_jumpMenu('parent',this,0)">
          <option value="./quote.php?service=-1&j=<?php echo $j; ?>" selected >&nbsp;</option>
          <?php			
	
  if (   isset($_SESSION['cate'][$j]) and ($_SESSION['filter']=='2') ) 
  {//==============
  
	$hh=$_SESSION['cate'][$j];
	$gt=$_SESSION['xcv_userna'];
	$sqlr="select agencias.AgeCdg from agencias left join  users on agencias.AgeCdg=users.AgeCdg where users.username='$gt' ";
	$resultdf = query_db($sqlr);	
	$ag=query_db_row($resultdf);
	$agg=$ag[0];//gets agency code associated with the logged user	
	$query577 = "SELECT  * FROM servicios where tarif_cdg='$hh' and  SerAgeCdg='$agg' ORDER BY SerDsc desc";	//show only special services for this agency
	 }
	 //===========
	 else
	 {
	 $nn=$_SESSION['cate'][$j];
	 $query577 = "SELECT  * FROM servicios  where tarif_cdg='$nn' ORDER BY SerDsc desc";//shows all from catalog
	 }
	
	$result577 = query_db($query577);	
	$row3x=query_db_assoc( $result577);	
			 do { ?>
          <option    value="<?php   echo $rtcv; ?>?service=<?php echo $row3x['SerCdg']; ?>&j=<?php echo $j; ?>" <?php if (!(strcmp( trim($_SESSION['serv'][$j]), $row3x['SerCdg'] ) ) ) {echo "SELECTED"; } ?>><?php echo  $row3x['SerCdg'].' '.substr($row3x['SerDsc'] ,0,25);  ?></option>
          <?php } while ($row3x=query_db_assoc(	$result577)); ?>
      </select><input name="serv_h[<?php echo $j; ?>]" type="hidden" id="serv_h[<?php echo $j; ?>]" value="<?php  echo $_SESSION['serv'][$j]; ?>">
  </td>
 <?php     
	  	  $tgt=$_SESSION['serv'][$j];
$query578 = "	SELECT  tarifasdetalle.pre,servicios.SerDsc FROM tarifasdetalle,servicios where  servicios.SerCdg ='$tgt' 
and tarifasdetalle.SerCdg='$tgt' and tarifasdetalle.Paxini='1'";	 
	$result578 = @query_db($query578);	
	$row3x8=@query_db_row( $result578);	
	$sale= $row3x8[1];
	$_SESSION['descri'][$j]=$sale;
		  
	?>	  <td >
	<select  class="comment3" name="tipe[<?php echo $j; ?>]" onChange="ajaxFunction('tipe[<?php echo $j; ?>]');window.location.reload();" id="tipe[<?php echo $j;
	   $ti=$_SESSION['tipe'][$j];
	   ?>]">	   
	    <option value=""><?php echo  $selectme ?></option>
		<?php
			$sdd=" Select * from servicios_variations";	
	 $resultsdd= query_db($sdd);
	 $fila=query_db_assoc($resultsdd);
		 	  
         do { ?>
        <option    value="<?php  echo $fila['kind']; ?>"<?php  if (!(strcmp($fila['kind'], $ti ) ) ) {echo "SELECTED"; } ?> ><?php echo $fila['descript'] ?></option>
		<?php } while ($fila=query_db_assoc($resultsdd)); ?>        
      </select>
	  </td>
      <td >
	  <?php 
	  $gb=$_SESSION['tipe'][$j];
	  $sese=$_SESSION['serv'][$j];
	  //$sdd=" Select * from serv_type_lang,languajes where serv_type_lang.tipe ='$gb' and serv_type_lang.SerCdg='$sese' and serv_type_lang.lang=languajes.lang";		  
	  ?>
	  <select  class="comment3" name="lang[<?php echo $j; ?>]"   onChange="ajaxFunction('lang[<?php echo $j; ?>]');"   style="width:80px";  id= "lang[<?php echo $j; ?>]" >
	  <option value=""><?php echo  $selectme ?></option>
        <?php  echo $j;
	  
	    $ti=$_SESSION['lang'][$j];
	 
	  $gb=$_SESSION['tipe'][$j];
		$sdd=" Select * from serv_type_lang,languajes where serv_type_lang.tipe ='$gb' and serv_type_lang.SerCdg='$sese' and serv_type_lang.lang=languajes.lang";	
	 $resultsdd= query_db($sdd);
	 $fila=query_db_assoc($resultsdd);
	  
	   ?>
        <?php 	  
         do { ?>
        <option value="<?php  echo $fila['lang']; ?>" <?php if (!(strcmp($fila['lang'], $ti )) ) {echo "SELECTED";} ?>><?php echo $fila['lang_descript']; ?></option>
        <?php } while ($fila=query_db_assoc($resultsdd)); ?>
      </select> </td>
      <td class="boxborder"><span class="boxborder text">
        <input name="passengern[<?php echo $j; ?>]" type="text" id="passengern[<?php echo $j; ?>]"  onChange="ajaxFunction('passengern[<?php echo $j; ?>]');" value="<?php echo $_SESSION['passengern'][$j]; ?>" size="4" maxlength="4">
      </span></td>
      <td ><?php echo   $price_individual[$j]; ?>&nbsp;</td>
      <td ><input name="action[<?php echo $j; ?>]" type="checkbox" id="action[<?php echo $j; ?>]"  onChange="ajaxFunction('action[<?php echo $j; ?>]');" value="true" <?php if  (  $_SESSION['action'][$j] =='true') echo 'checked'; ?>>
        <?php  if (  ($_POST['s'][$j]<>"./quote.php?service=-1&j=".$j)   and ($_SESSION['action'][$j]<>'true') )
		{  show_warning('*');
		
		}
 ?>
</td>
      <td >        <a href="javascript:hideshow(document.getElementById('adiv[<?php echo $j; ?>]'),<?php echo $j; ?>)"><img src="images/comments.gif" width="15" height="12" border="0"></a>
	  <div id="adiv[<?php echo $j; ?>]" style="font:10px bold; display: block; display:none" ><input name="com[<?php echo $j; ?>]" type="text" id="com[<?php echo $j; ?>]"   onChange="ajaxFunction('com[<?php echo $j; ?>]');" value="<?php echo $_SESSION['com'][$j]; ?>" size="3" maxlength="255"></div></td>
      <td bgcolor="<?php echo UseColor() ?>" >
  <?php 
       		
		if (   $_SESSION['action'][$j]=='true')
		{
		
		echo $sub_total[$j] = round( (real)   $sub_total[$j]*$_SESSION['passengern'][$j],2);
		$_SESSION['subtotal'][$j]=$sub_total[$j];
		}
		else
		{		echo $sub_total[$j]=0;
		 }
		?> 
  <input name="subtotal[<?php echo $j;  ?>]" type="hidden" id="subtotal[<?php echo $j;  ?>]" value="<?php  echo $sub_total[$j]  ?>">
      </td>
    </tr> <?php
				$j++;
				}
?>
    <tr bgcolor="<?php echo UseColor() ?>">
      <td rowspan="3" class="boxborder text">&nbsp;</td>
      <td rowspan="3" class="boxborder"  style="padding-right:3px">&nbsp;</td>
      <td rowspan="3" class="boxborder"  style="padding-right:3px">&nbsp;</td>
      <td colspan="2" rowspan="3" class="boxborder"  style="padding-right:3px">&nbsp;</td>
      <td rowspan="3" class="comment3"   >&nbsp;</td>
      <td rowspan="3" class="boxborder">&nbsp;</td>
      <td rowspan="3" class="boxborder">&nbsp;</td>
      <td rowspan="3" class="boxborder">&nbsp;</td>
      <td rowspan="3" class="boxborder text">&nbsp;</td>
      <td rowspan="3" class="text">&nbsp;</td>
      <td ><div align="right">Valor Venta:</div></td>
      <td bgcolor="<?php echo UseColor() ?>" >
        <input name="sub[<?php echo $j;  ?>]" type="hidden" id="sub[<?php echo $j;  ?>]" value="<?php  
		
		  $ggx=0;
		  FOR ($i = 0;  $i <= '50'; $i++) //decia 30
		  {
		  if ($_SESSION['action'][$i]=='true')	  $ggx=$ggx+$sub_total[$i];
		  
		  }
		echo $ggx;  
		    ?>">
        <?php        
        echo  $ggx;
?>
      </td>
    </tr>
    <tr bgcolor="<?php echo UseColor() ?>">
      <td><div align="right">I.G.V. 
        <input name="taxigv[<?php echo 1?>]" type="checkbox" id="taxigv[1]"    onChange="ajaxFunction('taxigv[1]');" value="true" <?php if  (  $_SESSION['taxigv'][1] =='true') echo 'checked'; ?>>
      </div></td>
      <td bgcolor="<?php echo UseColor() ?>" >
        <?php 
      if (  $_SESSION['taxigv'][1]=='true')	
	  {  echo $taxes=round($ggx*0.19,2);}
	  else
	  {$taxes=0;}?>
        <input name="taxes" type="hidden" id="taxes" value="<?php  echo $taxes;  ?>">
      </td> </tr>
    <tr bgcolor="<?php echo UseColor() ?>">
      <td ><div align="right">
        <input name="Clear"   style="margin:4px " type="submit"  id="Clear" value="<?php echo $calcule; ?>">
     Total: </div></td>
      <td bgcolor="<?php echo UseColor() ?>" ><?php echo $ggx+$taxes;?>       
          <input name="sub[<?php echo $j;  ?>]" type="hidden" id="sub[<?php echo $j;  ?>]" value="<?php  echo $$ggx+$taxes;  ?>">
    </td> </tr> </table>
    <div align="left">
      <p>
        <input name="sub" type="hidden" id="sub" value="5">
        <span class="text"><span class="boxborder text">
        <input name="envio" type="hidden" id="envio" value="1">
        <input name="Update" type="submit"  style="margin:10px; margin-left:600px " class="comment4" id="Update" value="Clear">
        </span></span>
      </p>
      <p>    
      <p></p>
      <p><span class="text"><span class="boxborder text">      </span></span>
        <span class="text"><span class="boxborder text">      </span></span>
          </p>
    </div>
</form>
<span class="text"><span class="boxborder text">
</span></span>
<p align="left">
  <?php $all_Recordset1 = 50; //query_db($query);
  $maxRows_Recordset1=5;
  $totalRows_Recordset1 = 50; //
$_SESSION['end']= $currentPage*$maxRows_Recordset1  + $totalRows_contenido;
if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = 50; //query_db($query);
  $maxRows_Recordset1=5;
  $totalRows_Recordset1 = 50; //   query_db_num($all_Recordset1);
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
  <?php echo $_SESSION['total']; ?></p>
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