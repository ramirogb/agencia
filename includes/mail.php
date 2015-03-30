<?php 
if (!@include("class.phpmailer.php"))
{
@include("includes/class.phpmailer.php");
}
//cambia variables
//=============================
        $sendmethod='mail';
		$sockethost='planettravel.pe';
		$smtpauth='TRUE';
		$smtpauthuser='edy@planettravel.pe';
		$smtpauthpass='password';		
		$socketfrom='edy@planettravel.pe';
		$socketfromname='Edy';
		$socketreply='edy@planettravel.pe';
		 $socketreplyname='Edy';
		 $portSMTP=25;
		 $smtpserver='planettravel.pe';
//==================================
$sendhtml='FALSE';
if ( $sendhtml=='TRUE' )
                				{	$separador='<BR>';}
     							else
								{$separador= chr(13).chr(10); // '\n\t'; 
								}	


	function SendMail($email,
				$name,
				$subject,
				$message,
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
				 	
			}
			
			return ('Error: '.$mailzz -> ErrorInfo);			
			}
		ELSE
			{	return ('Email Sent. '.$mailzz -> ErrorInfo);
			}
		$mailzz -> ClearAddresses();
		
}

//cambia variables
//=============================
$message=$_POST['razon'].$separador.$_POST['email'].$separador.$_POST['comentarios'];
$the_email='edy@algo.com';
$nombre='Planet';
$asunto='Cliente nuevo';
echo SendMail($the_email,$nombre,$asunto, $message);
echo SendMail($_POST['email'],$nombre,$asunto, $message);


?>