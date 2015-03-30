<?php
if ($authz<>'TRUE') exit;
?>
<script src="includes/calendarDateInput.js">
</script>
<div align="center">
  <p><strong>Reports</strong></p>
  <table width="50%" border="0" cellpadding="0" cellspacing="0" bordercolor="#F5F5F0">
    <tr>
      <td><ul>
          <li>
            <div align="left"><strong class="text" align="center"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv"><?php echo $reservations ?></a></strong></div>
          </li>
          <li>
            <div align="left"><strong class="text" ><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv&t=archi"><?php echo $archived_bookings ?></a></strong>
            </div>
          <li>
            <form name="form1" method="post" action="<?php  echo 'quote.php?action=rtp_reserv&t=archi'; ?>">
              <div align="left"><?php echo $search_booking ?>
                <input name="reserv" type="text" id="reserv" size="10">
                <input name="search" type="hidden" id="search" value="3">
                <span class="text">
                <input name="submit" type='submit' value='Go'>
                </span>
              </div>
            </form>
          <li>
            <div align="left"><a href="quote.php?action=rtp_quote"><?php echo $quotations ?></a></div>
          </li>
          <li>
            <div align="left"><a href="tickets2.php"><?php echo $messages ?></a></div>
          </li>
      </ul>
      </td>
      <td valign="top"><ul>
        <li><strong class="text" ><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=tracking"><?php echo $action_tracking ?></a></strong></li>
      </ul>        <p>&nbsp;</p></td>
      <td valign="top"><ul>
        <li><img src="images/stats.gif" width="25" height="14">Estad&iacute;sticas</li>
        <li><a href="quote.php?action=stats&s=1"><?php echo $bookings_for ?></a></li>
        <li><a href="quote.php?action=stats&s=2"><?php echo $top_rev ?></a></li>
      </ul></td>
      <form method=POST action=<?php echo $_SERVER['PHP_SELF'] ?>?action=ticket_by_date>
        <span class="text">
        <input type='hidden' name='report_name2' value='tickets_by_assignment'>
        <input type='hidden' name='do2' value='report'>
        <a name="1"></a> </span>
      </form>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
