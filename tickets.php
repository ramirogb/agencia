<?php
session_start();
include_once('config.php');
$key_crypto='tickets'; //change to other seed
if ($online=='FALSE')
 {
 exit;
 }
include('check.php');

$phpself = basename(__FILE__);
//Get everything from start of PHP_SELF to where $phpself begins
//Cut that part out, and place $phpself after it
$_SERVER['PHP_SELF'] = substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'],$phpself)) . $phpself;
$rtcv=$_SERVER['PHP_SELF'];


include_once('includes/functions.php');
//==
if (  isset($_GET['canned']) )
{
   $id=$_GET['canned'];
	$query57c = "	SELECT body from canned_replies where id='$id'  ";	 
	 $result57c = query_db($query57c);	
	 $row3c=query_db_assocc( $result57c); 
	 echo $body=trim($row3c['body']);
	exit;
	}
//==

$status=array(0=>'Closed', 1=>'Opened');

	IF (!isset($_GET['action']))
		{$_GET['action'] = 'Login';}

//$_REQUEST['lang'];IF (!isset($_REQUEST['lang']))	{$_REQUEST['lang'] = $langdefault;}	include('language/'.$_REQUEST['lang'].'.php');	
	
	
	IF (!isset($_REQUEST['lang']))
		{$_REQUEST['lang'] = $langdefault;}		
	$inc='language/'.$_REQUEST['lang'].'.php';	
	if (file_exists($inc)){	include($inc);}else 
	{$_REQUEST['lang'] = $langdefault;$inc='language/'.$_REQUEST['lang'].'.php';include($inc);	
	
	}
	

//inserts form of anonimous ticket

	if    (isset ( $_POST['fromform']) and (   ($formticket=='TRUE') or ($formticket=='TRUE_POP') ) )
	{$coo=trim($sitename);
$waitx5='FALSE';
	if (  isset ($_COOKIE[$coo]) ) {$waitx5='TRUE';} 
else {$waitx5='FALSE';
}



//echo 'post'.$_POST['sec'].'<BR>';
//echo 'sesion'.$_SESSION['asdfg'].'<BR>';

if  ($_POST['sec'] <> $_SESSION['asdfg'] )
{ $waitx5='TRUE';}//SPAM or reload happens
$_SESSION['asdfg']=rand(100,2);


if ($waitx5=='FALSE')	{

	//if (          (  ($_POST['txtNumber'])==( $_POST['email'])) and ( strpos($_POST['email'],'@' )  >0 )  )
	if (   strpos($_POST['email'],'@' )  >0 )	
	{
	$dataText=$_POST['message'];
	$el_from=$_POST['name'];$urgency  = explode('|', $_POST['urgency']);
	$el_email=$_POST['email'];$el_asunto=$_POST['ticketsubject'];$category = explode('|', $_POST['category']);
 $query = "	INSERT INTO tickets_tickets
							SET
							tickets_username  = '".'Unregistered'."',
							tickets_subject   = '".addslashes($el_asunto)."', 
							tickets_timestamp = '".mktime()."',
							tickets_urgency   = '".$urgency[0]."',
							tickets_category  = '".$category[0]."',
							tickets_child 	  = '".$tickets_child."',
							tickets_admin 	  = '".'Unregistered'."',
                            tickets_email 	  = '".$el_email."',
                            tickets_name 	  = '".$el_from."',							
							tickets_question  = '".$dataText."'";						
                        $resultxx5 = query_db( $query);
						$for_subjet=$el_id;	$clav=md5($el_email); 
						$el_id=query_db_assocc();$el_ticket=$el_id;
						$w1= (rand()%31);$w2= (rand()%31);$w3= (rand()%31);$w4= (rand()%31);$w5= (rand()%31);
						$w6= (rand()%31);$clave=$clav[$w1].$clav[$w2].$clav[$w3].$clav[$w4].$clav[$w5].$clav[$w6];						
						$query556 = "	INSERT INTO tickets_state SET id='$el_id',keyview='$clave'";
						$resultxx5 =query_db( $query556);
						
						
						
						$name='Unregistered';
						include('includes/encrypt.php');$crypt = new xcrypt;
						$verif= $crypt->encrypt($el_ticket);
						$for_staff= '{{'. $el_id.'-'.$verif.'}}'.$el_asunto; //inserte ahora//echo 'primer ticket';
						
						IF ($allowattachments == 'TRUE')
							{FileUploadsVerification("$_FILES(userfile)", $el_id);
							}
			
			if ( $sendhtml=='TRUE' )
                        { $separator='<BR>';
						 }
     			        else      { $separator= chr(13).chr(10); } 
			$dataText="$el_from, ".$separator.'your ticket was stored, 						
			please wait for an answer of our staff members, '.$separator.$separator.'ticket ID: '.$el_ticket.$separator
			.$separator.$ggg.'Ticket Key : '.$clave.$separator.'  IMPORTANT: If you respond this ticket do not change the subject line'
			.$separator.$separator.$siteurl;
			;			
			$del_con=TRUE;//set to true if customization of email is required,at functions.php
			if ($emailusercopy=='TRUE'){
			//echo 'xx1';
			$last_msg .=' '.SendMail($el_email,$el_from,$for_staff,$dataText);//to customer
			}
	$authz='TRUE';
	
	$coo=trim($sitename);
	if ($limit_tickets <>'UNLIMITED') 
	{
	if ( !setcookie($coo,'1',time()+$limit_tickets) ) echo 'Error setting cookie';
	 }

	include('./includes/top3.php');
	include('./includes/thanks.php');
	include('includes/bottom.php');
	exit;						
} //iffloo
}
else //error with captcha difs emails
{
$authz='TRUE';include('./includes/top3.php');
	include('./includes/error_captcha.php');
	include('includes/bottom.php');
	exit;}

    }
//============create anonimous ticket================
	if (  ($_GET['action']=='create_form') and  (  ($formticket=='TRUE') or ($formticket=='TRUE_POP') ))
	{

	if(  ($limit_tickets <>'UNLIMITED') and ($limit_tickets<>'') )
					   {
					   $xc=mktime();
					  $count_tick="SELECT count(*) FROM tickets_tickets where tickets_admin='".$_SESSION['xcv_userna'].
					  "' AND ($xc- tickets_timestamp < $limit_tickets)  ";
					   $vvv=query_db($count_tick);
					   $c=query_db_row($vvv);
					   $quedan=$limit_tickets-$c[0];					   
					   if (  $c[0]> 0) //was exceded the number of tickets
					          {
						  $authz='TRUE';
				          include('./includes/top.php');						
                          include('./includes/not_create_ticket.php');
						  	exit;
					          }
					   
					   }
	
	$authz='TRUE';	
//if ( !setcookie('2','1',time()+20) ) {echo 'Cookies required';exit; }	
	$_SESSION['asdfg']=rand(1000,2);	
	if ($formticket=='TRUE_POP')
	{	
	include('./includes/top4.php');	
	echo '<BR />';	
	include('./includes/create_ticket.php');	}	
	else
	{	
	include('./includes/top3.php');
	
	include('./includes/create_ticket.php');
	include('includes/bottom.php');	}
	exit;
	}
//================================



//========Send link for Poll First Step==========
IF (  ($_GET['action']=='poll1') )
{
$authz='TRUE';
include('./includes/top.php');

$lk=$_REQUEST['lang'];
$inc=('./language/polls/polls_'.$lk.'php');
   if ( file_exists($inc))
   { 
   include($inc);
   }
   else {
   $lk= $langdefault;
    $inc=('language/polls/polls_'.$lk.'.php');
   if ( file_exists($inc))
   {    include($inc);  }
   
   }

include('includes/bottom.php');
exit;
}
//=======================
//here was nos required authentication with 

//========Save results of current  Poll, Final Step==========
IF (  ($_GET['action']=='poll2') )
{
$authz='TRUE';
include('./includes/top.php');
 $caseq=  ($_POST['tix']);
$f=$_GET['case'];
		include('includes/EnDecryptText.php'); //encrypt.php				
        $EnDecryptText = new EnDecryptText();
        $verifc= $EnDecryptText->Decrypt_Text( $caseq);  

 $query = "	SELECT id FROM tickets_poll WHERE id='$f'"; 
  $result88 = @query_db($query);  
  if (query_db_num($result88)< $res_polls )
  					{  $query = "	INSERT INTO tickets_poll
						SET
						id     = '".$_GET['case']."',
						a     = '".$_POST['1']."',
						b     = '".$_POST['2']."',
     					c     = '".$_POST['3']."',
    					d     = '".$_POST['4']."',
     					e     = '".$_POST['5']."',
						comment = '".$_POST['comment']."',						
						staff = '".$_POST['staff']."',
						timestamp = '".   mktime()."'"; 	
						
										 
                  if ( $verifc==$f)	$result = @query_db($query);
 }
 else
{ echo '<br>'.'<br>'.'<br>'.$npolls.'<br>';}

if  ($result === true) 
{ include('./includes/poll2.php');}
else
{
echo '<br>'.$errorpoll;
}
include('includes/bottom.php');
exit;
}
//=======================

//======CLOSE SESSION============================
IF (isset($_GET['action']) && $_GET['action'] == 'Logout')
		{
		unset($_SESSION['stu_username']);
		unset($_SESSION['stu_password']);
		//$_GET['action'] = 'Login';
		session_destroy();
		$jump_here="Location: ".'./index.php';	
	    header($jump_here); 
		}
//==CLOSE TICKETS=======

IF (  ($_GET['action']=='kb') )
{
$jump_here="Location: ".'./kbase/kbase.php';	
	    header($jump_here); 
}
//


if ( isset($_GET['key'])   )//login by url por compatibilidad lo dejamos pero es inseguro
{
      include('includes/encrypt.php'); //debo descartar esta funcion por que agrega + en la url
	  $a= urldecode( $_GET['key'] );
	  $crypt = new xcrypt;
       $crypt->crypt_key($key_crypto); //esta libreria se queda por compatibilidad solamente
       $b= $crypt->decrypt($a);
       $_SESSION['xcv_userna']=$b;  
       $uss=$_SESSION['xcv_userna'];	   
      $_SESSION['xcv_passw']='';	   
      $pass_sended=$_GET['fvbgzxcd'];	   
     $query = "	SELECT * FROM users WHERE username='$uss'";
       $resust=@query_db($query);
       $fila88=query_db_assocc($resust);	   
	  $a= md5($fila88['password']);
      if ($a ==$pass_sended  )
      {$_SESSION['xcv_passw']=$fila88['password'];}

} //end of key

if ( isset($_GET['key2'])   )//login by url por compatibilidad lo dejamos pero es inseguro
{
	   $a= urldecode( $_GET['key2'] );
	   include('includes/EnDecryptText.php'); //encrypt.php
       $EnDecryptText = new EnDecryptText();
       $b = $EnDecryptText->Decrypt_Text($a);	  
       $_SESSION['xcv_userna']=$b;  
       $uss=$_SESSION['xcv_userna'];	   
      $_SESSION['xcv_passw']='';	   
      $pass_sended=$_GET['fvbgzxcd'];	   
     $query = "	SELECT * FROM users WHERE username='$uss'";
       $resust=@query_db($query);
       $fila88=query_db_assocc($resust);	   
	  $a= md5($fila88['password']);
      if ($a ==$pass_sended  )
      {$_SESSION['xcv_passw']=$fila88['password'];}

} //end of key2



$view_ticket=false;


if ( isset($_GET['key3']) or isset($_POST['key3'])   )//login by url
{
   if ( isset($_GET['key3']) )   $a= trim( $_GET['key3']); //keyview   
   if ( isset($_POST['key3']) )  $a= trim( $_POST['key3']); //keyview   firsy byt Get , next by post

	  $ticketid=trim($_GET['ticketid'] );
       if ($a<>'')
	   {
	   		$_SESSION['xcv_userna']='Unregistered';
			$_SESSION['xcv_passw']=md5(time() );
			$query = "	SELECT keyview FROM tickets_state WHERE id='$ticketid' ";	 
			$resust=@query_db($query);
			$fila88=query_db_assocc($resust);
			if ( strcmp($fila88['keyview'],$a)==0  )
			{ $view_ticket=true; }	   
			$userww='Unregistered';  //if set,list is invisible
	   }

} //end of key 3

//===========LOGIN
//after of this line real authentication exists=================
if ($view_ticket==false)
{
        if (check_login2()==false)
        { include('includes/timeout.php'); exit;}
}
//==================
IF (  ($_GET['action']=='profile') )
{
$authz='TRUE';
include('./includes/top.php');
include('./includes/profile.php');
include('includes/bottom.php');
exit;
}
//=======================

IF (  ($_GET['action']=='sprofile') )
{
$name=$_POST['name'];
$email=$_POST['email'];
$website=$_POST['website'];
$company=$_POST['company'];
$password=$_POST['password_here_etour'];

  $query56 = " UPDATE users SET name='$name',email='$email',website='$website',
   company='$company',password='$password'   WHERE username  = '".$_SESSION['xcv_userna']."'";			  
    $resultxx5 = query_db( $query56 );
$authz='TRUE';
include('./includes/top.php');
include('./includes/profile.php');
include('includes/bottom.php');
exit;
}



//=======CHANGE STATE OF TICKETS===============
$var_tem=0;
if (  ($_GET['action']=='close') or ($_GET['action']=='reopen') or isset($_POST['change_state'])  )
{

              if (  $_GET['action']=='close' )
              {
              $action='0'; //set this ticket state (closed)
              $_GET['action']=home;
              $var_tem=1; //lo que graba en la DB
              }

              if (  $_GET['action']=='reopen')
              {
              $action='1';
              $_GET['action']=home;
              $var_tem=1;
              }

             if (  isset($_GET['ticketid']) and ($var_tem==1) )
              {//==000
			   $ticketid=$_GET['ticketid'];
				  $query = "	UPDATE tickets_state	SET tickets_status = '".$action."'
                WHERE id   = '".$ticketid."'";
			    IF (!query_db($query))
			    {
			    $message= $errorchangingticket;
			   }
               }//==00000000

 if (     isset($_POST['ticket'])   )  FOREACH ( $_POST['ticket'] AS $ticketid)
{
               $action=$_POST['change_state' ];                
                $query = "	UPDATE tickets_state	SET tickets_status = '".$action."'
               WHERE id   = '".$ticketid."'";
			   IF (!query_db($query))
			   {
			   $message=$errorchangingticket;
			   }								

}


}

//=======INSERT TICKET -NEW OR AN ANSWER==============================

if (  isset($_POST['registernow'] ) )
{
$urgency  = explode('|', $_POST['urgency']);
if (  $_SESSION['body10']<> substr(addslashes($_POST['message']),1,10)  ) 
 { //To detect reloading
          //to avoif tickets spoofing  
  		if(  ($limit_tickets <>'UNLIMITED') and ($limit_tickets<>'') )
					   {					   
				      $xc=mktime();
				     $count_tick="SELECT count(*) FROM tickets_tickets where tickets_admin='".$_SESSION['xcv_userna'].
					  "' AND ($xc- tickets_timestamp < $limit_tickets)  ";
					  $vvv=query_db($count_tick);
					  $c=query_db_row($vvv);
					  if (  $c[0]> 0) //was exceded the number of tickets
					     { $authz='TRUE';
						 include('./includes/top.php');
                         include('./includes/not_create_ticket.php');
					 	exit;  }
				      }
          //to avoif tickets spoofing   
 
					$category = explode('|', $_POST['category']);
			 $query = "	INSERT INTO tickets_tickets
							SET
							tickets_username  = '".$_SESSION['xcv_userna']."',
							tickets_subject   = '".addslashes($_POST['ticketsubject'])."', 
							tickets_timestamp = '".mktime()."',
							tickets_urgency   = '".$urgency['0']."',
							tickets_category  = '".$category['0']."',
							tickets_child 	  = '".$_GET['ticketid']."',
							tickets_admin 	  = '".$_SESSION['xcv_userna']."',
                            tickets_email 	  = '".$_POST['email']."',
                            tickets_name 	  = '".$_POST['name']."',														
							tickets_question  = '".addslashes($_POST['message'])."'";
							$_SESSION['subjetzxc']=$_POST['ticketsubject'];
							$_SESSION['body10']=substr(addslashes($_POST['message']),1,10);
					IF ($result = query_db($query))
			{  
			   $id_ticket= query_db_insert_id();
			   //if ticket child=0 entonces es un ticket nuevo entonces seteo unread_user
               $el_id=$_GET['ticketid'];			   
                 if ( $el_id <>0) //o sea estoy poniendo una respuesta para el user
			     {
				 $is_new=FALSE;
                 $query56 = " UPDATE tickets_tickets	SET unread_admin = '1'
                 WHERE tickets_id   = '".$el_id."'";			  
                 $resultxx5 = query_db( $query56 );
 			     $for_staff='New Respose';
   			     $for_user= $your_responseq;
				 $new_ticketx=FALSE;
			     }
				 else
				 {
				 $is_new=TRUE;
				  //new ticket then a new entry is created
			      $el_id=query_db_insert_id(); 
		 	      $query556 = "	INSERT INTO tickets_state SET id='$el_id'";
                  $resultxx5 = query_db( $query556 );
			      $for_staff='New Ticket';
   			      $for_user=$new_tic;
  				  $new_ticketx=TRUE;
				 }

			
						IF ($allowattachments == 'TRUE')
							{							
							FileUploadsVerification("$_FILES(userfile)", $_FILES['userfile']['name'].'_'.$id_ticket);
							}
	// EMAIL 
												
						$message = stripslashes($_POST['message']).$separator;												
						if ( $sendhtml=='TRUE' )
                        { 
                        $separator='<BR>';
						$template = 'templates/email_notification.php';   
						 }
						else
						{
						$separator= chr(13).chr(10); // '\n\t'; 
						$template = 'templates/email_notification.txt';   
						}
												
					if ($include_responses=='TRUE')
						{						
						$message .= "$separator_______________________________________$separator";
						$message .= "$previosmesages $separator";
						$message .= "$separator";
	                    
						
						FOR ($i = COUNT($_POST['ticketquestion']); $i >= '1'; $i--)
							{
							    $message .= $_POST['postedby'][$i]." :: ".$_POST['postdate'][$i].$separator;							
								
							$recuperado=urldecode( stripslashes($_POST['ticketquestion'][$i]) );
						     if (@strpos($recuperado,'<BR>',strlen($recuperado)-5) == true)
							{ 							
							$recuperado=substr($recuperado,0,strlen($recuperado)-4);
							}			  
							  $message .=$recuperado;
								
								$message .="$separator___________________________________$separator";
								
							     IF (isset($_POST['attachment'][$i]) && $_POST['attachment'][$i] != '')
								   {
								   $message .= "$separator Attachment - ".$_POST['attachment'][$i];
								   }
								   
							   $message .= "$separator_______________________$separator";
							}
						
						
						} //If include_responses.
						
						//==========
						if ($open_responses == 'TRUE')
				        { //Open tickets clicking a url withour login
        				include('includes/encrypt.php');				
				        $el_user=$_SESSION['xcv_userna'];
			 	        $queryxx = " SELECT * FROM users WHERE username='$el_user'";
                        $resultxx = query_db( $queryxx );
				        $filaxx=query_db_assocc($resultxx);
						$user_namexx=$filaxx['name'];			
						
						/*
						$crypt = new xcrypt;
                       $crypt->crypt_key('tickets'); //assigns an encryption key
                       $key= $crypt->encrypt($el_user);						
                        $fvbgzxcd= MD5($filaxx['password']);         		
				        $watch_you_ticket0=$siteurl.'tickets.php'
		                .'?action=open&ticketid='.$el_id.'&key='.$key
		                .'&fvbgzxcd='.$fvbgzxcd.'&gty5='.substr( md5(time()),2,5) ;
						$watch_you_ticket	='<a href="'.$watch_you_ticket0.'">Check Ticket</a>'.$separator;
						*/
						
						$query556x = "	SELECT keyview FROM tickets_state WHERE id='$el_id'";
                 		$resultxx5 = query_db( $query556x );
				 		$thekey=query_db_row($resultxx5);				 
				 		$watch_you_ticket0=$siteurl.'tickets.php'
		        		.'?action=open&ticketid='.$el_id.'&key3='.$thekey[0]
		        		.'&fvbgzxcd='.substr( md5(time()),2,2) ;				
	            $watch_you_ticket	='<a href="'.$watch_you_ticket0."\">$openticket</a>";
						
						
						}
						//=============
						
						
						if ($new_ticketx==TRUE){
						$template ='templates/email_new_ticket_from_user.php';
						 }
						
						if ( $sendhtml=='TRUE' )
                        { 
						$template ='templates/email_new_ticket_from_user.php';
						$template_notif_staff='templates/notificate_response_staff.php';
						}
						else
						{
						$template ='templates/email_new_ticket_from_user.txt';
     					$template_notif_staff='templates/notificate_response_staff.txt';
						}
						
                        if(!($fp= fopen ($template, "r"))) die ("Can't open");
                        $dataText = fread($fp, 2000000);
                        fclose ($fp); 	   
                        $dataText = str_replace ('$rate_response','', $dataText);
                        $dataText = str_replace ('$id',$el_id, $dataText);
                        $dataText = str_replace ('$subjet',$_POST['ticketsubject'], $dataText);
                        $dataText = str_replace ('$urgency',$urgency['1'], $dataText);
						$dataText = str_replace ('$departament',$category['1'], $dataText);						
                        $dataText = str_replace ('$date',date($dformatemail), $dataText);
						$dataText = str_replace ('$username',$el_user, $dataText);
                        $dataText = str_replace ('$name',$user_namexx, $dataText);
						$dataText = str_replace ('$footer',$footer, $dataText);
						$dataText = str_replace ('$open_ticket',$watch_you_ticket, $dataText);                       
                        $dataText = str_replace ('$message',$message, $dataText);
						$dataText = str_replace ('$siteurl',$siteurl, $dataText);
                        
						$dataText =urldecode($dataText);
						if ($emailusercopy=='TRUE')
						{
						//echo 'xx2';
						if ($is_new==TRUE) { $last_msg .=' '.SendMail($_POST['email'],$_POST['name'],$for_user, $dataText);
						
						}
						if (  ($is_new==FALSE) and ($disableresponses<>'TRUE') ) {
						//echo 'xx3';
						$last_msg .=' '.SendMail($_POST['email'],$_POST['name'],$for_user, $dataText);
						}
												
						
						}
						
						if ($emailstaff=='TRUE')
						{
						$sqlCat="SELECT * FROM tickets_categories WHERE tickets_categories_id='$category[0]'";
						$resultCat=query_db($sqlCat);
						$rowCat=query_db_assocc($resultCat);						
						//Email Staff			
						
						if(!($fp2= fopen ($template_notif_staff, "r"))) die ("Can't open");
                        $dataText2 = fread($fp2, 2000000);
                        fclose ($fp2);
					    $message_write= substr($_POST['message'],0,100).'...';						
						$dataText2 = str_replace ('$id',$el_id, $dataText2);$dataText2 = str_replace ('$message',addslashes( $message_write ), $dataText2);
						$dataText2 = str_replace ('$departament',$category['1'], $dataText2);$dataText2 = str_replace ('$date',date($dformatemail), $dataText2);
						$dataText2 = str_replace ('$subjet',$_POST['ticketsubject'], $dataText2);$dataText2 = str_replace ('$siteurl',$siteurl, $dataText2);						
						$for_staff=$for_staff." of $user_namexx";
					$dataText2 =urldecode($dataText2);
					//echo 'xx4';
						$last_msg .=' '.SendMail($rowCat['email'],$_POST['name'],$for_staff,$dataText2);
					}
					
					if ($enablesms=='TRUE')
						{
						
						$sep_sms_= chr(13).chr(10);
						$sqlCat="SELECT * FROM tickets_categories WHERE tickets_categories_id='$category[0]'";
						$resultCat=query_db($sqlCat);
						$rowCat=query_db_assocc($resultCat);						
						//SMS to depart.						
						if(!($fp2= fopen ('templates/notificate_sms.txt', "r"))) die ("Can't open");
                        $dataText2 = fread($fp2, 2000);
                        fclose ($fp2);
					    $message_write= substr($_POST['message'],0,100).'...';						
						$dataText2 = str_replace ('$id',$el_id, $dataText2);
						$dataText2 = str_replace ('$message',addslashes( $message_write ), $dataText2);
						$dataText2 = str_replace ('$departament',$category['1'], $dataText2);
						$dataText2 = str_replace ('$date',date($dformatemail), $dataText2);
						$dataText2 = str_replace ('$subjet',$_POST['ticketsubject'], $dataText2);						
						$nro=$rowCat['sms']	;						
						$for_sms=	"api_id:$idsms$sep_sms_
						user:$usersms$sep_sms_
						password:$smspass$sep_sms_
						to:$nro$sep_sms_
						text:$dataText2";										
					$sendhtml='FALSE';//8bit encoding but text					
					$last_msg .=' '.SendMail('sms@messaging.clickatell.com','clickatell','SMS notification',$for_sms);
					
					}
					

}
} //end of detecting a ticket reloading

}//end of creating a new ticket
//=========================================

//============OPEN TICKET========================

	if ( $_GET['action']=='open')
	{	
	$authz='TRUE';
	include('./includes/top.php');
	include('./includes/open.php');
	include('includes/bottom.php');
	exit;
	}

//===========CREATES TICKET========================	

	if ( $_GET['action']=='create')
	{
	
	if(  ($limit_tickets <>'UNLIMITED') and ($limit_tickets<>'') )
					   {
					   $xc=mktime();
					  $count_tick="SELECT count(*) FROM tickets_tickets where tickets_admin='".$_SESSION['xcv_userna']					   
					   .
					   "' AND ($xc- tickets_timestamp < $limit_tickets)  ";
					   $vvv=query_db($count_tick);
					   $c=query_db_row($vvv);
					   $quedan=$limit_tickets-$c[0];					   
					   if (  $c[0]> 0) //was exceded the number of tickets
					          {
						  $authz='TRUE';
				          include('./includes/top.php');						
                          include('./includes/not_create_ticket.php');
						  	exit;
					          }
					   
					   }
	
	$authz='TRUE';
	include('./includes/top.php');
	include('./includes/create_ticket.php');
	include('includes/bottom.php');
	exit;
	}
//================================

//===DEFAULT ACTION LIST TICKETS================
 	 $query = "	SELECT distinct tickets_id,unread_admin,unread_user,
	            tickets_subject,tickets_question,
				tickets_timestamp,
				d.tickets_status, b.name,
				b.color, tickets_categories_name
				FROM tickets_tickets a, tickets_levels b, tickets_categories c, users,tickets_state d
				WHERE a.tickets_username = '".$_SESSION['xcv_userna']."'
				AND a.tickets_child = '0' AND  (a.tickets_urgency = b.id) 
			  AND  (a.tickets_category = c.tickets_categories_id)
			  AND d.id=a.tickets_id ";
				

			IF (!isset($_GET['order']))
			{
			$_GET['order']='1';
			}
			
			IF (isset($_GET['order']))
				{
				$query .= " AND d.tickets_status = '".$_GET['order']."'";
				$addon  = '&amp;order='.$_GET['order'];
				}
			IF (isset($_POST['keywords']))
				{//33 8888				
				
				$query = "SELECT distinct tickets_id,unread_admin,unread_user,tickets_username,
                  tickets_subject,tickets_question,
                  tickets_timestamp,tickets_child,
                  d.tickets_status, b.name,
                  color, tickets_categories_name
                  FROM tickets_tickets a, tickets_levels b, tickets_categories c, users,tickets_state d
				   WHERE
                  a.tickets_username = '".$_SESSION['xcv_userna']."'
			     AND  (a.tickets_urgency = b.id) 
			  AND  (a.tickets_category = c.tickets_categories_id)	  ";
			  
			  			IF (!isset($_GET['order']))
	             		{
	         		    $_GET['order']='1';
						}			
			            IF (isset($_GET['order']))
				        {
				       $query .= " AND d.tickets_status = '".$_GET['order']."'";
				        $addon  = '&amp;order='.$_GET['order'];
				       }
					   
					   
  			IF (isset($_POST['keywords']))
			{//33
			$keywords=$_POST['keywords'];
	       $query .= " AND MATCH(a.tickets_subject,a.tickets_question)
		   against ('$keywords' in boolean mode) ";
		   $addon  = '';
   			$result_preliminar   = query_db($query);
			 $total_ticket_search_in_parent = query_db_num($result_preliminar);
			
			if ($total_ticket_search_in_parent>0)//If exists any results
			{  //######3

		   	//$tickets_childs='(12)';
           $filvvv=query_db_assocc($result_preliminar);
		   $filvvv['tickets_child'];		   
           $tickets_childs='(';
		   
           do
          {
           if ($filvvv['tickets_child'] <>0) $agrego=$filvvv['tickets_child'];
		   if ($filvvv['tickets_child'] ==0) $agrego=$filvvv['tickets_id'];
		   
           {
		    $tickets_childs=$tickets_childs.$agrego.',';
			}
         }
         while ( $filvvv=query_db_assocc($result_preliminar) );
           $tickets_childs = $tickets_childs.'-100)';	
			
			$query = "SELECT distinct tickets_id,unread_admin,
			unread_user,tickets_username,
            tickets_subject,tickets_question,tickets_timestamp,
            d.tickets_status, b.name,color,
			tickets_categories_name
            FROM tickets_tickets a,tickets_levels b,
			tickets_categories c,users,tickets_state d
			WHERE
			a.tickets_id IN $tickets_childs 
		    AND a.tickets_id=d.id
            AND b.id=a.tickets_urgency
		   AND a.tickets_category=tickets_categories_id	";
			
			} //##### 
			
			}//33

				}
				//End New Query
			 $query .= '	ORDER BY a.tickets_id DESC, a.tickets_timestamp DESC';			
			//$query="SELECT MONTH('2003-12-31 01:02:03')";				
			$result       = query_db($query);
			$totaltickets = query_db_num($result);			
		$query_old=$query;
	include('includes/functions_php.php');
	$query = sprintf("%s LIMIT %d, %d",$query, $startRow_Recordset1, $maxRows_Recordset1);
	$result = query_db($query);
    $totalRows_contenido = query_db_num($result);
function set_class()
{
global $theclass;

$class1='even';
$class2='odd';
             IF($theclass == $class1)
			{
			$theclass = $class2;
			}
		    ELSE
			{
			$theclass = $class1;
			}


echo $theclass;

}
$authz='TRUE';
include('includes/top.php');
?>
<script type="text/javascript">
function sele(id)
{
//alert( id );
    var container_id='tables';
	var rows = document.getElementById(container_id).getElementsByTagName('tr');
	var checkbox;
  
    for ( var i = 0; i < rows.length; i++ ) 
	
	{
          checkbox = rows[i].getElementsByTagName( 'input' )[0];
           if ( checkbox && checkbox.type == 'checkbox' )	  
	       {
     	  if ( checkbox.checked==true){
	      rows[i].className='seleven';}
		  //if ( checkbox.checked==false){
	      //rows[i].className='even';}
		  
     	  } 
	}
return false;
}
function check(  )
 {
    var container_id='tables';
	var rows = document.getElementById(container_id).getElementsByTagName('tr');
    var unique_id;
    var checkbox;
  //alert( rows.length );

    for ( var i = 0; i < rows.length; i++ ) {

        checkbox = rows[i].getElementsByTagName( 'input' )[0];

        if ( checkbox && checkbox.type == 'checkbox' ) {
            unique_id = checkbox.name + checkbox.value;
            checkbox.checked = !(checkbox.checked);
            //rows[i].className = rows[i].className.replace(' marked', '');
            //marked_row[unique_id] = false;
        }//fin de if checkbox&&
    }

    return false;
}
</script>
<?php 
$authz='TRUE';
include('includes/list_tickets.php');
include('includes/bottom.php');
?>