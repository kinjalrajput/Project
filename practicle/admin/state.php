<?php ob_start();
session_start();
define('PAGE_TITLE',"State");
include "common/header.php";
        if(isset($_SESSION['errors']) && $_SESSION['errors'] != "")
		{
			echo $_SESSION['errors'];
			unset($_SESSION['errors']);
		}
		if(isset($_SESSION['success']) && $_SESSION['success'] != "")
		{
			echo $_SESSION['success'];
			unset($_SESSION['success']);
		}

?>

<div class="content" align="center">
<div class="menu">
    <div class="menu_a"><a href="admin_account.php" class="menu_a" >Home/</a></div>
	<div class="menu_a"><a href="users.php" class="menu_a" >User Management/</a></div>   
	<div class="menu_a"><a href="message_list.php" class="menu_a"> Conversation/</a></div>
	<div class="menu_a"><a href="message_list.php" class="menu_a"> Message/</a></div>
    <div class="menu_a"><a href="country.php" class="menu_a"> Country/</a></div>
    <div class="menu_a"><a href="state.php" class="menu_a"> State/</a></div>
    <div class="menu_a"><a href="city.php" class="menu_a"> City/</a></div>
    <div class="menu_a"><a href="admin_login.php" class="menu_a" >Log Out</a></div>   
    
    </div>

    <form id="form" name="form" action="state.php" enctype="multipart/form-data" method="post">
    	<h2 align="center"> State </h2>
		<div class="margin">
			<div class="lable">Country :</div>
		 <div class="inp-con"><select name="country">
		<option>Select</option>
		

        <?php
		 $sql = "select id,country_name from csc";
		 $result = mysql_query($sql);
					if($result)
					{
						while($rows = mysql_fetch_array($result,MYSQL_ASSOC))
						{
						
		?>
			<option value="<?php echo $rows['id']; ?>"><?php echo $rows['country_name']; ?></option>
			 
			
			<?php			
						}
					}
			 ?>
		 
		</select>
		</div>
<div class="clear sep"></div>
		<div class="lable">State :</div>
		<div class="inp-con"><input type="text" name="state" id="state" placeholder="<--add state-->"></div>
		<div class="clear sep"></div>
        
        <div class="lable">&nbsp;</div>
		<div class="inp-con"><input type="submit" name="button" id="button" value="Add"></div>
        <div class="clear sep"></div>

    </div>
    </form>