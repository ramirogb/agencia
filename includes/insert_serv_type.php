<script src="includes/jquery.js"></script>
<script src="includes/jquery.validate.js"></script> <script> $(document).ready(function(){
    $("#creat").validate({
    
    rules: {
    	code: {
    		required: true,
    		minlength: 2
    	       }
		,name: {
			required: true,
			minlength: 4
		         }
        
	},
    messages: {
	
    	code: {
    		required: "<?php echo $insert_code ?>",	minlength: jQuery.format(" {0}.")
    	      }
		      ,name: "Min 4."		  
		
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
$modali=$_POST['code'];

 begin_trans();
 


 
   $query = "	INSERT INTO servicios_variations
						SET
						kind     = '".$modali."',
						descript     = '".$_POST['name']."'";  
						$Result1 = query_db($query); 


	for  ($co=0;  $co <= 50; )
	{
			 if( isset($_POST['lang'][$co]))//is checked then exists value
			 {
			 $langua=$_POST['len'][$co];
	 $query3x4 = "INSERT INTO type_lang	SET  tipe = '$modali',lang='$langua'";	
		    $result3x4 = query_db($query3x4);
			}
	 $co++;		
	}

end_trans();


}
?>

<form method="post" name="form1" id="creat" action="<?php echo $editFormAction; ?>">
  <div align="center"><?php echo$insert_Catalog ?>  </div>
  <table align="center">
    <tr valign="baseline">
      <td nowrap   class="text" align="right"><?php echo $insert_code ?></td>
      <td  ><input name="code" type="text"   onChange="makeUppercase('code')" id="code" size="5">
       3- 5 char.</td>
    </tr>
    <tr valign="baseline">
      <td nowrap   class="text" align="right"><?php echo$text_regname ?></td>
      <td><input name="name" type="text" id="name" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><span class="text">
        <?php 
  
  	$queryggf = " SELECT * from  languajes	";	
 	$result578f = query_db($queryggf);	
	$row3x8=query_db_assoc( $result578f);

  include('langu.php');
   ?>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Submit"></td>
    </tr>
  </table>
  
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
