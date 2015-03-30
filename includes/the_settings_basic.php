<?php
if ($authz<>'TRUE') exit;
?>
<?php 
include('configuration.php');
?>
<link href="styles.php" rel="stylesheet" type="text/css">
<div  class="comment2" align="right">
  <p>For your security delete install.php after of installing.</p>
</div>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=settings">
  <table  width="100%" border="0" align="center">
    <tr><label><td  valign="top" width="1202"  style="padding-left:6px ">
        <legend>
        <label for="sitename">Site Title</label>        
        <input name="sitename" type="text" class="text" id="sitename" value="<?php echo $sitename; ?>" size="40">
</legend>
        <p>
        <label for="siteurl">URL Base of Installation</label>
        <input type="text" class="text" name="siteurl" id="siteurl" value="<?php echo $siteurl; ?>" size="30">
      </p>
      <p class="comment3">Example: http://www.site.com/helpdesk/&nbsp; This url will be used for email notifications</p>
      <p>
	    <label>Logo Image URL(left-top position ) </label>	      
	    <input type="text" class="text" name="logo_url" id="logo_url" value="<?php echo $logo_url; ?>" size="50">
	  </p>
      
	    <legend>
	    <legend>
	    <label for="langdefault">Default User Language</label>	    
	    <select name="langdefault" id="langdefault">
            <option value="en"<?php if (!(strcmp("en", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'en'; ?></option>
            <option value="no"<?php if (!(strcmp("no", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'no'; ?></option>
            <option value="es"<?php if (!(strcmp("es", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'es'; ?></option>
            <option value="fr"<?php if (!(strcmp("fr", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'fr'; ?></option>
            <option value="gm"<?php if (!(strcmp("gm", $langdefault ) ) ) {echo "SELECTED"; } ?> ><?php echo 'gm'; ?></option>
        </select>
	  </legend>
	   </legend>
	 
	  <p><label for="content">Date Format</label> <span class="content">
	    <select name="dformat" id="dformat">
          <option value="d-m-Y"<?php if (!(strcmp("d-m-Y", $dformat ) ) ) {echo "SELECTED"; } ?> ><?php echo 'day month Year'; ?></option>
          <option value="m-d-Y"<?php if (!(strcmp("m-d-Y", $dformat ) ) ) {echo "SELECTED"; } ?> ><?php echo 'month day Y'; ?></option>
        </select>
	  </span><a name="database"></a></p>
	  <p><span class="content">
	    <legend></legend>
	  </span></p>
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
	  <p>	   
	    <label for="data">Database</label>
        <input name="data" type="text" class="red" id="data" value="<?php echo $data; ?>" size="40">	
	  </p>
	  <p>
	    <label for="showkb"></label>
	    <label for="addcomments_kb"></label>
	    <label for="add_websites"></label>
	    <label for="activa_by_email">Enable email verification </label>
	    <select name="activa_by_email"  id="activa_by_email">
            <option value="TRUE"<?php if (!(strcmp("TRUE", $activa_by_email ) ) ) {echo "SELECTED"; } ?> ><?php echo 'TRUE'; ?></option>
            <option value="FALSE"<?php if (!(strcmp("FALSE",$activa_by_email ) ) ) {echo "SELECTED"; } ?> ><?php echo 'FALSE'; ?></option>
        </select>
        <span class="comment3" >To activate an end user account for self registration</span></p>
	
	      <label for="sendmethod">Send method(PHP mailer)	</label>  
	      <select name="sendmethod"  id="sendmethod">
            <option value="mail"<?php if (!(strcmp("mail", $sendmethod ) ) ) {echo "SELECTED"; } ?> ><?php echo 'mail'; ?></option>
            <option value="sendmail"<?php if (!(strcmp("sendmail", $sendmethod ) ) ) {echo "SELECTED"; } ?> ><?php echo 'Sendmail'; ?></option>
            <option value="smtp"<?php if (!(strcmp("smtp", $sendmethod ) ) ) {echo "SELECTED"; } ?> ><?php echo 'smtp'; ?></option>
            <option value="qmail"<?php if (!(strcmp("qmail",$sendmethod ) ) ) {echo "SELECTED"; } ?> ><?php echo 'qmail'; ?></option>
	        <option value="smtpTLS"<?php if (!(strcmp("smtpTLS", $sendmethod ) ) ) {echo "SELECTED"; } ?> ><?php echo 'smtpTLS'; ?></option>
          </select>
  
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
	  
	  <p>      	  <p>
          <legend>	      
          
          <label for="receive_notif">Notificate of reservations:</label>
<input name="receive_notif" type="text" class="text" id="receive_notif" value="<?php echo $receive_notif; ?>" size="20">
	        </label>	
	        </legend>
	        <span class="content"></span></p>
	  <label for="retries"></label>
	      <span class="content">
	      <legend></legend>
        </span>
	      <p><span class="textoconf">Footer*</span>	    <textarea name="footer" cols="60" rows="3" class="text" id="footer"><?php echo $footer; ?></textarea> 
	    </p>
	  <p><span class="comment2">*If you want you can add a footer to all outgoing notifications by emails not for SMS.</span> 
	    <input name="save5" type="hidden" id="save5" value="1">
	  </p>
	  <p>
	    <input type="submit" name="Submit" value="Submit">
</p>
	  </td></label>
    </tr>
  </table>
</form>