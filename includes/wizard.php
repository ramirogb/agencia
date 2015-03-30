<?php
$query_categorias = "SELECT * FROM tarifarios";
$categorias = query_db($query_categorias);
$row_categorias = query_db_assoc($categorias);
$totalRows_categorias = query_db_num($categorias);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
 $insertSQL = sprintf("INSERT INTO servicios (SerCdg, SerDsc, SerPre, SerAgeCdg, SerUsuChg, SerFecAdd, SerFecChg, levels_users, tarif_cdg) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['SerCdg'], "text"),
                       GetSQLValueString($_POST['SerDsc'], "text"),
                       GetSQLValueString($_POST['SerPre'], "double"),
                       GetSQLValueString($_POST['SerAgeCdg'], "text"),
                       GetSQLValueString($_POST['SerUsuChg'], "text"),
                       GetSQLValueString($_POST['SerFecAdd'], "date"),
                       GetSQLValueString($_POST['SerFecChg'], "date"),
                       GetSQLValueString($_POST['levels_users'], "int"),
                       GetSQLValueString($_POST['tarif_cdg'], "text"));

 
  $Result1 = query_db($insertSQL);
}


$ser=$_GET['code'];
$query_service = "SELECT * FROM servicios where SerCdg='$ser'";
$service = query_db($query_service) ;
$row_service = query_db_assoc($service);
$totalRows_service = query_db_num($service);


$query_categories = "SELECT * FROM tarifarios";
$categories = query_db($query_categories) ;
$row_categories = query_db_assoc($categories);
$totalRows_categories = query_db_num($categories);



?>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <div align="center"><?php echo $insert_service ?>
  </div>
  <table  class="text" align="center">
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $code_service ?></td>
      <td><input type="text" name="SerCdg"   id="SerCdg" onChange="makeUppercase('SerCdg')" size="5">
      <input name="SerFecAdd" type="hidden" id="SerFecAdd">
      <input name="SerUsuChg" type="hidden" id="SerUsuChg" value="1">
      <input name="SerFecChg" type="hidden" id="SerFecChg">
      <input name="levels_users" type="hidden" id="levels_users">
      <input name="SerPre" type="hidden" id="SerPre"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo$description ?></td>
      <td><input type="text" name="SerDsc" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $exclusive ?></td>
      <td><select name="SerAgeCdg" id="SerAgeCdg">
       
        <?php
			 $query_agency = "SELECT * FROM agencias ";
$agency = query_db($query_agency);
$row3x = query_db_assoc($agency);
$totalRows_agency = query_db_num($agency);
			 do { ?>
        <option value="<?php  echo $row3x['AgeCdg']; ?>" <?php if (!(strcmp($row3x['username'], $row['assigned_to'] ) ) ) {echo "SELECTED";} ?>><?php echo $row3x['AgeDsc']; ?></option>
		
        <?php } while ($row3x=query_db_assoc(	$agency)); ?>
       <option value=""selected >&nbsp;</option></select>
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $codeCatalog ?></td>
      <td><select name="tarif_cdg">
          <?php 
do {  
?>
          <option value="<?php echo $row_categorias['tarif_cdg']?>" <?php if (!(strcmp($row_categorias['descript'], $row_categorias['tarif_cdg']))) {echo "SELECTED";} ?>><?php echo $row_categorias['tarif_cdg']?></option>
          <?php
} while ($row_categorias = query_db_assoc($categorias));
?>
        </select>
      </td>
    <tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Submit"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<link href="styles.css" rel="stylesheet" type="text/css">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>