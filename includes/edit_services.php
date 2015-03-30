<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


$ser=$_GET['code'];
$query_service = "SELECT * FROM servicios where SerCdg='$ser'";
$service = query_db($query_service) ;
$row_service = query_db_assoc($service);
$totalRows_service = query_db_num($service);


$query_categories = "SELECT * FROM tarifarios";
$categories = query_db($query_categories);
$row_categories = query_db_assoc($categories);
$totalRows_categories = query_db_num($categories);



?>

<form method="post" name="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=edit_services2">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">SerCdg:</td>
      <td><?php echo $row_service['SerCdg']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">SerDsc:</td>
      <td><input type="text" name="SerDsc" value="<?php echo $row_service['SerDsc']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">SerDscAbr:</td>
      <td><input type="text" name="SerDscAbr" value="<?php echo $row_service['SerDscAbr']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">SerPre:</td>
      <td><input type="text" name="SerPre" value="<?php echo $row_service['SerPre']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">SerAgeCdg:</td>
      <td><input type="text" name="SerAgeCdg" value="<?php echo $row_service['SerAgeCdg']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tarif_cdg:</td>
      <td><select name="tarif_cdg" id="tarif_cdg">
        <option value="-1"selected >&nbsp;</option>
        <?php
			 $query_agency = "SELECT * FROM tarifarios ";
$agency = query_db($query_agency);
$row3x = query_db_assoc($agency);
$totalRows_agency = query_db_num($agency);
			 do { ?>
        <option value="<?php  echo $row3x['tarif_cdg']; ?>" <?php if (!(strcmp($row3x['tarif_cdg'], $row_service['tarif_cdg'] ) ) ) {echo "SELECTED";} ?>><?php echo $row3x['descript']; ?></option>
        <?php } while ($row3x=query_db_assoc(	$agency)); ?>
      </select>
      </td>
    </tr>
    <tr valign="baseline" class="text">
      <td nowrap align="right"><?php echo $active ?></td>
      <td><input name="activ" type="checkbox" id="activ" value="1"  <?php if ( $row_service['active']==1) echo checked ?>   ></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input name="submit" type="submit" value="Actualizar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="SerCdg" value="<?php echo $row_service['SerCdg']; ?>">
</form>
<p>&nbsp;</p>
<link href="styles.css" rel="stylesheet" type="text/css">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>