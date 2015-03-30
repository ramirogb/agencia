<form name="form1" method="post" action="quote.php?action=del_pax2">
  <div align="center"><?php echo $are_you_sure; ?>
  </div>
  <div align="center"></div>
 <p align="center">
  <input name="pax" type="hidden" id="pax" value="<?php echo $id ?>">
</p>
<p align="center">    
  <input type="submit" name="Submit" value="Confirm">
</p>
</form>
