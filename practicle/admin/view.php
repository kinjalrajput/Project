<?php 
include "includes/config.php";
define('PAGE_TITLE',"User Profile");
include "common/header.php";
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	
	$sel="select * from users where id='$id'";
	$exe=mysql_query($sel);
	$row=mysql_fetch_array($exe);
}
	
?>

<div class="main">
<div class="content">
<div class="menu">
    <div class="menu_a"><a href="admin_account.php" class="menu_a" >Home/</a></div>
	<div class="menu_a"><a href="users.php" class="menu_a" >User Management/</a></div>
	<div class="menu_a"><a href="admin_conversation.php" class="menu_a">Conversation/</a></div>
	<div class="menu_a"><a href="message_list.php" class="menu_a"> Message/</a></div>
    <div class="menu_a"><a href="admin_login.php" class="menu_a" >Log Out</a></div>   
    
    </div>
<h2 align="center">View User Profile</h2>
<div class="margin">	 	
				 <div class="img"><img src="../user/photoes/<?php echo $row['path'];?>" height="150px" width="200px" /></div>
				 <div class="clear sep"></div>
				
				<div class="lable"><b>First Name</b></div>
				<div class="inp=con">: <?php echo $row['first_name']; ?></div>
				<div class="clear sep"></div>
				
				<div class="lable"><b>Last Name</b></div>
				<div class="inp-con">: <?php echo $row['last_name'];?></div>
				<div class="clear sep"></div>
					
				<div class="lable"><b>User Name</b></div>
				<div class="inp-con">:<?php echo $row['user_name']; ?></div>
				<div class="clear sep"></div>
				
				<div class="lable"><b>Email</b></div>
				<div class="inp-con">: <?php echo $row['email'];?></div>
				<div class="clear sep"></div>
				
				<div class="lable"><b>Contact</b></div>
				<div class="inp-con">:<?php echo $row['contact'];?></div>
				<div class="clear sep"></div>
				
				<div class="lable"><b>Address</b></div>
				<div class="inp-con">:<?php echo $row['address'];?></div>
				<div class="clear sep"></div>
				
				<div class="lable"><b>Gender</b></div>
				<div class="inp-con">:<?php echo $row['gender']; ?></div>
				<div class="clear sep"></div>
				
				<div class="lable"><b>Language</b></div>
				<div class="inp=con">:<?php echo $row['language']; ?></div>
                <div class="clear sep"></div>
				
				<div class="lable"><b>Country</b></div>
				<div class="inp=con">:<?php echo $row['country']; ?></div>
                <div class="clear sep"></div>
				
				 </div>
</div>
</div>
<?php
	include"common/footer.php";
?>








