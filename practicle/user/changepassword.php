<?php 


ob_start();
session_start();
define("PAGE_TITLE","Change password");
include"common/header.php";
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
	
if(!$_SESSION['user_id'])
{
?>
<script>window.location="login.php";</script>
<?php
}
?>

<div class="content">
<nav id="primary_nav_wrap">
<ul id="nav">
<li> <a href="index.php">Home</a></li>   
    <li><a href="changepassword.php"  >Change Password</a></li>
	<li><a href="album.php" >Album</a></li>
	<li><a href="gallery.php">Gallery</a></li>
	<li><a href="photo_album.php"> Photo Album</a></li>
	<li><a href="album_management.php"class="current-menu-item" >  Album Management</a>
    <li><a href="user_conversation.php" >Conversation</a></li>
    <li><a href="login.php" >Log Out</a></li>
	

</ul>
</nav>
       
    
<br/><br/><h2 align="center">Change-Password</h2>    
<div class="margin">
<form name="add_form" class="form" id="add_form" action="changepassword_db.php" method="post">


<div class="lable">Old-Password:</div>
<div class="inp-con"><input type="password" id="old_password" name="old_password" value=""/></div>

<div class="clear sep"></div>


<div class="lable">New-Password:</div>
<div class="inp-con"><input type="password" id="new_password" name="new_password" value=""/></div>
<div class="clear sep"></div>

<div class="lable">Re-enter New Password:</div>
<div class="inp-con"><input type="password" id="confirm_password" name="confirm_password" value=""/></div>

<div class="clear sep"></div>
<div class="inp-con" colspan="2">
<input type="submit" value="Update-Password" name="btn_update"  onClick="return checkNull();">
</div>
<div class="clear sep"></div>
</form>
    </div>
</div>
<div class="clear"></div>
<?php
include"common/footer.php";
?>
