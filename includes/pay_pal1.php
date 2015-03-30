<?php
?>
<form name="form1" method="post" action="quote.php?action=paypal_2">
  <p align="center">Your booking is PENDING and will be confirmed once your Paypal payment has been received and processed based upon the booking terms and conditions. <BR>
      <input name="a" type="hidden" id="a3" value="1">
      <BR>
    Pay for this booking now by clicking the button.</p>
  <p align="center">Total: <?php echo $row3x8['they_owe_you']; ?>
      <input name="total" type="hidden" id="total" value="<?php echo $row3x8['they_owe_you']; ?>">
  </p>
  <p align="center">
    <input type="submit" name="Submit" value="Submit">
    <input type='image' name='submit2' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='PayPal'/>
</p>
</form>
<p>&nbsp;</p>
