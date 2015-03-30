<?php
@include('./configuration.php'); //this is another file
@include('../../configuration.php');
if (!@include("class.phpmailer.php"))
{
@include("includes/class.phpmailer.php");
}

function show_warning($err)
{ 
echo  '<span  class=red2 align=left>'.$err; // .'div'; 
//echo $err;
}
function sesiona($entrada)
{
	$a=$entrada;
	if ($a==1) return 0;
	if ($a==0) return 1;
	if ($a=='') return 1;
}
 function matchset($xx)
{   
    //if (  !isset($xx)) {exit;}
    $arrx = array_values($xx);
    $i = 0;
    while (list ($key, $val) = each ($arrx))
	{$xy[$i] = $val;$i++;  }
    $cnt = $i;
	return $xy;
}	

	function Clean_It($vName){
		$vName = stripslashes(trim($vName));
		$vName = htmlspecialchars($vName);
		return $vName;
		}
		
	function UseColor2($a)
		{$trcolor1 = '#F4F4F4';
		$trcolor2 = '#FFFFFF';
		global $colorvalue;
		if ($a % 2==0 )		
			{	$colorvalue = $trcolor2;
			}

		ELSE
			{$colorvalue = $trcolor1;
			}
		return($colorvalue);
		}

		
	function UseColor()
		{$trcolor1 = '#F4FAFF';
		$trcolor2 = '#FFFFFF';
		global $colorvalue;
		IF($colorvalue == $trcolor1)
			{	$colorvalue = $trcolor2;
			}

		ELSE
			{$colorvalue = $trcolor1;
			}
		return($colorvalue);
		}


	function SendMail($email,
				$name,
				$subject,
				$message,
				$atach='',
				$response_flag = false
					)

{
		Global $sendmethod,
		$sockethost, $smtpauth,
		$smtpauthuser, $smtpauthpass,
		$socketfrom, $socketfromname,
		$socketreply,
		 $socketreplyname,
		 $portSMTP,
		 $smtpserver;
		 if (!isset($mailzz)) 
		 {  $mailzz = new PHPMailer();
		 IF (file_exists('includes/language/phpmailer.lang-en.php'))
			{$mailzz -> SetLanguage('en', 'includes/language/');}

		ELSE
			{$mailzz -> SetLanguage('en', '../includes/language/');}
			
		 }	
			
		IF (isset($sendmethod) && $sendmethod == 'sendmail')
			{$mailzz -> IsSendmail();
			}
		ELSEIF (isset($sendmethod) && $sendmethod == 'smtp')
			{$mailzz -> IsSMTP();
			$mailzz->Host       = $smtpserver; 
			}
		ELSEIF (isset($sendmethod) && $sendmethod == 'mail')
			{$mailzz -> IsMail();
			}
		ELSEIF (isset($sendmethod) && $sendmethod == 'qmail')
			{$mailzz -> IsQmail();
			}
		ELSEIF (isset($sendmethod) && $sendmethod == 'smtpTLS')
			{
			$mailzz -> IsSMTP();
			$mailzz->SMTPSecure = "tls";
			$mailzz -> SMTPAuth = true;
			$mailzz->Host       = 'ssl://'.$smtpserver; 
			$mailzz->Port       = $portSMTP;
			
			}
		
			
			
		//$mailzz -> Host = $sockethost;		

		IF ($smtpauth == 'TRUE')
			{ $mailzz -> SMTPAuth = true;
			$mailzz -> Username = $smtpauthuser;
			$mailzz -> Password = $smtpauthpass;
			
				}

		IF (!$response_flag && isset($_GET['caseid']) && ($_GET['caseid'] == 'NewTicket' || $_GET['caseid'] == 'view'))

			{
			$mailzz -> From     = $email;
			$mailzz -> FromName = $name;
			$mailzz -> AddReplyTo($email, $name);
			}
		ELSE
			{
			$mailzz -> From = $socketfrom;
			              global $del_con;
			              if ( !isset($del_con) )
           			      {
			              $mailzz -> FromName = $socketfromname;
			              $mailzz -> AddReplyTo($socketreply, $socketreplyname);
			              }
						  else
						  { //coming "from the departament" with e-mail piping
						  $mailzz -> FromName = $socketfromname;
						  global $la_casilla;
			              $mailzz -> AddReplyTo($la_casilla, $socketreplyname);
						  }
			
			}
	global  $sendhtml;
	
	 $mailzz ->AddAttachment($atach,'','base64','application/octet-stream');

		if ( $sendhtml=='TRUE' )		
		$mailzz -> IsHTML(true); //decia False
		else
		$mailzz -> IsHTML(false);
				
		$mailzz -> Body = $message;		
		$mailzz -> Subject = $subject;
		IF (!$response_flag && isset($_GET['caseid']) && ($_GET['caseid'] == 'NewTicket' || $_GET['caseid'] == 'view'))
			{		$mailzz -> AddAddress($socketfrom, $socketfromname);
			}
		ELSE
			{
			$mailzz -> AddAddress($email, $name);
			}
		IF(!$mailzz -> Send())
			{					
			global $iam_reintentando;
				if ( !isset($iam_reintentando))
				{
				
				/* 	$querymensaje ="INSERT INTO email_queue SET ".
					"subject='".addslashes($subject).
				"', body= '".addslashes($message).
				"', el_email= '".addslashes($email).
				"', name= '".$name.
				"', reply_to= '".$la_casilla.  //la casilla entrante de emailpiping
				"', sended_from='".$socketfromname.
				"', timestamp=".mktime();			
				@query_db( $querymensaje);
				*/
			}
			$add_comments='error sending to  '.$email.$mailzz -> ErrorInfo;
			log_booking('',$add_comments);			
			return ('Error: '.$mailzz -> ErrorInfo);
			}
		ELSE
			{	return ('Email Sent. '.$mailzz -> ErrorInfo);
			}
		$mailzz -> ClearAddresses();
		
}



	function delete_mails($username,$password,$server)
	{
	return TRUE;
    $cmd = array();
    $cmd[]  = "USER $username\r\n";
    $cmd[]  = "PASS $password\r\n";
    $cmd[]  = "STAT\r\n";
    $cmd[]  = "QUIT\r\n";
// Server is your POP3 server, ie pop3.server.com
// Port is the port number ( should be 110 )
    $port = 110;

    $fp  = fsockopen($server, $port);
    if(!$fp)
    {print("Error connecting to server $server"); }
    else
    {   $ret = fgets($fp, 1024);
        foreach($cmd as $ret)
        {
            fputs($fp,$ret);
            $line = fgets($fp, 1024);
            print($line."<br>");
            if($ret=="STAT\r\n")
            {   $fields = explode(" ",$line);
                $num_mails = $fields[1];
                for($i=1;$i<=$num_mails;$i++)
                { fputs($fp,"DELE $i\r\n"); 
				$line = fgets($fp, 1024);
				if(substr($line,0,1) != "+"){ return FALSE;}
				 }
				  }
        }    }

}//end function		


//global $host;
//global $user;
//global $pass;
//-DATABASE CONECTION
		
//TITLE 
	function PageTitle($text)
		{
		Global $maintablewidth, $maintablealign, $background;
?>
		<table width="<?php echo $maintablewidth ?>" cellspacing="1" cellpadding="1" class="boxborder" align="<?php echo $maintablealign ?>">
		  <tr bgcolor="<?php echo $background ?>">
			<td class="text"><?php echo $text ?></td>
		  </tr>
		</table>
<?php
		}
		
?>
<?php
//FILE UPLOADS
	function FileUploadForm()
		{
		GLOBAL $maxfilesize;
?>
		<table width="97%" cellspacing="1" cellpadding="1" class="boxborder" align="center">
		  <tr bgcolor="#E5EEF9">
			<td colspan="2" bgcolor="#E5E5E5" class="boxborder text"><b><?php 
			global $uploadfile;
			echo $uploadfile; ?></b></td>
		  </tr>
		  <tr>
			<td width="60%" align="center" class="boxborder">
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $maxfilesize ?>" />
			<input type="file"   name="userfile" size="54" />	</td>
		    <td width="40%" align="center" class="boxborder"><div align="left"><span  class="comment3"><?php echo "$limit_size $maxfilesize Bytes"; ?></span></div></td>
		  </tr>
		</table>
<?php

		}
//chec ERRORS UPLOAD FUNCION
	function FileUploadsVerification($userfile, $newfilename)
		{
		GLOBAL $filetypes, $allowedtypes, $uploadpath, $relativepath, $maintablewidth, $maintablealign;
	// CHECK ERROR STATUSES ON THE UPLOADED FILES
		IF ($_FILES['userfile']['error'] == '4')
			{
			$msg = 'No attachment uploaded';
			}
		ELSEIF ($_FILES['userfile']['error'] == '2')
			{
			$msg = 'This file exceeds the Maximum allowable size.';
			}
		ELSEIF ($_FILES['userfile']['error'] == '1')
			{
			$msg = 'This file exceeds the PHP upload size.';
			}
		ELSEIF ($_FILES['userfile']['error'] == '3')
			{
			$msg = 'Sorry we could only partially upload htis file please try again.';
		}
	// CHECK TO MAKE SURE THE UPLOADED FILE IS OF A FILE WE ALLOW AND GET THE NEWFILE EXTENSION
		ELSEIF (!in_array($_FILES['userfile']['type'], $allowedtypes))
			{
			$msg = 'The file that you uploaded was of type '.$_FILES['userfile']['type'].' which
				is not allowed,	you are only allowed to upload files of the type:';
			WHILE ($type = current($allowedtypes))
				{
				$msg .= '<br />'.$filetypes[$type].' ('.$type.')';
				next($allowedtypes);
				}
			}
	// IF FILE IS NOT OVER SIZE AND IS CORRECT TYPE THEN CONTINUE WITH PROCESS
		ELSEIF ($_FILES['userfile']['error'] == '0')
			{
	// GET THE EXTENSION FOR THE UPLOADED FILE
			$type1       = $_FILES['userfile']['type'];
			$extension   = $filetypes["$type1"];
			
			$newfilename =$newfilename.$extension;  
			$msg = '<p>Attachment Uploaded: '.$_FILES['userfile']['name'].'
				SIZE: '.$_FILES['userfile']['size'].' bytes -
				TYPE: '.$_FILES['userfile']['type'];           
			move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadpath.$newfilename);			
			}
			global $last_msg;
			$last_msg=$msg;
?><?php
	}
?>