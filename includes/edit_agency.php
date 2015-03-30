<?php 
$cdg=$_GET['code'];
 $query_agency = "SELECT * FROM agencias WHERE AgeCdg='$cdg'";
$agency = query_db($query_agency);
$row_agency = query_db_assoc($agency);
$totalRows_agency = query_db_num($agency);


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

?>
<form method="post" name="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=update_agenci">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">C&oacute;digo de Agencia:</td>
      <td><?php echo $row_agency['AgeCdg']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nombre de Agencia:</td>
      <td><input type="text" name="AgeDsc" value="<?php echo $row_agency['AgeDsc']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Descripci&oacute;n</td>
      <td><input type="text" name="AgeDscAbr" value="<?php echo $row_agency['AgeDscAbr']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Direcci&oacute;n:</td>
      <td><input type="text" name="AgeDir" value="<?php echo $row_agency['AgeDir']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tel&eacute;fono:</td>
      <td><input type="text" name="AgeFon" value="<?php echo $row_agency['AgeFon']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><input type="hidden" name="hiddenField">
      Fax</td>
      <td><input type="text" name="AgeFax" value="<?php echo $row_agency['AgeFax']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Persona de Contacto </td>
      <td><input type="text" name="AgeCto" value="<?php echo $row_agency['AgeCto']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ruc:</td>
      <td><input type="text" name="AgeRuc" value="<?php echo $row_agency['AgeRuc']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Color1:</td>
      <td><input type="text" name="Color1" value="<?php echo $row_agency['Color1']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Color2:</td>
      <td><input type="text" name="Color2" value="<?php echo $row_agency['Color2']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tel&eacute;fono 24horas:</td>
      <td><input type="text" name="AgeFon2" value="<?php echo $row_agency['AgeFon2']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Celular Nextel:</td>
      <td><input type="text" name="AgeNex" value="<?php echo $row_agency['AgeNex']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Celular Movistar</td>
      <td><input type="text" name="AgeCelMov" value="<?php echo $row_agency['AgeCelMov']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Celular Claro </td>
      <td><input type="text" name="AgeCelCla" value="<?php echo $row_agency['AgeCelCla']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Actualizar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="AgeCdg" value="<?php echo $row_agency['AgeCdg']; ?>">
  <input type="hidden" value="5">
</form>
<p>&nbsp;</p>