<?php 

$template = 'templates/reservation_es.htm'; //input  
$prefix=rand(100,10000);
$prefix='';
$template2 = '../templates/reservation_out'.$prefix.'.htm';//output
$template22 = 'reservation_out'.$prefix; //.'.htm';//output
$templateDoc = 'templates/reservation_out'.$prefix.'.doc';//output



include("html_to_doc.inc.php");	
$htmltodoc= new HTML_TO_DOC();	
$htmltodoc->createDoc($template2,'vea.doc');
