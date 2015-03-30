<?php
include_once("definition.php"); /* auto-ajax definition */
global $ajax; /* Important, always do this, because this page will be include */
$ajax->destiny("central"); /* the ajax destination of this page */
$ajax->start();//the page start here

?><p>&nbsp;
</p>
<table border=0 cellspacing=0 cellpadding=0 style="cursor:pointer; cursor:hand; display:" onclick="if(document.getElementById('add_line_box').style.display == 'none') { document.getElementById('add_line_box').style.display = ''; document.getElementById('add_line').style.borderColor='#1066A8'; document.getElementById('add_line').style.background='#DFECF9'; document.getElementById('add_amount').focus(); } else if(lock_add == 0) { document.getElementById('add_line_box').style.display = 'none'; document.getElementById('add_line').style.borderColor='white'; document.getElementById('add_line').style.background='white'; }">
  <tr>
    <td><img src="images/upgrade_table_start.gif" border=0></td>
    <td background="upgrade_table_bg.gif" style="width:40px;"><div style="position:relative; height:28px; width:30px;"><img src="images/add_transaction.png" height="33" width="35" style="position:absolute; bottom:1px; cursor:hand; cursor:pointer;" id="add_line"></div>
      <select name="state_reserv" size="1"        id="state_reserv">
        <option value="1" <?php if (!(strcmp(1, $row_reserv['state_reserv']))) {echo "SELECTED";} ?>><?php echo $confirmed ?></option>
        <option value="" <?php if (!(strcmp('', $row_reserv['state_reserv']))) {echo "SELECTED";} ?>><?php echo $pending ?></option>
        <option value="2" <?php if (!(strcmp('2', $row_reserv['state_reserv']))) {echo "SELECTED";} ?>><?php echo $canceled ?></option>
      </select></td>
    <td background="upgrade_table_bg.gif" style="font-size:14px; color:#1066A8; font-weight:bold;" nowrap>ADD TRANSACTION
    <?php echo $amount ?><input name="textfield" type="text" size="5">
    <?php echo $comments ?>
    <input name="textfield" type="text" size="15"></td>
    <td><img src="images/upgrade_table_end.gif" border=0></td>
  </tr>
</table>
<?php
$ajax->end(); //and ends here
?>