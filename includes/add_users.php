<script src="includes/jquery.js"></script>
<script src="includes/jquery.validate.js"></script>

  <script>
  


 
$(document).ready(function(){
    $("#formu1").validate({
    
    rules: {
    	username: {
    		required: true,
    		minlength: 4
    	       },
			   password: {
    		required: true,
    		minlength: 4
    	       },
		   name: {
    		required: true,
    		minlength: 4
    	       }
		,email: {
			required: true,
			minlength: 1,
			email: true
		         }
        ,company: {
		        required: true,
               minlength: 1
		         }
		
	},
    messages: {
	
    	username: {
    		required: "Min 4 digits abcd",	minlength: jQuery.format(" {0}.")
    	      },
			  password: {
    		required: "Min 4 digits ****",	minlength: jQuery.format(" {0}.")
    	      },
			  name: {
    		required: "Min 4 digits abcd",	minlength: jQuery.format(" {0}.")
    	      }
		      ,email: "Invalid email."
			  ,company:" Sel Tour Operator"
		
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

$maxRows_Recordset1 =$users_display; //Number of results per page
$pageNum_Recordset1 = 0;
$currentPage = $_SERVER["PHP_SELF"];
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1']; 
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
$_SESSION['start']=$startRow_Recordset1+1;
$_SESSION['end']= $currentPage*$maxRows_Recordset1  + $totalRows_contenido;
?>
<link href="styles.css" rel="stylesheet" type="text/css">

  <span class="mio">
  </span>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=ad_user2" method="post" name="formu1" id="formu1">
  <p>&nbsp;</p>
  <table width="1000" cellpadding="1" cellspacing="1" align="center">
    <tr>
      <td><strong><strong><?php echo  $adduser;?></strong></strong></td>
    </tr>
    <tr>
      <td><label for="name"><?php echo $text_regname ?></label>        <input name="name" size="20"/>        
      <p>
             <label for="username"><?php echo $text_username ?></label>
             <span class="red2">
             <input name="username" id="username" size="20">	  	   
             </span></p>        
      <p>
	  	       
  	        <label for="password">Password:</label>
            <input name="password" type="password" size="20">
        </p>
        <label for="email">Email:</label>        
        <span class="red2">
        <input name="email" class="red2" size="20">
        </span>        <p>
             <label for="website">Website(optional) </label>:        
             <input name="website" type="text" id="website" size="20">
        </p>        <p>
		      <label for="company"> <?php echo $name_agency ?>	</label>
                 <select name="company" id="company">              
              <?php
			 $query_agency = "SELECT * FROM agencias ";
$agency = query_db($query_agency);
$row3x = query_db_assoc($agency);
$totalRows_agency = query_db_num($agency);
			 do { ?>
              <option value="<?php  echo $row3x['AgeCdg']; ?>" <?php if (!(strcmp($row3x['username'], $row['assigned_to'] ) ) ) {echo "SELECTED";} ?>><?php echo $row3x['AgeDsc']; ?></option>
              <?php } while ($row3x=query_db_assoc(	$agency)); ?>
			  <option value="-1"selected >&nbsp;</option>
                </select>
                 <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=insert_agency"><img src="images/new_record.jpg" width="16" height="16" border="0"></a> </p>        
        <p>
	      <label for="comments"><?php echo $text_notes ?></label>        
        <p>          <textarea name="comments" cols="50" rows="2" id="mail"></textarea>
      </td>
    </tr>
	  <tr>
      <td align="center">	    <p align="left"> Select type: 
	      <label>
          <input name="type" type="radio" value="User" checked>
            User</label>
          <label>
          <input type="radio" name="type" value="Mod">
          Staff member          </label>
          <label>
          <input type="radio" name="type" value="Admin">
          Admin</label>
        </p></td>	 
    </tr><tr>	 
      <td align="center">&nbsp;
      </td>
    </tr>
    <tr>
      <td align="center"> <input name="newuser" type="hidden" id="newuser" value="1">      </td>
    </tr>

    <tr>
      <td>
        <input type="submit" name="userform" value="Submit" />
        <br></td>
    </tr>
  </table>  
</form>
<p>&nbsp;</p>