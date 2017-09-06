<?php   ob_start();
		session_start();
		define("PAGE_TITLE" ," User Login");
		include("common/header.php");  
?>
  

<div class="content">
<nav id="primary_nav_wrap">
<ul>
<li class="current-menu-item">
    <a href="index.php">Create Account</a></li>   
    <li><a href="forgotpassword.php" >Forgot Password</a></li>
	</ul>   
    </nav>
       

<br/><br/>	<h2 align="center">Login</h2>
    
	
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
    <form name="add_form" class="reg-form" id="add_form" action="login_db.php"  method="post" >
  
    <div class="lable">User Name:</div>
    <div class="inp-con"><input  type="text" name="user_name" id="user_name"  /></div>
    <div class="clear sep"></div>
    
    <div class="lable">Password:</div>
    <div class="inp-con"><input  type="password" name="password" id="password" /></div>
    <div class="clear sep"></div>
       
    <div class="lable">&nbsp; &nbsp;&nbsp;</div>
    <div class="inp-con"><input  type="submit"  name="register" value="Login" onclick="return checklogin();" /></div>
    <div class="clear sep"></div>
    
    </form></div>
    </div>
<?php include("common/footer.php"); ?>