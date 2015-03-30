<link href="styles.css" rel="stylesheet" type="text/css">
<table  style="margin-left:5px "  border="0" cellpadding="0" cellspacing="2" bordercolor="#00CCFF">
  <tr class="comment4">
    <td ><strong>Id</strong></td>
    <td><strong><?php echo $text_listdat  ?></strong></td>
    <td ><strong><?php echo   $monto  ?></strong></td>
    <td ><strong>Operador</strong></td>
    <td ><strong><?php echo $type_pay ?></strong></td>
	<td ><strong><?php echo $comment ?></strong></td>
  </tr>
  <?php do
	{	
	?>
  <tr bgcolor="#DDF4FB">
    <td><?php echo $row3x8[0]; ?>&nbsp;</td>
    <td><?php echo date($dformat, $row3x8[6]).' '.date('H:i', $row3x8[6]) ?>&nbsp;</td>
    <td><?php echo $row3x8[3]; ?>&nbsp;</td>
    <td><?php echo $row3x8[5]; ?>&nbsp;</td>
    <td><?php echo $row3x8[7]; ?>&nbsp;</td>
	 <td><?php echo $row3x8[2]; ?>&nbsp;</td>
	  <?php
	  }
	while($row3x8=query_db_row( $result578f));
	  
	   ?>
  </tr>
</table>
