<?php  
	include("includes/config.php");
	define('PAGE_TITLE',"User Account");
	include('common/header.php');
        
	
        if(!isset($_SESSION['user_id']) or $_SESSION['user_id'] == "")
		{
			header("Location:login.php");
		}
        $query = "Select first_name,last_name,user_name,email,contact,address,gender,language,country,path from users Where id='".$_SESSION['user_id']."'";
		$result = mysql_query($query);
		
		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_array($result,MYSQL_ASSOC);
				
				$_SESSION['username']=$row['user_name'];
			}
			else
			{
				session_destroy();
				header("Location:login.php");
			}
		}
		else
		{
			echo mysql_error();
	        }
 ?>

<div class="content">
<nav id="primary_nav_wrap">
<ul id="nav" style="width:100%;">
<li> <a href="index.php" class="current-menu-item">Home</a></li>   
    <li><a href="changepassword.php"  >Change Password</a></li>
	<li><a href="album.php" >Album</a></li>
	<li><a href="gallery.php">Gallery</a></li>
	<li><a href="photo_album.php"> Photo Album</a></li>
	<li><a href="album_management.php" >  Album Management</a>
    <li><a href="user_conversation.php" >Conversation</a></li>
    <li><a href="login.php" >Log Out</a></li>
	

</ul>
</nav>
              
  <br/><br/><h2 align="center"> Update User Profile</h2>
    <form class="reg-form" name="add_form" id="add_form" action="" method="post" enctype="multipart/form-data">
		<div id="msg"></div>
		<?php

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
        <div class="margin">
        <div class="lable">First Name:</div>
		<div class="inp-con"><input type="text" name="first_name" id="first_name" 
                                      value="<?php echo $row['first_name']; ?>"/> </div>
		<div class="clear sep"></div>
         
		<div class="lable">Last Name:</div>
		<div class="inp-con"><input type="text" name="last_name" id="last_name" 
                                            value="<?php echo $row['last_name']; ?>"/> </div>
		<div class="clear sep"></div>

		<div class="lable">User Name:</div>
		<div class="inp-con"><input type="text" name="user_name" id="user_name" 
                                       value="<?php echo $row['user_name']; ?>"/> </div>
		<div class="clear sep"></div>
		
	    <div class="lable">Email:</div>
		<div class="inp-con"><input type="text" name="email" id="email" 
                                      value="<?php echo $row['email']; ?>"/> </div>
		<div class="clear sep"></div>
                 
        <div class="lable">Contact No:</div>
		<div class="inp-con"><input type="text" name="contact" id="contact" 
                                            value="<?php echo $row['contact']; ?>"onkeypress="return numberOnly(event);"/> </div>
		<div class="clear sep"></div>
                
        <div class="lable"> Address:</div>
		<div class="inp-con" style="width='220px;'"><textarea row="5" name="address"  id="address" 
                                               ><?php echo $row['address']; ?></textarea></div>
		<div class="clear sep"></div>
                 
        <div class="lable">Gender:</div>
		<div class="inp-con"><input type="radio" name="gender" id="0" value=" male" <?php if($row['gender']=="male"){ echo "checked='checked'";} ?>/> Male
                <input type="radio" name="gender" id="1" value="female" <?php if($row['gender']=="female"){ echo "checked='checked'";} ?>/> Female
                </div>
		<div class="clear sep"></div>
		<?php $language = explode(",",$row['language']); ?>
		<div class="lable">Language:</div>
         <div class="inp-con">
		<input type="checkbox" name="language[]" id="language" value="php"<?php if(in_array("php",$language)){ echo "checked='checked'";}?>/>Php
        <input type="checkbox" name="language[]" id="language" value=".net"<?php if(in_array(".net",$language)){ echo "checked='checked'";}?>/>.Net
        <input type="checkbox" name="language[]" id="language" value="java"<?php if(in_array("java",$language)){ echo "checked='checked'";}?>/>Java
        <input type="checkbox" name="language[]" id="language" value="android"<?php if(in_array("android",$language)){ echo "checked='checked'";}?>/>Android
        </div>
        <div class="clear sep"></div>
          
		<div class="lable">Country:</div>
		<div class="inp-con"><select id="country" name="country"><option value="select country">Select Country</option>
		<option value="india"<?php if($row['country']== "india"){ echo "selected='selected'";}?>/>India</option>
		<option value="australia"<?php if($row['country']== "australia"){ echo "selected='selected'";}?>/>Australia</option>
		<option value="newzeland" <?php if($row['country']== "newzeland"){ echo "selected='selected'";}?>/>Newzeland</option></select></div>
		<div class="clear sep"> </div>

         <?php 
         if(isset($row['path']) && $row['path']!="")
         {
          ?>
                
        <div class="lable">Current Image:</div>
        <div class="img"><img src="photoes/<?php echo $row['path']; ?>"  width="100"/></div>
        <input type="hidden" name="old_img" id="old_img" value="<?php echo $row['path']; unset($row['path']);?>" />
        <div class="clear sep"></div>
         <?php } ?>
        <div class="lable">Photo Upload</div>
		<div class="img"><input type="file" name="fileup" id="fileup" /> </div>
		<div class="clear sep"></div>
                 
		<div class="lable">&nbsp;</div>
		<div class="inp-con"><input type="button" name="register" value="Update"  onclick="processForm1()"/></div>
		<div class="clear sep"></div>
	
     </div>
     </form>
          </div>
      
<?php include('common/footer.php'); ?>