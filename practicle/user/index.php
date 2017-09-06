<?php 
    
	define('PAGE_TITLE',"User Registration");
	include('common/header.php');

 ?>

    <div class="content">
    <nav id="primary_nav_wrap">
    <ul>
    <li class="current-menu-item">
    <a href="login.php">Login</a></li>   
   
    </ul>
    </nav>
	<h2 align="center"> User Registration</h2>
    <form class="reg-form" name="add_form" id="add_form" action="register_db.php" method="post" enctype="multipart/form-data">
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
         <div class="margin" >
         <div id="msg"></div>
         <div class="lable">First Name:</div>
		<div class="inp-con"><input type="text" name="first_name" id="first_name" /> </div>
		<div class="clear sep"></div>
         
		<div class="lable">Last Name:</div>
		<div class="inp-con"><input type="text" name="last_name" id="last_name" /> </div>
		<div class="clear sep"></div>

		<div class="lable">User Name:</div>
		<div class="inp-con"><input type="text" name="user_name" id="user_name" /> </div>
		<div class="clear sep"></div>
		
	        <div class="lable">Email:</div>
		<div class="inp-con"><input type="email" name="email" id="email" /> </div>
		<div class="clear sep"></div>
                
                <div class="lable">Password:</div>
		<div class="inp-con"><input type="password" name="password" id="password" /> </div>
		<div class="clear sep"></div>
                 
                <div class="lable">Contact No:</div>
		<div class="inp-con"><input type="text" name="contact" id="contact" onkeypress="return numberOnly(event);"/> </div>
		<div class="clear sep"></div>
                
                <div class="lable"> Address:</div>
		<div class="inp-con"><textarea row="5" name="address"  id="address" ></textarea></div>
		<div class="clear sep"></div>
                 
                <div class="lable">Gender:</div>
		<div class="inp-con"><input type="radio" name="gender" id="gender" value="male" /> Male
                                      <input type="radio" name="gender" id="gender" value="female" /> Female
                </div>
		<div class="clear sep"></div>
		<div class="lable">Language:</div>
		<div class="inp-con"><input type="checkbox" name="language[]" id="language" value="php" />PHP
		<input type="checkbox" name="language[]" id="language" value=".net" />.Net
		<input type="checkbox" name="language[]" id="language" value="java" />Java
         <input type="checkbox" name="language[]" id="language" value="android" />Android</div>
		 <div class="clear sep"></div> 
		 
		<div class="lable">Country:</div>
		<div class="inp-con"><select id="country" name="country"><option value=" select country">Select Country</option>
		<option value="india">India</option>
		<option value="australia">Australia</option>
		<option value="newzeland">Newzeland</option></select></div>
		<div class="clear sep"> </div>
	               
         
		<div class="lable">Photo Upload:</div>
		<div class="img"><input type="file" name="album_image" id="album_image" /> </div>
		<div class="clear sep"></div>
                 
		<div class="lable">&nbsp;</div>
		<div class="inp-con"><input type="submit"   name="register" value="Register"  /></div>
		<div class="clear sep"></div>
	
     </div>
     </form>
 
 
      
<?php include('common/footer.php'); ?>