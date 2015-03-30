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
  <p><strong>Information
  </strong></p>
</div>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC">
  <tr>
    <td width="336"><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#F5F5F0">
        <tr>
          <td><p  class="text" align="center"><strong>Tickets<span class="ListView"><img src="images/unread.gif" alt="Image for a new, Unread ticket" width="14" height="11" hspace="0" border="0"> <img src="images/read.gif" alt="Image for a new, Unread ticket" width="14" height="11" hspace="3" border="0"></span></strong></p>
            <p align="center"  class="text"><strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv">Reservas</a></strong></p>
            <p align="center"  class="text"><strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_quote">Cotizaciones</a></strong></p>
            <ul><li>
                <table border="0" cellpadding="0" cellspacing="0" >
                  <tr>
                    <td><form method=POST action=<?php echo $_SERVER['PHP_SELF'] ?>?action=ticket_by_date>
                        <table class='box'>
                          <tr>
                            <td  class="text" colspan="3">Select date of Tickets* </td>
                          </tr>
                          <tr>
                            <td width="40" class="text"> From: </td>
                                        <td width="35" class="text"> Until: </td>
                                        <td width="111"></td>
                          </tr>
                          <tr>
                            <td class="text"><script>DateInput('from_date', true, 'MM/DD/YYYY')</script>
                            </td>
                                        <td class="text"><script>DateInput('until_date', true, 'MM/DD/YYYY')</script>
                            </td>
                                        <td class="text"><input type='submit' value='Select'>
                            </td>
                          </tr>
                        </table>
                                <span class="text">
                                <input type='hidden' name='report_name' value='tickets_by_assignment'>
                                <input type='hidden' name='do' value='report'>
                                <a name="1"></a> </span>
                        </form></td>
                  <tr>
                  </table>
          </ul></td>
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
    <td  valign="top"><p><strong>Actions<span class="text"><strong><span class="ListView"><img src="./images/users.jpg" alt="Image for a new, Unread ticket" width="25" height="27" hspace="3" border="0"></span></strong></span></strong></p>
    <p class="text"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=tracking">Actions tracking </a></p></td>
    <td colspan="2"  valign="top">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
