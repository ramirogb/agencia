<?php
if ($authz<>'TRUE') exit;
?>

<?php 
include('configuration.php');
?>
<link href="styles.php" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo6 {color: #FFFFFF}
-->
</style>

<div align="center"><strong><?php echo 	$dashboard;?></strong>
</div>
<table width="850" height="68" border="0"   style="margin-top:10px " align="center" cellpadding="0" cellspacing="0" class="tables">
  <tr bgcolor="#669966">
    <td height="66" colspan="3" style="padding-left:10px "><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"> e-tour </span><span class="Estilo6">Version  running at: <?php echo $_SERVER['SERVER_NAME'];?></span></td>
    <td width="421" colspan="2" class="Estilo6"><p>Mysql version:
            <?php 
			$sql="select version()";
		     $res = @query_db($sql);
			 $r=@query_db_row($res);
			 echo $r[0];
			 
			?>
      </p>
        <p>DB size
          <?php 
			$sql="SHOW TABLE STATUS"; 
$sale=query_db($sql);

$dbssize = 0; 
while (   $row = query_db_assoc($sale)  )
 { 
$dbssize += $row['Data_length'] + $row['Index_length']; 
 	if ( $row['Name']=='tickets_atach')
	{
	$adjuntos=$row['Data_length'];
	}
 
} 

print   ceil(($dbssize/1024) ); 
			?>
    K Bytes reported by Table Status.</p></td>
  </tr>
</table>
<table width="850" border="0" align="center" cellpadding="0" cellspacing="1" class="tables">
  <tr>
    <td width="17" rowspan="8">&nbsp;</td>
    <td colspan="2" bgcolor="#E6FBF9"><div align="center"><strong><?php echo $reservations ?></strong></div></td>
    <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv&t=half"><span class="titulo"><strong><?php echo $messages?></strong></span></a></td>
    <td bgcolor="#DBFCB6"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv&t=half"><span class="titulo"><strong><?php echo $quotations?></strong></span></a></td>
    <td width="17" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="191" bgcolor="#E6FBF9"><strong><?php echo $order_by_date ?></strong></td>
    <td bgcolor="#E6FBF9"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv&t=tomorrow"><span class="titulo"></span></a><strong><?php echo $order_by_state ?></strong></td>
    <td width="144"><a href="tickets2.php"><span class="titulo"><?php echo $messages_open?></span></a></td>
    <td width="174" bgcolor="#DBFCB6"><a href="quote.php?action=rtp_quote"><?php echo $quotations ?></a></td>
  </tr>
  <tr>
    <td width="191" bgcolor="#E6FBF9"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv"><span class="titulo"><strong><?php echo $order_by ?></strong></span></a> </td>
    <td bgcolor="#E6FBF9"><a href="quote.php?action=rtp_reserv&t=new"><?php echo $waiting_attention ?></a></td>
    <td width="144"><a href="tickets2.php?action=create"><?php echo $create_message ?> </a></td>
    <td width="174" bgcolor="#DBFCB6">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" bgcolor="#E6FBF9"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv&t=order_f_service&order=DESC"><span class="titulo"><strong><?php echo $order_service_asc ?></strong></span></a> <a href="quote.php?action=rtp_reserv&t=order_f_service&order=ASC"><img src="images/asc.sort.gif" width="7" height="7" border="0"></a><a href="quote.php?action=rtp_reserv&t=order_f_service&order=DESC"><img src="images/desc.sort.gif" width="7" height="7" border="0"></a></td>
    <td bgcolor="#E6FBF9"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv&t=half"><span class="titulo"><?php echo $half_payment?></span></a></td>
    <td>&nbsp;</td>
    <td bgcolor="#DBFCB6">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#E6FBF9"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv&t=tomorrow"><?php echo $books_for_tomorrow ?></a></td>
    <td bgcolor="#E6FBF9"><a href="quote.php?action=rtp_reserv&t=waiting"><?php echo $waiting_advance ?></a></td>
    <td>&nbsp;</td>
    <td bgcolor="#DBFCB6">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#E6FBF9"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv&t=half"></a><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv&t=next_week"><?php echo $books_for_next_week ?></a></td>
    <td bgcolor="#E6FBF9"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=rtp_reserv&t=paid"><?php echo $paid_bookings ?></a></td>
    <td>&nbsp;</td>
    <td bgcolor="#DBFCB6">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#E6FBF9"><a href="quote.php?action=rtp_reserv&t=waiting"> </a></td>
    <td bgcolor="#E6FBF9"><a href="quote.php?action=rtp_reserv&t=cancel"><?php echo $canceled ?></a></td>
    <td>&nbsp;</td>
    <td bgcolor="#DBFCB6">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#E6FBF9">&nbsp;</td>
    <td bgcolor="#E6FBF9"><a href="quote.php?action=rtp_reserv&t=archi"><?php echo archived ?></a></td>
    <td>&nbsp;</td>
    <td bgcolor="#DBFCB6">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="17" rowspan="4"><div align="center"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="23" colspan="2"><form name="form1" method="post" action="<?php  echo 'quote.php?action=rtp_reserv&t=archi'; ?>">
      <div align="left"><?php echo 	$search_booking ?>
          <input name="reserv" type="text" id="reserv" size="10">
          <input name="search" type="hidden" id="search" value="3">
          <span class="text">
          <input name="submit" type='submit' value='Go'>
        </span> </div>
    </form></td>
    <td colspan="3" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td height="24">&nbsp;</td>
  </tr>
</table>
<td>&nbsp;</td>
    <td>&nbsp;</td>
<td>
<div align="center"></div></td>
