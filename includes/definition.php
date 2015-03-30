<?php
require "autoajax.php";
$ajax = new autoajax("..");

//$ajax->mainpage = "../quote.php?action=open_r&id=".$_GET['id']; /* ajax default main template */
if ( file_exists('quote.php'))  
{
$ajax->mainpage = "../quote.php?action=open_r&id=".$_GET['id']; 
}
else
{
chdir('../');
if ( file_exists('quote.php'))  $ajax->mainpage = "quote.php?action=open_r&id=".$_GET['id']; 
}


?>