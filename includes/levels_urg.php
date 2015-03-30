<?php 
if ($authz<>'TRUE') exit;
?><SCRIPT LANGUAGE="Javascript" SRC="includes/ColorPicker2.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
var cp = new ColorPicker('window'); // Popup window
var cp2 = new ColorPicker(); // DIV style
</SCRIPT>
<table width="<?php echo $maintablewidth ?>" cellspacing="0" cellpadding="0" class="boxborder" align="<?php echo $maintablealign ?>">
  <tr>
    <td class="boxborder text" colspan="6" bgcolor="#AACCEE">Levels of urgency</td>
  </tr>
  <tr bgcolor="#EEEEEE">
    <td width="22" class="boxborder text"><b>ID</b></td>
    <td width="240" class="boxborder text"><b>Urgency</b></td>
    <td width="120" class="boxborder text"><b>Order in selection</b></td>
    <td colspan="2" class="boxborder text"><b>Color</b></td>
    <td width="114" class="boxborder text"><b>Action</b></td>
  </tr>
  <?php  
			$query = '	SELECT *	FROM tickets_levels		ORDER BY id ASC';
			$result = query_db($query);
            $counter=0;
			WHILE ($row = query_db_array($result))
				{
				$counter +=1;
?>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=update_levels" Method="post">
    <tr bgcolor="<?php echo UseColor() ?>">
      <td class="boxborder text"><?php echo $row['id'] ?></td>
      <td class="boxborder"><input name="status" value="<?php echo $row['name'] ?>" size="40" /></td>
      <td class="boxborder"><input name="order" value="<?php echo $row['order'] ?>" size="20" /></td>
      <td  style="padding:3px" width="120" bgcolor="#<?php echo $row['color'] ?>" class="boxborder text"><input name="color" value="<?php echo $row['color'] ?>" size="20" /></td>
      <td style=" padding-right:5px" width="32" bgcolor="#<?php echo $row['color'] ?>" class="boxborder text"><A HREF="#" onClick="cp2.select(document.forms[<?php echo $counter; ?>].color,'pick<?php echo $row['id']; ?>');return false;" NAME="pick<?php echo $row['id']; ?>" ID="pick<?php echo $row['id']; ?>">Pick</A></td>
      <td  style="padding:2px" class="boxborder"><input name="acc2" type="submit" id="acc2" onclick="return deletemember()" value="Delete" />
          <input type="hidden" name="depid" value="<?php echo $row['id'] ?>">
          <input name="acc2" type="submit" id="acc2" value="Update" />
      </td>
    </tr>
  </form>
  <?php				}
?>
</table>
<p>&nbsp;</p>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=update_levels" method="post">
  <table width="50%" align="<?php echo $maintablealign ?>" cellpadding="1" cellspacing="1" class="boxborder">
    <tr>
      <td >Deleting a urgency level will make  inaccessible  to all tickets/messages with that level <br />
      <table width="300" cellpadding="0" cellspacing="0" align="center">
        <tr>
          <td colspan="2" >Create new level </td>
          </tr>
        <tr>
          <td >Urgency Name:</td>
          <td><input name="name_level" type="text" id="name_level">
              <input type="submit" value="Submit" name="userform" /></td>
        </tr>        
        <tr>
          <td  colspan="2"><input name="insertlevel" type="hidden" id="insertlevel" value="1"></td>
        </tr>       
      </table>
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<SCRIPT LANGUAGE="JavaScript">cp.writeDiv()</SCRIPT>