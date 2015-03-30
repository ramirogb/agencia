<?php
if ( $authz<>'TRUE') exit;

require_once "includes/dUnzip2.inc.php";
require_once "includes/dZip.inc.php";

function unzip ($file)
{
$zip = new dUnzip2($file);
//$zip->debug = true;
// Unzip all the contents of the zipped file to a new folder called "uncompressed"
//$zip->getList();
$zip->unzipAll('');

}



?> 
