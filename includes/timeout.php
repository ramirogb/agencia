<?php
 @include('../configuration.php');
@include('./configuration.php'); 
   ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
<link href="includes/styles.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: small;
}
-->
</style>
</head>

<body>
<div class="header">
  <h2>Time Out<br>
  </h2>
</div>
<p class="Estilo1">Idle time has been too long.
</p>
<p class="Estilo1"> [ <a href="<?php echo $siteurl; ?>">Sign In Again</a> |</p>
<?php @include('includes/bottom.php' ); ?>
</p>
</body>
</html>
