<?php //Inicialization
$your_agency='Null';
$user_id_logged=-1;
$demoxx=false;
$errors_db=false; //if no errors then commit
session_start();
include_once('config.php');
include_once('includes/functions.php');
function saca($a)		
{
$b=strpos($a,'[',0);
$r=substr($a,0,$b);
return $r;

}

function sacaI($a)		
{
$b=strpos($a,'[',0);
$c=strpos($a,']',0);
$r=substr($a,$b+1,$c-$b-1);
return $r;
}




$last_msg='';
$sendhtml='TRUE';

function log_booking($id,$add_comments)
{ global $user_id_logged;$ti=mktime();	 $querygg = "	INSERT INTO reservations_log	SET		DocNro   = '$id', timestamp   ='$ti' ,	Observ='$add_comments', user_id='$user_id_logged'";
 	$result = query_db($querygg);}

function set_class()
{global $theclass;$class1='even';$class2='odd';   IF($theclass == $class1)			{$theclass = $class2;}    ELSE
			{	$theclass = $class1;}echo $theclass;}

//======CLOSE SESSION============================
IF (isset($_GET['action']) && $_GET['action'] == 'Logout')
		{unset($_SESSION['stu_username']);
		unset($_SESSION['stu_password']);
		//algo pasa aqui que no puedo matar la sesion
		session_destroy();
		 setcookie('screenresolution','',00);
		$jump_here="Location: ".'./index.php?action=login';	
	    header($jump_here);
		 }
//=============CLOSE SESSION
?>
<?php 
$sendhtml=='TRUE';
$key_crypto='tickets'; //change to other seed
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":     $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";     break;     case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

if ($online=='FALSE')
 {
 exit;
 }
 include('check.php'); 
user_level2();
        if (check_login2()==false)
        { include('includes/timeout.php'); exit;}
$phpself = basename(__FILE__);
//Get everything from start of PHP_SELF to where $phpself begins
//Cut that part out, and place $phpself after it
$_SERVER['PHP_SELF'] = substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'],$phpself)) . $phpself;
$rtcv=$_SERVER['PHP_SELF'];

	IF (!isset($_REQUEST['lang']))
		{$_REQUEST['lang'] = $langdefault;}		
	$inc='language/'.$_REQUEST['lang'].'.php';	
	if (file_exists($inc)){	include($inc);}else 
	{$_REQUEST['lang'] = $langdefault;$inc='language/'.$_REQUEST['lang'].'.php';include($inc);	}

IF (!isset($_GET['action']))
		{ $_GET['action'] = 'home';}
//ends initialization begings if $_GET['x'==something do {} repeat several times
//===========SETTINGS========================
IF (  ($_GET['action']=='settings') )
{
	   if (  (is_admin()=== true) and ($demoxx==false)  )
  { //ONLY ADMIN	
	if ( isset($_POST['save5']) )
	{
	include('includes/config.lib.php');
	$c = new config();
	$c->config_setNewFile('configuration.php');
	$c->config_openFile();
	$c->config_set('sitename',$_POST['sitename']);
	$c->config_set('siteurl',$_POST['siteurl']);		
    $c->config_set('logo_url',$_POST['logo_url']);
    $c->config_set('langdefault',$_POST['langdefault']);  
	$c->config_set('dformat',$_POST['dformat']);
    $c->config_set('host',$_POST['host']);
    $c->config_set('user',$_POST['user']);
    $c->config_set('pass',$_POST['pass']);
    $c->config_set('data',$_POST['data']);
     $c->config_set('users_display',$_POST['users_display']);
    $c->config_set('tickets_display',$_POST['tickets_display']);	
    $c->config_set('sendmethod',$_POST['sendmethod']);
    $c->config_set('smtpauth',$_POST['smtpauth']);	
	$c->config_set('portSMTP',$_POST['portSMTP']);
	$c->config_set('smtpserver',$_POST['smtpserver']);	
    $c->config_set('socketfrom',$_POST['socketfrom']);
    $c->config_set('socketfromname',$_POST['socketfromname']);
    $c->config_set('smtpauthuser',$_POST['smtpauthuser']);
    $c->config_set('smtpauthpass',$_POST['smtpauthpass']);
    $c->config_set('footer',$_POST['footer']);
    $c->config_set('receive_notif',$_POST['receive_notif']);
    $c->config_set('nada',$_POST['nada']);  
	$c->config_set('activa_by_email',$_POST['activa_by_email']);
	$c->config_set('limit_tickets',$_POST['limit_tickets']);
	$c->config_set('bgcolor',$_POST['bgcolor']);
	$c->config_set('menu1',$_POST['menu1']);
	$c->config_set('menu2',$_POST['menu2']);	
	$c->config_set('menu3',$_POST['menu3']);
	$c->config_set('menu4',$_POST['menu4']);	
	$c->config_set('border',$_POST['border']);
	$c->config_set('online',$_POST['online']);
	$c->config_set('fontc',$_POST['fontc']);
	$c->config_set('limit_staff',$_POST['limit_staff']);
   $c->config_set('autoresponse',$_POST['autoresponse']);
   $c->config_set('retries',$_POST['retries']);   
    $c->config_set('usersms',$_POST['usersms']);
	$c->config_set('idsms',$_POST['idsms']);
	$c->config_set('smspass',$_POST['smspass']);
	$c->config_set('enablesms',$_POST['enablesms']);
	$c->config_set('formticket',$_POST['formticket']);
	$c->config_set('rate_responsest',$_POST['rate_responsest']);
	$c->config_set('disable_registering',$_POST['disable_registering']);
	$c->config_set('res_polls',$_POST['res_polls']);
	$c->config_set('disableresponses',$_POST['disableresponses']);
  	$c->config_closeFile();  
if (function_exists("gd_info"))
 {
  require('includes/gradient.php');
  $la_imagen;
  $image = new gd_gradient_fill(5,32,'vertical',$_POST['menu1'],$_POST['menu2'],1);
  imagepng($la_imagen,'images/bg_blu.png'); 
  $la_imagen;
  $image = new gd_gradient_fill(5,32,'vertical',$_POST['menu3'],$_POST['menu4'],1);
  imagepng($la_imagen,'images/bg_blu2.png'); 
} //gd support
  
	}
  }
else 
{
$last_msg='Denied not Admin';
}	
	   if ( $_POST['emailfortest']<>'')
       {
       $dataText= $msg1;
       $for_staff=$msg2;
       $el_from=$socketfromname;
       $el_email=$_POST['emailfortest'];
       $last_msg .=' '.SendMail($el_email,$el_from,$for_staff,$dataText);	   
       }
	
	$authz='TRUE';
	include('./includes/top_quo.php');
	@include('./includes/the_settings.php');
	include('includes/bottom.php');
	exit;
}
//======================AJAX responses for selects======= set session vars then print response interpreted by javascript
//============================AJAX Listener sets vars at session

    if ( isset($_GET['aj']))//value crea un valor de sesion con el mismo nombre de la variable 
	{
	$namm=saca( trim($_GET['ajj'] )); 	//name of var
	$nn=(int) sacaI(trim($_GET['ajj'])); 
	
	 $in= 2; //casting to number
	 $in=$in+$nn-2;	 
	 $gt=trim($_GET['aj']); //the value
	$_SESSION[$namm][$nn]= trim($_GET['aj']);
	//patch 	
	//exit;	
	//$_SESSION['serv'][1]=22;
/*echo '<script language="javascript">confirm("Do you want this?")</script>;'; */
	exit;
	}
//==============================
//selectiong catalog
    if ( isset($_GET['catalog']))
	{
	$catalog=$_GET['catalog'];	
	$indice=$_GET['j'];
//$_SESSION['catalog1']=$_GET['catalog'];
$_SESSION['cate'][$indice]=$_GET['catalog']; 

   }
   

if ( $_GET['action']=='lev_service')
{
session_start();
$sq="select distinct (tipe),descript from serv_type_lang,servicios_variations 
where  servicios_variations.kind=serv_type_lang.tipe
and  SerCdg ='".$_GET['service']."'";
$resulto = query_db($sq);
$fil=query_db_assoc($resulto);

$n=$_GET['j'];
$mimi= ' '.' ;';
do
{
$ti=$fil['tipe'].'&j='.$n;
$la=$fil['descript'];
$mimi .= $la.'-'.$ti.';';

} while($fil=query_db_assoc($resulto));

$_SESSION['serv'][$n]=$_GET['service'];
header($encoding);
echo $mimi;
exit;

}

if ( $_GET['action']=='lev_tipe') //setea tipos servicios
{
//$sese
 $n=$_GET['j'];
$sese=$_SESSION['serv'][$n]; //$_SESSION['serv'][$n];;
$gb=$_GET['service'];

 $sq=" Select * from serv_type_lang,languajes where serv_type_lang.tipe ='$gb' and serv_type_lang.SerCdg='$sese' and serv_type_lang.lang=languajes.lang";
$resulto = query_db($sq);
$fil=query_db_assoc($resulto);
$mimi = ' '.' ;';
do
{
$ti=$fil['lang'];//caption
$la=$fil['lang_descript'];//value
$mimi .= $la.'-'.$ti.';';

} while($fil=query_db_assoc($resulto));
header($encoding);
echo  ($mimi);
exit;
}

if ( $_GET['action']=='lev_cat')
{

$nn=$_GET['service']; $n=$_GET['j'];
 if (   isset($_SESSION['cate'][$n]) and ($_SESSION['filter']=='2') ) 
  {//==============  
	$hh=$_SESSION['cate'][$n];	$gt=$_SESSION['xcv_userna'];
	$sqlr="select agencias.AgeCdg from agencias left join  users on agencias.AgeCdg=users.AgeCdg where users.username='$gt' ";
	$resultdf = query_db($sqlr);$ag=query_db_row($resultdf);
	$agg=$ag[0];//gets agency code associated with the logged user	
	$query577 = "SELECT  * FROM servicios where tarif_cdg='$hh' and  SerAgeCdg='$agg'  ORDER BY SerDsc desc";	//show only special services for this agency
	 }
	 //===========
	 else
	 {	 $nn=$_SESSION['cate'][$n];	 
	  $query577 = "SELECT  * FROM servicios  where tarif_cdg='$nn' and active=1 ORDER BY SerDsc desc";//shows all from catalog
	 }
	$resulto = query_db(	$query577);
	$fil=query_db_assoc($resulto);

	$mimi= ' '.' ;';
	do
{
$ti=$fil['SerCdg'].' '.substr($fil['SerDsc'] ,0,25); //caption
$la=$fil['SerCdg'];//value
$mimi .= $ti.'-'.$la.';';

} while($fil=query_db_assoc($resulto));
header($encoding);echo $mimi;
exit;

}
//==============

	if ( $_GET['action']=='config')
	{	$code=$_GET['code'];	
	$authz='TRUE';	include('./includes/top_quo.php');
	include('./includes/the_settings.php');
	include('includes/bottom.php');	exit;	}
	
	//=============REPORTS MAIN

	if ( $_GET['action']=='history')
	{	$code=$_GET['code'];
	
	$authz='TRUE';	include('./includes/top_quo.php');
	include('./includes/reports_user.php');
	include('includes/bottom.php');	exit;	}
	
//================================

	
//=============REPORTS MAIN

	if ( $_GET['action']=='reports')
	{	$code=$_GET['code'];
	
	$authz='TRUE';	include('./includes/top_quo.php');
	include('./includes/reports.php');
	include('includes/bottom.php');	exit;	}
	
//================================

if ($_GET['action']=='update_det')
{
	if (isset($_POST['Country']))      { $Country=$_POST['Country'];} else  $Country=$_POST['Country1'];
	if (isset($_POST['Paxname'] ))     { $paxname=$_POST['Paxname'];} else  $paxname=$_POST['Paxname1'];
	if (isset($_POST['observations'])) {$Obs=$_POST['observations'];} else { $Obs=$_POST['observations1']; } 
	if (isset( $_POST['state_reserv'])) { $state_reserv=$_POST['state_reserv'];}else  { $state_reserv=$_POST['state_reserv1'];}
	if (isset($_POST['FacNro'])) { $FacNro=$_POST['FacNro']; }else { $FacNro=$_POST['FacNro1']; }
	$ImpTipCam=$_POST['ImpTipCam'];
	$Doc=$_POST['DocN'];
	$opera=$_POST['operator'];
	
	
	if ($_POST['state_reserv']==1)
	{
	$date_confirm=mktime();
	}
	
		if ($_POST['acti']=='quote')	
		{ $table='quotations';$table2='quotation_master';
		$what=$service_quo;
		$read_only='disabled';
		$_GET['action']='rtp_quote';
		}
		else
		{$table='myreservas';$table2='reserv_master';
		$what=$service_reserv;
		$_GET['action']='rtp_reserv';
		}

$etax=$_POST['FecLimPrePag'];
$year = (int) substr($etax,6,4);$mon  = (int) substr($etax,3,2);	 $day  = (int) substr($etax,0,2);	$hour = (int) substr($etax,11,2);	 $min  = (int) substr($etax,14,2);$sec  = substr($etax,17,2);
	if ($etax<>'') 
	{ 
	//echo $day;
	 $eta_=mktime($hour,$min,$sec,$mon,$day,$year);
	}else $eta_=''; 

 begin_trans();
 $updateSQL ="UPDATE $table2  SET country='$Country',
   FecLimPrePag='".$eta_."',
   FacNro='$FacNro',
   Paxname='$paxname',
   PerRes= '".$_POST['PerRes']."',
   Observ= '".$_POST['observations']."',
   state_reserv='$state_reserv',
   date_confirm='$date_confirm',
   ImpTipCam='$ImpTipCam' where DocNro='".$Doc."'";
   $Result1 = query_db($updateSQL);
   
$add_comments='Updated booking';
log_booking($Doc,$add_comments);
//esta mal tiene que mandar a quien creo la reserva no usuario logueado actualmente
$sqlo="select * from users,$table2 where 	DocNro='$Doc' and users.AgeCdg=$table2.AgeCdg";
 $resulto = query_db($sqlo) ;
 end_trans();
 $fil=query_db_assoc($resulto);
   include('includes/fill_reserv.php');
  
      prepare_template($cotiza, $reserva,$Doc, $table, $table2);
//Prepare vars for template   
$dataText=$update_boking.$footer;
$asunto=$update_boking;
$last_msg .=' '.SendMail($fil['email'],	$fil['name'],$asunto,$dataText,$templateDoc);
unlink($templateDoc);

}

//=================================
	if ( $_GET['action']=='add_service')	
	{
	include('includes/add_listing_services.php');exit;
	}

//===Banned users=============
	if ( $_GET['action']=='get_users')
	{	          //tickets OPEN		
	$t=trim($_POST['separator']);
	$gg=trim($_POST['listusers']);
    $query1="SELECT *  FROM	users WHERE status='$gg' ";
	$resulta  = query_db($query1);
	$row_Recordsetx = query_db_assoc($resulta);
	       $your_data = "";
         do {
     $f0 = $row_Recordsetx['name'];
     $f1 = $row_Recordsetx['username'];
     $f2 =$row_Recordsetx['email'];
     $f3 =$row_Recordsetx['website'];	
     $bbbb= $f0.$t   .$f1.$t.  $f2.$t.  $f3.chr(13).chr(10);
	 $your_data = $your_data.$bbbb;
   }
 while ($row_Recordsetx = query_db_assoc($resulta));	
	     $ghgh='report.txt';
         touch($ghgh);
         $archivo = fopen($ghgh, "w")or die("can't open file");                 
		 fwrite($archivo, $your_data);
         fclose($archivo);		 
		 if ($_POST['arch']=='text')
		 {		 $f=$ghgh;		}
		else
		{	require('includes/zip.inc.php');
        $zipfile = new zipfile();
        $zipfile -> add_file($your_data, "report.txt");
        $filename = "report.zip";
        $fd = fopen ($filename, "wb");
        $out = fwrite ($fd, $zipfile -> file() );
        fclose ($fd);
		$f=$filename;}
         $r_code  =  file_get_contents($f);  //  Get  file  your  want  user  to  download 
         $com  =  substr($f,  strrpos($f,  '.')  +  1);    //  Get  extension  
		 header("Pragma:  public"); 
         header("Cache-control:  public");    
         header("Content-disposition:attachment;  filename=$f"); 
         header("Content-Type:  text/"  .  $com  .  ";  charset=utf-8"); 
         header("Content-Transfer-Encoding:  binary"); 
         header("Content-Length:  "  .  strlen($r_code));	
		 echo  $r_code;  
         @unlink('report.txt');
         @unlink('report.zip');		
        exit;
	}
//==========RATING OF TICKETS=======

	
	
//=============LISTINGS

	if ( ($_GET['action']=='rtp_reserv') or isset( 	$_POST['search'] ) )
	{	$ttt=$_GET['t'];	$act2=$_GET['act2'];

	if ( $ttt=='archi') { $sst=" and state_reserv =5"; }
	if ( $ttt=='cancel') { $sst=" and state_reserv =2"; }

	
	
		$code=$_GET['code'];	
	  $agency=$your_agency;
	  $querybb="select DISTINCTROW(reserv_master.DocNro),
      reserv_master.AgeCdg,
     reserv_master.paxnumber,   
    reserv_master.Date_first_serv,    
	reserv_master.servcount,
    reserv_master.state_reserv,
	reserv_master.timestamp
     FROM reserv_master,myreservas
     where myreservas.DocNro=reserv_master.DocNro  	$sst ";
	 
		 if (isset( 	$_POST['search'] ) )
		 {	 $busca=$_POST['reserv'];	  $querybb="select DISTINCTROW(DocNro),
	      AgeCdg,paxnumber,Date_first_serv,servcount,state_reserv,timestamp     FROM reserv_master  ";
		 $querybb .= "where  DocNro like '%$busca%'  ";	 }
		 
		 if ($ttt=='waiting' )//filter deudores
		 {	 $busca=$_POST['reserv'];	 $querybb="select DISTINCTROW(DocNro),
	      AgeCdg,paxnumber,Date_first_serv,servcount,state_reserv,timestamp,they_owe_you,total_price     FROM reserv_master  ";
		$querybb .= "where  they_owe_you=total_price and state_reserv=1 ";	 }
		
			if ( $ttt=='half') 
			{
			 $busca=$_POST['reserv'];	  $querybb="select DISTINCTROW(DocNro),     AgeCdg,paxnumber,Date_first_serv,servcount,
			 state_reserv,timestamp,they_owe_you,total_price     FROM reserv_master  ";
		$querybb .= "where  (they_owe_you < total_price)  and ( they_owe_you>0 ) and state_reserv=1 ";
		 }	
	 
	 if ( $ttt=='new') 
			{
			 $busca=$_POST['reserv'];	  $querybb="select DISTINCTROW(DocNro),     AgeCdg,paxnumber,Date_first_serv,servcount,
			 state_reserv,timestamp,they_owe_you,total_price     FROM reserv_master  ";
		$querybb .= "where   state_reserv='0' ";
		 }	
		 
			 if ( $ttt=='tomorrow') 
			{
			 $busca=$_POST['reserv']; //01/30/2010 
             $from=date("Y-m-d" );  
			$querybb="select DISTINCTROW(DocNro),     AgeCdg,paxnumber,Date_first_serv,servcount,state_reserv,timestamp,they_owe_you,total_price     FROM reserv_master  ";
			$querybb .= "where   state_reserv='1' and Date_first_serv BETWEEN UNIX_TIMESTAMP('$from')	AND   (UNIX_TIMESTAMP('$from') +86400) ";
		 }	
		 			 if ( $ttt=='next_week') 
			{ $busca=$_POST['reserv']; //01/30/2010 
             $from=date("Y-m-d" );  
			$querybb="select DISTINCTROW(DocNro),     AgeCdg,paxnumber,Date_first_serv,servcount,state_reserv,timestamp,they_owe_you,total_price     FROM reserv_master  ";
			$querybb .= "where   state_reserv='1' and Date_first_serv BETWEEN UNIX_TIMESTAMP('$from')	AND   (UNIX_TIMESTAMP('$from') +1209600) ";
		 }	


			 if ( $ttt=='order_f_service') 
			{
			 $busca=$_POST['reserv']; //01/30/2010 
             $from=date("Y-m-d" );  
			$querybb="select DISTINCTROW(DocNro),     AgeCdg,paxnumber,Date_first_serv,servcount,state_reserv,timestamp,they_owe_you,total_price     FROM reserv_master  ";
		//$querybb .= "where   state_reserv='1' ";
		 }	
 
 if ( $ttt=='paid') 
			{
			 $busca=$_POST['reserv'];	  $querybb="select DISTINCTROW(DocNro),     AgeCdg,paxnumber,Date_first_serv,servcount,
			 state_reserv,timestamp,they_owe_you,total_price     FROM reserv_master  ";
		$querybb .= "where  (they_owe_you=0) and (total_price>0)  and state_reserv=1 ";
		 }	
		 
	 	
	 
	 if (user_level2()==0) //single user	 
	 {
	 	  $querybb="select DISTINCTROW(reserv_master.DocNro),
      reserv_master.AgeCdg,
     reserv_master.paxnumber,   
    reserv_master.Date_first_serv,
    reserv_master.servcount,
    reserv_master.state_reserv,
	reserv_master.timestamp
     FROM reserv_master,myreservas
     where myreservas.DocNro=reserv_master.DocNro and reserv_master.AgeCdg='$agency' 
	 	$sst ";
	 }
	  if ( $ttt<>'order_f_service') 
	  {
	  $querybb .="ORDER BY reserv_master.timestamp DESC ";
	  }
	  else
	  {$or=$_GET['order'];
	 $querybb .="ORDER BY reserv_master.Date_first_serv $or ";
	  }
	  if ($_SESSION['order_by'][1]=='first_service') 	  $querybb .="ORDER BY reserv_master.Date_first_serv DESC ";
	//paging
	$result       = query_db($querybb);
	$totaltickets = query_db_num($result);				
	 $query_old=$querybb;		
	include('includes/functions_php.php');
  $query = sprintf("%s LIMIT %d, %d",$querybb, $startRow_Recordset1, $maxRows_Recordset1); 				
			$result = query_db($query);
	$totalRows_contenido = query_db_num($result);								
$q3=time();
//paging end
	
	$authz='TRUE';	include('./includes/top_quo.php');
	include('./includes/list2.php');
	include('includes/bottom.php');	exit;	}
//=========================================
	if ( $_GET['action']=='rtp_quote')
	{	$code=$_GET['code'];	
	$authz='TRUE';	include('./includes/top_quo.php');
	
	 $querybb="select  DISTINCTROW (quotation_master.DocNro),
 quotation_master.AgeCdg,quotation_master.paxnumber, 
 quotation_master.timestamp,
 quotation_master.Date_first_serv,quotation_master.servcount,quotation_master.state_reserv
  FROM quotation_master, quotations where quotations.DocNro=quotation_master.DocNro ORDER BY quotation_master.timestamp DESC";
  
   if (user_level2()==0)
	 {$agency=$your_agency;
	$querybb="select  DISTINCTROW (quotation_master.DocNro),
 quotation_master.AgeCdg,quotation_master.paxnumber, 
 quotation_master.timestamp,
 quotation_master.Date_first_serv,quotation_master.servcount,quotation_master.state_reserv
  FROM quotation_master, quotations where quotations.DocNro=quotation_master.DocNro and quotation_master.AgeCdg='$agency' ORDER BY quotation_master.timestamp DESC ";
	 
	 }

		//paging
	$result       = query_db($querybb);
		$totaltickets = query_db_num($result);				
	 $query_old=$querybb;		
	include('includes/functions_php.php');
//$q2=time()-$q1;
//echo $q2;	
 $querybb = sprintf("%s LIMIT %d, %d",$querybb, $startRow_Recordset1, $maxRows_Recordset1); 				
			$result = query_db($querybb);
	$totalRows_contenido = query_db_num($result);								
$q3=time();
//paging end
	include('./includes/list_quo.php');
	include('includes/bottom.php');	exit;	}
//=============EDIT AGENCIES
	if ( $_GET['action']=='update_agenci' and (is_admin()=== true))
	
	{	

		$authz='TRUE';	
		 $updateSQL = sprintf("UPDATE agencias SET AgeDsc=%s, AgeDscAbr=%s, AgeDir=%s, AgeFon=%s, AgeFax=%s, AgeCto=%s,  AgeRuc=%s, Color1=%s, Color2=%s, AgeFon2=%s, AgeNex=%s, AgeCelMov=%s, AgeCelCla=%s WHERE AgeCdg=%s",
                       GetSQLValueString($_POST['AgeDsc'], "text"),
                       GetSQLValueString($_POST['AgeDscAbr'], "text"),
                       GetSQLValueString($_POST['AgeDir'], "text"),
                       GetSQLValueString($_POST['AgeFon'], "text"),
                       GetSQLValueString($_POST['AgeFax'], "text"),
                       GetSQLValueString($_POST['AgeCto'], "text"),                       
                       GetSQLValueString($_POST['AgeRuc'], "int"),
                       GetSQLValueString($_POST['Color1'], "int"),
                       GetSQLValueString($_POST['Color2'], "int"),
                       GetSQLValueString($_POST['AgeFon2'], "text"),
                       GetSQLValueString($_POST['AgeNex'], "text"),
                       GetSQLValueString($_POST['AgeCelMov'], "text"),
                       GetSQLValueString($_POST['AgeCelCla'], "text"),
                       GetSQLValueString($_POST['AgeCdg'], "text"));

  $Result1 = query_db($updateSQL);		
		include('./includes/top_quo.php');		
		include('./includes/list_agencies.php');include('includes/bottom.php');	exit;	}
//=============
	if ( $_GET['action']=='changS')
	{	
	
	$code=$_GET['memberid'];	
	$new_sta=$_GET['sub_act'];
if  ( ($new_sta==0) or ($new_sta==1)  )

	$authz='TRUE';	
		    
		   $query = " UPDATE servicios SET active = '".$new_sta."'
			WHERE SerCdg = '".$_GET['memberid']."'";
		    $result = query_db($query);
		   
		   $_GET['action']='list_services';
		   if ($new_sta==1) {$zc=$active; }else {$zc=$disabled;}
		   log_booking('','Update service '.$code.$zc);
}
//=============ADD 

//=============DEL SERVICES
	if ( $_GET['action']=='del_service' and (is_admin()=== true) )
	{	$code=$_GET['code'];	
	$authz='TRUE';	include('./includes/top_quo.php');
	 begin_trans();
	$query3x4 = "DELETE FROM   servicios WHERE SerCdg='$code'";
    $result3x4 = query_db($query3x4);
	$query3x4 = "DELETE FROM   serv_type_lang WHERE SerCdg='$code'";
   $result3x4 = query_db($query3x4);
 end_trans();
		include('./includes/list_services.php');include('includes/bottom.php');	exit;	}
//=============

//begin tarifas
	if ( $_GET['action']=='edit_tarifas2'  and (is_admin()=== true) )
{

  $updateSQL = sprintf("UPDATE servicios SET EmpCdg=%s, SerDsc=%s, SerDscAbr=%s, SerPre=%s, SerAgeCdg=%s, SerUsuAdd=%s, SerFecAdd=%s, levels_users=%s, tarif_cdg=%s WHERE SerCdg=%s",
                       GetSQLValueString($_POST['EmpCdg'], "text"),
                       GetSQLValueString($_POST['SerDsc'], "text"),
                       GetSQLValueString($_POST['SerDscAbr'], "text"),
                       GetSQLValueString($_POST['SerPre'], "double"),
                       GetSQLValueString($_POST['SerAgeCdg'], "text"),
                       GetSQLValueString($_POST['SerUsuAdd'], "text"),
                       GetSQLValueString($_POST['SerFecAdd'], "date"),                       
                       GetSQLValueString($_POST['levels_users'], "int"),
                       GetSQLValueString($_POST['tarif_cdg'], "text"),
                       GetSQLValueString($_POST['SerCdg'], "text"));
  $Result1 = query_db($updateSQL);  
  	$authz='TRUE';
	include('./includes/top_quo.php');
	include('./includes/list_services.php');
	include('includes/bottom.php');
	exit;

}
//=============EDIT tarifas individual
	if ( $_GET['action']=='edit_tarif3' and (is_admin()=== true) )
	{	$authz='TRUE';	
	
	 $xxx= $_POST['service'];
	$agen=  $_POST['agen_old'];
	$serv_type= $_POST['tipe'];
	
	 begin_trans();
	 $query3x4 = "DELETE FROM   tarifasdetalle WHERE SerCdg='$xxx' and AgeCdg='$agen' and  serv_type = '$serv_type' "; $result3x4 = query_db($query3x4);
	 $query3x4 = "DELETE FROM   serv_type_lang WHERE SerCdg='$xxx' and tipe = '$serv_type' ";$result3x4 = query_db($query3x4);
		
	
	 for ($nn=0; $nn <$_POST['count']; $nn++)
	 {	  $etax=$_POST['FecIni']; $year = (int) substr($etax,6,4);$mon  = (int) substr($etax,3,2);	 $day  = (int) substr($etax,0,2);
	     if ($etax<>'') 	{ $FecIni=mktime(0,0,0,$mon,$day,$year);}
		 
		 $etax=$_POST['FecFin']; $year = (int) substr($etax,6,4);$mon  = (int) substr($etax,3,2);	 $day  = (int) substr($etax,0,2);
	     if ($etax<>'') 	{ $FecFin=mktime(0,0,0,$mon,$day,$year);}	 

	     $price=$_POST['price'][$nn];$agen=  $_POST['AgeCdg']; $paxini=$_POST['paxini'][$nn]; $paxfin=$_POST['paxfin'][$nn];		 		 
		$query3x4 = "INSERT INTO tarifasdetalle	SET SerCdg = '$xxx', FecIni='$FecIni',FecFin='$FecFin',
		   AgeCdg = '$agen', PaxIni = '$paxini', PaxFin = '$paxfin',pre='$price',serv_type = '$serv_type'";$result3x4 = query_db($query3x4); 	
		
	}

 for  ($co=0;$co<= count($_POST['lang']); $co++ )
		{ 
		if( isset($_POST['lang'][$co]))
	 	{
		$langua=$_POST['len'][$co];
		$query3x4 = "INSERT INTO serv_type_lang	SET SerCdg = '$xxx', tipe = '$serv_type',lang='$langua'";$result3x4 = query_db($query3x4);
		}
		 

			
	 end_trans();

  }	
	include('./includes/top_quo.php');
		include('./includes/list_tarif.php');include('includes/bottom.php');	exit;	}
//=============

//=============INSERT TARIFA

	if ( $_GET['action']=='tarif2' and (is_admin()=== true) )
	 //step 3
	{
	
	$xxx=$_SESSION['wizard_service'];
if (strlen($_POST['Sercdg'] ) >0){	$xxx= $_POST['Sercdg']; }
	
	$agen=$_SESSION['agency'];
	$serv_type=$_SESSION['serv_type'];
	 begin_trans();
	$query3x4 = "DELETE FROM   tarifasdetalle WHERE SerCdg='$xxx' and AgeCdg='$agen' and  serv_type = '$serv_type' ";
	$result3x4 = query_db($query3x4);		   
		   
	for($aa=0;$aa < $_POST['count']; $aa++ ) 		
	      {
		  $etax=$_POST['FecIni'];		  
		    $year = (int) substr($etax,6,4);$mon  = (int) substr($etax,3,2);	 $day  = (int) substr($etax,0,2);
	     if ($etax<>'') 	{ $FecIni=mktime(0,0,0,$mon,$day,$year);}
		 
		  $etax=$_POST['FecFin'];  
		    $year = (int) substr($etax,6,4);$mon  = (int) substr($etax,3,2);	 $day  = (int) substr($etax,0,2);
	     if ($etax<>'') 	{ $FecFin=mktime(0,0,0,$mon,$day,$year);}	 

		  
		  $paxini=$_POST['paxini'][$aa];
		  $paxfin=$_POST['paxfin'][$aa];
		  $price=$_POST['price'][$aa];
		  $agen=  $_SESSION['agency']; 
		 $query3x4 = "INSERT INTO tarifasdetalle	SET SerCdg = '$xxx', FecIni='$FecIni',FecFin='$FecFin', AgeCdg = '$agen', PaxIni = '$paxini', PaxFin = '$paxfin',pre='$price',serv_type = '$serv_type'";	
		    $result3x4 = query_db($query3x4);   	       
		   }
	

 end_trans();

	$authz='TRUE';	include('./includes/top_quo.php');
	if (isset($_SESSION['wizard_service']))
	{
		unset( $_SESSION['wizard_agen']);
		unset($_SESSION['catalog']);
		unset($_SESSION['wizard_service']);
		include('./includes/control.php');
	}else
	{
	include('./includes/insert_tarif.php');
	}
	include('includes/bottom.php');	exit;	}

//============================================
	if ( $_GET['action']=='tarif1' and (is_admin()=== true) ) 
	//step 2
	{	$code=$_GET['code'];
	$_SESSION['tarif']	=$_POST['tarif'];
	$_SESSION['serv_type']=$_POST['serv_type']; //will be used with ['action']=='tarif2'
	$_SESSION['AgeCdg']=$_POST['AgeCdg'];//will be used with ['action']=='tarif2'
	$ing=explode('|',$_POST['mitarif']);
	$_SESSION['mitarif']	=$ing[0];	//the service
	$_SESSION['agency']=$ing[1];      //only for one agency?
	$serv=$ing[0];$ser_tipe=trim($_POST['serv_type']);
	 begin_trans();
 $query3x4 = "DELETE FROM   serv_type_lang WHERE SerCdg = '$serv' and tipe = '$ser_tipe' ";		 
   $result3x4 = query_db($query3x4);   
//borra lo general pero no lo eslecifico   type_lang WHERE ...	
	for  ($co=0;$co<= count($_POST['lang']); $co++ )
	{
			 if( isset($_POST['lang'][$co]))
			 {
			 $langua=$_POST['len'][$co];
			$query3x4 = "INSERT INTO serv_type_lang	SET SerCdg = '$serv', tipe = '$ser_tipe',lang='$langua'";	
		    $result3x4 = query_db($query3x4);
			}
	}

 end_trans();
	
	if ($_POST['predet']==1)
		   {
		include('includes/config.lib.php');
		$c = new config();
		$c->config_setNewFile('configuration.php');		
		$c->config_openFile();
		$c->config_set('cols_prices',$_POST['ranges']);	
	  	$c->config_closeFile(); 		   
		   }
	
	$authz='TRUE';	include('./includes/top_quo.php');
		include('./includes/insert_tarif2.php');include('includes/bottom.php');	exit;	}


	if ( $_GET['action']=='create_tarif' and (is_admin()=== true) )
	///STEP 1
	{	$code=$_GET['code'];		
	$authz='TRUE';	include('./includes/top_quo.php');
		include('./includes/insert_tarif.php');include('includes/bottom.php');	exit;	}
//=============

//List tarifas
	if ( $_GET['action']=='list_tarif')
	{	
	$authz='TRUE';
	include('./includes/top_quo.php');
	include('./includes/list_tarif.php');
	include('includes/bottom.php');
	exit;
		}

if ( $_GET['action']=='update_serv_variations' and (is_admin()=== true) )
	{	
	$authz='TRUE';	
	include('./includes/top_quo.php');	
	$name=$_POST['name'];
	$code=$_POST['id'];	
	$updateSQL = "UPDATE servicios_variations SET descript ='$name' where kind='$code'";

  $Result1 = query_db($updateSQL);	
	include('./includes/list_serv_variations.php');
	include('includes/bottom.php');
	exit;
		}



//UPDATE CATALOG 2

if ( $_GET['action']=='update_category' and (is_admin()=== true) )
	{	
	$authz='TRUE';	
	include('./includes/top_quo.php');	
	$name=$_POST['name'];
	$code=$_POST['code'];
	$id=$_POST['id'];
		 $updateSQL = "UPDATE tarifarios SET descript ='$name' where id='$id'";                   

  $Result1 = query_db($updateSQL);	
	include('./includes/list_catalog.php');
	include('includes/bottom.php');
	exit;
		}
//========END TARIFAS=======

//UPDATE CATALOG
if ( $_GET['action']=='edit_serv_type' and (is_admin()=== true) )
	{	
	$authz='TRUE';	
	include('./includes/top_quo.php');
		
	include('./includes/edit_serv_variations.php');
	include('includes/bottom.php');
	exit;
		}
//========END TARIFAS=======
//UPDATE CATALOG
if ( $_GET['action']=='edit_catalog' and (is_admin()=== true) )
	{	
	$authz='TRUE';	
	include('./includes/top_quo.php');
		
	include('./includes/edit_catalog.php');
	include('includes/bottom.php');
	exit;
		}
//========END TARIFAS=======
//============
if ( $_GET['action']=='del_lang' and (is_admin()=== true) )
	{	
	$authz='TRUE';
	$code=$_GET['code'];	
		$query3x4 = "DELETE FROM   languajes WHERE lang='$code'";
		   $result3x4 = query_db($query3x4);   	       

	
	include('./includes/top_quo.php');	
	include('./includes/list_lang.php');
	include('includes/bottom.php');
	exit;
		}
	if ( $_GET['action']=='languajes')
	{	
	$authz='TRUE';
	include('./includes/top_quo.php');
	include('./includes/list_lang.php');
	include('includes/bottom.php');
	exit;
		}
		
	if ( $_GET['action']=='create_lang' and (is_admin()=== true) )
	{	
	$authz='TRUE';
	include('./includes/top_quo.php');
	include('./includes/insert_lang.php');
	include('includes/bottom.php');
	exit;
		}
if ( $_GET['action']=='edit_lang' and (is_admin()=== true) )
	{	
	$authz='TRUE';	
	include('./includes/top_quo.php');
		
	include('./includes/edit_lang.php');
	include('includes/bottom.php');
	exit;
		}
if ( $_GET['action']=='update_lang' and (is_admin()=== true) )
	{	
	$authz='TRUE';	
	include('./includes/top_quo.php');	
	$name=$_POST['name'];
	$code=$_POST['id'];	
	$updateSQL = "UPDATE languajes SET lang_descript ='$name' where lang='$code'";

  $Result1 = query_db($updateSQL);	
	include('./includes/list_lang.php');
	include('includes/bottom.php');
	exit;
		}		
//=======================


if ( $_GET['action']=='del_serv_type' and (is_admin()=== true) )
	{	
	$authz='TRUE';
	$code=$_GET['code'];	
	 begin_trans();
		$query3x4 = "DELETE FROM   servicios_variations WHERE kind='$code'";
		   $result3x4 = query_db($query3x4);		  
 $query3x4 = "DELETE FROM   type_lang WHERE tipe='$code'";
		   $result3x4 = query_db($query3x4);   	       
 end_trans();
	include('./includes/top_quo.php');	
	include('./includes/list_serv_variations.php');
	include('includes/bottom.php');
	exit;
		}


//DELETE CATALOG
if ( $_GET['action']=='del_catalog' and (is_admin()=== true) )
	{	
	$authz='TRUE';
	$code=$_GET['code'];	
		$query3x4 = "DELETE FROM   tarifarios WHERE id='$code'";
		   $result3x4 = query_db($query3x4);
	include('./includes/top_quo.php');	
	include('./includes/list_catalog.php');
	include('includes/bottom.php');
	exit;
		}
//========END CATALOG=======

//DELETE TARIF
if ( $_GET['action']=='del_tarif' and (is_admin()=== true) )
	{	
	$authz='TRUE';
	$code=$_GET['service'];$serv_type=$_GET['tipe'];$AgeCdg=$_GET['AgeCdg'];
		$query3x4 = "DELETE FROM   tarifasdetalle WHERE SerCdg ='$code' and AgeCdg='$AgeCdg' and serv_type='$serv_type'";
		   $result3x4 = query_db($query3x4);	
	include('./includes/top_quo.php');	
	include('./includes/list_tarif.php');
	include('includes/bottom.php');
	exit;
		}
//========END TARIFAS=======


	if ( $_GET['action']=='edit_services2' and (is_admin()=== true) )
{

   $updateSQL = sprintf("UPDATE servicios SET  SerDsc=%s, SerDscAbr=%s, SerPre=%s, SerAgeCdg=%s, tarif_cdg=%s,active=%s WHERE SerCdg=%s",
                       GetSQLValueString($_POST['SerDsc'], "text"),
                       GetSQLValueString($_POST['SerDscAbr'], "text"),
                       GetSQLValueString($_POST['SerPre'], "double"),
                       GetSQLValueString($_POST['SerAgeCdg'], "text"),
                       GetSQLValueString($_POST['tarif_cdg'], "text"),
					   GetSQLValueString($_POST['activ'], "text"),
                       GetSQLValueString($_POST['SerCdg'], "text"));
  $Result1 = query_db($updateSQL);
  
  	$authz='TRUE';
	include('./includes/top_quo.php');
	include('./includes/list_services.php');
	include('includes/bottom.php');
	exit;

}
//=============EDIT SERVICES
	if ( $_GET['action']=='edit_service')
	{	$authz='TRUE';	include('./includes/top_quo.php');	include('./includes/edit_services.php');include('includes/bottom.php');	exit;	}
//=============

//=============WIZARD
	if ( $_GET['action']=='wizard' and (is_admin()=== true) )
	{	$code=$_GET['code'];		
	$authz='TRUE';	include('./includes/top_quo.php');$wiss=1;
		include('./includes/insert_services.php');include('includes/bottom.php');	exit;	}
//=============

//=============INSERT SERVICES
	if ( $_GET['action']=='insert_service' and (is_admin()=== true) )
	{	$code=$_GET['code'];
	if (isset($_POST['MM_insert']))
	{
	$insertSQL = sprintf("INSERT INTO servicios (SerCdg, SerDsc, SerPre, SerAgeCdg, SerUsuChg, SerFecAdd, SerFecChg,active, levels_users, tarif_cdg) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s,%s)",
                       GetSQLValueString($_POST['SerCdg'], "text"),
                       GetSQLValueString($_POST['SerDsc'], "text"),
                       GetSQLValueString($_POST['SerPre'], "double"),
                       GetSQLValueString($_POST['SerAgeCdg'], "text"),
                       GetSQLValueString($_POST['SerUsuChg'], "text"),
                       GetSQLValueString(mktime(), "int"),
                       GetSQLValueString($_POST['SerFecChg'], "date"),
					   GetSQLValueString($_POST['activ'], "text"),
                       GetSQLValueString($_POST['levels_users'], "int"),
                       GetSQLValueString($_POST['tarif_cdg'], "text"));
  $Result1 = query_db($insertSQL);
}	
	$authz='TRUE';	
		include('./includes/top_quo.php');
		if ($_POST['wizard']==1)
		{
		$_SESSION['wizard_agen']=$_POST['SerAgeCdg'];
		$_SESSION['catalog1']=$_POST['tarif_cdg'];//used for inserting tariffs
		echo $_SESSION['wizard_service']=$_POST['SerCdg'];
		include('./includes/insert_tarif.php');		
		}else
		{	include('./includes/insert_services.php');
		}
		include('includes/bottom.php');	exit;
	}
//=============


//List services
	if ( $_GET['action']=='services_tipe')
	{	
	$authz='TRUE';
	include('./includes/top_quo.php');
	include('./includes/list_serv_variations.php');
	include('includes/bottom.php');
	exit;
		}


//List services
	if ( $_GET['action']=='list_services')
	{	
	$authz='TRUE';
	include('./includes/top_quo.php');
	include('./includes/list_services.php');
	include('includes/bottom.php');
	exit;
		}

//=============EDIT AGENCIES
	if ( $_GET['action']=='edit_agenci' and (is_admin()=== true) )
	{	$authz='TRUE';	include('./includes/top_quo.php');	include('./includes/edit_agency.php');include('includes/bottom.php');	exit;	}
//=============


//=============INSERT AGENCIES
	if ( $_GET['action']=='insert_agency' and (is_admin()=== true) )
	{	$code=$_GET['code'];		
	$authz='TRUE';	include('./includes/top_quo.php');
		include('./includes/insert_agency.php');include('includes/bottom.php');	exit;	}
//=============

//=============DEL AGENCIES
	if ( $_GET['action']=='del_agenci' and (is_admin()=== true) )
	{	$code=$_GET['code'];
	
	$authz='TRUE';	include('./includes/top_quo.php');
	$query3x4 = "DELETE FROM   agencias WHERE AgeCdg='$code'";
		   $result3x4 = query_db($query3x4);   	       
			
		include('./includes/list_agencies.php');include('includes/bottom.php');	exit;	}
//=============

//=============DEL USER
	if ( $_GET['action']=='del_tarif' and (is_admin()=== true) )
	{	
	
	$code=$_GET['code'];	
	$authz='TRUE';	
	 $query3x4 = "DELETE FROM   tarifarios WHERE id='$code'";
		   $result3x4 = query_db($query3x4);  
		   $_GET['action']='catalog'; 	       
}
//=============ADD 
	if ( $_GET['action']=='create_cat')	
	{	
$authz='TRUE';
include('./includes/top_quo.php');	include('./includes/insert_category.php');include('includes/bottom.php');	exit;	}

//=============ADD 
	if ( $_GET['action']=='create_serv_type')	
	{	
$authz='TRUE';
include('./includes/top_quo.php');	include('./includes/insert_serv_type.php');include('includes/bottom.php');	exit;	}

//==========
	if ( $_GET['action']=='update_tarif' and (is_admin()=== true) )
	{
 $query = "	UPDATE tarifarios
			SET
			descript      = '".$_POST['tarif_name']."',
			tarif_cdg  = '".$_POST['code']."'			
			WHERE id = '".$_POST['id']."'";
		   $result3x4 = query_db($query); 
		$_GET['action']='catalog';
		
}
//=============EDIT TARIF
	if ( $_GET['action']=='edit_tarif')
	{	$authz='TRUE';	include('./includes/top_quo.php');	

	include('./includes/edit_tarif.php');include('includes/bottom.php');	exit;	}
//=============


//=============LIST CATALOG
	if ( $_GET['action']=='catalog')
	{	$authz='TRUE';	include('./includes/top_quo.php');	include('./includes/list_catalog.php');include('includes/bottom.php');	exit;	}
//=============

//=============LIST AGENCIES
	if ( $_GET['action']=='agencies')
	{	$authz='TRUE';	include('./includes/top_quo.php');	include('./includes/list_agencies.php');include('includes/bottom.php');	exit;	}
//=============

//=============EDIT users
	if (isset($_POST['edituser']))
	{	

 $query = "	UPDATE users
			SET
			name     = '".$_POST['name']."',
    		password = '".$_POST['password']."',
			email    = '".$_POST['email']."',
			admin    = '".$_POST['type']."',
			AgeCdg  = '".$_POST['company']."'			
			WHERE id = '".$_POST['memberid']."'";
		   $result3x4 = query_db($query);  
		   $_GET['action']='users'; 	       	
}
//=============SUSPEND
	if ( $_GET['action']=='chang')
	{	
	
	$code=$_GET['memberid'];	
	$new_sta=$_GET['sub_act'];
if  ( ($new_sta==0) or ($new_sta==1)  )

	$authz='TRUE';	
		   
		   $query = " UPDATE users SET users.status = '".$new_sta."'
			WHERE users.id   = '".$_GET['memberid']."'";
		    $result = query_db($query);
		   
		   $_GET['action']='users';
}
//=============ADD 

//=============DEL USER
	if ( $_GET['action']=='deleteuser' and (is_admin()=== true) )
	{	
	
	$code=$_GET['memberid'];	
	$authz='TRUE';	
	if ($user_id_logged <>$code)
	{
	 $query3x4 = "DELETE FROM   users WHERE id='$code'";
		   $result3x4 = query_db($query3x4);  
	   }
	   else
	   $last_msg.='You can not delete yourself!';
		   
		   
		   $_GET['action']='users'; 	       
}
//=============ADD 
	if ( $_GET['action']=='ad_user2' and (is_admin()=== true) )
	{	$authz='TRUE';
	
 $insertSQL = sprintf("INSERT INTO users ( name,username,  password,  email, admin, status,added,comments,AgeCdg, website) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['type'], "text"),
                       GetSQLValueString(1, "text"),
                       GetSQLValueString(mktime(), "date"),
                       GetSQLValueString($_POST['comments'], "text"),
                       GetSQLValueString($_POST['company'], "text"),
                       GetSQLValueString($_POST['website'], "text"));
					   
  if ( query_db($insertSQL)==true)
  {
  $last_msg.=$inserted;
  }
  else
  {
  $last_msg.= "$error_dup : ";
  }
  
 		include('./includes/top_quo.php');
		include('./includes/add_users.php');
		include('includes/bottom.php');
			exit;
			
}
//=============

	if ( $_GET['action']=='add_usr')
	{	$authz='TRUE';	include('./includes/top_quo.php');
		include('./includes/add_users.php');include('includes/bottom.php');	exit;	}
//=============

//=============
	if ( $_GET['action']=='control')
	{	$authz='TRUE';
		 $yy=user_level2();
		if ($_SESSION['gnulevel']>1) 
		{
			include('./includes/top_quo.php');
			include('./includes/control.php');
			include('includes/bottom.php');	exit;
			}
			else
			{
			$last_msg.= $only_admin;
			include('./includes/top_quo.php');
			include('includes/bottom.php');	exit;
			}
			
			}
//=============

//=============
	if ( $_GET['action']=='ad_use')
	{	$authz='TRUE';	include('./includes/top_quo.php');	include('./includes/add_users.php');include('includes/bottom.php');	exit;	}
//=============
//===========LIST USERS
IF ( $_GET['action']=='users'  )
{
	$authz='TRUE';
	include('./includes/top_quo.php');
	if (isset($_GET['operator']) )
	{
	$agenci=$_GET['operator'];
  $add="where AgeCdg='$agenci'";
	}
	include('./includes/list_users.php');
	include('includes/bottom.php');
	exit;
}
//==================



//========INSERT USER IN STAFF==========
IF (      ($_GET['action']=='ad_user')   and (is_admin()=== true) )
{
if (  isset($_POST['newuser'] )  )
{//inserts only if we really need to add a new user

       $query = "SELECT * FROM users WHERE username='".$_POST['username']."'";
		$result = query_db($query);
	if (  @query_db_num($result)<1)
{//
 $query = "	INSERT INTO users
						SET
						name     = '".$_POST['name']."',
						username = '".$_POST['username']."',
						password = '".$_POST['password']."',
						email    = '".$_POST['email']."',
						company    = '".$_POST['company']."',
						website    = '".$_POST['website']."',
						comments   = '".$_POST['comments']."',
						status    = '1',
						added = '".mktime()."',
						admin    = '".$_POST['type']."'";
						
          if ($_POST['username']<>'')
          {
                        $query = "	INSERT INTO users
						SET
						name     = '".$_POST['name']."',
						username = '".$_POST['username']."',
						password = '".$_POST['password']."',
						email    = '".$_POST['email']."',
						company    = '".$_POST['company']."',
						website    = '".$_POST['website']."',
     					comments   = '".$_POST['comments']."',
						status    = '1',
						added = '".mktime()."',
						admin    = '".$_POST['type']."'";
						$last_msg.='Inserted and activated the user';
          }
						

if ($_POST['type']<>'User') 
{
  if (is_admin()=== true)//only admin adds staff or admins
  {
  $result = query_db($query);
  }
}

if ($_POST['type']=='User') //staff adds only users
{					   						   
$result = query_db($query);
}
                       if ($_POST['type']<>'User')
						{ //**
						   if (is_admin()=== true)
						   {					   						   
						   $el_id=query_db_assocc(); 						   
						   if ($_POST['type']<>'User')
						   {
						  $query = "	INSERT INTO users_staff
						    SET		   user='$el_id',
						   departament='".$_POST['departament']."', departament_visible='".$_POST['departament']."'";
						   $result = query_db($query);
						   }        				   
						 } //**
						   else
						   $last_msg= 'Only administrator adds staff/admins members';						   
						  } 
				
}
else
$last_msg.= 'Username exists,duplicated  insertion failed';
//} //of detecting an invalid username=''

}//end of isset newuser

//IF the insertion proceeds
 $query556 = "	INSERT INTO tracking SET ticket_id='$el_ticket',staff='".$_SESSION['xcv_userna']."', action='Add user ".$_POST['username']."'".',tdate='.mktime();
        $resultxx5 = query_db( $query556 );
$last_msg.=$inserted;
$authz='TRUE';include('./includes/top_quo.php');include('./includes/add_users.php');//instead of list users
include('includes/bottom.php');
exit;
}
//=======================
include('includes/preprocesing.php');

//===================RESERVATIONS OR QUOTE...
if (    ($_GET['action']=='cotiza') or ($_GET['action']=='reserv') )
	{
	$authz='TRUE';
	
	if ($_GET['action']=='reserv')
	{
	$_SESSION['activity']='reserv';
	}
	if ($_GET['action']=='cotiza')
	{
    $_SESSION['activity']='cotiza';
	}
	include('./includes/top_quo.php');
	for ($nn=0; $nn<=10;$nn++)
	{
	$wb=$wb.rand(20,50);
	}$_SESSION['to']=$wb;
	include('./includes/cart.php');
	include('includes/bottom.php');	exit;
	}
//===========
if (  isset($_POST['cotiza2'])or  isset($_POST['reserva2'])  ) //11_55am sabado 19 2h arreglando lo de otros tarifarios, metiendo todos los tarifarios
	{
	
	if ($_SESSION['to']<>$_POST['toke'])
	{
	    $last_msg .='Reloading detected';	$authz='TRUE';
		include('./includes/top_quo.php');		
		include('includes/bottom.php');	
	exit;
	}else
	{
	$_SESSION['to']='';
	}
	
		if (  isset($_POST['cotiza2']) )
		{
		$table='quotations';$table2='quotation_master';
		$cotiza=1;		
		}
		if( isset($_POST['reserva2'])  ) 
		{
		$table='myreservas';$table2='reserv_master';
		$reserva=1;
		
		}

	$authz='TRUE';


	
	$tgt=$_SESSION['xcv_userna'];
	$query578 = "SELECT * FROM agencias, users WHERE users.username = '$tgt' AND agencias.AgeCdg = users.AgeCdg ";	 
	$result578 = query_db($query578);	
	$row3x8=query_db_assoc( $result578);	
	
	
	$agencia=$row3x8[0];
	$agencia= $row3x8['AgeCdg'];
	
	 $query578="SELECT count(*) FROM $table2 WHERE AgeCdg = '$agencia' ";	 
	$result578 = query_db($query578);	
	$row3x88=query_db_row( $result578);
    $gg=$row3x88[0]; $gg++;
	$CODIGO_DE_OPE=  "$agencia-$gg";
	
	
																$first_serv=1591932600; //timestamp de //11/06/2020 
																FOR ($i =0;     $i<=COUNT($_POST['$services_counter'])+1; )						
								{//LLLLLLLLL
								$i++;
								if ($_SESSION['action'][$i] =='true')
								{
								 	$etax=$_SESSION['dat'][$i].' '.$_SESSION['hour'][$i].':'.$_SESSION['minutes'][$i];
								  	$year = (int) substr($etax,6,4);$mon  = (int) substr($etax,3,2);	 $day  = (int) substr($etax,0,2);	$hour = (int) substr($etax,11,2);	 $min  = (int) substr($etax,14,2);$sec  = substr($etax,17,2);
									if ($etax<>'') 
									{ $eta_=mktime($hour,$min,$sec,$mon,$day,$year);								 	
								 	}
								 	else $eta_='';
									}
								 
								 	}//LLLLL
						if ($eta_< $first_serv) {$first_serv=$eta_;}											
 begin_trans();
if ($cotiza==1)
{
		  $querygg = "	INSERT INTO quotation_master
						SET
						timestamp= '".mktime()."',
						user_id=".$user_id_logged.",
						DocNro   = '".$CODIGO_DE_OPE."',
						AgeCdg= '".$agencia."',
						paxname  = '".$_POST['ngroup']."',
						country  = '".$_POST['country']."',
						paxnumber ='".$_POST['npaxes']."',
						total_price='".$_POST['total_price']."',
						taxes='".$_POST['taxes']."',
						Date_first_serv='".$first_serv."',
						servcount ='".$_POST['services_counter']."'";
						$result = query_db($querygg);

}

		if ($reserva==1)
		{															
			
		  $querygg = "	INSERT INTO reserv_master
						SET
						timestamp= '".mktime()."',
						user_id=".$user_id_logged.",
						DocNro   = '".$CODIGO_DE_OPE."',
						AgeCdg= '".$agencia."',
						paxname  = '".$_POST['ngroup']."',
						country  = '".$_POST['country']."',
						paxnumber ='".$_POST['npaxes']."',
						total_price='".$_POST['total_price']."',
						they_owe_you='".$_POST['total_price']."',
						taxes='".$_POST['taxes']."',
						Date_first_serv='".$first_serv."',
						state_reserv   =0,
						servcount ='".$_POST['services_counter']."'";
						$result = query_db($querygg);
					
					$add_comments='Created';
					log_booking($Doc,$add_comments);	
		}

	$receptor=1591932600; //timestamp de //11/06/2020 
	$ddd= (int) $_POST['services_counter'];
	FOR ($i =1;     $i<=$ddd; $i++	 )						
{
//Insert reservations BEGIN	
	 $etax=$_SESSION['dat'][$i].' '.$_SESSION['hour'][$i].':'.$_SESSION['minutes'][$i];
	//13/01/2010 23:30 :
	 //29-12-2009 12:43:01
	 //30/12/2009jquery
	//$eta=substr($etax,6,4).'-'.substr($etax,0,2).'-'.substr($etax,3,2);
  $year = (int) substr($etax,6,4);$mon  = (int) substr($etax,3,2);	 $day  = (int) substr($etax,0,2);	$hour = (int) substr($etax,11,2);	 $min  = (int) substr($etax,14,2);$sec  = substr($etax,17,2);
	if ($etax<>'') 
	{ 
	//echo $day;
	 $eta_=mktime($hour,$min,$sec,$mon,$day,$year);
	}else $eta_=''; 
	
if ($eta_< $receptor) 
{
$receptor=$eta_;
}
//$first_serv

	 $querygg = "	INSERT INTO $table
						SET
						DocNro   = '".$CODIGO_DE_OPE."',
						FecAdd   = '".$eta_."',
						SerCdg   = '".$_SESSION['serv'][$i]."',
						tipe     = '".$_SESSION['tipe'][$i]."',
						lang     = '".$_SESSION['lang'][$i]."',
						price1   = '".$_POST['bp'][$i]."',
						pricet   = '".$_POST['sub_total'][$i]."',
						Paxs     = '".$_SESSION['passengern'][$i]."',
						comment = '".$_SESSION['com'][$i]."',						
						EmpCdg   =  '".$row3x8['EmpCdg']."',						
						attention= '".$_POST['attention']."',
						ema    ='".$_POST['email']."'";
						
					//if ($_SESSION['dat'][$i]<>'')        
					 $result = query_db($querygg);
	
	//para imprimir reserva
		//We create a record with arrays for creating our reservation
}//Insert reservations END
 end_trans();

	include('./includes/fill_reserv.php');
 prepare_template($cotiza, $reserva,$CODIGO_DE_OPE, $table, $table2,false);
//Prepare vars for template

	if ($cotiza==1)
	{
	$dataText='Su Cotización está en el archivo adjunto';
	if ($sendmethod<>'not'){
		$last_msg .=' '.SendMail($_POST['email'],	$_POST['attention']	,$asunto,$dataText,$templateDoc);
	    $last_msg .=' '.SendMail($receive_notif, $socketfromname, $asunto_cotiza,$dataText,$templateDoc); //copia para edi
		}
		
		include('./includes/top_quo.php');
		include('./includes/thanks_cotiza.php');		include('includes/bottom.php');
		//unlink($templateDoc);		
		exit;
		}	
	if ($reserva==1){
		  	$dataText='Su Reserva está en el archivo adjunto';
			
			$askemail="select email,name from users where id= '$user_id_logged'";$resultm = query_db($askemail);
           $the_mail=query_db_assoc($resultm);$the_m=$the_mail['email'];$name=$the_mail['name'];
		   if ($sendmethod<>'not'){
			$last_msg .=' '.SendMail($the_m,	$name	, $asunto_reserv,$dataText,$templateDoc);			
			$last_msg .=' '.SendMail($receive_notif, $socketfromname,$asunto,$dataText,$templateDoc); //copia para edi
		}
				
		if ($enablesms=='TRUE')
						{
						$dataText2= $new_sms.$name.' '.$monto.$_POST['total_price'].$taxes.'='.$_POST['taxes'].$first_service_.$first_serv;
		$sep_sms_= chr(13).chr(10);
		$for_sms=	"api_id:$idsms$sep_sms_
						user:$usersms$sep_sms_
						password:$smspass$sep_sms_
						to:$numbertosms$sep_sms_
						text:$dataText2";										
					$sendhtml='FALSE';//8bit encoding but text					
					$last_msg .=' '.SendMail('sms@messaging.clickatell.com','clickatell','SMS notification',$for_sms);
					}
		$paxes=$_POST['npaxes'];
		include('./includes/top_quo.php');
		include('./includes/thanks_reserv.php');
			include('includes/bottom.php');	
		//unlink($template2);		

			exit;
		}
		
	}
	
//============	
if  ($_GET['action']=="del_pax2")
{$authz=true;
$id=$_POST['pax'];
 $sq="delete from passengers where id='$id'";
 $result = query_db($sq);


	include('./includes/top_quo.php');
	
	include('includes/bottom.php');
	exit;

}

if  ($_GET['action']=="del_pax")
{$authz=true;
$id=$_GET['code'];
	include('./includes/top_quo.php');
	include('./includes/confirm_del_pax.php');
	include('includes/bottom.php');
	exit;

}

if  ($_GET['action']=="edit_pax")
{
$authz=true;
$npaxes=1;
$id=$_GET['code'];
$el_id=$_GET['reserv'];
 $sq="select * from passengers where id='$id'";
 $result = query_db($sq);
$the_mail=query_db_assoc($result);
$va1=$the_mail['FirstName'];
$va2=$the_mail['LastName'];
$va3=$the_mail['phone1'];
$va4=$the_mail['email'];
$Gender=$the_mail['Gender'];
$edita=1;
	include('./includes/top_quo.php');
	include('./includes/fill_paxes.php');
	include('includes/bottom.php');
	
	exit;

}

if  ($_GET['action']=="paxes")
{$authz=true;
$npaxes=$_POST['npaxes'];
$id=$_POST['id'];

if ($npaxes-$npaxes==0)
{
	include('./includes/top_quo.php');
	include('./includes/fill_paxes.php');
	include('includes/bottom.php');
	exit;
	}
	else {
	$_GET['action']='home';}
	
}
////
if  ($_GET['action']=="save_paxes")
{
$authz=true;

if ($_POST['edita']==1)
{
$co=1;
$el_id=$_GET['id'];
$fi=$_POST['firstname'][$co];$la=$_POST['last_name'][$co];$sex=$_POST['sex'][$co];$phone=$_POST['phone'][$co];$email=$_POST['email'][$co];
$id=$_POST['id'];
 $updateSQL ="UPDATE passengers  SET FirstName ='$fi', LastName ='$la',Gender='$sex',phone1='$phone',email='$email' where Id='$id'";
$result3x4 = query_db($updateSQL);
$_GET['id']=$_POST['reserv'];//N of booking to jump
$_GET['action']='open_r';
include('./includes/top_quo.php');
include('./includes/open_reserv.php');include('includes/bottom.php');


}



$npaxes=$_POST['npaxes'];
$id=$_POST['id'];

begin_trans();
 for  ($co=1;$co<= $npaxes; $co++ )			
	 	{
		$langua=$_POST['len'][$co];
		$fi=$_POST['firstname'][$co];$la=$_POST['last_name'][$co];$sex=$_POST['sex'][$co];$phone=$_POST['phone'][$co];$email=$_POST['email'][$co];
		$query3x4 = "INSERT INTO passengers	SET FirstName ='$fi', LastName ='$la',Gender='$sex',phone1='$phone',id_reserv='$id',email='$email'  ";
		$result3x4 = query_db($query3x4);
		}				
	 end_trans();
	$last_msg .='Paxes';
	$_GET['action']='us';	
}
//==
if  ($_POST['Update']=="Clear")
{
$_SESSION['hour']=array();
$_SESSION['minutes']=array();
$_SESSION['dat']=array();
$_SESSION['tipe']=array();
$_SESSION['lang']=array();
 $_SESSION['passengern']=array();
 $_SESSION['action']=array();
 $_SESSION['com']=array();
$_SESSION['serv']=array(); 
//echo 'Clear';
}

if ( $_GET['action']=='update_amount')
	{
	$add_amount=$_GET['add_amount'];
	$add_type=$_GET['add_type'];
	$add_comments=$_GET['add_comments'];
	$id=$_GET['id'];	

	$query578 = "SELECT * from reserv_master WHERE DocNro='$id' ";	 
	$result578 = query_db($query578);	
	$row3x8=query_db_assoc( $result578);	
	$total_price=$row3x8['they_owe_you'];
	$total_price=$total_price-$add_amount;
	$querygg="update reserv_master set they_owe_you= '$total_price' where DocNro='$id' ";
	$result = query_db($querygg);
	log_booking($id,$add_trans.': '.$add_amount);
	
	$ti=mktime();	
	 $querygg = "	INSERT INTO payments_reservations	SET		DocNro   = '$id',
	  timestamp   ='$ti' ,Observ='$add_comments',
	  payment_type='$add_type',
	  amount='$add_amount',
	  user_id='$user_id_logged'";
	 	$result = query_db($querygg);
	
	$query578 = "SELECT * from reserv_master WHERE DocNro='$id' ";	 
	$result578 = query_db($query578);	
	$row3x8=query_db_assoc( $result578);	
	echo $total_price=$row3x8['they_owe_you'];
exit;	
	}
//==========

//==========
if ( $_GET['action']=='download')
	{$id=$_GET['id'];	
	
	if (  isset($_GET['ac2']))	
		{ $table='quotations';
		$table2='quotation_master';
		$what=$service_quo;$cotiza=1;
		$read_only='disabled';
		}
		else
		{$table='myreservas';
		$table2='reserv_master';
		$what=$service_reserv;$reserva=1;
		}		
		
	 
	 if (user_level2()==0) //single user	 
	 {
	 $query44="select AgeCdg from $table2 where DocNro='$id' and AgeCdg='$your_agency'";
	 $result44 = query_db($query44);
	 if (query_db_num($result44)<>1) $id=0;	 
	 }
	
	include('./includes/fill_reserv.php');
	prepare_template($cotiza, $reserva,$id, $table, $table2,true);
	exit;
}

//===========
if ( $_GET['action']=='show_paxes')
	{exit;
	$id=$_GET['id'];	
	$queryggf = " SELECT * from  passengers	where id_reserv='$id'";
 	$result578f = query_db($queryggf);	
	$row3x8=query_db_row( $result578f);		
	include('includes/rpt_paxes.php');
	exit;
}
//=======
if ( $_GET['action']=='show_pays')
	{$id=$_GET['id'];	
 	 $queryggf = " SELECT * from  payments_reservations	where DocNro='$id'";
 	$result578f = query_db($queryggf);	
	$row3x8=query_db_row( $result578f);		
	include('includes/rpt_payments.php');
	exit;
}
//============
if ( $_GET['action']=='show_his')
	{$id=$_GET['id'];	
 	 $queryggf = " SELECT * from  reservations_log	where DocNro='$id'";
 	$result578f = query_db($queryggf);	
	$row3x8=query_db_row( $result578f);		
	include('includes/rpt_history.php');
	exit;
}
//============
//============
if ( $_GET['action']=='get_lang')
	{$id=$_GET['id'];	//true privado
	
	$queryggf = " SELECT * from  type_lang, languajes	where  tipe='$id' and languajes.lang=type_lang.lang";	
 	$result578f = query_db($queryggf);	
	$row3x8=query_db_assoc( $result578f);
	include('includes/langu.php');
	exit;
}
//============

if ( $_GET['action']=='open_r')
	{
	
		if (isset($_GET['ac2']))//if cotiza
		{	$quot=true; }
	$authz='TRUE';
	include('./includes/top_quo.php');
	include('./includes/open_reserv.php');
	include('includes/bottom.php');
	exit;	
	}

if ( $_GET['action']=='tracking')
	{
	if(is_admin()=== true)
	{
	$process=true;
	}
	else
	{
	$last_msg='Denied only Admin';
	}
		$authz='TRUE';
	include('./includes/top_quo.php');
	include('./includes/tracking.php');
	include('includes/bottom.php');
	exit;	

}


if ( $_GET['action']=='dashboard')
	{
		$authz='TRUE';
	include('./includes/top_quo.php');
	include('./includes/dashboard.php');
	include('includes/bottom.php');
	exit;	

}

if ( $_GET['action']=='stats')
	{
		$authz='TRUE';
	include('./includes/top_quo.php');
	include('./includes/stats.php');
	include('includes/bottom.php');
	exit;	

}


//default action using get or POST
	{
	$authz='TRUE';
	include('./includes/top_quo.php');
	include('includes/preprocesing.php');//OPTIONAL shows hints  at top_quo.php
	include('./includes/services.php');
	include('includes/bottom.php');	
	}
?>