<?php
if ($authz<>'TRUE') exit;
?>
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
  <p><strong>Registro</strong></p>
</div>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC">
  <tr>
    <td width="336"><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#F5F5F0">
        <tr>
          <td><p  class="text" align="center"><strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv"><span class="titulo"><strong><?php echo $reservations?></strong></span></a></strong></p>
            <p align="center"  class="text"><strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_quote"><?php echo  $quotations ?></a></strong></p>
          </td>
        </tr>
        </table></td>
    <td  valign="top" width="197"><p class="text">&nbsp;</p>
    </td>
    <td  class="text" valign="top" width="102"><p>&nbsp;</p>
    </td>
    <td  class="text" valign="top" width="103"><p>&nbsp;</p>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td  valign="top"><p>&nbsp;</p>
    </td>
    <td colspan="2"  valign="top">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
