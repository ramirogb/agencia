<?php
if ($authz<>'TRUE') exit;
if ($userww=='Unregistered') exit;
$wqac=time();

if (  isset($_GET['timer']))
{
$_SESSION['refreshx']=trim($_GET['timer']); 
}





?>
<script language="JavaScript">
//Visit http://www.dynamicdrive.com for this script
var saltar;
var countDownInterval=<?php echo 40; ?>;
<?php
   $timpo=100000;
   
  if (    isset( $_GET['timer'] )   )
  {
  $timpo=$_GET['timer'];
   }
   else 
   {
	   if (  isset($_SESSION['refreshx']) )
   		{   $timpo=$_SESSION['refreshx'];   }
   }

 ?>
var countDownInterval=<?php echo $timpo;?>;
var countDownTime=countDownInterval+1;
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function countDown()
{
countDownTime=countDownTime-1;
          if (countDownTime <=0)
		   {
           countDownTime=countDownInterval;
           clearTimeout(counter);
           window.location.reload();
          return
          }
counter=setTimeout("countDown()", 1000);
}

function MM_jumpMenu(targ,selObj,restore)
{ //v3.0
var segunx;
//if (   selObj.selectedIndex==0) { segunx=60; }
//if (  selObj.selectedIndex==1) { segunx=300; }
//if (  selObj.selectedIndex==2) { segunx=900; }
//if (  selObj.selectedIndex==3) { segunx=1800; }


  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
//  if (restore) selObj.selectedIndex=0;


}
//-->
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<script src="includes/over/overlibmws.js" type="text/javascript"></script>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="ningun">
<tr><td valign="top"><form name="myform"  class="ningun" action="<?php 


echo $rtcv;  ?>?action=home<?php echo $addon ?>" method="post">
  <table  width="<?php echo $maintablewidth ?>" border="0" align="<?php echo $maintablealign ?>" cellpadding="0" cellspacing="0" class="boxborder" id="tables">
    <tr   class="listView" align="center">
      <td width="20" class="ListViewL" style="cursor:pointer; padding-left:5px" onclick="check();"><b><u> Sel.</u></b></td>
      <td class="ListView"><b> <a href="<?php echo $rtcv;  ?>?action=<?php  echo $_GET['action']; ?>&order=<?php echo $_GET['order']; ?>&sort=<?php echo sesiona($_GET['sort']);  ?>&col=id">ID</a></b></td>
      <td width="21" class="ListView"><img src="images/unread.gif" alt="Image for a new, Unread ticket" width="14" height="11" border="0"></td>
      <td class="ListView"><b><?php echo $replies;?></b></td>      
      <td class="ListView"><?php 
	  if ($_SESSION['gnulevel']<>0)
	  {
	  ?>
        <strong>Assigned </strong><img src="images/assigned.png" alt="Assigned to one staff member of Departament" width="35" height="20" align="absmiddle"><?php } ?></td>      
	  <td class="ListView"><b><a href="<?php echo $rtcv;  ?>?action=<?php  echo $_GET['action']; ?>&order=<?php echo $_GET['order']; ?>&sort=<?php echo sesiona($_GET['sort']);  ?>&col=sub"><?php echo $text_listsub ?></a></b></td>
      <td class="ListView"><b><a href="<?php echo $rtcv;  ?>?action=<?php  echo $_GET['action']; ?>&order=<?php echo $_GET['order']; ?>&sort=<?php echo sesiona($_GET['sort']); ?>&col=dat"><?php echo $text_listdat; ?></a></b>&nbsp;</td>
      <td class="ListView"><b><?php echo  $last_response; ?></a></b>&nbsp;</td>
	  
	  <td class="ListView"><b>
	    <?php   if (user_level2()>0) {echo $last_action; } ?>
	  </b></td>
	  <td class="ListView"><b><a href="<?php echo $rtcv;  ?>?action=<?php  echo $_GET['action']; ?>&order=<?php echo $_GET['order']; ?>&sort=<?php echo sesiona($_GET['sort']);  ?>&col=urg"><?php echo  $text_listurg ?>	</a><b>  </b></b></td>
      <td class="ListView"><b><?php echo $departament; ?></b>&nbsp; 
	  
	  <?php 

		if ($_SESSION['gnulevel']>0)
		{ 
		?>
	      
		<?php } ?>
		</td>
      <td width="21" class="ListView">
      <div align="right"></div></td>
      <td width="21" class="ListViewR"><div align="right"><b><?php echo $text_liststa; ?></b></div></td>
    </tr>
    <?php
	// LOOP THROUGH THE REQUESTS FOR THE USERS ACCOUNT
				WHILE ($row = mysql_fetch_array($result))
					{
	// GET ALL REPLIES TICKET
	$queryBB = "	SELECT assigned_to FROM tickets_state WHERE id=".$row['tickets_id'];
	$resultBB = query_db($queryBB);
	$rowBB   = query_db_row($resultBB);
												
					 $queryA = "	SELECT COUNT(distinct(a.tickets_id)) AS ticket_count,
					 MAX(tickets_timestamp) AS date,b.lastlogin,c.assigned_to
							FROM
							tickets_tickets a,
							users b,
							tickets_state c
							WHERE tickets_child = '".$row['tickets_id']."'
							
							and a.tickets_child=c.id 
							 and   ( (a.reserved is  null ) or (a.reserved='' ))
							GROUP BY tickets_child";

							
					$resultA = query_db($queryA);
					$rowA    =  query_db_assoc($resultA);
					
					IF ($rowA['ticket_count'] <= '0')
						{
						$rowA['ticket_count'] = '0';
					}

	  
	  $details='';
	 if ($row['tickets_username']<>'')
   $details= '&nbsp;&nbsp;<strong>'.$row['tickets_username'].'</strong>'.' '.$row['tickets_email'].'<BR>';	 
   $fffff= nl2br(  stripslashes( $row['tickets_question'] ));
   $details .= substr($fffff ,0,200);   
   $sale=rawurlencode($details);
						
?>    <tr align="center" class="<?php set_class(); ?>"  >
      <td class="borderLL" >
	   	  <input type="checkbox"   class="checa" id="<?php echo $row['tickets_id']; ?>" onClick="sele(<?php echo $row['tickets_id']; ?>)" 
	  name="ticket[<?php echo $row['tickets_id']; ?>]" value="<?php echo $row['tickets_id']; ?>" />
	   </td>
      <td  onMouseOver="return overlib('<?php echo $sale; ?>',DECODE,AUTOSTATUS)";  onMouseOut="return nd()"  class="boxborder text"><a href="<?php echo $rtcv ?>?action=open&amp;ticketid=<?php echo $row['tickets_id'] ?>">
	   </a><a onmouseout="return nd()";
 onMouseOver="return overlib('<?php echo $sale; ?>',DECODE,AUTOSTATUS)" 
	   href="<?php echo $_SERVER['PHP_SELF'];
	    ?>?action=open&amp;ticketid=<?php
		 echo $row['tickets_id'] ?>"><?php echo $row['tickets_id'] ?></a> </td>
	   <td ><span class="boxborder text"><a href="<?php echo $rtcv ?>?action=open&amp;ticketid=<?php echo $row['tickets_id'] ?>">
	     <?php
  	if (	($_SESSION['gnulevel']==1) or ($_SESSION['gnulevel']==2) ) //staff,admin
	{	$rfgt5='unread_admin';	}
	else
	{	$rfgt5='unread_user';	}


	   if ( $row[$rfgt5]=='1')
	   {
	   echo "<img   src=\"images/unread.gif\" alt=\"$details0\" width=\"14\" height=\"11\" border=\"0\">";
	   }
	   else
	   {	   
	   echo "<img src=\"images/read.gif\" alt=\"$details0\" width=\"14\" height=\"11\" border=\"0\">";
	   
if ( $row['unread_user']=='1')  echo "<img src=\"images/red.gif\" alt=\"Not_readed\" width=\"5\" height=\"5\" border=\"0\">";
	   }
		 ?>
	   </a></span> </td>
      <td class="boxborder text">[<?php echo $rowA['ticket_count'] ?>]
      </td>
       <td class="boxborder text">&nbsp;<?php  		
	    IF ($row['assigned']  == '1') 
		{
		echo "<img   src=\"images/assign.gif\" alt=\"$details0\" border=\"0\">";		
		echo $rowBB[0];
		}
		?>
	  </td>
      <td class="urglev"><?php 
	  $axxx= htmlentities( $row['tickets_subject'] );
	  echo substr(stripslashes($axxx),0,40);
	   ?></td>
      <td class="urglev"><?php 
	 
	 $inputval= $rowA['date']; //-$row['tickets_timestamp'];	recent response 
	 if ($inputval>0) $inputval=$wqac-$inputval;	
       $dd=	 intval($inputval /86400);  if ($dd>0) $dd_=$dd.'d ';else $dd_='';
	$ss_remaining = ($inputval -  ($dd*86400) );   
	   $hh = intval(  ( $ss_remaining)/3600);  if ($hh>0) $hh_=$hh.'h ';else $hh_='';	   
    $ss_remaining = ($inputval -  ( ($hh * 3600)+($dd*86400) ) );	
	$mm = intval($ss_remaining /60);if ($mm>0) $mm_=$mm.'m ';else $mm_='';
	 $ss = ($ss_remaining - ($mm * 60)); if ($ss>0) $ss_=$ss.'s';else $ss_='';
	$pase=$dd_.$hh_.$mm_;
	
	  echo date($dformat, $row['tickets_timestamp']).' '.date('H:i:s', $row['tickets_timestamp']); ?></td>
	 <td   class="boxborder text"><?php echo $pase; ?></td> 
	 
      <td   class="boxborder text"><?php 
	  
					 $queryA2 = "	SELECT 
					 MAX(tickets_timestamp) AS date
							FROM
							tickets_tickets a,
							users b,
							tickets_state c
							WHERE tickets_child = '".$row['tickets_id']."'
							
							and a.tickets_child=c.id	";							
					$resultA2 = query_db($queryA2);
					$rowA2    = query_db_assoc($resultA2);
					 $inputval2= $rowA2['date'];
					 if (user_level2() > 0)
					 {
					 if ($inputval2 >0)   echo date($dformat, $inputval2).' '.date('H:i:s',  $inputval2); 
					 }
					 
	  // echo $pase2;
	   ?></td>
      <td width="25"  style="padding-left:4; padding-right:4;"bgcolor="#<?php echo $row['color'] ?>" class="urglev"><?php echo $row['name'] ?></td>
      <td class="urglev"><?php echo $row['tickets_categories_name'] ?></td>
      <td colspan="2" class="borderRR"><?php

					IF ($row['tickets_status'] == '0')
						{
						echo '<span style="color:#FF0000">';
						}
					ELSE
						{
						echo '<span style="color:#000000">';
						}
	?> <?php echo  $status[$row['tickets_status'] ] ?> </td>
   	</tr>
    <?php
					}
?>
    
	<tr><td  class="borderL"  colspan="10"><select name="change_state">
          <option value="1">Open</option>
          <option value="0">Close</option>
          <?php if( $_SESSION['gnulevel']>0 ) { ?><option value="2">Delete</option><?php } ?>
		  <?php if( $_SESSION['gnulevel']>0 ) { ?><option value="5">is SPAM</option><?php } ?>
        </select>
          <input type="submit" name="sub" value="Action">          
		  <span class="comment3">
		  <?php echo $maxRows_Recordset1.' Tickets/page'; 
		  $fv=$_SESSION['refreshx'];
		  ?></span>
      </td>
      <td class="borderR"  colspan="3"><div align="right">
          <select name="menu"  onChange="MM_jumpMenu('parent',this,0)">
              <option value="<?php echo $rtcv; ?>?timer=0"<?php      if (!(strcmp("0",  $fv ) ) ) { echo "SELECTED"; } ?>><?php echo 'Disable Auto Refresh Page'; ?></option>
			  <option value="<?php echo $rtcv; ?>?timer=60"<?php      if (!(strcmp("60",  $fv ) ) ) { echo "SELECTED"; } ?> ><?php echo '60s'; ?></option>
			  <option value="<?php echo $rtcv; ?>?timer=300"<?php     if (!(strcmp("300", $fv ) ) ) { echo "SELECTED"; } ?> ><?php echo 'Refresh Every 5 minutes'; ?></option>
			  <option value="<?php echo $rtcv; ?>?timer=900"<?php     if (!(strcmp("900", $fv ) ) ) { echo "SELECTED"; } ?> ><?php echo 'Refresh Every 15 minutes'; ?></option>
			  <option value="<?php echo $rtcv; ?>?timer=1800"<?php    if (!(strcmp("1800", $fv ) ) ) { echo "SELECTED"; } ?> ><?php echo 'Refresh Every 30 minutes'; ?></option>
			  <option value="<?php echo $rtcv; ?>?timer=3600"<?php    if (!(strcmp("3600", $fv ) ) ) { echo "SELECTED"; } ?> ><?php echo 'Refresh Every 60 minutes'; ?></option>              
          </select>
      </div></td></tr></table>
</form>
<div align="center">
  <p><span  class="comment3">
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><strong>&#8249;&#8249;&#8249;&#8249;</strong></a>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">&laquo;</a>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">&raquo;</a>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><strong> &#8250;&#8250;&#8250;&#8250;</strong></a> 
    <?php
   $qas= ceil(  ($_SESSION['total']/$maxRows_Recordset1) );
   echo 'Result page: ';   
   $time = round($endtime*100)/100;   
   for ($zz=0;  $zz < $qas; $zz +=1)
   { //for
   $actual=$_GET['pageNum_Recordset1'];
   ?>  </span>   
	  <a href="<?php 
	printf("%s?pageNum_Recordset1=%d%s",$currentPage,$zz,$queryString_Recordset1); ?>">
	  <?php
	
	$p100='';$p101=''; 
	if ($actual==$zz)
	{
	$p100='<strong>';
	$p101='</strong>';
	}
	echo $p100.$zz.$p101; 
	?>
	  </a>
	
    <?php
   } //of the for
   ?>
</p>
</div>