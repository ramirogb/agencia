<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_tarif = 100;
$pageNum_tarif = 0;
if (isset($_GET['pageNum_tarif'])) {
  $pageNum_tarif = $_GET['pageNum_tarif'];
}
$startRow_tarif = $pageNum_tarif * $maxRows_tarif;

 $query_tarif = "SELECT distinct tarifasdetalle.SerCdg,tarifasdetalle.AgeCdg,
					tarifasdetalle.serv_type,servicios.SerDsc,tarifasdetalle.FecIni,
					 tarifasdetalle.FecFin,servicios.tarif_cdg  FROM tarifasdetalle ,servicios,tarifarios where tarifasdetalle.SerCdg = servicios.SerCdg 
					 and tarifarios.tarif_cdg=servicios.tarif_cdg
					 order by servicios.tarif_cdg asc, servicios.SerDsc";
$query_limit_tarif = sprintf("%s LIMIT %d, %d", $query_tarif, $startRow_tarif, $maxRows_tarif);
$tarif = query_db($query_limit_tarif);
$row_tarif = query_db_assoc($tarif);

if (isset($_GET['totalRows_tarif'])) {
  $totalRows_tarif = $_GET['totalRows_tarif'];
} else {
  $all_tarif = query_db($query_tarif);
  $totalRows_tarif = query_db_num($all_tarif);
}
$totalPages_tarif = ceil($totalRows_tarif/$maxRows_tarif)-1;

$queryString_tarif = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_tarif") == false && 
        stristr($param, "totalRows_tarif") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_tarif = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_tarif = sprintf("&totalRows_tarif=%d%s", $totalRows_tarif, $queryString_tarif);
?>

<?php if ($authz<>'TRUE') exit;

//=========preparing to fill prices and remember service codes
	  
?>
<link href="styles.css" rel="stylesheet" type="text/css">

<div align="right"></div>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="90%"  border="0" cellpadding="0" cellspacing="0" class="tables">
  <tr class="comment4">
    <td width="4%"><span class="comment3"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=create_tarif"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></span></td>
    <td width="5%" class="comment3">&nbsp;</td>
    <td width="12%" class="comment3"><strong>CAT</strong></td>
    <td width="22%"><div align="center"><strong>SERVICIO</strong></div></td>
    <td width="6%"><div align="center"><strong>TIPO</strong></div></td>
    <td width="9%"><strong>Interv.</strong></td>
    <td width="20%"><div align="center"><strong>AGENCIA</strong></div></td>
    <td width="10%"><div align="center"><strong>FECHA INICIAL </strong></div></td>
    <td width="12%"><div align="center"><strong>FECHA FINAL </strong></div></td>
  </tr>
  <?php do { ?>
  <tr class="<?php set_class(); ?>" >
    <td style="padding-left:5px "><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=edit_tarif&service=<?php echo $row_tarif['SerCdg']; ?>&tipe=<?php echo $row_tarif['serv_type']; ?>&agency=<?php echo $row_tarif['AgeCdg']; ?>"><img src="images/edit.png" alt="Editar" width="16" height="16" border="0"></a></td>
    <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=del_tarif&service=<?php echo $row_tarif['SerCdg'] ?>&tipe=<?php echo $row_tarif['serv_type']; ?>&agency=<?php echo $row_tarif['AgeCdg']; ?>"><img src="images/delete.png" alt="Borrar" width="16" height="16" class="delete"  border="0"></a></td>
    <td><?php echo $row_tarif['tarif_cdg']; ?></td>
    <td><div align="center"><?php echo $row_tarif['SerCdg'].' '.$row_tarif['SerDsc']; ?></div></td>
    <td><div align="center"><?php 
	if (	 $row_tarif['serv_type']=='PRIV') 	echo $Service_priv;
	if (	 $row_tarif['serv_type']=='SHAR') 	echo $Service_shared;
	 
	 	 ?></div></td>
    <td><?php 
	
	 $fff="select count(*) from tarifasdetalle where SerCdg='".$row_tarif['SerCdg']."' and serv_type='".$row_tarif['serv_type']."' and AgeCdg='".$row_tarif['AgeCdg']."'";
	$tarif__ = query_db($fff) ;
    $row__= query_db_row($tarif__);
echo $row__[0];
	?>&nbsp;</td>
    <td><div align="center"><?php echo $row_tarif['AgeCdg']; ?></div></td>
    <td><div align="center"><?php echo   date($dformat,$row_tarif['FecIni']); ?></div></td>
    <td><div align="center"><?php echo date($dformat,$row_tarif['FecFin']);  ?></div></td>
  </tr>
  <?php } while ($row_tarif = query_db_assoc($tarif)); ?>
</table>
<p>&nbsp;</p>
  <?php

?>
  <table border="0" width="50%" align="center">
    <tr class="comment3">
      <td width="23%" align="center"><?php if ($pageNum_tarif > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_tarif=%d%s", $currentPage, 0, $queryString_tarif); ?>">Primero</a>
          <?php } // Show if not first page ?>
      </td>
      <td width="31%" align="center"><?php if ($pageNum_tarif > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_tarif=%d%s", $currentPage, max(0, $pageNum_tarif - 1), $queryString_tarif); ?>">Anterior</a>
          <?php } // Show if not first page ?>
      </td>
      <td width="23%" align="center"><?php if ($pageNum_tarif < $totalPages_tarif) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_tarif=%d%s", $currentPage, min($totalPages_tarif, $pageNum_tarif + 1), $queryString_tarif); ?>">Siguiente</a>
          <?php } // Show if not last page ?>
      </td>
      <td width="23%" align="center"><?php if ($pageNum_tarif < $totalPages_tarif) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_tarif=%d%s", $currentPage, $totalPages_tarif, $queryString_tarif); ?>">&Uacute;ltimo</a>
          <?php } // Show if not last page ?>
      </td>
    </tr>
  </table>
