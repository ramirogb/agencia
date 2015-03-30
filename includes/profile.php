<?php
if ($authz<>'TRUE') exit;
      $query = "	SELECT * FROM users
						WHERE  username = '".$_SESSION['xcv_userna']."'
						LIMIT 0,1";
			$result	      = query_db($query);
			$totaltickets = query_db_num($result);
			$row	      = query_db_array($result);
?>
<form enctype="multipart/form-data" action="./tickets.php?action=sprofile" method="post">
  <table cellspacing="1" cellpadding="1" class="boxborder" align="<?php echo $maintablealign ?>">
    <tr>
      <td class="boxborder" width="50%" valign="top" style="padding-top:5px"><table cellspacing="1" cellpadding="1" class="boxborder" align="center">
          <tr>
            <td colspan="2"   class="text">&nbsp;&nbsp;</td>
          </tr>
          <tr bgcolor="#E5EEF9">
            <td   class="text" colspan="2"><b>My profile</b></td>
          </tr>
          <tr>
            <td width="16%"  class="text"><b>Username:</b></td>
            <td class="text"><?php echo $_SESSION['xcv_userna'] ?></td>
          </tr>
          <tr>
            <td  class="text"><b>Name:</b></td>
            <td class="text"><input name="name" size="40" value="<?php echo $row['name'] ?>" /></td>
          </tr>
          <tr>
            <td  class="text"><b>Email:</b></td>
            <td class="text"><input name="email" size="40" value="<?php echo $row['email'] ?>" /></td>
          </tr>
          <tr>
            <td  class="text"><b>Website:</b></td>
            <td class="text"><input name="website" id="website" value="<?php echo $row['email'] ?>" size="40" maxlength="70"

<?php
			IF (isset($_POST['ticketsubject']) && $_POST['ticketsubject'] != '')
				{
				echo ' value="'.$_POST['ticketsubject'].'"';
				}
?>

					></td>
          </tr>
          <tr>
            <td class="text"><b>Company:</b></td>
            <td class="text"><input name="company" id="company" value="<?php echo $row['company'] ?>" size="40"


					></td>
          </tr>
          <tr>
            <td  class="text"><b>Password:</b></td>
            <td class="text"><input name="password_here_etour" type="password" id="password_here_etour" value="<?php echo $row['password'] ?>" size="40"


					> 
            <?php echo $chan_password; ?></td>
          </tr>
          <tr>
            <td  class="text">&nbsp;</td>
            <td class="text">&nbsp;</td>
          </tr>
        </table>
          <div style="padding-top:5px"></div>
          <table width="97%" cellspacing="1" cellpadding="1" class="boxborder" align="center">
            <tr >
              <td class="text">&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><span class="text">
                <input name="profile" type="hidden" id="profile" value="1">
              </span></td>
            </tr>
            <tr>
              <td align="right"><div align="left">
                <input type="submit" value="Update" />
              </div></td>
            </tr>
          </table>
          <div style="padding-top:5px"></div>
          <br /></td>
    </tr>
  </table>
</form>
