<?php 
if ($authz<>'TRUE') exit;
?>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
-->
</style>


<p><a href="<?php  echo $_SERVER['PHP_SELF'] ?>?action=edit_pop3">Edit POP3 </a> <img src="./images/email_settings.gif" width="32" height="32"></p>
<div class="comment2"></div>
<table width="<?php echo $maintablewidth ?>" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC" class="boxborder">
  <tr>
    <td height="27" colspan="4" bgcolor="#AACCEE" ><strong>  <?php echo $messages_categoty?> Staff/Admin</strong></td>
  </tr>
  <tr bgcolor="#EEEEEE">
    <td ><strong>Username </strong></td>
    <td ><strong>Last action </strong></td>
    <td >
	<?php
	$querystaff = '	SELECT *	FROM tickets_categories ORDER BY tickets_categories_id';
	$resultstaff = query_db($querystaff);
	$depa = query_db_assoc($resultstaff);
    ?>
      <table   border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
        <tr>
          <?php  	do { ?>
          <td  class="minititle" width="100" >&nbsp;<?php echo $depa['tickets_categories_name']; ?>
		  </td>
          <?php } WHILE ($depa = query_db_array($resultstaff) ); ?>
        </tr>
      </table>
    </td>
    <td width="55" class="boxborder text">&nbsp;</td>    
  </tr>
  <?php
	// LOOP THROUGH ALL USERS IN THE DATABASE WHO ARE MOD in others words, staff members

			$query = "	SELECT  id, name, username,
						password, email, admin,
						status,lastlogin
					FROM users WHERE (admin='Admin')  or  (admin='Mod')	ORDER BY name";
			$result = query_db($query);
			$j = '1';

			WHILE ($row = query_db_array($result))
				{
				IF ($row['status'] == '1')
					{
					$status = 'Active';
					}
				ELSE
					{
					$status = 'Suspended';
					}
?>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=users_dep_edit" Method="post">
    <tr bgcolor="<?php echo UseColor() ?>">
      <td class="boxborder text"><?php echo $j; ?>
	  <?php echo '&nbsp;<strong>'.$row['username'].'</strong>';
	   $the_user=$row['id']; ?>
      <input name="username" type="hidden" id="username" value="<?php echo $row['username']; $the_user=$row['id']; ?>">
	  </td>
      <td class="boxborder text"><?php 
	  $ggg=$row['lastlogin'];
	  $hhh=mktime();	  
	  if ($hhh-$ggg > 86400) echo date($dformat, $ggg);
	  if ($hhh-$ggg < 86400) 
	  if ($hhh-$ggg > 3600)
	  { 
	  echo ceil(    ( ($hhh-$ggg)/3600) ).'hours ago';
	  }
	  
  	  if ($hhh-$ggg < 3600) echo ceil(    ( ($hhh-$ggg)/60) ).'min ago';;
	  ?></td>
      <td class="boxborder text">
	  <?php //inicio de listas todos los departaments
  	$querydepas = "	SELECT * FROM tickets_categories ORDER BY tickets_categories_id";
	$resultsdepas = query_db($querydepas);
	$total_departaments= query_db_num($resultsdepas);
	$depa6 = query_db_array($resultsdepas);
	$zif=0;
?>
	  <table    border="1" cellpadding="0" cellspacing="0" bordercolor="#E8E8E8">
          <tr>
		  <?php
		  do {
          $deparw=$depa6[0];
          $querystaff = "	SELECT *	FROM users_staff WHERE
          users_staff.user='$the_user' and users_staff.departament='$deparw' ";
		  $result22 = query_db($querystaff);
		  $depa = query_db_array($result22);
		  $is_set = query_db_num($result22);
		   ?>
            <?php
			 	
			  	do {			
			?>
            <td  width="100" >
			<input name="<?php 
			if (   $zif< $total_departaments )
			{
			$zif +=1;
			}
			else 
			$zif=1;
			echo $zif; 
			?>" type="checkbox" id="<?php echo $zif; ?>" value="<?php  $value=$deparw; echo $value; ?>"<?php if ($is_set>0) { echo 'checked';} ?>></td>
            <?php
			 } WHILE ($depa = query_db_array($result22)); ?>        
		<?php //fin de chequear todos los departamentos para pasar a los usuarios
		}
		WHILE ($depa6 = query_db_array($resultsdepas));?>
		  </tr>		  
        </table>
		
      <input name="number_deps" type="hidden" id="number_deps" value="<?php echo $total_departaments; ?>"></td>
      <td width="55" class="boxborder">
        <input type="hidden" name="memberid" value="<?php echo $row['id'] ?>">
        <input type="submit" name="sub" value="Update" />
      </td>
    </tr>
  </form>
  <?php
				$j++;
				}
?>
</table>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=ad_dep" method="post">
  <table width="392" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="boxborder">
    <tr>
      <td ><?php echo $messages_categoryes?><br />
				        <br />
                        <table width="235" cellpadding="0" cellspacing="0" align="center">
                          <tr>
                            <td colspan="2" class="text">&nbsp;</td>
                          </tr>
                          <tr>
                            <td ><?php echo $namey?>: </td>
                            <td><input name="name" type="text" id="name"></td>
                          </tr>
                          <tr>
                            <td >Email: </td>
                            <td>                            <input name="mail" type="text" id="mail">
                            <input type="submit" value="Submit" name="userform" /></td>
                          </tr>
                          <?php

			IF (!isset($error))
				{
				$query = "	INSERT INTO tickets_categories
						SET
						tickets_categories_name = '".$_POST['name']."'";
				        //$result = query_db($query);
                        ?>
                          <tr>
                            <td class="text" colspan="2">&nbsp;</td>
                          </tr>
                          <?php
				}
?>
                        </table>
      </td>
    </tr>
  </table>
</form>
<p><span class="Estilo1">Be careful about deleting Categories. Deleting them will make inaccessible to messages of that departament. If that is the case click <a href="<?php  echo $_SERVER['PHP_SELF'] ?>?action=maintenance">here </a></span></p>
