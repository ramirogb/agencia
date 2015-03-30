<?php 
if (    ($_GET['action']=='cotiza') or ($_GET['action']=='reserv') ) //pre processing - validating date time
{
$continue=true;
$counter_services=0;
	FOR ($i =0;     $i<=COUNT( $_SESSION['action'] )+1; )						
{

		if (  ($_SESSION['action'][$i]=='true')  and   (  strlen($_SESSION['dat'][$i] < 2 )) )	{	 $continue=false; $last_msg.= $select_date;}		
		if ( $_SESSION['action'][$i]=='true'){ $counter_services++;	} $i++;
		if (  ($_SESSION['subtotal'][$i]==0)  and  ($_SESSION['action'][$i]=='true')  )	{	 $continue=false; $last_msg.= $price0; }		
		
}
	if ($continue==false) 
	{	$_GET['action']='home';		$err='*';	
	}
	
	if ($counter_services<1) {$last_msg.= $no_selection;}
	
}


?>