<table width="10%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Lang</td>
    <td>Inc.</td>
  </tr>
  <?php 
    $hj=0;
  do 
  {

  ?>
  <tr>
    <td><?php echo $row3x8['lang_descript']; ?>&nbsp;    </td>
    <td><input name="lang[<?php echo $hj ?>]" type="checkbox" id="lang[<?php echo $hj ?>]" value="1" 
	<?php  
	if ($cde==true) //we display languajes for editing then apply selective echo
{
	$servi=$_GET['service'];$ti=$_GET['tipe'];
	 $sw="select serv_type_lang.lang from  serv_type_lang where serv_type_lang.tipe='$ti' and serv_type_lang.SerCdg='$servi' and lang='".$row3x8['lang']."'";
	 $result578fd = query_db($sw);//dont rename vars!
	if ( query_db_num( $result578fd) >0) echo 'checked'; 
	}
	else
	{
	echo 'checked';
	if ($_GET['action']=='services_tipe') echo ' disabled';
	}
	
	?>
	
	>
    <input name="len[<?php echo $hj ?>]" type="hidden" id="len[<?php echo $hj ?>]" value="<?php echo $row3x8['lang'] ?>"></td>
  </tr>
   <?php
   $hj++;
	  }
	while($row3x8=query_db_assoc( $result578f));
	  
	   ?>
</table>
