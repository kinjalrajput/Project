<?php ob_start();
session_start();
define('PAGE_TITLE',"Album");
include "common/header.php";
        if(!isset($_SESSION['user_id']) or $_SESSION['user_id'] == "")
		{	
			header("Location:login.php");
		}
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
       
    
<form name="form" class="reg-form" action="<?php if(isset($_SESSION['id'])){?>edit_album_db.php<?php }else{ ?> album_db.php <?php } ?>"  method="post" enctype="multipart/form-data">
<br/><br/><h2 align="center">Add Album</h2>
 <div class="margin">

<div class="lable">Album Name:</div>
<div class="inp-con"><input type="text" name="album_name" id="album_name"></div>
<div class="clear sep"></div>

<div class="lable">Album Image:</div>
<div class="inp-con"><input type="file" name="album_image" id="album_image" ></div>
<div class="clear sep"></div>
	 
<div class="lable"></div>
<div class="inp=con">
<input type="submit" value="Submit" name="btn_save"  id="btn_save" onClick="return checkNull();" ></div>
<div class="clear sep"></div>



</div>
</form>
</div>

<?php
include"common/footer.php";
?>
