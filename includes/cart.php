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
FOR ($i = COUNT($_POST['passengern']); $i >= '1'; $i--)					
 {
       $sub_total[$i]=''; //0 passengern
	   $pasajeros= urldecode( stripslashes( $_POST['passengern'][$i]));
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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=us" Method="post" enctype="multipart/form-data" name="creat"  id="creat">
    <div align="right"><span class="text"><span class="boxborder text">    </span></span>        <span class="text"><span class="boxborder text">        </span></span>
    </div>
    <table width="<?php echo $maintablewidth ?>" cellspacing="0" cellpadding="0" class="boxborder" align="<?php echo $maintablealign ?>">
  <tr style="padding-bottom:2px">
    <td colspan="3" bgcolor="#AACCEE" class="text boxborder"  style="padding-left:5px"><strong> </strong></td>
    <td colspan="8" bgcolor="#AACCEE" class="text boxborder"  style="padding-left:5px"><div align="right"></div></td>
    <td width="70" bgcolor="#AACCEE" class="boxborder text">&nbsp;</td>
  </tr>
  <tr bgcolor="#EEEEEE">
    <td width="17" bgcolor="#EEEEEE" class="boxborder text">N&ordm;</td>
    <td width="116" ><b></b></td>
    <td width="120" ><b><b><?php echo $date_reserv;?></b></b></td>
    <td width="51" ><b><b><span ><strong><?php echo $service; ?></strong></span></b></b></td>
    <td width="89" ><span ><b><b><span ><strong><?php echo $descript_reserv;?></strong></span></b></b></span></td>
    <td width="59" ><span ><b><b><span ><strong><?php echo  $type_reserv;?></strong></span></b></b></span></td>
    <td width="58"><b><?php echo$lang_reserv ?></b></td>
    <td width="59" ><b><?php echo $price_ ?>  </b></td>
    <td width="75" ><b><?php echo $paxes ?></b></td>
    <td width="29" >&nbsp;</td>
    <td width="239"><div align="center"><strong><?php echo $comment ?></strong></div></td>
    <td ><strong>Sub Total</strong></td>
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
			$services_counter=0;
			
			WHILE ($row = query_db_assoc($result))
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
if  (  $_SESSION['action'][$j] =='true') {

?>

    <tr bgcolor="<?php echo UseColor() ?>">
      <td class="boxborder text"><?php 
	  echo $j; 
	  ?></td>               
      <td  style="padding-right:3px" class="boxborder"><span class="boxborder text">
        <?php  echo  $_SESSION['dat'][$j];  ?>       
              <input name="username" type="hidden" id="username" value="<?php echo  $_SESSION['dat'][$j]; ?>">
      </span> </td>
      <td  style="padding-right:3px" class="boxborder"><span class="boxborder text">
      <?php echo $hor=$_SESSION['hour'][$j].'h '.$min=$_SESSION['minutes'][$j].'m';
		 ?>
      <input name="dat" type="hidden" id="dat" value="<?php echo $hor=$_SESSION['hour'][$j].'h '.$min=$_SESSION['minutes'][$j].'m'; ?>">
      </span></td>
      <td class="comment3"   > 
        <?php echo $_SESSION['serv'][$j] ?>      
        <span class="boxborder text">
        <input name="serv_h[<?php echo $j; ?>]" type="hidden" id="se[<?php echo $j; ?>]" value="<?php  echo $_SESSION['serv'][$j]; ?>">
      </span> </td>
 <?php     
	  	  $tgt=$_SESSION['serv'][$j];
		  $pasajeros=$_SESSION['passengern'][$j];
		  $ti=$_SESSION['tipe'][$j]; 
	$query578 = "	SELECT  tarifasdetalle.Pre, servicios.SerDsc FROM tarifasdetalle,servicios where
	  servicios.SerCdg ='$tgt' and tarifasdetalle.SerCdg='$tgt' and  ( $pasajeros BETWEEN PaxIni and PaxFin) and serv_type='$ti'";	 
	  
	$result578 = query_db($query578);	
	$row3x8=query_db_assoc( $result578);	
	$sale= $row3x8['SerDsc'];
	$sub_total[$j]=$row3x8['Pre'];
	$precio_indi=$row3x8['Pre'];
	
	?>	  <td     class="boxborder">  <span class="comment3"><?php echo $_SESSION['descri'][$j]?></span><span class="boxborder text">
   <input name="descri[<?php echo $j; ?>]" type="hidden" id="descri[<?php echo $j ?>]" value="<?php $_SESSION['descri'][$j]; ?>">
 </span></td>
      <td class="text"><?php
	  
	    $ti=$_SESSION['tipe'][$j]; 
		$sdd=" Select * from servicios_variations where kind='$ti'";	
	    $resultsdd= query_db($sdd);
	    $fila=query_db_assoc($resultsdd);
		$hh=$fila['kind'];
		echo $fila['descript'];		
		
	   ?></td>
      <td class="text"><?php
	    $ti=$_SESSION['lang'][$j];	//echo $ti;  
		
		 $sql_lang="select * from languajes where lang='$ti' "; 
         $in = query_db($sql_lang);
        $imm= query_db_assoc($in);
 $GUIADO=$imm['lang_descript'];
 do
 {
 if (!(strcmp($imm['lang'], $ti ) ) ) {echo  $imm['lang_descript'];} 
 }
 while ($imm= query_db_assoc($in))
		 ?>
      </td>
      <td class="boxborder text"><?php 
	  


	  echo $precio_indi;
	   ?>
          <input name="bp[<?php echo $j; ?>]" type="hidden" id="bp[<?php echo $j; ?>]" value="<?php echo $precio_indi ?>"></td>
      <td ><?php echo $_SESSION['passengern'][$j];?></td>
      <td >        <span class="boxborder text">        </span></td>
      <td ><span class="boxborder text">
        <?php echo $_SESSION['com'][$j]; ?>      </span></td>
      <td bgcolor="<?php echo UseColor() ?>" class="text">
        <div align="right"><?php 
       //if $_
	   //no debo confiar en las sesiones debo recalcular!!!
       // echo $sub_total[$j]=$precio_indi*$_SESSION['passengern'][$j]; //$_SESSION['subtotal'][$j];
	   $hn=$precio_indi*$_SESSION['passengern'][$j];
       echo $sub_total[$j]= round($hn,2);
		//echo number_format($hn ,2); //$_SESSION['subtotal'][$j];
		$services_counter++;
?><input name="sub_total[<?php echo $j;  ?>]" type="hidden" id="sub_total[<?php echo $j;  ?>]" value="<?php 
   echo $sub_total[$j];  
   ?>">
        </div></td>
    </tr> <?php 
	}
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
      <td><div align="right">Valor Venta:</div></td>
      <td bgcolor="<?php echo UseColor() ?>" >
        <div align="right">
          <input name="sub" type="hidden" id="sub" value="<?php    $ggx=0; FOR ($i = 0;  $i <= '30'; $i++)  
		
		{  if (   $_SESSION['action'][$i]==true)	  $ggx=$ggx+$sub_total[$i];
		  
		  }
		echo $ggx;  
        //echo   number_format($ggx,2);
		    ?>">
        <?php 
       echo $ggx;  
        //echo   number_format(  $ggx,2);

?>
        </div></td>
    </tr>
    <tr bgcolor="<?php echo UseColor() ?>">
      <td class="text"><div align="right">I.G.V.</div></td>
      <td bgcolor="<?php echo UseColor() ?>" class="text">
        <div align="right"><?php 
		 if (  $_SESSION['taxigv'][1]=='true')	
	  {  
	  echo $taxes= round($ggx*0.19,2);
	  //echo number_format($ggx*0.19,2);
	  }
	  else
	  {$taxes=0;}
	  ?>
          <input name="taxes" type="hidden" id="taxes" value="<?php  echo $taxes;  ?>">
        </div></td>
    </tr>
    <tr bgcolor="<?php echo UseColor() ?>">
      <td class="text"><div align="right"><span class="boxborder text">
        <input name="services_counter" type="hidden" id="services_counter" value="<?php echo $services_counter; ?>">
      </span>Total: </div></td>
      <td bgcolor="<?php echo UseColor() ?>" class="text"><div align="right"><?php 
	  echo $ggx+$taxes;
	  //echo number_format($ggx+$taxes,2);	  
?>   <input name="total_price" type="hidden" id="total_price" value="<?php  echo $ggx+$taxes;  ?>">
         </div>
        <div align="right"><span class="boxborder text">
          <input name="sub[<?php echo $j;  ?>]" type="hidden" id="sub[<?php echo $j;  ?>]" value="<?php  echo $$ggx+$taxes;  ?>">
      </span></div></td>
    </tr>
  
 
</table>

    <div align="left">
      <p align="center"><?php if( $_SESSION['activity']=='cotiza'  ) { ?>
    <input name="sub" type="hidden" id="sub" value="5"><label>
    </label>
      </p>
      <table width="350" border="0"   align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="60" class="comment3">&nbsp;</td>
          <td width="80" class="comment3">Select Country: </td>
          <td width="144"><select name="country" id="country" >
              <option value="0">Select...</option>
			  <?php 
			  $sql_countriesd="select * from countries"; 
                 $paisesdd = query_db( $sql_countriesd);
			$filacd=query_db_assoc($paisesdd);
			  do {
			  ?>
              <option value="<?php echo  $filacd['id'];  ?>" ><?php echo $filacd['Name']; ?></option>
			  <?php }
			  while ($filacd=query_db_assoc($paisesdd) )?>
          </select></td>
        </tr>
        <tr>
          <td class="comment3">&nbsp;</td>
          <td class="comment3"><?php echo $paxes ?>:</td>
          <td><input name="npaxes" type="text" id="npaxes" size="6"></td>
        </tr>
        <tr>
          <td class="comment3">&nbsp;</td>
          <td class="comment3"><?php echo $name_group ?>:</td>
          <td><input name="ngroup" type="text" id="ngroup" size="8"></td>
        </tr>
        <tr>
          <td class="comment3">&nbsp;</td>
          <td class="comment3">email quote
            <label>:</label></td>
          <td><input name="email" type="text" id="email"  value="<?php  $sq="select email from users where id='$user_id_logged'";
		   	$re = query_db($sq);$rere=query_db_row($re); echo $rere[0];   ?>"></td>
        </tr>
        <tr>
          <td class="comment3">&nbsp;</td>
          <td class="comment3">Att:</td>
          <td><input name="attention" type="text" id="attention" ></td>
        </tr>
      </table>
      <p align="center">&nbsp;      </p>
      <p align="center"><label></label> 
        <input name="cotiza2" type="hidden" id="cotiza2" value="1">
        <?php } ?>
<?php if( $_SESSION['activity']=='reserv' ) { ?>
  <label for="che">  </label>
      </p>
      <table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="62" class="comment3">&nbsp;</td>
          <td width="146" class="comment3">Select Country: </td>
          <td width="76"><select name="country" id="country" >
            <option value="0">Select...</option>
            <?php 
			  $sql_countriesd="select * from countries"; 
                 $paisesdd = query_db( $sql_countriesd);
			$filacd=query_db_assoc($paisesdd);
			  do {
			  ?>
            <option value="<?php echo  $filacd['id'];  ?>" ><?php echo $filacd['Name']; ?></option>
            <?php }
			  while ($filacd=query_db_assoc($paisesdd) )?>
          </select></td>
        </tr>
        <tr>
          <td class="comment3">&nbsp;</td>
          <td class="comment3"><?php echo $paxes ?>:</td>
          <td><input name="npaxes" type="text" id="npaxes" size="6"></td>
        </tr>
        <tr>
          <td class="comment3">&nbsp;</td>
          <td class="comment3"><?php echo $name_group ?>:</td>
          <td><input name="ngroup" type="text" id="ngroup" size="8"></td>
        </tr>
        <tr>
          <td class="comment3">&nbsp;</td>
          <td class="comment3"><?php echo  $limit_prep ?></td>
          <td><?php ?>&nbsp;
          <input name="dat_lim" type="hidden" id="dat_lim" value="2">
          </td>
        </tr>
      </table>
      <p align="center">
    <label for="che">
    <input name="reserva2" type="hidden" id="reserva2" value="1">
    </label>
    <?php echo $confirm_;?><?php } ?>
      </p>
      <p align="center">
        <input name="toke" type="hidden" id="toke" value="<?php echo $wb; ?>">
</p>
      <p align="center">
        <input type="submit" name="Submit" value="Send"> 
        <span class="text"><span class="boxborder text">      </span></span>
        <span class="text"><span class="boxborder text">      </span></span>
      </p>
  </div>
</form>
<span class="text"><span class="boxborder text">
</span></span>
<p align="left">&nbsp;</p>
