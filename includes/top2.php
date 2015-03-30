<?php
if ($authz<>'TRUE') exit;
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="includes/styles.php" type=text/css rel=stylesheet>
<link href="styles.php" rel="stylesheet" type="text/css">
<script>
function countDown2()
{        try
         { countDown();}
         catch(e) {}
         finally {}
}

</script>
</head>
<BODY  onLoad="countDown2()">
<table width="100%" border="0" align="<?php echo $maintablealign ?>" cellpadding="0" cellspacing="0" class="boxbordertop">
  <tr>
    <td height="69" colspan="4" rowspan="2" class="boxborder"><form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=home" method="post">
      <span class="text"></span>        
      <table width="100%"  align="right">
          <tr valign="top">
            <td width="29%" rowspan="2"  class="comment2"><span class="text">
              <?php if ($logo_url<>''){ ?>
              <img src="<?php echo $logo_url;  ?>"  longdesc="Facil Help Desk"alt="<?php echo $logo_url; ?>">
              <?php } ?>
            </span><?php echo  $last_msg;?><span class="text">            </span></td>
            <td colspan="2"  align="right" class="comment3">Search  tickets:
                <input name="keywords" size="15" onfocus="javascript:this.value=''" value="Search" />
                <select name="type_search" id="type_search">
                  <option value="0">Body</option>
                  <option value="1">Subjet</option>
                  <option value="2">Username</option>
                  <option value="3">* prev.</option>
              </select>
              Or open ticket:
              <input name="the_ticket" id="the_ticket" onfocus="javascript:this.value=''" value="-1" size="5" />
                <input type="submit" value="Search" />
            &nbsp;</td>
          </tr>
          <tr valign="top">
            <td  class="text" > <?php echo '<BR>'.$sitename; ?></td>
            <td  class="text" >&nbsp;</td>
          </tr>
        </table>
    </form></td>
    <td width="20%"   valign="top" class="boxborder text44" style="padding-right:15"><span class="comment3">User:
          <?php 
		echo $_SESSION['xcv_userna'];		
		?>
      </span>
        <?php  
		if (user_level2()>0) $comodin='2';
		user_level(); 
	  echo '<BR>';
	  if ($online=='TRUE')
	   echo 'Online';
	   else 
	   echo 'Offline';
	  ?>
    </td>
  </tr>
  <tr>
    <td   valign="top"  style="padding-left:20px" ><span  style="padding-left:20px" ><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=home&amp;action=Logout"><img src="images/signout.png" width="16" height="16" border="0"><?php echo $text_titlelog ?></a></span></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="<?php echo $bgcolor; ?>">
  <tr>    
    <td class="menu56"><a href="quote.php"><?php echo $come_back ?></a></td>
    <td class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=home&amp;order=1&new=1"><?php echo $messages_open ?></a></td>
    <td class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=home&amp;order=0"><?php echo 		$messages_closed; ?></a></td>


	    <td class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=create"><?php echo     $newticket; ?></a></td>    
	<td class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=home&order=2&new=1"><?php echo $text_titlehold ?></a></td>
	<td class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=users"><?php echo $the_users; ?></a></td>
    <?php if (is_admin()===TRUE) { ?>
	<td class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=departaments"><?php echo $departaments; ?></a></td>
    <td class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=priorities"><?php echo $text_listurg; ?></a></td>
    <td class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=control"><?php echo $settings; ?></a></td>
    <td class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=reports"><?php echo $reports; ?></a></td>
	<?php } ?>
    <td class="menu56">&nbsp;</td>
    <td class="menu56">&nbsp;</td>
  </tr>
</table>
