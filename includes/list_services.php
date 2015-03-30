
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_services = 20;
$pageNum_services = 0;
if (isset($_GET['pageNum_services'])) {
  $pageNum_services = $_GET['pageNum_services'];
}
$startRow_services = $pageNum_services * $maxRows_services;

$query_services = "SELECT * FROM servicios order by tarif_cdg asc";
$query_limit_services = sprintf("%s LIMIT %d, %d", $query_services, $startRow_services, $maxRows_services);
$services = query_db($query_limit_services);
$row_services = query_db_assoc($services);

if (isset($_GET['totalRows_services'])) {
  $totalRows_services = $_GET['totalRows_services'];
} else {
  $all_services = query_db($query_services);
  $totalRows_services = query_db_num($all_services);
}
$totalPages_services = ceil($totalRows_services/$maxRows_services)-1;

$queryString_services = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_services") == false && 
        stristr($param, "totalRows_services") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_services = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_services = sprintf("&totalRows_services=%d%s", $totalRows_services, $queryString_services);


?>
<link href="styles.css" rel="stylesheet" type="text/css">

<p>&nbsp;</p>
<table width="90%"  border="0" cellspacing="0"  class="tables" cellpadding="0">
  <tr class="listView" >
    <td width="2%" class="comment3">&nbsp;</td>
    <td width="2%" class="comment3"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=insert_service"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></td>
    <td width="1%" class="comment3">&nbsp;</td>
    <td class="comment4"><strong>C&oacute;digo</strong></td>
    <td class="comment4"><strong><strong><?php echo $namey ?></strong></strong></td>
    <td class="comment4"><strong><?php echo $text_liststa ?>&nbsp;</strong></td>
    <td width="6%" class="comment4"><strong><?php  echo $variations ?>
    </strong>&nbsp;</td>
    <td class="comment4"><strong>
    </strong></td>
    <td width="12%" class="comment4"><strong>Agency</strong></td>
    <td width="15%" class="comment4"><strong>Fecha creaci&oacute;n</strong></td>
    <td width="14%" class="comment4"><strong>Catalogo</strong></td>
    <td width="6%"><span class="comment3"></span></td>
  </tr>
  <?php do { ?>
  <tr class="<?php set_class(); ?>" >
    <td>&nbsp;</td>
    <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=edit_service&code=<?php echo $row_services['SerCdg']; ?>"><img src="images/edit.png" width="16" height="16" border="0"></a></td>
    <td ><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=del_service&code=<?php echo $row_services['SerCdg']; ?>"><img src="images/delete.png" width="16" height="16" class="delete"  border="0"></a></td>
    <td><?php echo $row_services['SerCdg']; ?></td>
    <td><?php echo $row_services['SerDsc']; ?></td>
    <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=changS&<?php IF ($row_services['active'] == '1') {     ?>memberid=<?php echo $row_services['SerCdg'] ?>"><img src="./images/suspend.gif"  width="16" height="16"  alt="Is Active" border="0"><?php
					}
				ELSE
					{
                    ?>sub_act=1&amp;memberid=<?php echo $row_services['SerCdg']; ?>"><img src="./images/activate.gif" alt="Disabled Service" width="16" height="16" border="0"><?php
					}
?>
</a></td>
    <td><span class="comment4">
    <?php 
	
    $fff="select distinct(serv_type_lang.tipe) from serv_type_lang
	  where SerCdg='".$row_services['SerCdg']."'";
	$tarif__ = query_db($fff) ;
    $row__= query_db_row($tarif__);
	do
	{
$qq=$row__[0];
$lin0="quote.php?action=edit_tarif&service=".$row_services['SerCdg'].'&tipe='.$qq.'&agency=';	
echo $lin='<a href='.$lin0.'>'.$qq.'</a> ';
}while ($row__= query_db_row($tarif__))

	?>
</span></td>
    <td>&nbsp;</td>
    <td><?php echo $row_services['SerAgeCdg']; ?></td>
    <td><?php echo  date($dformat.' H:i',$row_services['SerFecAdd']); ?></td>
    <td><?php echo $row_services['tarif_cdg']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <?php } while ($row_services = query_db_assoc($services)); ?>
</table>

<div align="center">
  <p><a href="<?php printf("%s?pageNum_services=%d%s", $currentPage, max(0, $pageNum_services - 1), $queryString_services); ?>">&lt;</a> <a href="<?php printf("%s?pageNum_services=%d%s", $currentPage, min($totalPages_services, $pageNum_services + 1), $queryString_services); ?>">&gt;</a></p>
  <table border="0" width="50%" align="center">
    <tr class="comment3">
      <td width="23%" align="center"><?php { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_services=%d%s", $currentPage, 0, $pageNum_services); ?>">Primero</a>
          <?php } // Show if not first page ?>
      </td>
      <td width="31%" align="center"><?php  { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_services=%d%s", $currentPage, max(0, $pageNum_services - 1), $queryString_services); ?>">Anterior</a>
          <?php } // Show if not first page ?>
          </td>
      <td width="23%" align="center"><?php  { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_services=%d%s", $currentPage, min($totalPages_services, $pageNum_services + 1), $queryString_services); ?>">Siguiente</a>
          <?php } // Show if not last page ?>
      </td>
      <td width="23%" align="center"><?php  { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_services=%d%s", $currentPage, $pageNum_services, $queryString_tarif); ?>">&Uacute;ltimo</a>
          <?php } // Show if not last page ?>
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>