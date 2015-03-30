<?php
include_once('config.php');
include_once('includes/functions.php');
	IF (!isset($_REQUEST['lang']))
		{
		$_REQUEST['lang'] = $langdefault;
		}
	IF (!isset($_GET['action']))
		{
		$_GET['action'] = 'Login';
		}
	include('language/'.$_REQUEST['lang'].'.php');


$the_user=$_POST['username'];
if ($the_user==''){ $the_user=$_GET['username'];}

$query = "	SELECT * FROM users	WHERE username = '".$the_user."' LIMIT 0,1";

			$result	      = query_db($query);
			$totaltickets = query_db_num($result);
			$row	      = query_db_array($result);

include_once('includes/top2.php');
?>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
  <table  class="encuadro" width="<?php echo $maintablewidth ?>" cellspacing="1" cellpadding="1"  align="<?php echo $maintablealign ?>">
    <tr>
      <td class="boxborder" width="50%" valign="top" style="padding-top:5px"><table  width="97%" cellspacing="1" cellpadding="1" class="boxborder" align="center">
          <tr>
            <td   class="boxborder text" colspan="2"><b>New Support Ticket - All Fields Required</b></td>
          </tr>
          <tr>
            <td bgcolor="#EEEEEE" class="boxborder text"><b>Account:</b></td>
            <td class="boxborder text"><?php echo $_SESSION['xcv_userna'] ?></td>
          </tr>
          <tr>
            <td bgcolor="#EEEEEE" class="boxborder text"><b>Name of user:</b></td>
            <td class="boxborder text"><input name="name" size="40" value="<?php echo $row['name'] ?>" /></td>
          </tr>
          <tr>
            <td bgcolor="#EEEEEE" class="boxborder text"><b>Email:</b></td>
            <td class="boxborder text"><input name="email" size="40" value="<?php echo $row['email'] ?>" />
            <input name="admin" type="hidden" id="admin" value="<?php echo $row['username'] ?>"></td>
          </tr>
          <tr>
            <td bgcolor="#EEEEEE" class="boxborder text"><b>Subject:</b></td>
            <td class="boxborder text"><input name="ticketsubject" size="40"

<?php
			IF (isset($_POST['ticketsubject']) && $_POST['ticketsubject'] != '')
				{
				echo ' value="'.$_POST['ticketsubject'].'"';
				}
?>

					></td>
          </tr>
          <tr>
            <td bgcolor="#EEEEEE" class="boxborder text"><b>Department:</b></td>
            <td class="boxborder text"><select name="category">
                <?php

			$query = "	SELECT tickets_categories_id, tickets_categories_name

					FROM tickets_categories

					ORDER BY tickets_categories_name ASC";



			$result = query_db($query);



			WHILE ($row = query_db_array($result))

				{

				echo '<option value="'.$row['tickets_categories_id'].'|'.$row['tickets_categories_name'].'">'.$row['tickets_categories_name'].'</option>';

				}

?>
              </select>
            </td>
          </tr>
          <tr>
            <td bgcolor="#EEEEEE" class="boxborder text"><b>Urgency:</b></td>
            <td class="boxborder text"><select name="urgency">
                <?php
					
 $query = "	SELECT b.color,b.id,b.order,b.name
					FROM tickets_levels	as b ORDER BY b.order ASC";					
					
			$result = query_db($query);
			WHILE ($row = query_db_array($result))
				{
				echo '<option style="background-color:#'.$row['color'].'" value="'.$row['id'].'|'.$row['name'].'">'.$row['name'].'</option>';
				}
?>
            </select></td>
          </tr>
        </table>
          <div style="padding-top:5px"></div>
          <table width="97%" cellspacing="1" cellpadding="1" class="boxborder" align="center">
            <tr>
              <td align="center"><textarea name="message" cols="80" rows="10">
<?php
			IF (isset($_POST['message']) && $_POST['message'] != '')
				{
				echo $_POST['message'].'</textarea>';
				}
			ELSE
				{
				echo '</textarea>';
				}
                ?>
					</textarea></td>
            </tr>
            <tr>
              <td align="right"><input type="submit" value="Submit" /></td>
            </tr>
          </table>
          <div style="padding-top:5px"></div>
          <?php
	// ALLOW THE USERS TO ATTACH A FILE TO THE TICKET
			IF ($allowattachments == 'TRUE')
				{
				FileUploadForm();
				}
?>
          <span class="comment3">
          <?php
					FOR ($i = '0'; $i <= COUNT($allowedtypes) - 1; $i++)
					{
					echo $allowedtypes[$i].' , ';
					}
					echo '<BR>';				
				
				?>
          </span><br /></td>
      <td class="boxborder" width="50%" valign="top" style="padding-top:5px"><table width="97%" cellspacing="1" cellpadding="1" class="boxborder" align="center">
          <tr>
            <td class="text"><br /></td>
          </tr>
          <?php
	// IF ATTACHMENTS ARE TRUE THEN SHOW ALLOWED FILETYPES
			IF ($allowattachments == 'TRUE')
				{
?>
          <tr>
            <td class="text"><br />
            </td>
          </tr>
          <tr>
            <td class="text">&nbsp;</td>
          </tr>
          <tr>
            <td class="text">&nbsp;</td>
          </tr>
          <?php

				}

?>
        </table>
          <br />
          <input name="registernow" type="hidden" id="registernow" value="1">
      </td>
    </tr>
  </table>
</form>