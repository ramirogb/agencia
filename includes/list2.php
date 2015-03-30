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
<div class="titulo" align="center">
  <script src="includes/over/overlibmws.js" type="text/javascript"></script>
  <?php echo  $reservs ;?> </div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="ningun">
<tr><td valign="top"><form name="myform"  class="ningun" action="<?php echo $_SERVER['PHP_SELF'];  ?>?action=home<?php echo $addon ?>" method="post">
  <table  width="875" border="0" align="<?php echo $maintablealign ?>" cellpadding="0" cellspacing="0" class="boxborder" id="tables">
    <tr   class="listView" align="center">
      <td class="ListViewL" style="cursor:pointer" onclick="check();"><b><u>Select</u></b></td>
      <td class="ListView"><b> ID</b></td>
      <td class="ListView"><img src="images/unread.gif" alt="Image for a new, Unread ticket" width="14" height="11" border="0"></td>
      <td class="ListView"><b>Services</b></td>
      <td class="ListView"><b><?php echo $text_listsub ?></b></td>
      <td class="ListView"><div align="center"><strong>First Service <a href="<?php  	printf("%s?pageNum_Recordset1=%d%s",$currentPage,$zz,$queryString_Recordset1); ?>&t=first_service"><img src="images/asc.sort.gif" width="7" height="7" border="0"></a> <img src="images/desc.sort.gif" width="7" height="7"></strong></div></td>
      <td class="ListView"><b>Date</b></td>
      <td class="ListView"><strong>Pax</strong>.</td>
      <td class="ListView">&nbsp;</td>
      <td class="ListView"><b><?php echo $text_liststa ?></b></td>
      <td class="ListViewR"><b><?php echo $debt ?></b></td>
    </tr>
    <?php
	// LOOP THROUGH THE REQUESTS FOR THE USERS ACCOUNT
				WHILE ($row = query_db_array($result))
					{
	 
						
?>    <tr align="center" class="<?php set_class(); ?>"  >
      <td class="borderLL"><input type="checkbox"  id="<?php echo $row['tickets_id']; ?>" onClick="sele(<?php echo $row['tickets_id']; ?>)" name="ticket[<?php echo $row['tickets_id']; ?>]" value="<?php echo $row['tickets_id']; ?>" /></td>
      <td class="boxborder text"> <a href="<?php echo "quote.php?action=open_r&id=".$row['DocNro']; ?>"><?php echo $row['DocNro']
 ?></a></a>
	  </td>
      <td class="boxborder text"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=open&amp;ticketid=<?php echo $row['tickets_id'] ?>">
	  <?php
  	if (	($_SESSION['gnulevel']==1) or ($_SESSION['gnulevel']==2) ) 
	{	$rfgt5='unread_admin';	}
	else
	{	$rfgt5='unread_user';	}


	   if ( $row['Sts']=='1')
	   {
	   echo "<img   src=\"images/unread.gif\" alt=\"$details0\" width=\"14\" height=\"11\" border=\"0\">";
	   }
	   else
	   {
	   echo "<img src=\"images/read.gif\" alt=\"$details0\" width=\"14\" height=\"11\" border=\"0\">";
	   }
		 ?>
	   </a></td>
      <td class="boxborder text"><?php echo $row['servcount'] ?></td>
      <td class="boxborder text"><?php echo $row['AgeCdg'] ?></td>
      <td class="boxborder text"><?php echo date($dformat, $row['Date_first_serv']).' '.date('H:i:s', $row['Date_first_serv']) ?></td>
      <td  style="padding-left:4; padding-right:4;"bgcolor="#<?php echo  '$FFFFFF'; //$row['color']
	   ?>" class="boxborder text"><?php echo date($dformat, $row['timestamp']).' '.date('H:i:s', $row['timestamp']) ?></td>
      <td class="boxborder text"><?php echo $row['paxnumber'] ?></td>
      <td ><?php echo $row['tickets_categories_name'] ?></td>
      <td class="borderRR"  ><?php 
	  if ($row['state_reserv']==1) { echo $confirmed;}
	  if ($row['state_reserv']==0) { echo $pending;}
	  if ($row['state_reserv']==2) { echo $canceled;}
	  

?><?php

					IF ($row['state_reserv'] == '1')
						{
						echo '<span style="color:#FF0000">';
						}
					ELSE
						{
						echo '<span style="color:#000000">';
						}
	?>          </td>
      <td class="borderRR"  ><?php echo $row['they_owe_you'] ?></td>
    </tr>
    <?php
					}
?>
    
	<tr>
	  <td  class="borderL"  colspan="7">		  <span class="comment3">
		  <?php echo $maxRows_Recordset1 ?></span>
      </td>
      <td class="borderR"  colspan="4"><div align="right">
      </div></td></tr></table>
</form>
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