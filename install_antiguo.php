<?php
$step2='FALSE';
$step3='FALSE';
$stepA='FALSE';
include('includes/config.lib.php');
if (  isset($_GET['action']  ) )
{   
		if ($_GET['action']=='change_database')
		{
		$step3='TRUE';
		include('configuration.php'); //to read current values and shown on the form
		} //=======
		
		if ($_GET['action']=='change_database2')
		{
		$c = new config();
	$c->config_setNewFile('configuration.php');
	$c->config_openFile();
	
    if(    isset($_POST['host']  ) and  ($_POST['host']<>'')   )
	{
	$c->config_set('host',$_POST['host']);
	$c->config_set('user',$_POST['user']);
	$c->config_set('pass',$_POST['pass']);
	$c->config_set('data',$_POST['data']);
	$c->config_closeFile();
	}
	if ( $_POST['admin_user']<>''  )
	  include('configuration.php');
	{ 	$conn = mysql_connect(  $host,$user,$pass ); 
	    $password=$_POST['admin_pass'];
	    $user=$_POST['admin_user'];	
	    mysql_select_db($data,$conn);
	
	$sql = "DELETE FROM users  WHERE admin='Admin' and status='1'";	
    $result=mysql_query($sql,$conn);
	
	$sql = "DELETE FROM users  WHERE username='$user' ";	
    $result=mysql_query($sql,$conn);
	
	$sql = "INSERT INTO  users (name,username,password,admin,status)
	 values ('The Administrator','$user','$password','Admin','1')";	
    $result=mysql_query($sql,$conn);
    if( !$result ) 
    echo mysql_error( $result ); 
    else { 
    print "New administrator added : $user\n"; 
    }
	} //END of creating an administrator

		
		$stepA='TRUE';		
		} //=======

        
		if ($_GET['action']=='settings')
         {//&&&&&&&&
		 $step2='TRUE';

	//include('includes/config.lib.php');
	$c = new config();
	$c->config_setNewFile('configuration.php');
	$c->config_openFile();
	$c->config_set('sitename',$_POST['sitename']);
	$c->config_set('siteurl',$_POST['siteurl']);
	$c->config_set('allowattachments',$_POST['allowattachments']);
	$c->config_set('uploadpath',$_POST['uploadpath']);
    $c->config_set('maxfilesize',$_POST['maxfilesize']);
    $c->config_set('logo_url',$_POST['logo_url']);
    $c->config_set('langdefault',$_POST['langdefault']);  
	$c->config_set('dformat',$_POST['dformat']);
    $c->config_set('host',$_POST['host']);
    $c->config_set('user',$_POST['user']);
    $c->config_set('pass',$_POST['pass']);
    $c->config_set('data',$_POST['data']);
    $c->config_set('delete_tickets',$_POST['delete_tickets']);
    $c->config_set('rate_responses',$_POST['rate_responses']);
    $c->config_set('users_display',$_POST['users_display']);
    $c->config_set('tickets_display',$_POST['tickets_display']);	
    $c->config_set('sendmethod',$_POST['sendmethod']);
    $c->config_set('smtpauth',$_POST['smtpauth']);
    $c->config_set('socketfrom',$_POST['socketfrom']);
    $c->config_set('socketfromname',$_POST['socketfromname']);
    $c->config_set('smtpauthuser',$_POST['smtpauthuser']);
    $c->config_set('smtpauthpass',$_POST['smtpauthpass']);
    $c->config_set('footer',$_POST['footer']);
   $c->config_set('emailclose',$_POST['emailclose']);
   $c->config_set('emailuser1',$_POST['emailuser1']);
   #write changes to file
  $c->config_closeFile();
  
  include_once("includes/iam_restore.php");
  #####################################################################################################################
  #  Set the parameters: backup_file, hostname, databasename, dbuser and password                                     #
  # (must have SELECT, INSERT, DELETE permission to the mysql DB)                                                     #
  #####################################################################################################################
   $restore = new iam_restore('dump.sql',$_POST['host'], $_POST['data'], $_POST['user'], $_POST['pass']);
   $restore->perform_restore();         
		 }//&&&&&&&
		 

}

 ?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Setup e-Tour</title>
<link href="includes/styles.php" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo1 {color: #8A8A8A}
.Estilo2 {color: #3333FF}
.Estilo4 {color: #8A8A8A; font-weight: bold; }
body {
	margin-left: 100px;
	margin-top: 5px;
	margin-right: 5px;
	margin-bottom: 5px;
	background-image: url(images/bg_setup.jpg);
}
-->
</style>
</head>
<body>
  <?php 

if ($stepA=='TRUE')
{
?>
  <h2 class="Estilo1">e-tour</h2>
  <h2 class="menu57">Installation Step 3 of 3</h2>
<p>New settings were saved. </p>
<table width="41%"  border="0" cellspacing="0" class="report">
  <tr>
    <td><ul>
      <li><a href="./index.php">Login</a></li>
    </ul>      </td>
  </tr>
</table>
<p>
  <?php 
exit; }
?>
  <?php 

if ($step3=='TRUE')
{
?>
</p>
<h2 class="Estilo1"><span class="content"><img src="images/logo-facil-helpdesk.png" width="100" height="30"></span> Maintenance Step 1 of 2</h2>
<table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	<fieldset>
    <span class="content">
    <legend> Mysql database</legend>
    </span>
    <p><span class="text">Restore settings of database, if the tickets  system still doesn't works then these values are wrong.</span></p>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=change_database2" method="post" name="form2">
    <p><label for="host">Host</label><input type="text"   name="host" id="host" value="<?php echo $host; ?>" size="20"><BR></p>
    <p><label for="username">Username</label><input name="user" type="text"  id="user" value="<?php echo $user; ?>" size="20"></p>
     <p><label for="password">Password</label><input name="pass" type="text"  id="pass" value="<?php echo $pass; ?>" size="20"></p>
     <p><label for="database">Database</label><input name="data" type="text"  id="data" value="<?php echo $data; ?>" size="20"></p>
     <p>&nbsp;</p>
     <span class="content">
	<legend></legend>
	<legend></legend>
	<legend></legend>
	<legend></legend>
	<legend>Reset current administrator ( fill only if you need a new user and password)</legend>
    </span>
	<label for="admin_user">Create an Administrator</label>
    <p>
      <input name="admin_user" type="text"  class="red2" id="data" size="40">
    </p>
    <p>&nbsp;	    </p>
    <label for="admin_pass">New Password for Administrator</label>
    <input name="admin_pass" type="password"  class="red2" id="data" size="40">
	<span class="comment3">Leave empty if you wat to preserve your user and password.
	</span>
	<input type="submit" name="Submit" value="Submit">
	</form>    
    <p></p>
    </fieldset>
    </td>
  </tr>
  <tr>
    <td class="comment2"><p>If after of doing changes login isn't posible, check values. <BR>Create <span class="red2"><strong>an empty  file: configuration.php  if it doesn't exits</strong></span>. To save settings. </p>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<p><a href="./index_admin.php">Administrative Area</a> (admin and staff members)</p>
<p><a href="./index.php"> Users Area </a></p>
<?php
exit;
}
?>
<?php 

if ($step2=='TRUE')
{
?>
<link href="includes/styles.php" rel="stylesheet" type="text/css">
<h2 class="Estilo1">Facil HelpDesk</h2>
<h2 class="menu57">Installation Step 2 of 3</h2>
<table width="90%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <span class="content">
      <legend>Creating a new Administrator (if one exists he will be deleted) </legend>
      </span>
        <form name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=change_database2">        
        <label for="admin_user">Create an Administrator</label>
        <input name="admin_user" type="text"  class="red2" id="data" size="20">
       <label for="admin_pass"></label>
       <label for="admin_pass">Password</label>
<input name="admin_pass" type="password"  class="red2" id="data" size="20">       
        <input type="submit" name="Submit" value="Submit">
      </p>
        </form>     
   </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p class="Estilo1">&nbsp;</p>
<?php
exit;
}

?>
<?php 

if ($step3=='TRUE')
{
?>
<h2 class="Estilo1">Facil HelpDesk</h2>
<h2 class="Estilo1">Installation Step 3 of 3<span class="Estilo2"> </span></h2>
<p>The installation was completed. </p>
<p><a href="./index_admin.php">Administrative Area</a> (admin and staff members), use: <strong>admin</strong> , password: <strong>admin</strong></p>
<p><a href="./index.php"> Users Area </a></p>
<?php
exit;
}

?>
<h2 align="center" class="Estilo2"><span class="menu6">Welcome to the Installation <img src="images/logo-facil-helpdesk.png" width="100" height="30"></span></h2>
<p class="Estilo1">Read <a href="readme.txt">Readme.txt</a>, <a href="includes/FacilHelpDesk.pdf"> Manual</a> (requires Acrobat Reader)</p>
<p class="Estilo1"><strong>Backup  your database before of doing any action! </strong></p>
<p><strong>Step 1:</strong> New tables will be created  for a  new installation when you click Submit.</p>
<h4 align="center"><span class="red2"><strong> <img src="images/danger.gif" width="16" height="16" border="0"> If these tables exists in your database those will be overwriten and your data lost!</strong></span></h4>
<p><strong>Step 2 and 3:</strong> An administrator will be created</p>
<p>If you only want to change Database or reset administrative user click <a href="install.php?action=change_database">here</a>. </p>
<p><span class="Estilo4"> Step 1 of 3</span></p>
<p><span class="text">Fill every field of the Form, specially</span><span class="red2"> fields of Mysql Database</span><span class="text"> and E-email. Click Submit</span><span class="red2"><strong>,</strong></span> a configuration file will be created and new tables will be created inside your Database. </p>
<p></p>
<?php
$authz='TRUE';
include('includes/the_settings.php');
 ?>
<p class="text">If the installation fails creating tables, execute <strong>dump.sq</strong>l from PhpMyadmin, in this current folder must exists <strong>configuration.php</strong> with write permissions. 
</p>
</body>
</html>
