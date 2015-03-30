<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: small;
}
.Estilo1 {color: #FF0000}
-->
</style></head>

<body>
<p align="center"><strong>Updating e-tour to the version 1.1...Executing update.php
</strong></p>
<p>Read It:</p>
<p>Ignore warnings of this type: &quot;Duplicate column...&quot;, Except of this type: <span class="Estilo1">&quot;<strong>You have an error in your SQL syntax;</strong></span><strong>..</strong></p>
<p><strong>If you get errors, request help at <a href="cromosoft.com">cromosoft.com</a></strong></p>
</body>
</html>
<?php

echo "Starting changes in the Database, new fields will be added...";
echo '<BR>';
echo '<BR>';
echo "altering table: tickets_state";
echo '<BR>';
$last_msg='';
include_once('config.php');
include_once('check.php');
include_once('includes/functions.php');
$sql="ALTER TABLE `reserv_master` ADD `user_id` INT NOT NULL;";
$result84 = query_db($sql);
echo '<BR>';

$sql"ALTER TABLE `reserv_master` ADD `req_deposit` FLOAT,ADD `they_owe_you` FLOAT;"
$result84 = query_db($sql);
echo '<BR>';

"CREATE TABLE 'payments_reservations' (
  'id' bigint(10) unsigned NOT NULL auto_increment,
  'DocNro' varchar(10) default NULL,
  'Observ' varchar(200) default NULL,
  'amount' float default NULL,
  'taxes' float NOT NULL,
  'user_id' int(11) NOT NULL,
  'timestamp' bigint(10) NOT NULL,
  'payment_type' varchar(2) NOT NULL,
  UNIQUE KEY 'id' ('id')
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1";
$result84 = query_db($sql);
echo '<BR>';

echo '______________________________';
echo '<BR>';
echo '<BR>';
echo "Database update completed. Now copy new files";
?>