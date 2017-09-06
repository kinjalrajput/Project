<?php 

define('PAGE_TITLE',"Country");
include ("common/header.php");
include_once("includes/config.php");
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


    <form id="form" name="form" action="country.php" enctype="multipart/form-data" method="post">
    	<h2 align="center"> Country</h2>
		<div class="margin">
		

		<div class="lable">Country :</div>
		<div class="inp-con"><input type="text" name="country" id="country" placeholder="<--add country-->"></div>
		<div class="clear sep"></div>
        
        <div class="lable">&nbsp;</div>
		<div class="inp-con"><input type="submit" name="add" id="button" value="Add"></div>
        <div class="clear sep"></div>
        <div>
        </form>
		
		
		<?php
		
		if(isset($_POST['add']))
		{
		
			
			$query="INSERT INTO `csc`(`id`, `country_name`, `state_name`, `city_name`) VALUES (NULL,'".$_POST['country']."',,)";
			$result=mysql_query($query) or die(mysql_error());
			if($result)
			{
				echo"save successfully";
			}
			else
			{
				echo"save not successfully";
				
			}
			
			
		}
		?>