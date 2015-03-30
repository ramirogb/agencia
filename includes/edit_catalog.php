
<?php

$cdg=$_GET['code'];$query_tarif = "SELECT * from tarifarios WHERE id='$cdg'";
$tarif = query_db($query_tarif) ;
$row_tarif = query_db_assoc($tarif);
$totalRows_tarif = query_db_num($tarif);

?>

<form method="post" name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=update_category">
  <table height="132" align="center">
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap   class="text"><div align="center"><?php echo $change_descript_catalog?></div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap   class="text" align="right"> C&oacute;digo de Cat&aacute;logo:</td>
      <td  class="text"><input name="code" type="text" id="code" disabled  onChange="makeUppercase('code')" value="<?php echo $row_tarif['tarif_cdg']; ?>" size="5">
      <input name="id" type="hidden" id="id" value="<?php echo $row_tarif['id']; ?>"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap   class="text" align="right">Nombre:</td>
      <td><input name="name" type="text" id="name" value="<?php echo $row_tarif['descript']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
