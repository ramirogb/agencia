<?php 
if ($authz<>'TRUE') exit;
?>
<script language="JavaScript">
//Visit http://www.dynamicdrive.com for this script
var saltar;
var countDownInterval=<?php echo 40; ?>;
<?php
  if (    isset( $_GET['timer'] )   )
  {
  $timpo=$_GET['timer'];
   }
   else 
   $timpo=100000;
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
<tr><td valign="top"><form name="myform"  class="ningun" action="<?php echo $_SERVER['PHP_SELF'];  ?>?action=home<?php echo $addon ?>" method="post">
  <table  width="<?php echo $maintablewidth ?>" border="0" align="<?php echo $maintablealign ?>" cellpadding="0" cellspacing="0" class="boxborder" id="tables">
    <tr   class="listView" align="center">
      <td width="20" class="borderLL" style="cursor:pointer" onclick="check();"><b><u>Select</u></b></td>
      <td width="18" class="ListView"><b> ID</b></td>
      <td width="21" class="ListView"><img src="images/unread.gif" alt="Image for a new, Unread ticket" width="14" height="11" border="0"></td>
      <td width="52" class="ListView"><b>Replies</b></td>
      <td class="ListView"><b><?php echo $text_listsub ?></b></td>
      <td class="ListView"><b>Date</b></td>
      <td class="ListView"><b><?php echo $text_listurg ?></b></td>
      <td class="ListView"><b>Department</b></td>
      <td width="42" class="borderRR"><b><?php echo $text_liststa ?></b></td>
    </tr>
    <?php
	// LOOP THROUGH THE REQUESTS FOR THE USERS ACCOUNT
				WHILE ($row = query_db_array($result))
					{
	// QUERY TO GET THE AMOUNT OF REPLIES TO A CERTAIN TICKET AND DATE OF LAST ENTRY
					echo $queryA = "	SELECT COUNT(a.tickets_id) AS ticket_count,
					 MAX(tickets_timestamp) AS date,b.lastlogin
							FROM
							tickets_tickets a,
							users b,
							tickets_state c
							WHERE tickets_child = '".$row['tickets_id']."'
							AND a.tickets_username = b.username
							and a.tickets_child=c.id
							GROUP BY tickets_child";
					$resultA = query_db($queryA);
					$rowA    = query_db_assoc($resultA);
					IF ($rowA['ticket_count'] <= '0')
						{
						$rowA['ticket_count'] = '0';
					}

	  $details='';
	 if ($row['tickets_username']<>'')
   $details= '&nbsp;&nbsp;<strong>'.$row['tickets_username'].'</strong>'.' '.$row['tickets_email'].'<BR>';	 
   $fffff= $row['tickets_question'];
   $details .= substr($fffff ,0,150);
   $sale=rawurlencode($details);
						
?>    <tr align="center" class="<?php set_class(); ?>"  >
      <td class="borderLL"><input type="checkbox"  id="<?php echo $row['tickets_id']; ?>" onClick="sele(<?php echo $row['tickets_id']; ?>)" name="ticket[<?php echo $row['tickets_id']; ?>]" value="<?php echo $row['tickets_id']; ?>" /></td>
      <td class="boxborder text"><a onmouseout="return nd()";
 onMouseOver="return overlib('<?php echo $sale; ?>',DECODE,AUTOSTATUS)" 
	   href="<?php echo $_SERVER['PHP_SELF'];
	    ?>?action=open&amp;ticketid=<?php
		 echo $row['tickets_id'] ?>"><?php echo $row['tickets_id'] ?></a>
	  </td>
      <td class="boxborder text"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=open&amp;ticketid=<?php echo $row['tickets_id'] ?>">
	  <?php
  	if (	($_SESSION['gnulevel']==1) or ($_SESSION['gnulevel']==2) ) 
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
	   }
		 ?>
	   </a></td>
      <td class="boxborder text">[<?php echo $rowA['ticket_count'] ?>]
      </td>
      <td class="boxborder text"><?php echo $row['tickets_subject'] ?></td>
      <td class="boxborder text"><?php echo date($dformat, $row['tickets_timestamp']).' '.date('H:i:s', $row['tickets_timestamp']) ?></td>
      <td width="25"  style="padding-left:4; padding-right:4;"bgcolor="#<?php echo $row['color'] ?>" class="boxborder text"><?php echo $row['name'] ?></td>
      <td class="boxborder text"><?php echo $row['tickets_categories_name'] ?></td>
      <td class="borderRR"><?php

					IF ($row['tickets_status'] == '0')
						{
						echo '<span style="color:#FF0000">';
						}
					ELSE
						{
						echo '<span style="color:#000000">';
						}
	?>
          <?php echo  $status[$row['tickets_status'] ] ?></td>
    </tr>
    <?php
					}
?>
    
	<tr><td  class="borderL"  colspan="7"><select name="change_state">
          <option value="1">Open</option>
          <option value="0">Close</option>
          <?php if( $_SESSION['gnulevel']>0 ) { ?><option value="2">Delete</option><?php } ?>
        </select>
          <input type="submit" name="sub" value="Action">          
		  <span class="comment3">
		  <?php echo $maxRows_Recordset1.' Tickets/page'; 
		  ?></span>
      </td>
      <td class="borderR"  colspan="2"><div align="right">
          <select name="menu"  onChange="MM_jumpMenu('parent',this,0)">
              <option value="list.php;status=">Don't Auto Refresh Page</option>
			  <option value="<?php echo $_SERVER['PHP_SELF'];  ?>?timer=60">Refresh Every 60 seconds </option>
              <option value="<?php echo $_SERVER['PHP_SELF'];  ?>?timer=300">Refresh Every 5 minutes</option>
              <option value="<?php echo $_SERVER['PHP_SELF'];  ?>?timer=900">Refresh Every 15 minutes </option>
              <option value="<?php echo $_SERVER['PHP_SELF'];  ?>?timer=1800">Refresh Every 30 minutes </option>
		      <option value="<?php echo $_SERVER['PHP_SELF'];  ?>?timer=3600">Refresh Every 60 minutes </option>
          </select>
      </div></td></tr></table></form>
  </td>
  </tr>
</table>
<div align="center">
  <p><span class="testo Estilo2">
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><strong>&#8249;&#8249;&#8249;&#8249;</strong></a>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">&laquo;</a>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">&raquo;</a>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><strong> &#8250;&#8250;&#8250;&#8250;</strong></a> </span>
    <?php
   $qas= ceil(  ($_SESSION['total']/$maxRows_Recordset1) );
   echo 'Result page: ';   
   $time = round($endtime*100)/100;   
   for ($zz=0;  $zz < $qas; $zz +=1)
   { //for
   $actual=$_GET['pageNum_Recordset1'];
   ?>
      <span class="testo">
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
	  </span>
    <?php
   } //of the for
   ?>
</p>
</div>