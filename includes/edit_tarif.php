<?php
$agency=$_GET['agency']; $serv_type =$_GET['tipe'];
 $cdg=$_GET['service'];
 $query_tarif = "SELECT * FROM tarifasdetalle WHERE SerCdg='$cdg' and AgeCdg='$agency' and serv_type='$serv_type' ORDER BY id ASC ";
$tarif = query_db($query_tarif);
//$query_lang="select languajes.lang_descript,languajes.lang,type_lang.lang from serv_type_lang,languajes where SerCdg='$cdg' and tipe='$serv_type' and languajes.lang=serv_type_lang.lang";
 $query_lang="select type_lang.lang,languajes.lang_descript from type_lang,languajes where tipe='$serv_type' and languajes.lang=type_lang.lang";
 $result578f = query_db($query_lang);//dont rename vars!
$row3x8=query_db_assoc( $result578f);//dont rename

$totalRows_tarif = query_db_num($tarif);
for ($vv=0;$vv<=$totalRows_tarif;$vv++)
{
$row_tarif[$vv] = query_db_assoc($tarif);
}
?>
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
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=edit_tarif3">
  <table>
    <tr valign="baseline">
      <td width="21" align="right" nowrap><?php echo $text_listsub ?>&nbsp;</td>
      <td width="60"><select name="AgeCdg" id="AgeCdg">
          <option value=""selected >&nbsp;</option>
          <?php
			 $query_agency = "SELECT * FROM agencias ";
$agency = query_db($query_agency) ;
$row3x = query_db_assoc($agency);  
$totalRows_agency = query_db_num($agency);
			 do { ?>
          <option value="<?php  echo $row3x['AgeCdg']; ?>" <?php if (!(strcmp($row3x['AgeCdg'], $row_tarif[0]['AgeCdg'] ) ) ) {echo "SELECTED";} ?>><?php echo $row3x['AgeDsc']; ?></option>
          <?php } while ($row3x=query_db_assoc(	$agency)); ?>
      </select></td>
      <td width="60">&nbsp;</td>
      <td width="34" rowspan="3"><?php 
	  $cde=true;//used at langu.php
	  include('includes/langu.php');
	   ?>	  
	   </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $date_ini ?></td>
      <td><input type="text"  class="date-pick" name="FecIni"   id="FecIni" value="<?php echo  date($dformat,  $row_tarif[0]['FecIni']); ?>" size="10"></td>
      <td>&nbsp;</td>
    </tr><tr valign="baseline">
      <td nowrap align="right"><?php echo $date_fin ?>&nbsp;</td>
      <td><input type="text"  class="date-pick" name="FecFin"   id="FecFin"  value="<?php echo date($dformat, $row_tarif[0]['FecFin']); ?>" size="10"></td>
      <td>&nbsp;</td>
    </tr>
  </table>  
  <input name="service" type="hidden" id="service" value="<?php echo $_GET['service'];
 ?>">
  <input name="tipe" type="hidden" id="tipe" value="<?php echo   $_GET['tipe'];
?>">
  <input type="hidden" name="hiddenField">
  <table width="355"  border="0" cellpadding="1" cellspacing="2">
    <tr>
      <td width="306">N. Paxes (Min-Max) </td>
      <?php  
	  $_POST['ranges']=$totalRows_tarif;
	  
	  FOR( $dd=0; $dd<$_POST['ranges']; $dd++) { ?>
      <td width="39" bgcolor="<?php echo UseColor2($dd) ?>"><table  border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td><input name="paxini[<?php echo $dd; ?>]" type="text" id="paxini[<?php echo $dd; ?>]" value="<?php echo $row_tarif[$dd]['PaxIni'] ?>" size="2"></td>
            <td><input name="paxfin[<?php echo $dd; ?>]" type="text" id="paxini[<?php echo $dd; ?>]" value="<?php echo $row_tarif[$dd]['PaxFin'] ?>" size="2"></td>
          </tr>
        </table>
          <?php } ?>
</td>
    </tr>
    <tr>
      <td>$
      <input name="agen_old" type="hidden" id="agen_old" value="<?php  echo trim ($_GET['agency']); ?>"></td>
      <?php  FOR( $dddd=0; $dddd<$_POST['ranges']; $dddd++) { ?>
      <td valign="top" bgcolor="<?php echo UseColor2($dddd) ?>"><input name="price[<?php echo $dddd; ?>]" type="text" id="price[<?php echo $dddd; ?>]" value="<?php echo $row_tarif[$dddd]['Pre'] ?>" size="5">
      <input name="id[<?php echo $dddd ?>];" type="hidden" id="id[<?php echo $dddd ?>];" value="<?php echo $row_tarif[$dddd]['id'] ?>"></td>
      <?php } ?>
    </tr>
  </table>
  <input name="counter" type="hidden" id="counter" value="<?php echo $_POST['ranges'] ?>">
  <input name="count" type="hidden" id="count" value="<?php  echo $_POST['ranges']; ?>">
  <span class="boxborder"><span class="boxborder text"><span class="text">
  <input type="submit" value="Actualizar registro">
</span></span></span>
</form>
