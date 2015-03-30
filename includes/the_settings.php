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
?><style type="text/css">
<!--
.Estilo6 {color: #FFFFFF}
-->
</style>
<link href="styles.php" rel="stylesheet" type="text/css">
<div  class="comment2" align="right">
  <p>&nbsp;</p>
  <p align="center">For your security delete install.php after of installing.</p>
</div>
<p><span class="content">
  <legend></legend>
</span></p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=settings">
  <table  width="800" border="0" align="center">
    <tr>
      <td  style="padding-left:6px "  width="1202"><span class="content">
        <legend><a name="basic"></a>Basic Settings and URLs</legend>
      </span> <p><label for="sitename">Site Title</label>        <input name="sitename" type="text" class="text" id="sitename" value="<?php echo $sitename; ?>" size="40">
</p>
      <p><label for="online">Online or under maintenance?</label><select name="online"  id="online">
          <option value="TRUE"<?php  if (!(strcmp("TRUE", $online ) ) ) {echo "SELECTED"; } ?> ><?php echo 'TRUE'; ?></option>
          <option value="FALSE"<?php if (!(strcmp("FALSE", $online ) ) ) {echo "SELECTED"; } ?> ><?php echo 'FALSE'; ?></option>
        </select>
      </p>
      <p><label for="siteurl">URL Base of Installation</label><input type="text" class="text" name="siteurl" id="siteurl" value="<?php echo $siteurl; ?>" size="30">
      </p>
      <p class="comment3">Example: http://www.site.com/helpdesk/&nbsp; This url will be used for email notifications</p>
      <p>
	    <label>Logo Image URL(left-top position ) </label>	      
	    <input type="text" class="text" name="logo_url" id="logo_url" value="<?php echo $logo_url; ?>" size="50">
	  </p>
      <p class="content">
	    <legend> Style, colors: <a name="colors"></a></legend>
	  </p>
	  <p><label for="bgcolor">Background(Hex.)</label> 	    
	    <input name="bgcolor" TYPE="text" id="bgcolor"  value="<?php echo $bgcolor; ?>" size="20"> 
	    <A HREF="#" NAME="pick1" class="comment4" ID="pick1" onClick="cp2.select(document.forms[1].bgcolor,'pick1');return false;">Pick</A> <span class="comment3">default: #DAEAFD</span></p>
	  <p class="content">Gradients: </p>
	  <p>
	      <label for="menu1">Menu color1(Hex.)</label>
	      <input name="menu1" TYPE="text" id="menu1"  value="<?php echo $menu1; ?>" size="20"> 
	      <A HREF="#" NAME="pick2" class="comment4" ID="pick2" onClick="cp2.select(document.forms[1].menu1,'pick2');return false;">Pick</A>
	      <label for="menu2"></label>
	   </p>
	  <p>
	    <label for="menu2">Menu color2(Hex.)</label>
<input name="menu2" TYPE="text" id="menu2"  value="<?php echo $menu2; ?>" size="20">
	    <A HREF="#" NAME="pick3" class="comment4" ID="pick3" onClick="cp2.select(document.forms[1].menu2,'pick3');return false;">Pick</A>
	  </p>
	  <p><label for="menu3">Menu color1b(Hex.)</label>	    
	    <input name="menu3" TYPE="text" id="menu3"  value="<?php echo $menu3; ?>" size="20"> 
	    <A HREF="#" NAME="pick4" class="comment4" ID="pick4" onClick="cp2.select(document.forms[1].menu3,'pick4');return false;">Pick</A></p>
	  <p><label for="menu4">Menu Color2-b(Hex.)</label>	    
	    <input name="menu4" TYPE="text" id="menu4"  value="<?php echo $menu4; ?>" size="20"> 
	    <A HREF="#" NAME="pick5" class="comment4" ID="pick5" onClick="cp2.select(document.forms[1].menu4,'pick5');return false;">Pick</A></p>
	  <p><label for="fontc">Text Color(Hex.)</label>	    
	    <input name="fontc" TYPE="text" id="fontc"  value="<?php echo $fontc; ?>" size="20"> 
	    <A HREF="#" NAME="pick6" class="comment4" ID="pick6" onClick="cp2.select(document.forms[1].fontc,'pick6');return false;">Pick</A></p>
	  <p><label for="border">show border</label>	    <select name="border"  id="border">
          <option value="1"<?php    if (!(strcmp("1", $border ) ) ) {echo "SELECTED"; } ?> ><?php echo 'TRUE'; ?></option>
          <option value="0"<?php if (!(strcmp("0", $border ) ) ) {echo "SELECTED"; } ?> ><?php echo 'FALSE'; ?></option>
        </select>
	  </p>
	  <p>
	    <input type="submit" name="Submit" value="Save all">
	  </p>
	  <p><span class="content"><a name="localization" id="localization"></a>
          <legend></legend>
	  </span><span class="content">
	  <legend>Localization</legend>
	  </span> </p>
	  <p><label for="langdefault">Default User Language</label>	    <select name="langdefault" id="langdefault">
          <option value="en"<?php if (!(strcmp("en", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'en'; ?></option>
          <option value="no"<?php if (!(strcmp("no", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'no'; ?></option>
          <option value="es"<?php if (!(strcmp("es", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'es'; ?></option>
          <option value="fr"<?php if (!(strcmp("fr", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'fr'; ?></option>
          <option value="gm"<?php if (!(strcmp("gm", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'gm'; ?></option>
        </select>
	  </p>
	  <p><label for="content">Date Format</label> <span class="content">
	    <select name="dformat" id="dformat">
          <option value="d-m-Y"<?php if (!(strcmp("d-m-Y", $dformat ) ) ) {echo "SELECTED"; } ?> ><?php echo 'day month Year'; ?></option>
          <option value="m-d-Y"<?php if (!(strcmp("m-d-Y", $dformat ) ) ) {echo "SELECTED"; } ?> ><?php echo 'month day Y'; ?></option>
        </select>
	  </span><a name="database"></a></p>
	  <p><span class="content">
	    <legend>Mysql database</legend>
	  </span> </p>
	  <p class="textoconf">If you alter these setting<span class="red2">*</span> the system could stop of working! , if it happens execute install.php </p>
	  <p>
	    <label for="host">Host</label>	    
	    <input type="text"  class="red" name="host" id="host" value="<?php echo $host; ?>" size="40">
	  </p> 
	  <p><label for="user">Username</label>	    <input name="user" type="text" class="red" id="user" value="<?php echo $user; ?>" size="40">

	    <label for="pass"></label>
	  </p> 
	  <p>
	    <label for="pass">Password</label>

	      <input name="pass" type="password" class="red" id="pass" value="<?php echo $pass; ?>" size="40">
        </p>
	  <label for="data">Database</label>        <input name="data" type="text" class="red" id="data" value="<?php echo $data; ?>" size="40">	
	  <p><span class="content">Acces<a name="access">s</a></span></p>
	  <p>&nbsp;</p>
	  <p>
	  <legend></legend>
	    
	    </p>
	  <p><label for="limit_staff">Reports visible only for administrators</label>	    
	    <select name="limit_staff"  id="limit_staff">
          <option value="TRUE"<?php     if (!(strcmp("TRUE", $limit_staff ) ) ) {echo "SELECTED"; } ?> ><?php echo 'TRUE'; ?></option>
          <option value="FALSE"<?php if (!(strcmp("FALSE", $limit_staff ) ) ) {echo "SELECTED"; } ?> ><?php echo 'FALSE'; ?></option>
        </select>
	  </p>
	  <p>
	    <label for="limit_tickets">Limit of Reservations created by user</label>	    
	    <select name="limit_tickets"  id="limit_tickets">
          <option value="30"<?php     if (!(strcmp("30", $limit_tickets ) ) ) {echo "SELECTED"; } ?> ><?php echo '30s'; ?></option>
          <option value="120"<?php     if (!(strcmp("120", $limit_tickets ) ) ) {echo "SELECTED"; } ?> ><?php echo '120s'; ?></option>
          <option value="240"<?php     if (!(strcmp("240", $limit_tickets ) ) ) {echo "SELECTED"; } ?> ><?php echo '240s'; ?></option>
          <option value="300"<?php     if (!(strcmp("300", $limit_tickets ) ) ) {echo "SELECTED"; } ?> ><?php echo '300s'; ?></option>
          <option value="600"<?php     if (!(strcmp("600", $limit_tickets ) ) ) {echo "SELECTED"; } ?> ><?php echo '10min'; ?></option>
          <option value="1800"<?php     if (!(strcmp("1800", $limit_tickets ) ) ) {echo "SELECTED"; } ?> ><?php echo '30min'; ?></option>
          <option value="7200"<?php     if (!(strcmp("7200", $limit_tickets ) ) ) {echo "SELECTED"; } ?> ><?php echo '2h'; ?></option>
          <option value="36000"<?php     if (!(strcmp("36000", $limit_tickets ) ) ) {echo "SELECTED"; } ?> ><?php echo '10h'; ?></option>
          <option value="UNLIMITED"<?php if (!(strcmp("UNLIMITED", $limit_tickets ) ) ) {echo "SELECTED"; } ?> ><?php echo 'UNLIMITED'; ?></option>
        </select> 
	    </p>
	  <p><label for="include_responses"></label>
	    <label for="open_responses"></label>
	    <label for="tickets_display">Number of Services per page</label>	    
	    <select name="tickets_display"  id="tickets_display">
		  <option value="5"<?php if (!(strcmp("5", $tickets_display ) ) ) {echo "SELECTED"; } ?> ><?php echo '5'; ?></option>
            <option value="10"<?php if (!(strcmp("10", $tickets_display ) ) ) {echo "SELECTED"; } ?> ><?php echo '10'; ?></option>
            <option value="20"<?php if (!(strcmp("20", $tickets_display ) ) ) {echo "SELECTED"; } ?> ><?php echo '20'; ?></option>
            <option value="30"<?php if (!(strcmp("30", $tickets_display ) ) ) {echo "SELECTED"; } ?> ><?php echo '30'; ?></option>
	       <option value="50"<?php if (!(strcmp("30", $tickets_display ) ) ) {echo "SELECTED"; } ?> ><?php echo '50'; ?></option>
            <option value="100"<?php if (!(strcmp("100",$tickets_display ) ) ) {echo "SELECTED"; } ?> ><?php echo '100'; ?></option>
        </select>
	  </p>
	  <p><label for="users_display">Number of users per page</label>	    
	    <select name="users_display"  id="users_display">
          <option value="10"<?php if (!(strcmp("10", $users_display ) ) ) {echo "SELECTED"; } ?> ><?php echo '10'; ?></option>
          <option value="20"<?php if (!(strcmp("20", $users_display ) ) ) {echo "SELECTED"; } ?> ><?php echo '20'; ?></option>
          <option value="50"<?php if (!(strcmp("50", $users_display ) ) ) {echo "SELECTED"; } ?> ><?php echo '50'; ?></option>
          <option value="100"<?php if (!(strcmp("100",$users_display ) ) ) {echo "SELECTED"; } ?> ><?php echo '100'; ?></option>
        </select>
	  </p>
	  <p><label for="showkb"></label>
	    <label for="addcomments_kb"></label>
	    <label for="add_websites"></label>
	    <label for="activa_by_email">Enable email verification </label>
	    <select name="activa_by_email"  id="activa_by_email">
            <option value="TRUE"<?php if (!(strcmp("TRUE", $activa_by_email ) ) ) {echo "SELECTED"; } ?> ><?php echo 'TRUE'; ?></option>
            <option value="FALSE"<?php if (!(strcmp("FALSE",$activa_by_email ) ) ) {echo "SELECTED"; } ?> ><?php echo 'FALSE'; ?></option>
        </select>
        <span class="comment3" >To activate an end user account for self registration</span></p>
	  <p>
	    <label for="activa_by_email">Disable end user registering</label>
        <select name="disable_registering"  id="disable_registering">
          <option value="TRUE"<?php if (!(strcmp("TRUE", $disable_registering ) ) ) {echo "SELECTED"; } ?> ><?php echo 'TRUE'; ?></option>
          <option value="FALSE"<?php if (!(strcmp("FALSE",$disable_registering ) ) ) {echo "SELECTED"; } ?> ><?php echo 'FALSE'; ?></option>
        </select>
        <span class="comment3" >Only Admin/staff will be able to add end users.</span></p>
	  <p><span class="content">
	    <legend><a name="email"></a>E-mail options</legend>
	  </span> <span class="comment4">(originates notifications)
	  <label for="sendmethod"></label>
	  </span>
	  <label for="sendmethod"></label>
	  </p>
	  <p>
	    <label for="sendmethod">Send method(PHP mailer)	</label>  
	    <select name="sendmethod"  id="sendmethod">
            <option value="mail"<?php if (!(strcmp("not", $sendmethod ) ) ) {echo "SELECTED"; } ?> ><?php echo 'Not Mail'; ?></option>
			<option value="mail"<?php if (!(strcmp("mail", $sendmethod ) ) ) {echo "SELECTED"; } ?> ><?php echo 'mail'; ?></option>
            <option value="sendmail"<?php if (!(strcmp("sendmail", $sendmethod ) ) ) {echo "SELECTED"; } ?> ><?php echo 'Sendmail'; ?></option>
            <option value="smtp"<?php if (!(strcmp("smtp", $sendmethod ) ) ) {echo "SELECTED"; } ?> ><?php echo 'smtp'; ?></option>
            <option value="qmail"<?php if (!(strcmp("qmail",$sendmethod ) ) ) {echo "SELECTED"; } ?> ><?php echo 'qmail'; ?></option>
			<option value="smtpTLS"<?php if (!(strcmp("smtpTLS", $sendmethod ) ) ) {echo "SELECTED"; } ?> ><?php echo 'smtpTLS'; ?></option>
          </select>
</p>
	  <p>
	    <label for="smtpserver">smtp Server (only for 2 methods: smtp/smtpTLS)</label>
        <input name="smtpserver" type="text" class="text" id="smtpserver" value="<?php echo $smtpserver; ?>" size="40">
</p>
	  <p><label for="smtpauth">SMTP Authentication</label> 
	    <select name="smtpauth"  id="smtpauth">
          <option value="TRUE"<?php if (!(strcmp("TRUE", $smtpauth ) ) ) {echo "SELECTED"; } ?> ><?php echo 'TRUE'; ?></option>
          <option value="FALSE"<?php if (!(strcmp("FALSE", $smtpauth ) ) ) {echo "SELECTED"; } ?> ><?php echo 'FALSE'; ?></option>
        </select>
</p>
	  <p>
	    <label for="socketfrom">Port</label>
	    <input name="portSMTP" type="text" class="text" id="portSMTP" value="<?php echo $portSMTP; ?>" size="3"> 
	    <span class="comment3">default 25, for TLS 465 </span></p>
	  <p><label for="socketfrom">Outgoing Email(reply to)	    </label><input name="socketfrom" type="text" class="text" id="socketfrom" value="<?php echo $socketfrom; ?>" size="40"> 
	  </p>
	  <p><label for="socketfromname">From name</label><input name="socketfromname" type="text" class="text" id="socketfromname" value="<?php echo $socketfromname; ?>" size="40">
	  </p>
	  <p><label for="smtpauthuser">smtp account</label>
	    <input name="smtpauthuser" type="text" class="text" id="smtpauthuser" value="<?php echo $smtpauthuser; ?>" size="40">
<label for="smtpserver"></label>
	  </p>
	  <p><label for="smtpauthpass">smtp password</label><input name="smtpauthpass" type="password" class="text" id="smtpauthpass" value="<?php echo $smtpauthpass; ?>" size="40">
<label for="activa_by_email"></label>
	  </p>
	  
	  <p class="textoconf">Enter an email for testing delivery  </p>
	  <p>
        <input type="submit" name="Submit"  value="test now" >
        <span class="comment3">First save settings</span> 
        <input name="emailfortest" type="text" class="text" id="emailfortest" size="30">
</p>
	  <p><span class="content">
	    <legend><a name="notifications"></a>Paypal</legend>
	  </span> </p>
	  <p>
	    <label for="label">My Paypal email for receiving payments:</label>
        <input name="paypal_email" type="text" class="text" id="label" value="<?php echo $paypal_email; ?>" size="20">
        </p>
	  <p>
	    <label for="label2">Enable Paypal</label>
        <select name="paypal"  id="label2">
          <option value="TRUE"<?php  if (!(strcmp("TRUE",$paypal ) ) ) {echo "SELECTED"; } ?> ><?php echo 'TRUE'; ?></option>
          <option value="FALSE"<?php if (!(strcmp("FALSE",$paypal ) ) ) {echo "SELECTED"; } ?> ><?php echo 'FALSE'; ?></option>
		  <option value="TEST_MODE"<?php if (!(strcmp("TEST_MODE",$paypal ) ) ) {echo "SELECTED"; } ?> ><?php echo 'TEST_MODE'; ?></option>
        </select>
</p>
	  <p><span class="content">
	    <legend><a name="notifications"></a>Notifications by E-mail</legend>
	  </span> </p>	 
	    <label for="receive_notif">Notificate of new reservations:</label>
	      <input name="receive_notif" type="text" class="text" id="receive_notif" value="<?php echo $receive_notif; ?>" size="20">
	    </label>		   	  <p>
	    <label for="emailasigned"></label>
	    <label for="sendhtml">Send notifications as html	    </label>
	    <select name="sendhtml"  id="sendhtml">
                <option value="TRUE"<?php  if (!(strcmp("TRUE",$sendhtml ) ) ) {echo "SELECTED"; } ?> ><?php echo 'TRUE'; ?></option>
                <option value="FALSE"<?php if (!(strcmp("FALSE",$sendhtml ) ) ) {echo "SELECTED"; } ?> ><?php echo 'FALSE'; ?></option>
          </select>
</p>
	  <p><label for="retries"></label>
	    <span class="content">
	    <legend><a name="sms" id="sms"></a>International notifications by SMS (requires <a href="https://www.clickatell.com/central/user/client/step1_new.php?prod_id=2">clickatel account</a>)</legend>
	    </span> </p>
	  <p>
	    	    <label for="emailclose">Send SMS when user submits a reservation: name,value,taxes, configurable editing quote.php lin. 1134</label>
	    <select name="enablesms"  id="enablesms">
          <option value="TRUE"<?php  if (!(strcmp("TRUE", $enablesms ) ) ) {echo "SELECTED"; } ?> ><?php echo 'TRUE'; ?></option>
          <option value="FALSE"<?php if (!(strcmp("FALSE", $enablesms ) ) ) {echo "SELECTED"; } ?> ><?php echo 'FALSE'; ?></option>
        </select>
	  </p>
	  <p>
          <label for="smtpserver">API ID: </label>
          <input name="idsms" type="text" class="text" id="idsms" value="<?php echo $idsms; ?>" size="10">
          <label for="smtpserver"></label>
	    </p>
	  <p>
          <label for="smtpserver">Username:</label>
          <input name="usersms" type="text" class="text" id="usersms" value="<?php echo $usersms; ?>" size="10">
            <label for="numbertosms">Username:</label>
          <input name="numbertosms" type="text" class="text" id="numbertosms" value="<?php echo $numbertosms; ?>" size="10">

		  
	    <label for="smtpserver"></label>
	  </p>
	  <p>
	    <label for="smtpserver">Password</label>
        <input name="smspass" type="password" class="text" id="smspass" value="<?php echo $smspass; ?>" size="10"> 
        </p>
	  <p><span class="textoconf">Footer*</span>	    <textarea name="footer" cols="60" rows="4" class="text" id="footer"><?php echo $footer; ?></textarea> 
	    </p>
	  <p><span class="comment2">*If you want you can add a footer to all outgoing notifications by emails not for SMS.</span> 
	    <input name="save5" type="hidden" id="save5" value="1">
	  </p>
	  <p>
	    <input type="submit" name="Submit" value="Save all">
</p>
	  </td>
    </tr>
  </table>
</form>
<SCRIPT LANGUAGE="JavaScript">cp.writeDiv()</SCRIPT>
