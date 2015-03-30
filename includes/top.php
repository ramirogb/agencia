<?php
if ($authz<>'TRUE') exit;
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<link href="includes/styles.php" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<table width="100%" cellpadding="0" cellspacing="0" bgcolor="<?php echo $bgcolor; ?>" class="boxbordertop">
  <tr>
    <td width="83%" height="55"  valign="top" bgcolor="<?php echo $bgcolor; ?>" class="boxborder text">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="52"><form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=home" method="post">
          <table width="98%" align="right" cellpadding="1" cellspacing="1">
            <tr>
              <td width="575" rowspan="2"  class="text"><span class="comment2"><?php if ($logo_url<>''){ ?><img src="<?php echo $logo_url;  ?>"  longdesc="Facil Help Desk"alt="<?php echo $logo_url; ?>"><?php } echo $last_msg;?></span>                  </td>
              <td width="424" align="right" valign="bottom"  style="padding:2px">Search your tickets:
                  <input name="keywords" size="24" onfocus="javascript:this.value=''" value="Search Ticket Subject, question" />
                  <input type="submit" value="Search" />
              </td>
            </tr>
            <tr>
              <td   style="padding:2px"><?php	echo '<BR>'.$sitename; ?></td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table>	
    </td>
    <td width="17%"  style="padding-right:15" class="boxborder text"><div align="right"><span >User:
            <?php 
		echo $_SESSION['xcv_userna'];
		?>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=profile"><?php echo $profile; ?></a></span></div></td>
  </tr>
</table>
<?php if ( $userww<>'Unregistered'){ ?>
<table width="100%" cellspacing="0" cellpadding="0" class="menu56">
  <tr>
    <td width="11%" bgcolor="<?php echo $background ?>"  class="menu56" ><a href="quote.php"><?php echo 	$come_back ?></a></td>
    <td width="10%" bgcolor="<?php echo $background ?>" ><span class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=home"><?php echo $messages_open; ?></a></span></td>
    <td width="8%" class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=create"><?php echo $newticket; ?></a></td>
    <td width="13%" class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=home&amp;order=0"><?php echo $messages_closed ?></a></td>
	    <td width="10%" class="menu56"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=home&amp;order=5"><?php echo $text_titlehold ?></a></td>
    <td class="menu56" width="5%"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=home&amp;action=Logout"><?php echo $text_titlelog ?></a></td>
    <td class="menu56" width="13%">&nbsp;</td>
    <td class="menu56" width="30%">&nbsp;</td>
  </tr>
</table>

<?php } ?>