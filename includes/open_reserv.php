<?php
if ($authz<>'TRUE') exit;
$read_only2='disabled';

$docu=$_GET['id'];
if ($quot==true)
{ $table='quotations';$table2='quotation_master';
$what=$service_quo;
$read_only='disabled';
} 
else {$table='myreservas';$table2='reserv_master';
$what=$service_reserv;
}

   // $query_reserv = "SELECT * FROM ($table left join $table2 on $table.DocNro= $table2.DocNro)
    //left join agencias on $table.AgeCdg=agencias.AgeCdg where  $table.DocNro ='$docu'";
	
	 $query_reserv = "SELECT * FROM $table,$table2,agencias,users where
	  $table2.DocNro= $table.DocNro  
	  and agencias.AgeCdg=$table2.AgeCdg   
	  and $table.Paxs <>0
	  and  $table2.DocNro ='$docu' and $table2.user_id=users.id ";
	  
	   if (user_level2()==0) //single user	 
	 {	 
	 $query_reserv = "SELECT * FROM $table,$table2,agencias,users where
	  $table2.DocNro= $table.DocNro  
	  and agencias.AgeCdg=$table2.AgeCdg   
	  and $table.Paxs <>0
	  and  $table2.DocNro ='$docu' and $table2.user_id=users.id and $table2.AgeCdg='$your_agency'";	 
	 }
	

$reserv = query_db($query_reserv);
$row_reserv = query_db_assoc($reserv);
$total_to_pay= $row_reserv['total_price'];
$they_owe_you= $row_reserv['they_owe_you'];
if ( $they_owe_you==0 )
{$pagado=true;}
$taxes=$row_reserv['taxes'];
$Obs =$row_reserv['Observ'];
$totalRows_reserv = query_db_num($reserv);
$date_prepago=date($dformat,  $row_reserv['FecLimPrePag']);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
 //echo $updateSQL ="UPDATE myreservas SET Sts='State', where DocNro=".$_POST['DocN'];
   // $Result1 = query_db($updateSQL) or die(mysql_error());
}
?>
		<script type="text/javascript" src="includes/jquery.min.js"></script>        
     	<script type="text/javascript" src="includes/date.js"></script>
		<script type="text/javascript" src="includes/jquery.datePicker.js"></script>        
  		<link rel="stylesheet" type="text/css" media="screen" href="includes/datePicker.css">		
		<link rel="stylesheet" type="text/css" media="screen" href="includes/demo.css">        
		<script type="text/javascript">
    $(function() {
       jQuery('.delete').click(function() {
            var answer = confirm("Delete this item?")
            if (answer){
                return true;
            }
            else{
                return false;
            };
        });
    });
</script>
		<script type="text/javascript" charset="utf-8">
$(function()
            {
				jQuery('.date-pick').datePicker();
            });
</script>
<script type="text/javascript" src="includes/pay.js"></script>
<link href="styles.css" rel="stylesheet" type="text/css">


        <form method="post" name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=update_det">
  <input name="FecChg" type="hidden" id="FecChg" value="<?php echo $row_reserv['FecChg']; ?>">  
    <table width="98%"  border="0" cellpadding="0" cellspacing="0" class="encuadro">
      <tr>
        <td width="30%" height="47">&nbsp;</td>
        <td width="36%"><p><strong><?php echo $what; ?> <?php echo $row_reserv['DocNro']; ?>
          <input name="DocN" type="hidden" value="<?php echo $row_reserv['DocNro']; $reserva=$row_reserv['DocNro'];   ?>" id="DocN">
        </strong></p>
        </td>
        <td width="15%"><p><span class="text"><strong><?php echo $date_reserv; ?></strong>:</span>          <span class="boxborder text"><?php echo date($dformat,  $row_reserv['timestamp']).' '.date('H:i:s', $row_reserv['timestamp']) ?>               
          <label> </label>
</span></p>
        </td>
        <td width="19%"><span class="boxborder text"><a href="quote.php?action=download&id=<?php echo $_GET['id']  ?><?php  if (isset($_GET['ac2'])) echo '&ac2=0';  ?>"><img src="images/doc.jpg" width="18" height="18" hspace="5" vspace="5" border="0"></a>
		</span></td>
      </tr>
  </table>
 
  <strong>DATOS:</strong>
<table width="98%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="encuadro"   style="padding:5px ">
    <tr valign="top">
      <td><p>AGENCIA/CLIENTE: 
          
          <?php echo $row_reserv['AgeDsc']; ?>
          <input name="agency" type="hidden" id="agency" value="<?php echo $row_reserv['AgeDsc']; ?>">
          <br>
        CONTACTO: <?php echo $row_reserv['AgeCto']; ?>
        <input name="contact" type="hidden" id="contact" value="<?php echo $row_reserv['AgeCto']; ?>" > 
        <br>
        TELEFONO: <?php echo $row_reserv['AgeFon']; ?>
        <input name="telef" type="hidden" id="telef">
        <br>
        TELEFONO 24 horas:<?php echo $row_reserv['AgeFon2']; ?>
        <input name="tel24" type="hidden" id="tel24">
        <br>
        FECHA DE SOLICITUD: 
        <span class="boxborder"><?php echo date($dformat,  $row_reserv['timestamp']).' '.date('H:i:s', $row_reserv['timestamp']) ?></span>      
        <input name="date_request" type="hidden" id="date_request">
        <br>      
        <?php  if (!isset($quot)) { ?>
	    FECHA DE CONFIRMACION:<span class="boxborder">
	    <?php 
	  if ($row_reserv['date_confirm']<>0)
	  {
	  echo date($dformat,  $row_reserv['date_confirm']).' '.date('H:i:s', $row_reserv['date_confirm']);
	  }
	   ?>
	    </span> <span class="comment3">
	    <input name="date_confirm" type="hidden" id="date_confirm">
	    (Si antes confirmamos) </span><br>    
	    ESTADO DE RESERVA:<?php if (user_level2()>0) { ?> 
        <select name="state_reserv" size="1"        id="state_reserv">
		
            <option value="1" <?php if (!(strcmp(1, $row_reserv['state_reserv']))) {echo "SELECTED";} ?>><?php echo $confirmed ?></option>
            <option value="0" <?php if (!(strcmp('0', $row_reserv['state_reserv']))) {echo "SELECTED";} ?>><?php echo $pending ?></option>
	        <option value="2" <?php if (!(strcmp('2', $row_reserv['state_reserv']))) {echo "SELECTED";} ?>><?php echo $canceled ?></option>
			<option value="5" <?php if (!(strcmp('5', $row_reserv['state_reserv']))) {echo "SELECTED";} ?>><?php echo $archived ?></option>
        </select>
        <input name="state_reserv1" type="hidden" id="state_reserv1" value="<?php  echo $row_reserv['state_reserv'] ?>">
        <?php }
		else 
		{
		 if (!(strcmp(1, $row_reserv['state_reserv']))) echo $confirmed;
		 if (!(strcmp('', $row_reserv['state_reserv']))) echo $pending;
		 if (!(strcmp('2', $row_reserv['state_reserv'])))echo $canceled;
		}
		?>
</p>
      <p>OPERARIO:<?php echo  $row_reserv['username']?> 
        <input name="operator" type="hidden" id="operator" value="<?php echo $row_reserv['username']  ?>">
      </p></td>
	  <?php  } ?>
      <td class="texttabla"><p>        
        <label>NOMBRE DE PAX O GRUPO:</label> 
        <input name="Paxname" type="text" id="Paxname"  <?php echo $read_only; ?> value="<?php echo $row_reserv['paxname']; ?>" size="20">
        <input name="Paxname1" type="hidden" id="Paxname1" value="<?php echo $row_reserv['paxname']; ?>"> 
        </p>
        <p>
            <label>NUMERO DE PAX:</label> 
          <input type="text" name="Paxs"  <?php echo $read_only; ?> value="<?php echo $row_reserv['paxnumber']; ?>" size="10">
          <input name="Paxs1" type="hidden" id="Paxs1" value="<?php echo $row_reserv['paxnumber']; ?>">
          <div    id='ajaxDiv3'  style="cursor:pointer" onClick="show_paxes()" >Paxes</div>
</p>
        <p>            
          <label>PAIS:</label>         
		  <select name="Country" <?php echo $read_only; ?>   <?php  if (user_level2()==0) echo 'disabled';  ?> id="Country" >
              <option value="0">Select...</option>
			  <?php 
			  $sql_countries="select * from countries"; 
                 $paises = query_db( $sql_countries);
			$filacc=query_db_assoc($paises);
			$the_country=$row_reserv['country'];
			
			  do {
			  ?>
              <option value="<?php echo $filacc['id']  ?>" <?php 
			  if ( !(strcmp($filacc['id'],$the_country) ) ) 
			  { echo "SELECTED"; }
			  ?>
			  ><?php echo $filacc['Name']; ?></option>
			  <?php }
			  while ($filacc=query_db_assoc($paises) )?>
          </select>
		  <input name="Country1" type="hidden" id="Country1" value="<?php echo $row_reserv['country'];   ?>">
		  
        </p>
        <p>
          <label>Persona responsable:</label> 
          <input type="text" name="PerRes"  <?php echo $read_only; ?> value="<?php echo $row_reserv['PerRes']; ?>" size="20">
          <input name="PerRes1" type="hidden" id="PerRes1" value="<?php echo $row_reserv['PerRes']; ?>">
        </p>
        <p>
          <label></label>
           <span class="text">
<label>
<?php  if (!isset($quot)) { ?>
</label>
          </span>
           <label>Fctura:</label>
          <span class="text">           <input type="text" name="FacNro" value="<?php echo $row_reserv['FacNro']; ?>" size="8">
          </span> 
           <label>Tipo de Cambio:</label>
           <span class="text">
           <input type="text" name="ImpTipCam" value="<?php echo $row_reserv['ImpTipCam']; ?>" size="5">
           </span>
          <?php } ?>
          <br>
        </p>
      </td>
    </tr>
  </table>
  <strong>SERVICIOS:</strong>
  <table width="98%"  border="0" cellpadding="0" cellspacing="0" class="encuadro">
    <tr class="text">
      <td >N</td>
      <td >Fecha:</td>
      <td >Servicio      </td>
      <td >Descript</td>
      <td >Tipo</td>
      <td >Idioma        </td>
      <td ><div align="center">Paxes</div></td>
      <td >Precio general</td>
      <td >Comentarios        </td>
      <td >Subtotal</td>
      <td >&nbsp;</td>
    </tr><?php do { ?>
    <tr class="text">
      <td width="2%" >&nbsp;      </td>
      <td width="9%" ><?php echo date($dformat, $row_reserv['FecAdd']).' '.date('H:i', $row_reserv['FecAdd']) ?></td>
      <td width="11%" ><?php echo $row_reserv['SerCdg']; ?></td>
      <td width="17%" ><?php 
	  $code= $row_reserv['SerCdg'];
$sqlt="SELECT SerDsc from servicios where SerCdg='$code'";
$resultt = query_db( $sqlt );
	$fila84=query_db_assoc($resultt);
	echo $fila84['SerDsc'];
 ?>&nbsp;</td>
      <td width="6%" >        <span class="boxborder">
        <select name="tipe[<?php echo $j; ?>]"    <?php echo $read_only2; ?> onChange="ajaxFunction('tipe[<?php echo $j; ?>]');" id="tipe[<?php 
	   $ti=$row_reserv['tipe'];
	  $sddXX=" Select * from servicios_variations";	
	 $resultsXX= query_db($sddXX);
	 $filaXX=query_db_assoc($resultsXX);
		  do { ?>
        <option value="<?php  echo $filaXX['kind']; ?>"<?php  if (!(strcmp($filaXX['kind'], $ti ) ) ) {echo "SELECTED"; } ?> ><?php echo $filaXX['descript'] ?></option>
		<?php } while ($filaXX=query_db_assoc($resultsXX)); ?>        
      </select>
		
      </span></td>
      <td width="6%" >        <span class="boxborder">
	  <select name="lang[<?php echo $j; ?>]" <?php echo $read_only2; ?>   onChange="ajaxFunction('lang[<?php echo $j; ?>]');"   style="width:80px";  id= "lang[<?php echo $j; ?>]" >
          <?php  echo $j;  
	 
	 
	   $ti=$row_reserv['lang'];
	
	  $sdd=" Select * from languajes";
	  $resultsdd= query_db($sdd);
	 $fila=query_db_assoc($resultsdd);
 	 
	  
	   ?>
          <?php 	  
         do { ?>
          <option value="<?php  echo $fila['lang']; ?>" <?php if (!(strcmp($fila['lang'], $ti )) ) {echo "SELECTED";} ?>><?php echo $fila['lang_descript']; ?></option>
          <?php } while ($fila=query_db_assoc($resultsdd)); ?>
        </select>
</span></td>
      <td width="9%" ><div align="center"><?php echo  $row_reserv['Paxs'];
 ?></div></td>
      <td width="10%" ><?php echo  $row_reserv['price1'];
 ?></td>
      <td width="22%" ><input type="text" name="comment"  <?php echo $read_only2; ?> value="<?php echo $row_reserv['comment']; ?>" size="40"></td>
      <td width="6%" ><input type="text" name="comment"  <?php echo $read_only2; ?>  value="<?php echo $row_reserv['pricet']; ?>" size="5"></td>
      <td width="2%">&nbsp;</td>
    </tr>
	<?php } while($row_reserv = query_db_assoc($reserv)) ?>
  </table>  
  <table width="98%"  border="0" cellpadding="0" cellspacing="0" >
    <tr valign="top">
      <td width="75%" rowspan="4" ><p>
        FECHA LIMITE DE PREPAGO:
            <input name="FecLimPrePag2" type="hidden" id="FecLimPrePag2" value="<?php echo $date_prepago;  ?>">
          <input  name="FecLimPrePag" type="text"  class="date-pick" value="<?php echo $date_prepago;  ?>" size="10">
</p>
<div   id='ajaxDiv2'></div>
        <p align="right" ><span class="boxborder text">
          <?php if ($they_owe_you >0 )
  { ?>
          <a href="quote.php?action=paypal&id=<?php echo $reserva ?>"><img src="images/paypal.jpg" width="35" height="14" border="0"></a>
          <?php }  ?>
        </span></p></td>
      <td width="17%" colspan="2" ><p align="right"><label>Impuestos:</label>
      </p>        </td>
      <td width="6%" ><p>
        <?php echo $taxes;
 ?> </p>
      </td>
      <td width="2%" rowspan="4" >&nbsp;</td>
    </tr>
    <tr valign="top">
      <td height="30" rowspan="2" ><div align="right">
	   <div     style="cursor:pointer" onClick="show_pays()" ><?php echo 	$payments; ?> </div>  
      </div></td>
      <td ><div align="right">
        <label>TOTAL A PAGAR <span class="text">:</span></label>
      </div></td>
      <td width="6%" ><?php echo  $total_to_pay;
 ?>
</td>
    </tr>
    <tr valign="top">
      <td ><div align="right"><strong>DEUDA:</strong></div></td>
      <td width="6%" ><div id='ajaxDiv'><?php echo  $they_owe_you; ?></div></td>
    </tr>
    <tr valign="top">
      <td height="30" colspan="2" ><p align="right">
        <input name="add_id" type="hidden" id="add_id" value="<?php echo $_GET['id']?>">
        <?php  if  (( $pagado<>true)and  ($reserv==true) ) { ?>
   		  </p>
        <table width="259"
		
		  cellspacing=0
		style="border: 2px solid rgb(16, 102, 168); padding: 1px; background: rgb(223, 236, 249) none repeat scroll 0% 0%;  -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; " >
          <tr>
            <td width="116" height="32"><?php echo $add_trans ?></td>
            <td width="135"><?php echo $amount ?>
              <input name="add_amount" type="text"  id="add_amount"   size="4" ></td>
          </tr>
          <tr>
            <td height="34"><select    name="add_type" id="add_type"  style="font-size: 14px;">
              <option value=0>Paypal</option>
              <option value=1>Credit Cards</option>
              <option value=2>Deposit</option>
              <option value=3>Demo Payment</option>
              <option value=4>Other...</option>
            </select>		      
            <div    id="ff"  style="cursor:pointer" onClick="update_debt()" ><img src="images/new_record.jpg" width="16" height="16" border="0" id="add_line" ><?php echo 	$enter; ?> </div>   </td><td height="34"><?php echo $comment ?>
              <input name="xadd_comments" type="text"  id="xadd_comments" style="padding-left: 4px; color: gray;  " size="10" ></td>
          </tr>
        </table>
        <p align="right">
		
          <?php 
			}
			  ?>
        </p></td>
      <td >&nbsp;</td>
    </tr>
  </table>
  <strong>OBSERVACIONES: </strong>
  <table width="98%"  border="0" cellpadding="0" cellspacing="0" class="encuadro">
    <tr>
      <td ><textarea name="observations" cols="100" rows="2" id="observations"><?php echo $Obs; ?></textarea>
      <input name="acti" type="hidden" id="acti" value="<?php 
	  if ($quot==true) {echo 'quote'; }else {echo 'reserv';} ?>"></td>
    </tr>
  </table><div    id='ajaxDiv3'  style="cursor:pointer" onClick="show_his()" ><?php echo 	$text_history; ?> <img src="images/plus.gif" width="14" height="14" border="0"></div>  

    <div align="center">
      <label><?php echo 	$notificate ?></label><input name="notific" type="checkbox" id="notific" value="1" checked>
	  <input type="hidden" name="MM_update" value="form1">
      <input type="hidden" name="DocNro" value="<?php echo $row_reserv['DocNro']; ?>">
      <?php if (user_level2()<>0) { ?>
      <input type="submit" value="Save">
      <?php } ?>
      </div>
    </div>
        </form>
<p>&nbsp;</p>
<script src="includes/calendarDateInput.js">
</script>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: xx-small;
}
-->
</style>
<div align="center">
  <p>&nbsp;</p>
</div>
<p>&nbsp;</p>

