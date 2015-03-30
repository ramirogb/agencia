<!-- jQuery -->
		<script type="text/javascript" src="includes/pay.js"></script>
		<script type="text/javascript" src="includes/jquery.min.js"></script>
        
        <!-- required plugins -->
		<script type="text/javascript" src="includes/date.js"></script>
		<!--[if IE]><script type="text/javascript" src="scripts/jquery.bgiframe.min.js"></script><![endif]-->
        
        <!-- jquery.datePicker.js -->
		<script type="text/javascript" src="includes/jquery.datePicker.js"></script>
        
        <!-- datePicker required styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="includes/datePicker.css">
		
        <!-- page specific styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="includes/demo.css">
        
        <!-- page specific scripts -->
		
<script src="includes/jquery.js"></script>
<script src="includes/jquery.validate.js"></script>
  <script>
$(document).ready(function(){
    $("#creat").validate({
    
    rules: {
    	tarif: {
    		required: true,
    		minlength: 1
    	       }
		,mitarif: {
			required: true,
			minlength: 1
		         }
        ,serv_type: {
		        required: true,
               minlength: 1
		         }
		
	},
    messages: {
	
    	tarif: {
    		required: "Selecciona del Catalogo",	minlength: jQuery.format(" {0}.")
    	      }
		      ,mitarif: "Sel. Servicio."
			  ,serv_type:" Selecciona tipo servicio"
		
              }
    
    });
});
 
</script>
  <script>
  $(document).ready(function(){
    $("#creat").validate();
  });
  
  
  
  
  </script>

		
		
		
		<script type="text/javascript" charset="utf-8">
<!--

function MM_jumpMenu(targ,selObj,restore){ //v3.0
if (selObj.selectedIndex > 0)  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

//-->
</script>


        <style type="text/css">
<!--
.Estilo1 {color: #FF0000}
-->
        </style>
        <p align="center">&nbsp;</p>
        <p align="center"><?php echo $wizard1; ?></p>
        <p align="center">
          <?php  if (isset($_SESSION['wizard_service'])) {?>
          <img src="images/step2.png" width="161" height="50">
          <?php }?>
        </p>
        <link href="styles.css" rel="stylesheet" type="text/css">
<div align="center">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=tarif1" method="post" name="form1" id="creat" >
    <table width="93%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1%"><div align="center"></div></td>
        <td width="27%" class="comment4"><div align="center"></div></td>
        <td class="comment4"><div align="center"></div></td>
        <td width="18%" class="comment4">&nbsp;</td>
        <td width="11%" class="comment4">&nbsp;</td>
        <td width="25%" class="comment4">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
        <td><span >          <span class="comment4">
          <?php  echo  $codeCatalog ?>
          </span>
          <select    name="tarif" id="tarif" onChange="MM_jumpMenu('parent',this,0)">
            <option value=""><?php echo  $selectme ?></option>
            <?php
			
if (isset($_GET['catalog']) )
{
$_SESSION['catalog1']=$_GET['catalog']; //get it from GET or from session(the wizard creates its)
}
	$query577 = "	SELECT  * FROM tarifarios ORDER BY id desc";	 
	$result577 = query_db($query577);	
	$row3x=query_db_assoc( $result577);	
   //$mmx=['s'][$j];		
			 do { ?>
            <option    value="<?php   echo $rtcv; ?>?action=create_tarif&catalog=<?php echo $row3x['tarif_cdg']; ?>&j=<?php echo $j; ?>" <?php if (!(strcmp( trim($_SESSION['catalog1']), $row3x['tarif_cdg'] ) ) ) {echo "SELECTED"; } ?>><?php echo  substr($row3x['descript'] ,0,20);  ?></option>
            <?php } while ($row3x=query_db_assoc(	$result577)); ?>
          </select>
          </span> </td>
        <td>
          <span class="comment4">
          <?php  echo  service ?>
          </span>
          <span class="Estilo1">
          <select    name="mitarif" id="mitarif" >
            <option value=""selected >&nbsp;</option>
            <?php			
	$query577 = "	SELECT  * FROM servicios ORDER BY SerDsc desc";
	  
  if( isset ($_SESSION['catalog1']))
	{
	$hh=$_SESSION['catalog1'];
	}
 $query577 = "	SELECT  * FROM servicios where tarif_cdg='$hh' ORDER BY SerDsc desc";	 	
	
	$result577 = query_db($query577);	
	$row3x=query_db_assoc( $result577);	
   //$mmx=['s'][$j];		
			 do { ?>
            <option    value="<?php echo $row3x['SerCdg'].'|'.$row3x['SerAgeCdg']; ?>" <?php if (!(strcmp( $_SESSION['wizard_service'], $row3x['SerCdg'] ) ) ) {echo "SELECTED"; } ?>>
            <?php
		   $kk=substr($row3x['SerDsc'] ,0,200); 
		   $_SESSION['el_service']=$kk;
		   $jjs=$row3x['SerAgeCdg'];
				   
		   if  ( $jjs<>'') 
		   {
		    $query577s = "	SELECT  * FROM agencias where AgeCdg='$jjs'";	
	      $result577s = query_db($query577s);	
		  $row3xs=query_db_assoc( $result577s);
		   $kk=$kk.'  >> '.$row3xs['AgeDsc'];
		     }
		   echo  	   $kk;
		    ?>
            </option>
            <?php } while ($row3x=query_db_assoc(	$result577)); ?>
          </select>
          <input name="Sercdg" type="hidden" id="Sercdg" value="<?php  $ing=explode('|',$_POST['mitarif']); echo $ing[0];  ?>">
</span>
          <div align="center">
        </div></td>
        <td><span class="comment4">
          <?php  echo  $type_reserv ?>
          </span>
          <span class="Estilo1">
          <select name="serv_type" onChange="sel_lang(this.value)"  id="tipe[<?php echo $j; 
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
      </select></select>
      <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=create_serv_type"><img src="images/new_record.jpg" width="16" height="16" border="0"></a> </span></td>
        <td width="11%"  valign="top" rowspan="6"><div    id='ajaxDiv4'  style="cursor:pointer"  > </div></td>
        <td><span class="comment4">
          <?php  echo  $text_listsub  ?>
          <select name="AgeCdg" id="AgeCdg">
              <option value=""selected >&nbsp;<?php echo $all ?></option>
              <?php
			 $query_agency = "SELECT * FROM agencias ";
$agency = query_db($query_agency) ;
$row3x = query_db_assoc($agency);  
$totalRows_agency = query_db_num($agency);
			 do { ?>
              <option value="<?php  echo $row3x['AgeCdg']; ?>" <?php if (!(strcmp($row3x['AgeCdg'], $row_tarif[0]['AgeCdg'] ) ) ) {echo "SELECTED";} ?>><?php echo $row3x['AgeDsc']; ?></option>
              <?php } while ($row3x=query_db_assoc(	$agency)); ?>
          </select>
        </span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="18%" class="comment4"><div align="center">
        </div></td>
        <td class="comment4">&nbsp;</td>
        <td class="comment4">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?php  echo $nranges ?></td>
        <td><div align="center">
            <input name="ranges" type="text" id="ranges" value="<?php echo $cols_prices;?>" size="5">
         <?php  echo $predefault  ?> 
         <input name="predet" type="checkbox" id="predet" value="1" checked>        
            <span class="boxborder"><span class="boxborder text"><span class="text">
            </span></span></span></div></td>
        <td>&nbsp;</td>
        <td class="comment4">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="18%" class="comment4">&nbsp;</td>
        <td width="18%" class="comment4">&nbsp;</td>
        <td width="25%" class="comment4">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><?php  echo $ovewrite ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><span class="boxborder"><span class="boxborder text"><span class="text">
          <input type="submit" name="Submit" value="Submit">
        </span></span></span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>

