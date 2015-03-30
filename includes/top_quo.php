<?php
if ($authz<>'TRUE') exit;
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="includes/jquery.min.js"></script>
<script type="text/javascript" src="includes/pay.js"></script>
<script type="text/javascript">
    $(function() {
        $('.delete').click(function() {
            var answer = confirm("<?php echo $are_you_sure ?>")
            if (answer){
                return true;
            }
            else{
                return false;
            };
        });
    });
</script>
<script >
function makeUppercase(control)
 {
document.getElementById(control).value=document.getElementById(control).value.toUpperCase();

}</script>
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
      <span class="text"> </span>        
      <table width="99%"  align="right">
          <tr valign="top">
            <td width="36%" rowspan="2"  class="comment2"><span class="text">
              <?php if ($logo_url<>''){ ?>
              <a href="http://www.planettravel.pe"><img src="<?php echo $logo_url;  ?>"alt="<?php echo $logo_url; ?>" border="0"  longdesc="Facil Help Desk"></a>
              <?php } ?>
            </span><?php echo $last_msg; ?><span class="text">            </span></td>
            <td colspan="2"  align="right" class="comment3">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td width="42%"  class="text" > <?php echo '<BR>'.$sitename; ?></td>
            <td width="22%"  class="text" ><a href="quote.php?action=dashboard">Dashboard</a></td>
          </tr>
        </table>
    </form></td>
    <td width="25%"   valign="top" class="boxborder text44" style="padding-right:15"><span class="comment3">User:
      <?php if (user_level2()>0) $comodin='2';
		echo $_SESSION['xcv_userna'];		
		?> 
    </span>
      <?php  user_level(); 
	  
	  echo '<BR>';
	  if ($online=='TRUE')
	   echo 'Online';
	   else 
	   echo 'Offline';
	  ?>
    </td>
  </tr>
  <tr>
    <td height="37"   valign="top"  style="padding-left:20px" ><a href="tickets<?php echo $comodin ?>.php?action=home&action=profile"><img src="images/profile.png" width="16" height="16" border="0"><?php echo $profile ?></a></span> <span  style="padding-left:20px" ><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=home&amp;action=Logout"><img src="images/signout.png" width="16" height="16" border="0"><?php echo $text_titlelog ?></a></span></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0"   align="<?php echo $maintablealign ?>"  cellspacing="0" bgcolor="<?php echo $bgcolor; ?>">
  <tr>    
    <td width="10%" <?php  if ($_GET['m']=='0') $w0='_'; ?>  class="menu56<?php echo $w0 ?>"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=home&m=0"><?php echo$text_titleclo; ?></a></td>
<?php if (is_admin()===FALSE) { ?>	    
		<td width="10%"  <?php  if ($_GET['m']=='3') $w3='_'; ?> class="menu56<?php echo $w3 ?>"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=history&m=3"><?php echo $text_history ?></a></td>
	<?php } ?>
	    <td width="9%"  <?php  if ($_GET['m']=='2') $w2='_'; ?> class="menu56<?php echo $w2 ?>"><a href="tickets<?php echo $comodin ?>.php"><?php echo 	$messages ?></a></td>
    <?php if (is_admin()===TRUE) { ?>
	    <td width="7%"  <?php  if ($_GET['m']=='5') $w5='_'; ?> class="menu56<?php echo $w5 ?>"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=reports&m=5"><?php echo $reports; ?></a></td>
	<td width="11%"  <?php  if ($_GET['m']=='4') $w4='_'; ?> class="menu56<?php echo $w4 ?>"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=control&m=4"><?php echo $settings; ?></a></td>
	<?php } ?>
    <td width="8%" class="menu56"><a href="./includes/manual.doc.pdf"><?php echo $text_help; ?></a></td>
    <td width="45%" class="menu56"><a href="#"> </a></td>
  </tr>
</table>
