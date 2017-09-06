<?php
                ob_start();
		session_start();
		define("PAGE_TITLE" ,"Forgot Password");
		include("common/header.php");  
                 
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

                 
	<div class="content" >
<nav id="primary_nav_wrap">
<ul>
<li class="current-menu-item">
    <a href="login.php">Logout</a></li>   
    </ul>   
    </nav>
       
                        <h2 align="center">Forgot Password</h2>
                    <div class="margin">  	
                    
				<form method="post" class="form" name="forgot_password" action="forgotpassword_db.php">
				
				  <div class="lable">E-mail :</div>
					<div class="inp-con">
					<input type="email" autocomplete="off" name="email" id="email" />   
				  </div>
				  <div class="clear sep"></div>
                                  <div class="lable">&nbsp;</div>
                                  <div class="inp-con">
				  	<input type="submit" value="Submit" name="btn_submit" id="btn_submit" onClick="return validate1();">
					</div>
				<div class="clear"> </div>
			    </form>
			   </div>	
			   
                </div>
<?php
include"common/footer.php";
?>

