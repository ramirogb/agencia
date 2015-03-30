<?php 
if ($authz<>'TRUE') exit;
$maxRows_Recordset1 =$users_display; //Number of results per page
$pageNum_Recordset1 = 0;
$currentPage = $_SERVER["PHP_SELF"];
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1']; 
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
$_SESSION['start']=$startRow_Recordset1+1;
$_SESSION['end']= $currentPage*$maxRows_Recordset1  + $totalRows_contenido;
?>
<table width="<?php echo $maintablewidth ?>" cellspacing="0" cellpadding="0" class="boxborder" align="<?php echo $maintablealign ?>">
  <tr style="padding-bottom:2px">
    <td colspan="2" bgcolor="#AACCEE" class="text boxborder"  style="padding-left:5px"><strong> <?php echo  $usuarios;?></strong></td>
    <td bgcolor="#AACCEE" class="text boxborder"  style="padding-left:5px"><span></span><span><strong><a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=add_usr"><?php echo  $adduser;?><img src="images/add_user.gif" vspace="1" border="0"></a></strong></span></td>
    <td colspan="7" bgcolor="#AACCEE" class="text boxborder"  style="padding-left:5px">&nbsp;</td>
    <td class="boxborder text" bgcolor="#AACCEE">&nbsp;</td>
  </tr>
  <tr bgcolor="#EEEEEE">
    <td bgcolor="#EEEEEE" class="boxborder text"><b>ID.</b></td>
    <td bgcolor="#EEEEEE" class="boxborder text">N&ordm;</td>
    <td class="boxborder text"><b><b>Username </b></b></td>
    <td class="boxborder text"><b>Name</b></td>
    <td class="boxborder text"><b>Password</b></td>
    <td class="boxborder text"><b>Email</b></td>
    <td class="boxborder text"><?php echo $text_listsub ?></td>
    <td class="boxborder text"><b>Type</b></td>
    <td class="boxborder text"><b>Status</b></td>
    <td class="boxborder text"><b>Action</b></td>
    <td class="text boxborder"><strong>Reg. Date</strong></td>
  </tr>
  <?php
  //to create pages select this

			 $query = "	SELECT  * FROM users $add ORDER BY username";
					
if (isset($_POST['search']))
{
$key=$_POST['key'];
$selector=$_POST['selector'];
			$query = "	SELECT  * FROM users WHERE 
			MATCH($selector) against ('$key' in boolean mode) ORDER BY username";
}					
$query_limit = sprintf("%s LIMIT %d, %d",$query, $startRow_Recordset1, $maxRows_Recordset1); 				
			$result = query_db($query_limit);
			$totalRows_contenido = query_db_num($result);
  //to create pages select this	
			
			$j =$_SESSION['start'];
			
			WHILE ($row = query_db_array($result))

				{
				IF ($row['status'] == '1')
					{
					$status = 'Active';
					}
				IF ($row['status'] == '0')
					{
					$status = 'Suspened';
					}	
				IF ($row['status'] == '2')
					{
					$status = 'Banned';
					}
?>                                           
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=us" Method="post">
    <tr  class="<?php set_class(); ?>" >
      <td class="boxborder text"><?php 
	  echo $row['id'];
	  //echo $j; 
	  ?></td>
      <td class="boxborder text"><?php 
	  echo $j; 
	  ?></td>
      <td  style="padding-right:3px" class="boxborder"><div align="right"><span class="boxborder text"><?php echo $row['username'] ?>
          <input name="username" type="hidden" id="username" value="<?php echo $row['username']; ?>">
</span>
        </div></td>
      <td class="boxborder text"><input name="name" value="<?php echo $row['name'] ?>" size="15" /></td>
      <td class="boxborder"><input name="password" type="password" value="<?php echo $row['password'] ?>" size="12" /></td>
      <td class="boxborder"><input name="email" value="<?php echo $row['email'] ?>" size="15" /></td>
      <td class="boxborder"><select name="company" id="company">
        <option value="-1"selected >&nbsp;</option>
        <?php
			 $query_agency = "SELECT * FROM agencias ";
$agency = query_db($query_agency);
$row3x = query_db_assoc($agency);
$totalRows_agency = query_db_num($agency);
			 do { ?>
        <option value="<?php  echo $row3x['AgeCdg']; ?>" <?php if (!(strcmp($row3x['AgeCdg'], $row['AgeCdg'] ) ) ) {echo "SELECTED";} ?>><?php echo $row3x['AgeDsc']; ?></option>
        <?php } while ($row3x=query_db_assoc(	$agency)); ?>
      </select></td>
      <td class="boxborder">          <select name="type" id="type">
          <option value="User" <?php if (!(strcmp("User", $row['admin'] ) ) ) {echo "SELECTED";} ?>><?php echo 'User'; ?></option>
          <option value="Mod" <?php if (!(strcmp("Mod", $row['admin'] ) ) ) {echo "SELECTED";} ?>><?php echo 'Staff'; ?></option>
		  <option value="Admin" <?php if (!(strcmp("Admin", $row['admin'] ) ) ) {echo "SELECTED";} ?>><?php echo 'Admin'; ?></option>
        </select>
	  </td>
      <td class="boxborder text"><?php echo $status ?>
      <input name="edituser" type="hidden" id="edituser" value="1"></td>
      <td class="text"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=chang&<?php IF ($row['status'] == '1') {     ?>memberid=<?php echo $row['id'] ?>"><img src="./images/suspend.gif" alt="Suspend user" width="16" height="16" border="0"><?php
					}
				ELSE
					{
                    ?>sub_act=1&amp;memberid=<?php echo $row['id']; ?>"><img src="./images/activate.gif" alt="Activate user" width="16" height="16" border="0"><?php
					}
?>
</a>&nbsp;<a href="./quote.php?action=deleteuser&memberid=<?php echo $row['id'] ?>&username=<?php echo $row['username']; ?>"><img src="./images/delete.png" alt="Delete user" width="16" height="16" border="0"></a>
<input type="hidden" name="memberid" value="<?php echo $row['id']; ?>">
          <input type="submit" name="sub" value="Save" />
      </td>
      <td bgcolor="<?php echo UseColor() ?>" ><span class="boxborder text">
	  <?php 
	    if  ($row['added']<>0)
			  {
			  	  echo date($dformat, $row['added']);
			  }
	   ?>
	  </span></td>
    </tr>
  </form>
  <?php
				$j++;
				}
?>
</table>
<p> <?php

$_SESSION['end']= $currentPage*$maxRows_Recordset1  + $totalRows_contenido;
if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = query_db($query);
  $totalRows_Recordset1 = query_db_num($all_Recordset1);
  $_SESSION['total']=$totalRows_Recordset1;
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
 $totalRows_contenido=$totalPages_Recordset1; 

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);





 ?>
<?php echo $_SESSION['total'].' users'; ?></p>
<p><span class="testo Estilo2">
<a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">&laquo;&laquo;</a> 

<a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">&laquo;</a>

 <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">&raquo;</a> <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">&raquo;&raquo;</a>
</span>
  <?php
   $qas= ceil(  ($_SESSION['total']/$maxRows_Recordset1) );
   echo 'Result page: ';   
   $time = round($endtime*100)/100;   
   for ($zz=0;  $zz < $qas; $zz +=1)
   { //for
   ?>
  <span class="testo">
  <a href="<?php printf("%s?pageNum_Recordset1=%d%s",$currentPage,$zz,$queryString_Recordset1); ?>"><?php echo $zz; ?></a>
  </span>
  <?php
   } //of the for
   ?>
</p>
<table border="0" cellspacing="2" cellpadding="0">
  <tr><form name="form1" method="post" action="">
    <td width="338" height="194">
      </form>
 <td width="75"><table width="500" border="1" cellpadding="0" cellspacing="2" bordercolor="#F3F3F3">
   <tr>
     <td><form name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=get_users">
         <span class="text">List users: </span>         
         <select name="listusers" id="listusers">
           <option value="2">Banned</option>
           <option value="1">Active</option>
           <option value="0">Inactive</option>
         </select>
         <select name="arch" id="arch">
           <option value="zip">zip</option>
		   <option value="text">text</option>           
         </select>
         <span class="comment3">:Separator
         <input name="separator" type="text" id="separator" value="," size="4" maxlength="4">
         </span>
         <input type="submit" name="Submit" value="Get file">
         <input name="users" type="hidden" id="users" value="active">
     </form></td>
     </tr>
 </table>
   </td>
  </tr>
</table>
<p><span class="text"></span></p>
<div align="right"></div>