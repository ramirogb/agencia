<table width="<?php echo $maintablewidth ?>" align="<?php echo $maintablealign ?>" cellpadding="0" cellspacing="0" class="boxborder">
  <?php
  //to create pages select this
			$query = '	SELECT  * FROM users
					ORDER BY username';
{
			$query = "	SELECT  * FROM servicios ORDER BY SerDsc";
}					
$query_limit = sprintf("%s LIMIT %d, %d",$query, $startRow_Recordset1, $maxRows_Recordset1); 				
			$result = query_db($query_limit);
			$totalRows_contenido = query_db_num($result);
			$totalRows_contenido =20;		
			$j = 1+$_GET['pageNum_Recordset1']*$tickets_display ;		
			
						for ($www=0; $www<1; $www++)
				{				
?>

    <tr bgcolor="<?php echo UseColor() ?>">
      <td class="boxborder text"><?php 
	  echo $j; 
	  ?></td>               
      <td  style="padding-right:3px" >
        <?php  if  ($_SESSION['action'][$j]=='true') 
		{  show_warning($err);
		}
 ?>        
        <input name="dat[<?php echo $j; ?>]"  type="text" class="date-pick"  id="dat[<?php echo $j; ?>]" onChange="ajaxFunction('dat[<?php echo $j; ?>]');"  value="<?php  echo $_SESSION['dat'][$j]; ?>" size="8" maxlength="10">
        <input name="username" type="hidden" id="username" value="<?php echo $row['username']; ?>">      </td>
      <td  style="padding-right:3px" class="boxborder text">
        <select name="hour[<?php echo $j; ?>]"   style="width:37px"  onChange="ajaxFunction('hour[<?php echo $j; ?>]');"  id="hour[<?php echo $j; ?>]">
          <option value="00"<?php     

		  $hor=$_SESSION['hour'][$j];
		  
		  if (!(strcmp("00", $hor ) ) ) {echo "SELECTED"; } ?> SELECTED><?php echo '0h'; ?></option>
<option value="01"<?php     if (!(strcmp("01", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '01h'; ?></option>
<option value="02"<?php     if (!(strcmp("02", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '02h'; ?></option>
<option value="03"<?php     if (!(strcmp("03", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '03h'; ?></option>
<option value="04"<?php     if (!(strcmp("04", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '04h'; ?></option>
<option value="05"<?php     if (!(strcmp("05", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '05h'; ?></option>
<option value="06"<?php     if (!(strcmp("06", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '06h'; ?></option>
<option value="07"<?php     if (!(strcmp("07", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '07h'; ?></option>
<option value="08"<?php     if (!(strcmp("08", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '08h'; ?></option>
<option value="09"<?php     if (!(strcmp("09", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '09h'; ?></option>
<option value="10"<?php     if (!(strcmp("10", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '10h'; ?></option>
<option value="11"<?php     if (!(strcmp("11", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '11h'; ?></option>
<option value="12"<?php     if (!(strcmp("12", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '12h'; ?></option>
<option value="13"<?php     if (!(strcmp("13", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '13h'; ?></option>
<option value="14"<?php     if (!(strcmp("14", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '14h'; ?></option>
<option value="15"<?php     if (!(strcmp("15", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '15h'; ?></option>
<option value="16"<?php     if (!(strcmp("16", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '16h'; ?></option>
<option value="17"<?php     if (!(strcmp("17", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '17h'; ?></option>
<option value="18"<?php     if (!(strcmp("18", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '18h'; ?></option>
<option value="19"<?php     if (!(strcmp("19", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '19h'; ?></option>
<option value="20"<?php     if (!(strcmp("20", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '20h'; ?></option>
<option value="21"<?php     if (!(strcmp("21", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '21h'; ?></option>
<option value="22"<?php     if (!(strcmp("22", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '22h'; ?></option>
<option value="23"<?php     if (!(strcmp("23", $hor ) ) ) {echo "SELECTED"; } ?> ><?php echo '23h'; ?></option> 

        </select>      
        <select name="minutes[<?php 
		  $min=$_SESSION['minutes'][$j];
		echo $j; ?>]"   style="width:35px" onChange="ajaxFunction('minutes[<?php echo $j; ?>]');" id="minutes[<?php echo $j; ?>]">
		<option value="00"<?php if (!(strcmp("00", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '00'; ?></option>
        <option value="15"<?php     if (!(strcmp("15", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '15m'; ?></option>
        <option value="30"<?php     if (!(strcmp("30", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '30m'; ?></option>
        <option value="45"<?php     if (!(strcmp("45", $min ) ) ) {echo "SELECTED"; } ?> ><?php echo '45'; ?></option>        
      </select>
</td>
      <td  style="padding-right:3px" class="boxborder text"><a href="javascript:hideshow(document.getElementById('adiv[<?php echo $j; ?>]'),<?php echo $j; ?>)"><img src="images/plus.gif" width="14" height="14" border="0"></a>
	  <select    name="tarif[<?php echo $j; ?>]" id="tarif[<?php echo $j; ?>]" onChange="MM_jumpMenu('parent',this,0)">
        <option value="./quote.php?catalog=-1&j=<?php echo $j; ?>" selected >&nbsp;</option>
        <?php			
	$query577 = "	SELECT  * FROM tarifarios ORDER BY id desc";	 
	$result577 = query_db($query577);	
	$row3x=query_db_assoc( $result577);	   	
	
	
	
			 do { ?>
        <option    value="<?php   echo $rtcv; ?>?catalog=<?php echo $row3x['tarif_cdg']; ?>&j=<?php echo $j; ?>" <?php 
			if (!(strcmp( trim($_SESSION['cate'][$j]), $row3x['tarif_cdg'] ) ) ) {echo "SELECTED"; 
			$_SESSION['cate'][$j]=$row3x['tarif_cdg']; }
			 ?>><?php echo  substr($row3x['descript'] ,0,30);  ?></option>
        <?php } while ($row3x=query_db_assoc(	$result577)); ?>
      </select></td>
      <td    >
	  <?php 		
	  ?>
      <select    name="s[<?php echo $j; ?>]"       id="s[<?php echo $j; ?>]" onChange="MM_jumpMenu('parent',this,0)">
        <option value="./quote.php?service=-1&j=<?php echo $j; ?>" selected >&nbsp;</option>
        <?php			
	
  if (   isset($_SESSION['cate'][$j]) and ($_SESSION['filter']=='2') ) 
  {//==============
  
	$hh=$_SESSION['cate'][$j];
	$gt=$_SESSION['xcv_userna'];
	$sqlr="select agencias.AgeCdg from agencias left join  users on agencias.AgeCdg=users.AgeCdg where users.username='$gt' ";
	$resultdf = query_db($sqlr);	
	$ag=query_db_row($resultdf);
	$agg=$ag[0];//gets agency code associated with the logged user
	
	$query577 = "SELECT  * FROM servicios where tarif_cdg='$hh' and  SerAgeCdg='$agg' ORDER BY SerDsc desc";	//show only special services for this agency
	 }
	 //===========
	 else
	 {
	 $nn=$_SESSION['cate'][$j];
	 $query577 = "SELECT  * FROM servicios  where tarif_cdg='$nn' ORDER BY SerDsc desc";//shows all from catalog
	 }
	
	$result577 = query_db($query577);	
	$row3x=query_db_assoc( $result577);	
			 do { ?>
        <option    value="<?php   echo $rtcv; ?>?service=<?php echo $row3x['SerCdg']; ?>&j=<?php echo $j; ?>" <?php if (!(strcmp( trim($_SESSION['serv'][$j]), $row3x['SerCdg'] ) ) ) {echo "SELECTED"; } ?>><?php echo  $row3x['SerCdg'].' '.substr($row3x['SerDsc'] ,0,25);  ?></option>
        <?php } while ($row3x=query_db_assoc(	$result577)); ?>
      </select>        
      <span class="boxborder text">
        <input name="serv_h[<?php echo $j; ?>]" type="hidden" id="serv_h[<?php echo $j; ?>]" value="<?php  echo $_SESSION['serv'][$j]; ?>">
      </span> </td>
 <?php     
	  	  $tgt=$_SESSION['serv'][$j];
$query578 = "	SELECT  tarifasdetalle.pre,servicios.SerDsc FROM tarifasdetalle,servicios where  servicios.SerCdg ='$tgt' 
and tarifasdetalle.SerCdg='$tgt' and tarifasdetalle.Paxini='1'";	 
	$result578 = @query_db($query578);	
	$row3x8=@query_db_row( $result578);	
	$sale= $row3x8[1];
	$_SESSION['descri'][$j]=$sale;
		  
	?>	  <td >
	<select name="tipe[<?php echo $j; ?>]" onChange="ajaxFunction('tipe[<?php echo $j; ?>]');window.location.reload();" id="tipe[<?php echo $j;
	   $ti=$_SESSION['tipe'][$j];
	   ?>]">	   
	    <option value=""><?php echo  $selectme ?></option>
		<?php
			$sdd=" Select * from servicios_variations";	
	 $resultsdd= query_db($sdd);
	 $fila=query_db_assoc($resultsdd);
		 	  
         do { ?>
        <option value="<?php  echo $fila['kind']; ?>"<?php  if (!(strcmp($fila['kind'], $ti ) ) ) {echo "SELECTED"; } ?> ><?php echo $fila['descript'] ?></option>
		<?php } while ($fila=query_db_assoc($resultsdd)); ?>        
      </select>
	  </td>
      <td >
	  <?php 
	  $gb=$_SESSION['tipe'][$j];
	  $sese=$_SESSION['serv'][$j];
	  //$sdd=" Select * from serv_type_lang,languajes where serv_type_lang.tipe ='$gb' and serv_type_lang.SerCdg='$sese' and serv_type_lang.lang=languajes.lang";		  
	  ?>
	  <select name="lang[<?php echo $j; ?>]"   onChange="ajaxFunction('lang[<?php echo $j; ?>]');"   style="width:80px";  id= "lang[<?php echo $j; ?>]" >
	  <option value=""><?php echo  $selectme ?></option>
        <?php  echo $j;
	  
	    $ti=$_SESSION['lang'][$j];
	 
	  $gb=$_SESSION['tipe'][$j];
		$sdd=" Select * from serv_type_lang,languajes where serv_type_lang.tipe ='$gb' and serv_type_lang.SerCdg='$sese' and serv_type_lang.lang=languajes.lang";	
	 $resultsdd= query_db($sdd);
	 $fila=query_db_assoc($resultsdd);
	  
	   ?>
        <?php 	  
         do { ?>
        <option value="<?php  echo $fila['lang']; ?>" <?php if (!(strcmp($fila['lang'], $ti )) ) {echo "SELECTED";} ?>><?php echo $fila['lang_descript']; ?></option>
        <?php } while ($fila=query_db_assoc($resultsdd)); ?>
      </select> </td>
      <td class="boxborder"><span class="boxborder text">
        <input name="passengern[<?php echo $j; ?>]" type="text" id="passengern[<?php echo $j; ?>]"  onChange="ajaxFunction('passengern[<?php echo $j; ?>]');" value="<?php echo $_SESSION['passengern'][$j]; ?>" size="4" maxlength="4">
      </span></td>
      <td ><?php echo   $price_individual[$j]; ?>&nbsp;</td>
      <td ><input name="action[<?php echo $j; ?>]" type="checkbox" id="action[<?php echo $j; ?>]"  onChange="ajaxFunction('action[<?php echo $j; ?>]');" value="true" <?php if  (  $_SESSION['action'][$j] =='true') echo 'checked'; ?>>
        <?php  if (  ($_POST['s'][$j]<>"./quote.php?service=-1&j=".$j)   and ($_SESSION['action'][$j]<>'true') )
		{  show_warning('*');
		
		}
 ?>
</td>
      <td >        <a href="javascript:hideshow(document.getElementById('adiv[<?php echo $j; ?>]'),<?php echo $j; ?>)"><img src="images/comments.gif" width="15" height="12" border="0"></a>
	  <div id="adiv[<?php echo $j; ?>]" style="font:10px bold; display: block; display:none" ><input name="com[<?php echo $j; ?>]" type="text" id="com[<?php echo $j; ?>]"   onChange="ajaxFunction('com[<?php echo $j; ?>]');" value="<?php echo $_SESSION['com'][$j]; ?>" size="3" maxlength="255"></div></td>
      <td bgcolor="<?php echo UseColor() ?>" >
  <?php 
       		
		if (   $_SESSION['action'][$j]=='true')
		{
		
		echo $sub_total[$j] = round( (real)   $sub_total[$j]*$_SESSION['passengern'][$j],2);
		$_SESSION['subtotal'][$j]=$sub_total[$j];
		}
		else
		{		echo $sub_total[$j]=0;
		 }
		?> 
  <input name="subtotal[<?php echo $j;  ?>]" type="hidden" id="subtotal[<?php echo $j;  ?>]" value="<?php  echo $sub_total[$j]  ?>">
      </td>
    </tr> <?php
				$j++;
				}
?> </table>