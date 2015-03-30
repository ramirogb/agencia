<?php if ($authz<>'TRUE') exit;
?>
<link href="styles.css" rel="stylesheet" type="text/css">
<link href="includes/paxes.css" rel="stylesheet" type="text/css">
<div align="right"></div>
<script src="includes/jquery.js"></script>
<script src="includes/jquery.validate.js"></script>
  <script> $(document).ready(function(){
    $("#cre").validate({
    rules: {
	name: {required: true,	minlength: 1 },last: {required: true,	minlength: 1 }	},
    messages: {	
	name: {required: "**" },last: {required: "*" }  
	         }  
    });
});
 
</script>
<script src="includes/over/overlibmws.js" type="text/javascript"></script>
<p><?php if ($edita<>1) echo $booking_stored ?></p>
<form name="form1" method="post"  id="cre" action="quote.php?action=save_paxes">
  
    <div class="title_bar_blue"></div>
        <?php for($n=1;$n<=$npaxes;$n++) { 
  ?>  <div class="detail">  
    <table cellpadding="0" cellspacing="0" border="0" class="formfieldbox">
      <tr>
        <td class="name"><?php echo $n ?></td>
        <td class="name">First Name:<span class="rezgo_asterisk">*</span></td>
        <td><input name="firstname[<?php echo $n ?>]" type="text" class="field required" id="name" value="<?php echo $va1 ?>" /></td>
        <td class="name">Last Name:<span class="rezgo_asterisk">*</span></td>
        <td><input name="last_name[<?php echo $n ?>]" type="text"   class="field required" id="last" value="<?php echo $va2 ?>" /></td>
        <td>Sex:
          <select name="sex[<?php echo $n ?>]" id="sex[<?php echo $n ?>]">
            <option>Sel</option>
             <option value="m" <?php if (!(strcmp('m', $Gender) ) ) {echo "SELECTED";} ?>><?php echo 'M'; ?></option>
             <option value="f" <?php if (!(strcmp('f', $Gender) ) ) {echo "SELECTED";} ?>><?php echo 'F'; ?></option>
          </select></td>
      </tr>
      <tr>
        <td class="name">&nbsp;</td>
        <td class="name">Phone Number:</td>
        <td><input name="phone[<?php echo $n ?>]" type="text" class="field" value="<?php echo $va3 ?>" /></td>
        <td class="name">Email Address:</td>
        <td><input name="email[<?php echo $n ?>]" type="text" class="field" value="<?php echo $va4 ?>" /></td>
        <td>&nbsp;</td>
      </tr>
    </table>
        <p>
          <?php
 } 
?>
          <input name="npaxes" type="hidden" id="npaxes" value="<?php echo $npaxes ?>">
          <input name="id" type="hidden" id="id2" value="<?php echo $id ?>">
          <input name="edita" type="hidden" id="edita" value="<?php echo $edita; ?>">
          <input name="reserv" type="hidden" id="reserv" value="<?php echo $el_id; ?>">
        </p>
        </div>
  <div align="center"><span class="detail">
    <input type="submit" name="Submit" value="Enviar">
    </span>
  </div>
</form>
