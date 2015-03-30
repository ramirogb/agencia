<?php
if ($authz<>'TRUE') exit;
	include_once('config.php');
	include_once('includes/functions.php');
?>
<span class="boxborder text"></span>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];  ?>?action=create2">
  <p class="boxborder text"><?php echo $select_a_user;?>&nbsp; </p>
  <p class="boxborder text">
    <select name="username" id="username">
      <?php

			$query = "	SELECT name, username, email,AgeDsc

					FROM users,agencias where users.AgeCdg=agencias.AgeCdg";


			$result = query_db($query);



			WHILE ($row = query_db_array($result))

				{
                       
				echo '<option value="'.$row['name'].'">'.$row['email'].' =>'.$row['AgeDsc'].'</option>';

				}

?>
    </select>
    <input type="submit" name="Submit" value="Select">
      
</p>
</form>
