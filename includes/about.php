<?php
include_once("definition.php"); /* auto-ajax definition */
global $ajax; /* Important, always do this, because this page will be include */
$ajax->destiny("central"); /* the ajax destination of this page */
$ajax->start();//the page start here
?>
AutoAjax was code by Cesar Rodas as the begining of the TNCN web - framework
<?php
$ajax->end(); //and ends here
?>
