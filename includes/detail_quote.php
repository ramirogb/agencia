<?php require_once('../../Connections/con1.php'); ?><?php
$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$recordID = $_GET['recordID'];
$query_DetailRS1 = "SELECT * FROM quotations WHERE EmpCdg = '$recordID'";
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = query_db($query_limit_DetailRS1, $con1) ;
$row_DetailRS1 = query_db_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = query_db($query_DetailRS1);
  $totalRows_DetailRS1 = query_db_num($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
		
<table border="1" align="center">
  
  <tr>
    <td>EmpCdg</td>
    <td><?php echo $row_DetailRS1['EmpCdg']; ?> </td>
  </tr>
  <tr>
    <td>DocNro</td>
    <td><?php echo $row_DetailRS1['DocNro']; ?> </td>
  </tr>
  <tr>
    <td>AgeCdg</td>
    <td><?php echo $row_DetailRS1['AgeCdg']; ?> </td>
  </tr>
  <tr>
    <td>Paxs</td>
    <td><?php echo $row_DetailRS1['Paxs']; ?> </td>
  </tr>
  <tr>
    <td>Dsc</td>
    <td><?php echo $row_DetailRS1['Dsc']; ?> </td>
  </tr>
  <tr>
    <td>SerNum</td>
    <td><?php echo $row_DetailRS1['SerNum']; ?> </td>
  </tr>
  <tr>
    <td>NumSerDet</td>
    <td><?php echo $row_DetailRS1['NumSerDet']; ?> </td>
  </tr>
  <tr>
    <td>NumPaxDet</td>
    <td><?php echo $row_DetailRS1['NumPaxDet']; ?> </td>
  </tr>
  <tr>
    <td>ImpValVta</td>
    <td><?php echo $row_DetailRS1['ImpValVta']; ?> </td>
  </tr>
  <tr>
    <td>ImpIgv</td>
    <td><?php echo $row_DetailRS1['ImpIgv']; ?> </td>
  </tr>
  <tr>
    <td>ImpTot</td>
    <td><?php echo $row_DetailRS1['ImpTot']; ?> </td>
  </tr>
  <tr>
    <td>ImpIgvNow</td>
    <td><?php echo $row_DetailRS1['ImpIgvNow']; ?> </td>
  </tr>
  <tr>
    <td>MonTip</td>
    <td><?php echo $row_DetailRS1['MonTip']; ?> </td>
  </tr>
  <tr>
    <td>Sts</td>
    <td><?php echo $row_DetailRS1['Sts']; ?> </td>
  </tr>
  <tr>
    <td>AnuFlg</td>
    <td><?php echo $row_DetailRS1['AnuFlg']; ?> </td>
  </tr>
  <tr>
    <td>ValPreFlg</td>
    <td><?php echo $row_DetailRS1['ValPreFlg']; ?> </td>
  </tr>
  <tr>
    <td>FacNro</td>
    <td><?php echo $row_DetailRS1['FacNro']; ?> </td>
  </tr>
  <tr>
    <td>PndFlg</td>
    <td><?php echo $row_DetailRS1['PndFlg']; ?> </td>
  </tr>
  <tr>
    <td>StsPnd</td>
    <td><?php echo $row_DetailRS1['StsPnd']; ?> </td>
  </tr>
  <tr>
    <td>FecLimPrePag</td>
    <td><?php echo $row_DetailRS1['FecLimPrePag']; ?> </td>
  </tr>
  <tr>
    <td>Obs</td>
    <td><?php echo $row_DetailRS1['Obs']; ?> </td>
  </tr>
  <tr>
    <td>Ema</td>
    <td><?php echo $row_DetailRS1['Ema']; ?> </td>
  </tr>
  <tr>
    <td>DocRes</td>
    <td><?php echo $row_DetailRS1['DocRes']; ?> </td>
  </tr>
  <tr>
    <td>PerRes</td>
    <td><?php echo $row_DetailRS1['PerRes']; ?> </td>
  </tr>
  <tr>
    <td>UsuAdd</td>
    <td><?php echo $row_DetailRS1['UsuAdd']; ?> </td>
  </tr>
  <tr>
    <td>FecAdd</td>
    <td><?php echo $row_DetailRS1['FecAdd']; ?> </td>
  </tr>
  <tr>
    <td>TimAdd</td>
    <td><?php echo $row_DetailRS1['TimAdd']; ?> </td>
  </tr>
  <tr>
    <td>UsuChg</td>
    <td><?php echo $row_DetailRS1['UsuChg']; ?> </td>
  </tr>
  <tr>
    <td>FecChg</td>
    <td><?php echo $row_DetailRS1['FecChg']; ?> </td>
  </tr>
  <tr>
    <td>TimChg</td>
    <td><?php echo $row_DetailRS1['TimChg']; ?> </td>
  </tr>
  <tr>
    <td>fectrn</td>
    <td><?php echo $row_DetailRS1['fectrn']; ?> </td>
  </tr>
  <tr>
    <td>ImpTipCam</td>
    <td><?php echo $row_DetailRS1['ImpTipCam']; ?> </td>
  </tr>
  <tr>
    <td>AfeIgvflg</td>
    <td><?php echo $row_DetailRS1['AfeIgvflg']; ?> </td>
  </tr>
  <tr>
    <td>FecPriSer</td>
    <td><?php echo $row_DetailRS1['FecPriSer']; ?> </td>
  </tr>
  <tr>
    <td>EmailEnviado</td>
    <td><?php echo $row_DetailRS1['EmailEnviado']; ?> </td>
  </tr>
  <tr>
    <td>EmailRecibido</td>
    <td><?php echo $row_DetailRS1['EmailRecibido']; ?> </td>
  </tr>
  <tr>
    <td>FileHTML</td>
    <td><?php echo $row_DetailRS1['FileHTML']; ?> </td>
  </tr>
  <tr>
    <td>Length</td>
    <td><?php echo $row_DetailRS1['Length']; ?> </td>
  </tr>
  <tr>
    <td>EmaFlg</td>
    <td><?php echo $row_DetailRS1['EmaFlg']; ?> </td>
  </tr>
  <tr>
    <td>Color1</td>
    <td><?php echo $row_DetailRS1['Color1']; ?> </td>
  </tr>
  <tr>
    <td>Color2</td>
    <td><?php echo $row_DetailRS1['Color2']; ?> </td>
  </tr>
  <tr>
    <td>tipe</td>
    <td><?php echo $row_DetailRS1['tipe']; ?> </td>
  </tr>
  <tr>
    <td>lang</td>
    <td><?php echo $row_DetailRS1['lang']; ?> </td>
  </tr>
  <tr>
    <td>comment</td>
    <td><?php echo $row_DetailRS1['comment']; ?> </td>
  </tr>
  <tr>
    <td>catalog_prom</td>
    <td><?php echo $row_DetailRS1['catalog_prom']; ?> </td>
  </tr>
  <tr>
    <td>timestamp</td>
    <td><?php echo $row_DetailRS1['timestamp']; ?> </td>
  </tr>
  <tr>
    <td>SerCdg</td>
    <td><?php echo $row_DetailRS1['SerCdg']; ?> </td>
  </tr>
  <tr>
    <td>price1</td>
    <td><?php echo $row_DetailRS1['price1']; ?> </td>
  </tr>
  <tr>
    <td>pricet</td>
    <td><?php echo $row_DetailRS1['pricet']; ?> </td>
  </tr>
  <tr>
    <td>promo_cat</td>
    <td><?php echo $row_DetailRS1['promo_cat']; ?> </td>
  </tr>
  <tr>
    <td>cur_datime</td>
    <td><?php echo $row_DetailRS1['cur_datime']; ?> </td>
  </tr>
  <tr>
    <td>attention</td>
    <td><?php echo $row_DetailRS1['attention']; ?> </td>
  </tr>
  
  
</table>


</body>
</html><?php

?>
