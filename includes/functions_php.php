<?php


if  (isset($tickets_display) )
{
$maxRows_Recordset1 =$tickets_display; //Number of results per page
}
else
$maxRows_Recordset1 =20; //if the configuration file fails.

$pageNum_Recordset1 = 0;
$currentPage = $_SERVER["PHP_SELF"];
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1']; 
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
$_SESSION['start']=$startRow_Recordset1+1;
$_SESSION['end']= $currentPage*$maxRows_Recordset1  + $totalRows_contenido;





$_SESSION['end']= $currentPage*$maxRows_Recordset1  + $totalRows_contenido;
if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = query_db($query_old);
  $totalRows_Recordset1 = query_db_num($all_Recordset1);
   
  $_SESSION['total']=$totalRows_Recordset1;
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
 $totalRows_contenido=$totalPages_Recordset1; 

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);

function show_paging()
{


}

 ?>