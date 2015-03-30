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

<div align="center"><strong><?php echo $settings;?></strong>
</div>
<table width="900" height="68" border="0"   style="margin-top:10px " align="center" cellpadding="0" cellspacing="0" class="tables">
  <tr bgcolor="#669966">
    <td height="66" colspan="3" style="padding-left:10px "><span style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF"> e-tour </span><span class="Estilo6">Version 1.15 running at: <?php echo $_SERVER['SERVER_NAME'];?></span></td>
    <td width="421" colspan="2" class="Estilo6"><p>Mysql version:
            <?php 
			$sql="select version()";
		     $res = @query_db($sql);
			 $r=@query_db_row($res);
			 echo $r[0];
			 
			?>&nbsp;Screen:<?php echo $_COOKIE['screenresolution'];?>pixels</p>
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
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" class="tables">
  <tr>
    <td width="92"   class="bx-in"><div align="center"><strong><?php echo $servicios;?></strong></div></td>
    <td width="153"  class="bx-in" ><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=catalog"><span class="titulo"><strong><?php echo $cat1;?></strong></span></a><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=create_cat"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></td>
    <td width="146"  class="bx-in" ><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=list_services"><span class="titulo"><strong><?php echo 	$text_titleclo ?></strong></span></a><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=insert_service"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></td>
    <td width="146"   class="bx-in"  ><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=services_tipe"><span class="titulo"><strong><?php echo $variations; ?></strong></span></a> <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=create_serv_type"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></td>
    <td width="158"  class="bx-in"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=list_tarif"><span class="titulo"><strong><?php echo $prices1;?></strong></span></a> <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=create_tarif"><img src="images/new_record.jpg" width="16" height="16" border="0"></a> </td>
    <td width="84"  class="bx-in"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=languajes"><span class="titulo"><strong><?php echo $languajes ?></strong></span></a> <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=create_lang"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></td>
    <td width="119"  class="bx-in"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=wizard"><span class="titulo"><strong><?php echo 	$wizard ?></strong></span></a><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=wizard"><img src="images/setup.gif" width="32" height="32" border="0"></a> </td>
  </tr>
  <tr>
    <td class="bx-in" ><div align="center"><strong><?php echo $empresas;?></strong></div></td>
    <td class="bx-in" ><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=agencies"><span class="titulo"><strong><?php echo $agencias_?></strong></span></a> <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=insert_agency"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></td>
    <td class="bx-in" ><a href="quote.php?action=users"><span class="titulo"><strong><?php echo $usuarios?></strong></span></a> <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=add_usr"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></td>
    <td  >&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td class="bx-in" ><div align="center"><strong><?php echo $messages?></strong></div></td>
    <td height="47"  class="bx-in"><a href="tickets2.php?action=departaments"><span class="titulo"><strong><?php echo $departaments?></strong></span></a> <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=insert_agency"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></td>
    <td height="47"  class="bx-in"><a href="tickets2.php?action=priorities"><span class="titulo"><strong><?php echo $urgency_levels?></strong></span></a> <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=insert_agency"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></td>
    <td >&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td  class="bx-in"  height="18"><div align="center"><strong><?php echo $installation?></strong></div></td>
    <td class="bx-in" ><a href="quote.php?action=config">Basic</a></td>
    <td  class="bx-in" ><a href="http://www.cromosoft.com/helpdesk/tickets.php?action=create_form"> <?php echo $requestf; ?></a></td>
    <td  valign="top" colspan="4"><p>&nbsp;</p>
    </td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
<td>&nbsp;</td>
    <td>&nbsp;</td>
<td>
<div align="center"></div></td>
