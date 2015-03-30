<?php
include_once('config.php');
include_once('check.php');
include_once('includes/functions.php');


if ($_GET['action']=='screen')
{

				 
				  //$screenres = $_COOKIE['screenresolution'];} else {
				  ?>
				<script language="javascript">
				writeCookie();function writeCookie() {    var enddate = new Date("December 31, 2060");
				document.cookie = "screenresolution="+ screen.width +";expires=" + enddate.toGMTString();
				//window.location.replace("<?= $_SERVER['PHP_SELF'] .'?'.$_SERVER['QUERY_STRING']  ?>");
				 }
				 document.write(screen.width+'pixels');
				 </script>
				 <style type="text/css">
<!--
.Estilo1 {font-size: xx-small}
-->
                 </style>
				 
				 <p><a href="index.php">Continue</a></p>
				 <?php
exit;
}//end of ajust screen



if ( isset($_GET['lng'] )  )
{

setcookie('lang',$_GET['lng'],time()+ 31536000); $just_changed=true; }

if  (   (   isset($_COOKIE['lang'])  ) or ($just_changed==true)  )
{ //we overwrite the default settins
$langdefault=$_GET['lng'];
}


session_start();

function IsOnline()
{
global $online;

             if ($online=='FALSE')				 
				 {
				 include('includes/offline.php');
				 include('includes/bottom.php');				 
				 exit;
				 }


}

if ($_GET['action']=='trans')
{

 $jump_here="Location: ".'./quote.php?action=open&ticketid='.$_POST['ticketid'].'&key3='.$_POST['key3'];	      
  header($jump_here); 
exit;
}


if ( $_GET['action']=='activate')
{
  IsOnline();
   include('includes/EnDecryptText.php'); //encrypt.php
   $EnDecryptText = new EnDecryptText();
   	$cuenta = $EnDecryptText->Decrypt_Text($_GET['account']);
	 //$aaab=  'j8+tqQ=='; 
  $tiempo_saved=$EnDecryptText->Decrypt_Text( $_GET['gty5'] ); 
  $tiempo=time();
  
if ( $tiempo < $tiempo_saved)
   {  
    $query56 = " UPDATE users	SET status = '1' WHERE username   = '".$cuenta."'";
    $resultxx5 = mysql_query( $query56 );
	$_SESSION['stavv']='Dear: '.$cuenta.'Your account was activated';
	$_SESSION['hlast_state']='Your account was activated';
	}
	else
	{
	$_SESSION['stavv']='This account does not exists, or was not activated, create a new one and activate in 24 hours';
	$_SESSION['hlast_state']='This accout expired and was not activated, create a new one and activate in 24 hours';
	
	}
	 
	 $jump_here="Location: ".'./index.php';	      
     header($jump_here); 

}


if (   $_GET['action']=='send_login2'  )
{
IsOnline();
$query = "	SELECT *  FROM users		WHERE email = '".$_POST['email']."'  ORDER BY id DESC";
				$result = mysql_query($query);
								
					
				IF (mysql_num_rows($result) > 0)
					{
					if ( $sendhtml=='TRUE' )
                        { 
                        $separator='<BR>';
						 }
						else
						{
						$separator= chr(13).chr(10); // '\n\t'; 
						}
					
					
					$row = mysql_fetch_array($result);
					$message  = "Hello ".$row['name'].','.$separator;
					$message .= "Somebody requested your Account Details".$separator;
					$message .=  'From: '.$_SERVER['REMOTE_ADDR'].$separator;  
					$message .='______________________________'.$separator;
					$message .= "Username: ".$row['username'].$separator;
					$message .= "Password: ".$row['password'].$separator;
					$message .= "Regards ".$separator;
					$message .=$siteurl.$separator;					
					$message .= "Support ".$socketfromname.$separator;
					
			$_SESSION['hlast_state']=SendMail($_POST['email'],$row['name'],'Your Login information',$message).' To: '.$_POST['email'];

				 }
				 else
                 {
				 $_SESSION['hlast_state']='No user was found with that email '.$_POST['email'].' please create an account';			 
				 }

 $jump_here="Location: ".'./index.php';		 
 header($jump_here); 
 

} //End of send login details

if (  isset($_POST['name']) and  isset($_POST['password'] ) )
{
 {				 $_SESSION['xcv_userna'] = $_POST['name'];
				 $_SESSION['xcv_passw']  = $_POST['password'];
				 
				 if ($online=='FALSE')
				 {
				 include('includes/offline.php');
				 include('includes/bottom.php');				 
				 exit;
				 }
				 				 			 
				 setcookie('lang',$_POST['langdefault'],time()+ 31536000);
				 
				 check_login();
				 $lev=user_level2();
				 @include('includes/cookies_unique.php');
				 $jump_here="Location: ".'./quote.php';
				 
				 
				 
				 
				 
				 if ($lev>0)  $jump_here="Location: ".'./quote.php?action=dashboard';	
                 header($jump_here); 
                 exit;
}          

}
	
	IF (!isset($_REQUEST['lang']))
		{
		$_REQUEST['lang'] = $langdefault;
		}

			if  (   $just_changed==true )
			{ 
			$langdefault=$_GET['lng'];
			}
	
	$inc='language/'.$_REQUEST['lang'].'.php';	
	if (file_exists($inc)){	include($inc);}else 
	{ //$_REQUEST['lang'] = en$langdefault;
	$_REQUEST['lang'] = 'en';
	
	$inc='language/'.$_REQUEST['lang'].'.php';
	include($inc);	
		}

if  (  ($_GET['action']=='ad_user') and ($_POST['username']<>'')   )
{

   $query = "SELECT * FROM users WHERE username='".$_POST['username']."'";
		$result = mysql_query($query);
	if (  @mysql_num_rows($result)<1)
{//"""""""""

//echo $activa_by_email;
if ($activa_by_email=='TRUE')
{
$status='0';
include('includes/EnDecryptText.php'); //encrypt.php
$EnDecryptText = new EnDecryptText();
$cuenta = $EnDecryptText->Encrypt_Text( trim($_POST['username']) );
$tiempo=$EnDecryptText->Encrypt_Text( time()+86500 );

 $misma = $siteurl.'?action=activate'.'&account='.$cuenta.'&gty5='.$tiempo.'&limiteer=456ax';

 $enlace = '<a href="'.$misma.'">Activate now</a> ';

$message='Hello '.$_POST['newname'].
', visit this link to activate your account,
if the activation fails, try creating  another username. If you did not try to register ignore this email '
 .$enlace.'Una vez activada la cuenta, verificaremos su perfil y lo vincularemos a su Empresa ello podria tomar de uno a dos dias gracias'.$footer;
					
SendMail($_POST['email'],$row['name'], 'Activate your account',$message).' To: '.$_POST['email'];
  
//$email_confirm="Thanks, an email has been sent to you. Once you receive it, you'll need to confirm your registration clicking a link in 24hours.";
$activo=$email_confirm;
//echo 'estoy aqui';
}
else
{$status='1';
}

$opc1= eregi('^[a-zA-Z0-9._-]{4,16}$',$_POST['username'] ) ;
if (  $opc1==false) 
{ $_SESSION['error_username']='*** Invalid'; }
else
$_SESSION['error_username']='';

$opc2= eregi('^[a-zA-Z0-9._-]{4,16}$',$_POST['newpassword'] );
if ($opc2==false)
{  $_SESSION['error_password']='*** Invalid';
}
else
$_SESSION['error_password']='';

 if ( $opc1   and $opc2  )
 {


 
 $query = "	INSERT INTO users
						SET
						name     = '".$_POST['newname']."',
						username = '".$_POST['username']."',
						password = '".$_POST['newpassword']."',
						email    = '".$_POST['email']."',
						company    = '".$_POST['company']."',
						website    = '".$_POST['website']."',
						status   = $status,
						added = '".mktime()."',
						admin    = '".$_POST['type']."'";
		$result = mysql_query($query);
		$_SESSION['hlast_state']='New user created, sucessfully'.$activo;
		 $jump_here="Location: ".'./index.php';	
		 $_SESSION['errores']=false;
}
else
{ //invalid leng or caract extraños
$_SESSION['hlast_state']=$text_950.$text_951;
$jump_here="Location: ".'./index.php?action=fail_register';	
$_SESSION['errores']=true;

 $_SESSION['user_name']=$_POST['newname'];
 $_SESSION['user_name2']=$_POST['username'];
 $_SESSION['user_email']= $_POST['email']; 

}		

		$_GET['action']='';		
		 $_SESSION['stavv']='';
          header($jump_here); 
} //"""""""
else
   { 
 $jump_here="Location: ".'./index.php?action=fail_register';	
 $_SESSION['stavv']='This username exists: '.$_POST['username'].' choose another username';
 $_SESSION['user_name']=$_POST['newname'];
 $_SESSION['user_name2']=$_POST['username'];
 $_SESSION['user_email']= $_POST['email']; 
 
          header($jump_here); 

  }
		
}
?><LINK href="includes/styles.css" type=text/css rel=stylesheet>
<style type="text/css">
<!--
.Estilo2 {color: #0033FF}
.Estilo3 {color: #FFFFFF}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
//alert('esto');
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('Error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>

<?php

if (      !isset($_GET['action']) or ($_GET['action']=='login')          )
{
 ?>
<table width="50%" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><span class="text"><?php echo $_GET['action'];?></span></td>
  </tr>
</table>
<table  style="border-color: #8F97EF; border-width:1px; border-style:solid " width="50%" align="center" cellpadding="0" cellspacing="0" class="boxborder">

  <tr>
    <td width="27%" height="32"  valign="top"  bgcolor="<?php echo $bgcolor; ?>"  style="padding-top:4px "><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"><span class="text"><span class="comment2">
      <?php if ($logo_url<>''){ ?>
      <a href="http://www.planettravel.pe"><img src="<?php echo $logo_url;  ?>"alt="<?php echo $logo_url; ?>" hspace="2" vspace="2" border="0"  longdesc="Facil Help Desk"></a>
      <?php } echo $last_msg;?>
    </span></span></span></span>      </td>
    <td width="73%"  valign="top"  bgcolor="<?php echo $bgcolor; ?>"  style="padding-top:4px "><div align="center" class="man">
      <h5><a href="index.php?action=register"><?php if ($disable_registering<>'TRUE' )  { ?>
      </a><span class="Estilo3">
        <?php } ?></span> <a href="index.php?action=help">Help</a> <span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"><a href="index.php?action=register"><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"></span></a></span></h5>
    </div></td>
    <?php

		IF (isset($allowreg) && $allowreg == 'ON')

			{

?>
    <?php

			}

?>
  </tr>
  <tr bgcolor="#F5F5F5">
    <td colspan="2" class="mio"  style="padding:8; padding-top:15px; padding-left:20px"><span class="boxborder list-menu"></span>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <p>
		  <span class="text"><?php echo $text_username ?></span>:
          <input name="name" type="text" id="name" value="<?php echo $_COOKIE['Phtickets_username']; ?>">
          <span class="Estilo1">admin </span> </p>
          <p>
		  <span class="text"><?php echo $text_password ?>:</span>
          <input name="password" type="password" id="password" value="<?php echo $_COOKIE['Phtickets_password']; ?>"> 
          <span class="Estilo1">admindemo
          </span></p>
          <p>		  
          <input name="remember" type="checkbox" id="remember" value="1"<?php
		   if (  isset( $_COOKIE['Phtickets_username']) )
		   {		   
		   echo 'checked';
		   }
		   ?>>
          <span class="content"><?php echo $rememberme; ?><BR>
		  Locale: 
		  <select name="langdefault" id="langdefault">
		  <option value="es"<?php if (!(strcmp("es", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'Español'; ?></option>
            <option value="en"<?php if (!(strcmp("en", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'English'; ?></option>			
			<option value="fr"<?php if (!(strcmp("fr", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'French'; ?></option>
			<option value="fr"<?php if (!(strcmp("de", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'Deutsch'; ?></option>           
          </select>
          </span><span class="comment">current: <?php echo $_COOKIE['lang'];  ?></span></p>	  
          <p>
            <input type="submit" name="Submit" value="Submit">
            <input name="login" type="hidden" id="login" value="1">
          </p>
          <p><span class="menu5"></span> </p>
      </form>
        <p class="text"><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?lng=en"><span class="bottom"><img src="images/en.gif" width="16" height="10" border="0"></span></a> <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?lng=es"><span class="bottom"><img src="images/es.gif" width="16" height="10" border="0"></span></a> <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?lng=fr"><img src="images/fr.gif" width="16" height="10" border="0"></a></p>
        <p class="text"><a href="./index.php?action=send_login"><?php echo $text_resend ?></a></p>
    <p class="text"><a href="index.php?action=register">
      <?php 
	  if ($disable_registering<>'TRUE' )  echo $text_register;
	 ?>
    </a></p></td>
  </tr>
  <tr>
    <td colspan="2"  valign="top" bgcolor="#F5F5F5" class="mio"  style="padding:0">
      <DIV ID="oFilterDIV" STYLE="position: relative; height:30px; padding:1px; font:10pt verdana; background:<?php echo $bgcolor; ?>;
	  filter:progid:DXImageTransform.Microsoft.Alpha( Opacity=90, FinishOpacity=30, Style=2, StartX=40,  FinishX=90, StartY=50, FinishY=100);
	   left: 0px;"><span class="text" style="color: #FFFFFF"><a href="http://www.cromosoft.com">e-tour&copy; Cromosoft Technologies 2003-2010</a><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"><img alt="Facil HelpDesk" width="1" height="1" hspace="5" border="0" align="left"></span></span></span> <span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"> </span></span> </DIV>        </td>
  </tr>
  <tr>
    <td colspan="2" class="mio"  style="padding:0"><span class="textoconf">
      <?php
	echo $_SESSION['hlast_state'];
	 ?>
      <span class="text"> <a href="index.php?action=screen">Adjust Resolution</a></span> default 1200pixels </span></td>
  </tr>
</table>
<H4>Requerimientos del Sistema</H4>
<UL>
  <LI style="DISPLAY: none" id=firebugWarning>Firebug Disabled 
  <LI>Navegador de Internet Soportado (IE 8.0+, Firefox 3.0+, Safari 3.0+) 
  <LI>Cookies Habilitadas
  <LI>Javascript Habilitado</LI>
</UL>
<p>&nbsp;</p>
<?php
//@include('includes/bottom.php' ); 

}

?>
<?php
 if (  ($_GET['action' ]=='register') or  ($_GET['action' ]=='fail_register')  )
{
IsOnline();
 if (  $_GET['action' ]=='register')
 {
$_SESSION['error_username']='';
$_SESSION['error_username']=''; 
 }
	
	$_SESSION['stavv']='';
	
if ($_SESSION['errores']==false)	$_SESSION['hlast_state']='';

?>
<table width="10%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="60%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>?action=ad_user" method="post" name="form2" id="form2" onSubmit="MM_validateForm('newname','','R','username','','R','email','','RisEmail','newpassword','','R');return document.MM_returnValue" >
      <table width="100%" style="border-color: #8F97EF; border-width:1px; border-style:solid " align="center" cellpadding="1" cellspacing="1" bgcolor="#F5F5F5">
        <tr>
          <td bgcolor="<?php echo $bgcolor; ?>" class="text"><h4><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"><a href="http://www.planettravel.pe"><img src="<?php echo $logo_url;  ?>" alt="e-tours" border="0"></a></span> <?php echo $createaccount; ?>
          </span></h4></td>
        </tr>
        <tr >
          <td style="padding-top:10px" class="text"><span class="mio">
           <p>
            <label for="newname"><?php echo $text_regname; ?></label>
            <input name="newname" id="newname" value="<?php if ($_GET['action' ]=='fail_register')  echo $_SESSION['user_name'];  ?>" size="30">
            </p>
            <p>
              <label for="username"><?php echo $text_reguser; ?></label>
              <input name="username" id="username" value="<?php if ($_GET['action' ]=='fail_register')  echo $_SESSION['user_name2'];  ?>" size="30">
              <span class="red2"><?php echo  $_SESSION['error_username']; ?></span> </p>
            <p>
              <label for="password"><?php echo $text_regpass; ?></label>
              <input name="newpassword" type="password" id="newpassword" size="30">
              <span class="red2"><?php echo  $_SESSION['error_username'] ?></span> </p>
            <p>
              <label for="email"><?php echo $text_email; ?></label>
              <input name="email" value="<?php 
		  if ($_GET['action' ]=='fail_register')echo $_SESSION['user_email'];   ?>" size="30">
            </p>
            <p>  
		        <label for="website">Web(optional) :</label>
		        <input name="website" type="text" id="website" size="30">
              </p>
            <p><label for="company">Company(optional) :</label>
			  <input name="company" type="text" id="company" value="Anonimous" size="30">
              <input name="type" type="hidden" id="type" value="User">
			  <br>
            </p>
            </span></td>
        </tr>
        <tr>
          <td align="center"  class="text"><p><?php echo $usernameunique;?><span class="mio"> </span></p></td>
        </tr>
        <tr>
          <td  class="text" align="center"><?php 
	  if (  $_GET['action' ]=='fail_register')
	  {
	  echo  $_SESSION['stavv'];
	  }
	  ?></td>
        </tr>
        <tr>
          <td style="padding-bottom:10px" ><div align="center"><span class="mio"><span class="comment4">
              <input type="submit" name="userform" value="Submit" />
                <?php
	echo $_SESSION['hlast_state'];
	 ?>
          </span></span></div></td>
        </tr>
        <tr class="boxborder">
          <td  style="padding:0" bgcolor="#F5F5F5" class="mio"><DIV ID="oFilterDIV" STYLE="position: relative; height:30px; padding:1px; font:10pt verdana; background:#0033CC;
	  filter:progid:DXImageTransform.Microsoft.Alpha( Opacity=90, FinishOpacity=30, Style=2, StartX=40,  FinishX=90, StartY=50, FinishY=100);
	   left: 1px;"><span class="text" style="color: #FFFFFF"> <a href="http://www.cromosoft.com">&copy; Cromosoft Technologies 2003-2009</a></span></DIV>
              <span class="text"> </span> </td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<?php
//@include('includes/bottom.php' );
 }
?>
<?php 
if (   $_GET['action']=='send_login'  ) //first step
{
IsOnline();
?>
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>?action=send_login2" method="post" name="form3" id="form3" onSubmit="MM_validateForm('email','','RisEmail');return document.MM_returnValue">
  <p>&nbsp;</p>
  <table  style="border-color: #8F97EF; border-width:1px; border-style:solid " width="500" align="center" cellpadding="1" cellspacing="1" bgcolor="#F5F5F5">
    <tr>
      <td bgcolor="<?php echo $bgcolor; ?>" class="mio"><strong><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"><img src="<?php echo $logo_url;  ?>" alt="Facil HelpDesk"></span> <span class="Estilo3"><?php echo $send_login; ?></span></strong></td>
    </tr>
    <tr>
      <td class="text"><span class="mio">
        <label for="name"></label>
        <label for="username"></label><label for="email">Email:</label>
        <input name="email" size="30">
        <input name="type" type="hidden" id="type" value="User">
        <br>
      </span></td>
    </tr>
    <tr>
      <td align="center"  class="text"><p><span class="mio"> </span></p></td>
    </tr>
    <tr>
      <td  class="comment" align="center"><span class="mio Estilo2"><?php echo $wait_for_login; ?> </span></td>
    </tr>
    <tr>
      <td><div align="center"><span class="mio">
          <input type="submit" name="userform" value="Submit" />
      </span></div></td>
    </tr>
    <tr>
      <td><span class="mio">        <br>
      </span></td>
    </tr>
  </table>
</form>
<br>
<?php @include('includes/bottom.php' );
}


?>
<br>
<?php 
if (   $_GET['action']=='help'  ) //first step
{
IsOnline();
?>
<form action="" method="post" name="form3" id="form3" >
  <p>&nbsp;</p>
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F5F5F5"  style="border-color: #8F97EF; border-width:1px; border-style:solid ">
    <tr>
      <td width="101" bgcolor="<?php echo $bgcolor; ?>" class="mio"><strong><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"><a href="http://www.planettravel.pe"><img src="<?php echo $logo_url;  ?>" alt="Facil HelpDesk" border="0"></a></span></strong></td>
      <td  style="padding-top:5px" width="344" bgcolor="<?php echo $bgcolor; ?>" class="mio"><h4><strong class="Estilo3"> Help </strong></h4></td>
    </tr>
    <tr>
      <td  style="padding:5px" colspan="2" class="text"><p>&nbsp;</p>
      <?php echo $help_ticket; ?></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><span class="mio">
          <input type="button" name="userform" value="Back"  onClick="history.back()"/>
          <span class="text">      </span> </span></div></td>
    </tr>
    <tr>
      <td colspan="2"><span class="comment4"></span><span class="mio"><br>
      </span></td>
    </tr>
  </table>
</form>
<br>
<?php
@include('includes/bottom.php' );
}
?>
<br>
<?php 
echo '<br>';
?>