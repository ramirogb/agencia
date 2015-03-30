<?php 

function check_login()//simple check users exists or not
{
		$usuario=$_SESSION['xcv_userna'];$password=$_SESSION['xcv_passw']; $query4444 = "	SELECT * FROM users WHERE username = '$usuario'	
				        AND status = '1' and password='$password' ";
						$result9550 = query_db($query4444);	
						
		$totalcvbvc456 = query_db_num($result9550);	IF ($totalcvbvc456 < 1)
			{
			$_SESSION['stavv']='Invalid login';$_SESSION['hlast_state']='Invalid login';$query4444 = "	SELECT * FROM users WHERE username = '$usuario'	
				        AND status = '0' and password='$password' ";
						$result9550 = query_db($query4444);		
		$totalcvbvc456 = query_db_num($result9550); IF ($totalcvbvc456 ==1)
			// echo ', Your account was disabled or was not activated.';
			{$_SESSION['stavv']='Disabled or not activated account';
	        $_SESSION['hlast_state']='Disabled or not activated account';			}			
			$jump_here="Location: ".'./index.php';
			 header($jump_here);
			  exit;
			  }
}
function check_login2()//are you active?
{
		$usuario=$_SESSION['xcv_userna'];  $password=$_SESSION['xcv_passw'];				 
	  $query4444 = "	SELECT * FROM users
				        WHERE username = '$usuario'	
				        AND status = '1' and password='$password' ";
		$result9550 = query_db($query4444);		
		$totalcvbvc456 = query_db_num($result9550);				
		
		IF ($totalcvbvc456 < 1)
			{
			
			return false;
			}
			else
			
			return true;
}

function is_admin()
{
		$usuario=$_SESSION['xcv_userna'];
	   $query4444 = "	SELECT admin FROM users where username='$usuario'";
   		$result9550 = query_db($query4444);
		$rr=query_db_row($result9550);
		if ($rr[0]=='Admin')
		{
		return true;
		}
		else
		{
		return false;		
		}


}

function user_level()
{
		$usuario=$_SESSION['xcv_userna'];
	  $query4444 = "	SELECT admin FROM users where username='$usuario'";
   		$result9550 = query_db($query4444);
		$rr=query_db_row($result9550);
		if ($rr[0]=='Admin')
		echo 'Level Administrator';
				if ($rr[0]=='User')
		echo 'Level User';

		if ($rr[0]=='Mod')
		{
		echo 'Level Staff Member';
		$_SESSION['mxdfrtg65']='ZXSE';
		}

}

function user_level2()
{
		$_SESSION['gnulevel']= -100; //user without login
		
		$usuario=$_SESSION['xcv_userna'];
	   $query4444 = "	SELECT admin,AgeCdg,id FROM users where username='$usuario'";	    
   		$result9550 = query_db($query4444);
		
		$rr=query_db_row($result9550);		
		if ($rr[0]=='Admin')$_SESSION['gnulevel']=2;		
		if ($rr[0]=='Mod')$_SESSION['gnulevel']=1;
		if ($rr[0]=='User')	$_SESSION['gnulevel']=0;
	    $query4444 = "	UPDATE users SET lastlogin='".mktime()."' WHERE username='$usuario'";		$result9550 = query_db($query4444);
		global $your_agency;
		global $user_id_logged;
		$user_id_logged=$rr[2];
		$your_agency=$rr[1]; //echo $_SESSION['gnulevel'];
       return $_SESSION['gnulevel'];
}
function confHtmlEnt($data)
{   return htmlentities($data, ENT_QUOTES, 'UTF-8');}
 $cleanPost = array_map('confHtmlEnt', $_GET); 
$_GET=$cleanPost;
?>