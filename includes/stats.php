<?php 
//if ($auth<>true) exit;
if ($_GET['s']==1)
{
			 $busca=$_POST['reserv']; //01/30/2010 
			 
			 $rrr = time() - (7 * 24 * 60 * 60);
			 $periodo=7;
			 for ($xss=0;$xss< $periodo; $xss++) 
			{
			$rrr=$rrr+ 24 * 60 * 60;
			$from=date("Y-m-d",$rrr);
			$querybb="select  count(DocNro) as cu, sum( reserv_master.total_price) as suma,
								DAY(from_unixtime((reserv_master.timestamp))) as dia,
								MONTH(from_unixtime((reserv_master.timestamp))) as mes,reserv_master.timestamp
								     FROM reserv_master  ";
			 $querybb .= "where   state_reserv='1' and reserv_master.timestamp BETWEEN UNIX_TIMESTAMP('$from')	AND   (UNIX_TIMESTAMP('$from') +86400)  
				group by dia,mes limit 100";
			$resultVV       = query_db($querybb);
			$filaV=query_db_row($resultVV);			
			$fig[$xss][0]=$filaV[0];
			$fig[$xss][1]=$filaV[1];
			$fig[$xss][2]=$filaV[2];
			$fig[$xss][3]=$filaV[3];
			$fig[$xss][4]=$filaV[4];
		 }
}

if ($_GET['s']==2)
{
			 $busca=$_POST['reserv']; //01/30/2010 
			 
			 $rrr = time() - (7 * 24 * 60 * 60);
			 
			$querybb="select  DocNro, reserv_master.total_price,reserv_master.paxnumber,reserv_master.timestamp,
							  reserv_master.AgeCdg, DAY(from_unixtime((reserv_master.timestamp))) as dia,
							   MONTH(from_unixtime((reserv_master.timestamp))) as mes FROM reserv_master  ";
			$querybb .= "where   state_reserv='1' 	order by reserv_master.total_price desc, reserv_master.timestamp desc";
			$resultVV       = query_db($querybb);
			$filaV=query_db_row($resultVV);
			//$totaltickets = query_db_num($result);
			//$graf=$filaV;$t[0][4]='rr';
}

?>
<?php if ($_GET['s']==1)
{
?>
<table width="30%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>N</td>
    <td><?php echo $ingre; ?>&nbsp;</td>
    <td><?php echo $text_listdat ?></td>
  </tr>
  <tr class="report">
    <?php
	for ($dd=0;$dd<$periodo;$dd++)
	{
    ?>
    <td><?php
	echo $fig[$dd][0];
     ?></td>
    <td><?php
	echo $fig[$dd][1];
     ?></td>
    <td>&nbsp;
        <?php	
	$este=$fig[$dd][4];	
	echo date($dformat, $este);
     ?>
    </td>
  </tr><?php 
  }

  ?>
</table>
<?php if ($_GET['s']==1)
{
?>
<table width="30%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#0066FF">
  <tr>
    <td><a href="?action=stats&s=1"><?php echo $past_week ?></a></td>
    <td><a href="?action=stats&s=1"><?php echo $past_month ?></a></td>
    <td><a href="?action=stats&s=1"><?php echo $past_6m ?></a></td>
  </tr>
</table>
<?php 
}
?>
<?php 
}
?>
<p><?php if ($_GET['s']==2)
{
?>
</p>
<table width="30%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php echo $ingre; ?></td>
    <td>Doc.</td>
    <td>Paxes</td>
    <td>Operator</td>
    <td><?php echo $text_listdat; ?>&nbsp;</td>
  </tr>
  <tr class="report">
    <?php
         $n=-1;		
   do {
    ?>
    <td><?php
	echo $filaV[1];
     ?></td>
    <td><?php
	echo $filaV[0];
     ?></td>
    <td><?php
	echo $filaV[2];	
     ?></td>
    <td><?php
	echo $filaV[4];	
     ?>
    </td>
    <td>&nbsp;
        <?php	
	$este=$filaV[3];	
	echo date($dformat, $este);
     ?>
    </td>
  </tr>
  <?php 
  }
  while( $filaV=query_db_row($resultVV) );
  ?>
</table>
<p>  <?php 
}
?>
&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
