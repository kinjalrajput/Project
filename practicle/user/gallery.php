<?php include"includes/config.php";
define('PAGE_TITLE',"Gallery");
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
       
    
<form name="form" class="reg-form" action="gallery_db.php" method="post" enctype="multipart/form-data">
<br/><br/><h2 align="center">Gallery</h2>
 <div class="margin">

 <div class="lable"> Album Name</div>
<div class="inp-con"><select name="album_name" id="album_name"><option>--Select Album Name--</option>
<?php
      $sql = "Select * from album where user_id ='".$_SESSION['user_id']."' ";
      $result = mysql_query($sql);
	   if($result)
	   {  
	       while($row=mysql_fetch_array($result))
		   {

?>
<option value="<?php echo $row['id'];?>" ><?php echo $row['album_name'];?></option>
<?php
}
}

?>
</select></div>
<div class="clear sep"></div>

<div class="lable"> Image:</div>
<div class="inp-con"><input type="file" name="gallery_image[]" id="gallery_image" multiple="multiple" ></div>
<div class="clear sep"></div>
	 
<div class="lable">&nbsp;</div>
<div class="inp-con"><input type="submit" value="Submit" name="btn_save"  id="btn_save" onClick="return checkNull();"></div>
<div class="clear sep"></div>
</div>
</form>

</div>

<?php
include"common/footer.php";
?>
