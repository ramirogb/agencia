<script src="includes/jquery.js"></script>
<script src="includes/jquery.validate.js"></script>

  <script>
  


 
$(document).ready(function(){
    $("#creat").validate({
    
    rules: {
    	SerCdg: {
    		required: true,
    		minlength: 1
    	       }
		,SerDsc: {
			required: true,
			minlength: 1
		         }
        
	},
    messages: {
	
    	SerCdg: {
    		required: "<?php echo $insert_code ?>",	minlength: jQuery.format(" {0}.")
    	      }
		      ,SerDsc: "Descript."
			  
		
              }
    
    });
});
 
</script>
  <script>
  $(document).ready(function(){
    $("#creat").validate();
  });
  
  
  
  
  </script>
<?php

$query_categorias = "SELECT * FROM tarifarios";
$categorias = query_db($query_categorias);
$row_categorias = query_db_assoc($categorias);
$totalRows_categorias = query_db_num($categorias);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


$ser=$_GET['code'];
$query_service = "SELECT * FROM servicios where SerCdg='$ser'";
$service = query_db($query_service);
$row_service = query_db_assoc($service);
$totalRows_service = query_db_num($service);


$query_categories = "SELECT * FROM tarifarios";
$categories = query_db($query_categories);
$row_categories = query_db_assoc($categories);
$totalRows_categories = query_db_num($categories);



?>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
-->
</style>


<form method="post" name="form1"   id="creat" action="quote.php?action=insert_service">
  <div align="center"><?php echo $insert_service ?>
    <?php  if ($_GET['action']=='wizard') {
	
	?>
    <img src="images/step1.png" width="161" height="50">    </div>
	<span class="Estilo1"><?php  echo  $if_exists; ?></span><span class="bx-in"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=create_tarif"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></span>
    <?php }?>  
    <table   align="center">
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
$agency = query_db($query_agency) ;
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
      <td nowrap align="right"><?php echo $active ?></td>
      <td><input name="activ" type="checkbox" id="activ" value="1" checked></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input name="submit" type="submit" value="Submit"></td>
    </tr>
  </table>
  <input name="wizard" type="hidden" id="wizard" value="<?php echo $wiss; ?>">
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<link href="styles.css" rel="stylesheet" type="text/css">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>