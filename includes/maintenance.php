<?php
if ($authz<>'TRUE') exit;
?>
<SCRIPT LANGUAGE="Javascript" SRC="includes/ColorPicker2.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
var cp = new ColorPicker('window'); // Popup window
var cp2 = new ColorPicker(); // DIV style
</SCRIPT>
<?php 
include('configuration.php');
?>
<link href="styles.php" rel="stylesheet" type="text/css">
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
<p><?php 
global $repara;
if ($repara=='consistence')//comes from the form
{
$q = "SELECT count(DISTINCT(tickets_tickets.tickets_id))FROM tickets_tickets,tickets_categories
   WHERE tickets_tickets.tickets_category   not IN (SELECT tickets_categories.tickets_categories_id FROM tickets_categories )";   
   $result = query_db($q);
   $rr= query_db_row($result);
   $invalid_tickets=$rr[0];
}   

if ($repara=='assign')
{
$dep=trim($_POST['departament']);
$query = "UPDATE tickets_tickets set tickets_tickets.tickets_category =$dep WHERE tickets_tickets.`tickets_category` Not in(SELECT tickets_categories.tickets_categories_id FROM tickets_categories)";
 $result = query_db($query);
$afected= query_affected_rows($result);
}


if ($repara=='consistencelevel')//comes from the form
{
$q = "SELECT count(DISTINCT(tickets_tickets.tickets_id))FROM tickets_tickets,tickets_levels
   WHERE tickets_tickets.tickets_urgency   not IN (SELECT tickets_levels.id FROM tickets_levels )";   
   $result = query_db($q);
   $rr= query_db_row($result);
   $invalid_tickets2=$rr[0];
}   

if ($repara=='assignlevel')
{
$dep=trim($_POST['departament']);
$query = "UPDATE tickets_tickets set tickets_tickets.tickets_urgency =$dep WHERE tickets_tickets.`tickets_urgency` Not in(SELECT tickets_levels.id FROM tickets_levels)";
 $result = query_db($query);
$afected2= query_affected_rows($result);
}


?>
</p>
<table style=" padding-left:4px " width="700" border="0" align="<?php echo $maintablealign ?>" cellpadding="0" cellspacing="0" class="tables">
  <tr>
    <td height="27" ><div align="center"><strong><img src="images/cp.png" width="54" height="46" align="middle"></strong></div></td>
    <td height="27" ><strong>Messages reparation</strong></td>
    <td height="27" >&nbsp;</td>
    <td width="135" >&nbsp;</td>
  </tr>
  <tr bgcolor="#AACCEE">
    <td height="27" colspan="2" bgcolor="#BFECFB" ><div align="center"></div>      <div align="center"><strong>Actions</strong></div></td>
    <td height="27" colspan="2" bgcolor="#BFECFB" >Invalid</span> messages/ reponses</td>
  </tr>
  <form name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=maintenance">
  <tr bgcolor="#EEEEEE">
    <td width="255" bgcolor="#EEEEEE" >
    Check messages/tickets and categories
      <input name="reparation" type="hidden" id="reparation" value="consistence"></td>
    <td width="307" bgcolor="#EEEEEE" ><input type="submit" name="sub" value="Check now" /></td>
    <td colspan="2" bgcolor="#EEEEEE" ><?php echo $invalid_tickets;?> </td>
    </tr>
  </form>
  <tr bgcolor="#EEEEEE">
    <td colspan="2" rowspan="2">
	<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=maintenance">
      <span >Assign tickets with invalid category to:
      <select name="departament"  id="departament">
        <?php			
	 $query57 = "	SELECT * from tickets_categories";	 
	 $result57 = query_db($query57);	
	 $row3=query_db_assoc( $result57); 

			 do { ?>
        <option value="<?php  echo $row3['tickets_categories_id']; ?>"><?php echo $row3['tickets_categories_name']; ?></option>
        <?php }
				 while ($row3=query_db_assoc(	$result57)); ?>
      </select>
      <input type="submit" name="sub" value="Assign" />
      <input name="reparation" type="hidden" id="reparation" value="assign">
</span></form></td>

    <td colspan="2" ><?php echo $afected; ?>&nbsp;</td>
  </tr>  
  <tr bgcolor="#EEEEEE">
    <td height="32" colspan="2" >&nbsp;</td>
  </tr>
    <form name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=maintenance">
  <tr bgcolor="#EEEEEE">
    <td width="255" bgcolor="#EEEEEE" >
    Check messajes  and urgency levels
      <input name="reparation" type="hidden" id="reparation" value="consistencelevel"></td>
    <td width="307" bgcolor="#EEEEEE" ><input type="submit" name="sub" value="Check now" /></td>
    <td colspan="2" bgcolor="#EEEEEE" ><?php echo $invalid_tickets2;?> </td>
    </tr>
  </form>
  <tr bgcolor="#EEEEEE">
    <td colspan="2" rowspan="2">
	<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=maintenance">
      <span >Assign messages/tickets with invalid urgency level to:
      <select name="departament"  id="departament">
        <?php			
	 $query57 = "	SELECT * from tickets_levels";	 
	 $result57 = query_db($query57);	
	 $row3=query_db_assoc( $result57); 

			 do { ?>
        <option value="<?php  echo $row3['id']; ?>"><?php echo $row3['name']; ?></option>
        <?php }
				 while ($row3=query_db_assoc(	$result57)); ?>
      </select>
      <input type="submit" name="sub" value="Assign" />
      <input name="reparation" type="hidden" id="reparation" value="assignlevel">
</span></form></td>

    <td colspan="2" ><?php echo $afected2; ?>&nbsp;</td>
  </tr>
  
  
  
  <tr bgcolor="#EEEEEE">
    <td colspan="2" >&nbsp;</td>
  </tr>  
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=maintenance" Method="post">
  </form>
</table>
<p>
  <?php ?>
</p>
<table style=" padding-left:4px " width="700" border="0" align="<?php echo $maintablealign ?>" cellpadding="0" cellspacing="0" class="tables">
  <tr>
    <td height="15" colspan="3" ><div align="center"></div>      <div align="center"><strong><img src="images/getupdate.png" width="54" height="46" align="middle"></strong></div></td>
    <td height="15" colspan="2" ><strong>Get updates </strong></td>
  </tr>
  <tr bgcolor="#BFECFB">
    <td height="37" bgcolor="#BFECFB" >&nbsp;</td>
    <td colspan="4" bgcolor="#BFECFB" >A compressed file will be downloaded to your server and your existing files will be overwriten, if the process fails or is interrumped your should restore missing files by FTP. </td>
  </tr>
  <tr bgcolor="#BFECFB">
    <td width="17" height="15" bgcolor="#BFECFB" >&nbsp;</td>
    <td width="183" colspan="-1" bgcolor="#BFECFB" >&nbsp;</td>
    <td colspan="2" bgcolor="#BFECFB" >Last version is:
    <?php 
	 $file = @fopen ("http://www.cromosoft.com/services/fhd.php?version=", "r");		
	//$file = fopen ("http://localhost/spp/fhd.php?version=", "r");			
if (!$file) {
    echo "<p>Unable to open remote file.\n"; 
}else
{
while (!feof ($file))
 {
    echo $line = fgets ($file, 1024);
}
}
	?></td>
    <td bgcolor="#BFECFB" >Get your installed version, here:<a href="./tickets2.php?action=control">settings</a></td>
  </tr>
  <tr>
    <td height="34" rowspan="2" >1.-</td>
    <td colspan="3" rowspan="2" >Get the last version 
      <form action="<?php echo $_SERVER['PHP_SELF'];  ?>?action=get_upd" method="post" enctype="multipart/form-data" name="form3">
        <input name="Submit" type="submit" value="Get Update">
        My Licence:
        <input name="xzpwd" type="text" id="xzpwd" value="<?php echo $licence; ?>" size="10">
        <input name="domx" type="hidden" id="domx" value="<?php echo $_SERVER['SERVER_ADDR'];?>">      
      </form>      </td>    
    <td width="328" >Log:</td>
  </tr>
  <tr>
    <td width="328" height="21" ><?php $_SESSION['gthy']; ?>      <?php echo $_SESSION['gthy2']; ?></td>
  </tr>
  <tr>
    <td height="34" >2.-</td>
    <td ><form name="form3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=get_upd2">
      <input type="submit" name="Submit" value="Install Update">
    </form></td>    <td colspan="3" >&nbsp;</td>
  </tr>
  <tr>
    <td height="34" >3.-</td>
    <td colspan="4" >Read the log
	<a href="includes/log.php" onclick="window.open('includes/log.php','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false">Now</a></td>
  </tr>
  <tr>
    <td height="45" >&nbsp;</td>
    <td colspan="4" ><p>If you are unable to update and your licence still is valid for getting updates please contact us at:</p>
    <p><a href="www.cromosoft.com/helpdesk%20">http://www.cromosoft.com/helpdesk </a></p></td>
  </tr>
  <form name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=maintenance">
  </form>
  <form name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=maintenance">
  </form>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=maintenance" Method="post">
  </form>
</table>
<p>  
  <SCRIPT LANGUAGE="JavaScript">cp.writeDiv()</SCRIPT>
</p>
