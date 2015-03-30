
<?php if ($authz<>'TRUE') exit;
?>
<link href="styles.css" rel="stylesheet" type="text/css">

<div align="right"></div>
<script src="includes/over/overlibmws.js" type="text/javascript"></script>
<p><?php echo $booking_stored ?></p>
<form name="form1" method="post" action="quote.php?action=paxes">
   <input name="id" type="hidden" id="id" value="<?php echo $CODIGO_DE_OPE ?>">
  <input name="npaxes" type="hidden" id="npaxes" value="<?php echo $paxes ?>">
  <input type="submit" name="Submit" value="<?php  echo $fillpaxes  ?>">
</form>
<p>&nbsp;</p>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
  <span class="text"><span class="boxborder text"> </span></span>
<p align="left">&nbsp;</p>
