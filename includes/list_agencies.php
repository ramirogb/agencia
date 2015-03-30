<script type="text/javascript" src="includes/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('.delete').click(function() {
            var answer = confirm("Delete this item?")
            if (answer){
                return true;
            }
            else{
                return false;
            };
        });
    });
</script>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_agencias = 20;
$pageNum_agencias = 0;
if (isset($_GET['pageNum_agencias'])) {
  $pageNum_agencias = $_GET['pageNum_agencias'];
}
$startRow_agencias = $pageNum_agencias * $maxRows_agencias;

$query_agencias = "SELECT * FROM agencias";
$query_limit_agencias = sprintf("%s LIMIT %d, %d", $query_agencias, $startRow_agencias, $maxRows_agencias);
$agencias = query_db($query_limit_agencias) ;
$row_agencias = query_db_assoc($agencias);

if (isset($_GET['totalRows_agencias'])) {
  $totalRows_agencias = $_GET['totalRows_agencias'];
} else {
  $all_agencias = query_db($query_agencias);
  $totalRows_agencias = query_db_num($all_agencias);
}
$totalPages_agencias = ceil($totalRows_agencias/$maxRows_agencias)-1;

$queryString_agencias = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_agencias") == false && 
        stristr($param, "totalRows_agencias") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_agencias = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_agencias = sprintf("&totalRows_agencias=%d%s", $totalRows_agencias, $queryString_agencias);
?>
<SCRIPT language=JavaScript>
function nuevoAjax(){
	var xmlhttp=false;
 	try {
 		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 	} catch (e) {
 		try {
 			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 		} catch (E) {
 			xmlhttp = false;
 		}
  	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
 		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function ajaxFunction(pCtrl){
	var t1, t2, t3,t8,contenedor;
	//contenedor = document.getElementById('contenedor');	
	
	t3 = document.getElementById(pCtrl).name;//example dat[3]
	
	t1 = document.getElementById(pCtrl).value;	
	t8=(t3.substring(0,6)); //send true or false for a checkbox not the value
	if (t8=='action')	{ t1 = document.getElementById(pCtrl).checked;	}
	//alert(t8);
	
	//if t3=='action'
	ajax=nuevoAjax();
	t2="quote.php?aj="+t1+"&ajj="+t3 ;	
	ajax.open("GET",t2 ,true);
	//alert(t2);
	
	
	ajax.onreadystatechange=function()
	 {
		if (ajax.readyState==4) {
		//contenedor.innerHTML = ajax.responseText
	 	}
	}
	ajax.send(null)
	
}
</script>

<!-- jQuery -->
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
		<script type="text/javascript" charset="utf-8">
<!--

$(function()
            {
				$('.date-pick').datePicker();
            });
//-->
</script>

<?php if ($authz<>'TRUE') exit;

//=========preparing to fill prices and remember service codes
	  
?>
<link href="styles.css" rel="stylesheet" type="text/css">

<div align="right"></div>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<p>&nbsp;</p>
<p>
     
  <span class="comment3">   </span></p>
<p align="center"><?php  echo $agencias_; ?>&nbsp;</p>

  <table width="1300"  border="0" cellpadding="0" cellspacing="0" class="tables">
    <tr class="comment3">
      <td><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=insert_agency"><img src="images/new_record.jpg" width="16" height="16" border="0"></a></td>
      <td>&nbsp;</td>
      <td>C&oacute;digo</td>
      <td>Nombre</td>
      <td><?php echo $the_users?>&nbsp;</td>
      <td>Direcci&oacute;n</td>
      <td>Tel.</td>
      <td>Fax</td>
      <td>Contact</td>
      <td>Fecha inicio </td>
      <td>RUC</td>
      <td>Telf. 24h </td>
      <td>Nextel</td>
      <td>Movistar</td>
      <td>Claro</td>
    </tr>
    <?php do { ?>
    <tr class="<?php set_class(); ?>" >
      <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=edit_agenci&code=<?php echo $row_agencias['AgeCdg']; ?>"><img src="images/edit.png" alt="Editar" width="16" height="16" border="0"></a></td>
      <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=del_agenci&code=<?php echo $row_agencias['AgeCdg']; ?>"><img src="images/delete.png" alt="Borrar" width="16" height="16"  class="delete" border="0"></a></td>
      <td class="comment3"><?php echo $row_agencias['AgeCdg']; ?></td>
      <td class="comment3"><?php echo $row_agencias['AgeDsc']; ?></td>
      <td class="comment3"><a href="?action=users&operator=<?php 
	  $agen=$row_agencias['AgeCdg'];
	  echo $agen ?>"><?php
 $query_age = "SELECT count(*) FROM users where AgeCdg='$agen'";
$age = query_db($query_age);
$row_age = query_db_row($age);	  
	  echo $row_age[0]; 
	  ?>
      </a></td>
      <td class="comment3"><?php echo $row_agencias['AgeDir']; ?></td>
      <td class="comment3"><?php echo $row_agencias['AgeFon']; ?></td> 
      <td class="comment3"><?php echo $row_agencias['AgeFax']; ?></td>
      <td class="comment3"><?php echo $row_agencias['AgeCto']; ?></td>
      <td class="comment3"><?php echo date($dformat, $row_agencias['AgeFecAdd']).' '.date('H:i:s', $row_agencias['AgeFecAdd']) ; ?></td>
      <td class="comment3"><?php echo $row_agencias['AgeRuc']; ?></td>
      <td class="comment3"><?php echo $row_agencias['AgeFon2']; ?></td>
      <td class="comment3"><?php echo $row_agencias['AgeNex']; ?></td>
      <td class="comment3"><?php echo $row_agencias['AgeCelMov']; ?></td>
      <td class="comment3"><?php echo $row_agencias['AgeCelCla']; ?></td>
    </tr>
    <?php } while ($row_agencias = query_db_assoc($agencias)); ?>
</table>
<p>
<table width="50%" border="0" align="center" class="comment4">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_agencias > 0) { // Show if not first page ?>
          <h3><a href="<?php printf("%s?pageNum_agencias=%d%s", $currentPage, 0, $queryString_agencias); ?>">&lt;&lt;</a>
          </h3>
          <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_agencias > 0) { // Show if not first page ?>
          <h3><a href="<?php printf("%s?pageNum_agencias=%d%s", $currentPage, max(0, $pageNum_agencias - 1), $queryString_agencias); ?>">&lt;</a>
          </h3>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_agencias < $totalPages_agencias) { // Show if not last page ?>
          <h3><a href="<?php printf("%s?pageNum_agencias=%d%s", $currentPage, min($totalPages_agencias, $pageNum_agencias + 1), $queryString_agencias); ?>">&gt;</a>
          </h3>
          <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_agencias < $totalPages_agencias) { // Show if not last page ?>
          <h3><a href="<?php printf("%s?pageNum_agencias=%d%s", $currentPage, $totalPages_agencias, $queryString_agencias); ?>">&gt;&gt;</a>
          </h3>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>

