<?php 
$colorvalue='#F4FAFF';
?><!-- jQuery -->
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
        <style type="text/css">
<!--
.Estilo1 {color: #FF0000}
-->
        </style>
        <p align="center">&nbsp;<?php echo $_SESSION['el_service'].' '.$_SESSION['serv_type']; ?></p>
        <p align="center">
          <?php  if (isset($_SESSION['wizard_service'])) {?>
          <img src="images/step3.png" width="161" height="50">
          <?php }?>
        </p>
        <link href="styles.css" rel="stylesheet" type="text/css">
<div align="center">
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=tarif2">
    <table width="20%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center"><span class="boxborder"><span class="boxborder text"><span class="text"> <span class="comment4"><strong>Fecha Inicial</strong></span>
                      <input name="FecIni"  type="text" class="date-pick"  id="FecIni"   value="<?php  echo $_SESSION['datini']; ?>" size="10" maxlength="10">
        </span></span></span></div></td>
        <td><div align="center"><span class="boxborder"><span class="boxborder text"><span class="text"> <span class="comment4"><strong>Fecha Final</strong></span>
                      <input name="FecFin"  type="text" class="date-pick"  id="FecFin"   value="<?php  echo $_SESSION['datfin']; ?>" size="10" maxlength="10">
        </span></span></span></div></td>
      </tr>
    </table>
    <table  border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td width="205">N. Paxes (Min-Max) </td>
        <?php  $gg=1;
		FOR( $dd=0; $dd<$_POST['ranges']; $dd++) { ?>
		<td    bgcolor="<?php echo UseColor2($dd) ?>" width="38">
		<table  style="margin-left:2px " border="0" cellspacing="0" cellpadding="0">
            <tr><td><input name="paxini[<?php echo $dd; ?>]" type="text" id="paxini[<?php echo $dd; ?>]" value="<?php echo $gg++; ?>" size="4"></td>
              <td><input name="paxfin[<?php echo $dd; ?>]" type="text" id="paxini[<?php echo $dd; ?>]" value="<?php echo $gg++; ?>" size="4"></td>
            </tr>
        </table>
		<?php } ?>		
		
		</td>
      </tr>
      <tr>
        <td>$<span class="Estilo1">
          <input name="Sercdg" type="hidden" id="Sercdg" value="<?php  echo $serv=$ing[0];  ?>">
        </span></td>
        <?php  FOR( $dddd=0; $dddd<$_POST['ranges']; $dddd++) { ?>
		<td  bgcolor="<?php echo UseColor2($dddd) ?>" valign="top"><input name="price[<?php echo $dddd; ?>]" type="text" id="price[<?php echo $dddd; ?>]" size="5"></td>
				<?php } ?>		
      </tr>
    </table>
    <input name="counter" type="hidden" id="counter" value="<?php echo $_POST['ranges'] ?>">
<input name="count" type="hidden" id="count" value="<?php  echo $_POST['ranges']; ?>">
      <span class="boxborder"><span class="boxborder text"><span class="text">
      <input type="submit" name="Submit" value="Submit">
      </span></span></span>
  </form>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>

