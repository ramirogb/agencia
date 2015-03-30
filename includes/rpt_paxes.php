<link href="styles.css" rel="stylesheet" type="text/css">
<table width="500"  border="0" cellpadding="0" cellspacing="1" bordercolor="#00CCFF"  style="margin-left:5px ">
  <tr class="comment4">
    <td colspan="2" ><strong>Id</strong></td>
    <td width="113"><strong><?php echo $text_regname  ?></strong></td>
    <td width="151" >&nbsp;</td>
    <td width="75" ><strong>Phone</strong></td>
    <td width="70" ><strong>email</strong></td>
	<td width="28" ><strong><?php echo 'Sex' ?></strong></td>
  </tr>
  <?php 
  $y=0;
  do
	{	$y++;
	?>
  <tr>
    <td width="31"><?php echo $y; ?>&nbsp;</td>
    <td width="24"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=edit_pax&code=<?php echo  $row3x8[0]; ?>&reserv=<?php  echo $_GET['id'] ?>"><img src="images/edit.png" alt="Editar" width="16" height="16" border="0"></a></td>
    <td><?php echo $row3x8[1]; ?>&nbsp;</td>
    <td><?php echo $row3x8[2]; ?>&nbsp;</td>
    <td><?php echo $row3x8[7]; ?>&nbsp;</td>
    <td><?php echo $row3x8[8]; ?>&nbsp;</td>
	 <td><?php echo $row3x8[4]; ?>&nbsp;</td>
	  <?php
	  }
	while($row3x8=query_db_row( $result578f));
	  
	   ?>
  </tr>
</table>
