<script src="includes/jquery.js"></script>
<script src="includes/jquery.validate.js"></script> <script> $(document).ready(function(){
    $("#creat").validate({
    
    rules: {
    	AgeCdg: {
    		required: true,
    		minlength: 2
    	       },
AgeCto: {
    		required: true,
    		minlength: 2
    	       },
			  AgeDsc: {
			required: true,
			minlength: 4
		         }
        
	},
    messages: {
	
    	AgeCdg: {
    		required: "<?php echo $insert_code ?>",	minlength: jQuery.format(" {0}.")
    	      }
		      ,AgeDsc: "Descript."
  		      ,AgeCto: "**."
		
              }
    
    });
});
 
</script>
  <script>
  $(document).ready(function(){
    $("#creat").validate();
  });  </script>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO agencias (AgeCdg, AgeDsc, AgeDscAbr, AgeDir, AgeFon, AgeFax, AgeCto,  AgeFecAdd,  AgeRuc, AgeFon2, AgeNex, AgeCelMov, AgeCelCla) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['AgeCdg'], "text"),
                       GetSQLValueString($_POST['AgeDsc'], "text"),
                       GetSQLValueString($_POST['AgeDscAbr'], "text"),
                       GetSQLValueString($_POST['AgeDir'], "text"),
                       GetSQLValueString($_POST['AgeFon'], "text"),
                       GetSQLValueString($_POST['AgeFax'], "text"),
                       GetSQLValueString($_POST['AgeCto'], "text"),
                       GetSQLValueString(mktime(),  "date"),                                          
                       GetSQLValueString($_POST['AgeRuc'], "int"),
                       GetSQLValueString($_POST['AgeFon2'], "text"),
                       GetSQLValueString($_POST['AgeNex'], "text"),
                       GetSQLValueString($_POST['AgeCelMov'], "text"),
                       GetSQLValueString($_POST['AgeCelCla'], "text"));


  $Result1 = query_db($insertSQL);
}


$query_insert = "SELECT EmpCdg, AgeCdg, AgeDsc, AgeDscAbr, AgeDir, AgeFon, AgeFax, AgeCto, AgeFecAdd, AgeTimAdd, AgeRuc, AgeFon2, AgeNex, AgeCelMov, AgeCelCla FROM agencias";
$insert = query_db($query_insert);
$row_insert = query_db_assoc($insert);
$totalRows_insert = query_db_num($insert);


?>

<form method="post" name="form1" id="creat" action="<?php echo $editFormAction; ?>">
  <div align="center"><?php echo $insert_Agency; ?>  </div>
  <table   align="center">
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $create_code_agency ?></td>
      <td><input type="text" name="AgeCdg"   onChange="makeUppercase('AgeCdg')"   id="AgeCdg" size="5">      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $namey ?></td>
      <td><input type="text" name="AgeDsc" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo$name_agency ?>:</td>
      <td><input type="text" name="AgeDscAbr" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $address ?></td>
      <td><input type="text" name="AgeDir" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $telephone ?>:</td>
      <td><input type="text" name="AgeFon" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $fax; ?>:</td>
      <td><input type="text" name="AgeFax" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $contact ?></td>
      <td><input type="text" name="AgeCto" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $tax_number ?></td>
      <td><input type="text" name="AgeRuc" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $telephone24 ?>:</td>
      <td><input type="text" name="AgeFon2" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $cellular1 ?></td>
      <td><input type="text" name="AgeNex" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $cellular2 ?></td>
      <td><input type="text" name="AgeCelMov" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo $cellular3 ?></td>
      <td><input type="text" name="AgeCelCla" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Submit"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
