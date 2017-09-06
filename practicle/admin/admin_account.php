<?php  
	include("includes/config.php");
	define('PAGE_TITLE',"Admin Account");
	include('common/header.php');
	    
	
        if(!isset($_SESSION['admin_id']) or $_SESSION['admin_id'] == "")
		{
				header("Location:admin_login.php");
		}
        $query = "Select user_name,password,email, contact from admin
		Where id='".$_SESSION['admin_id']."'";
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
				header("Location:admin_login.php");
			}
		}
		else
		{
			echo mysql_error();
	        }
 ?>

<div class="content">
    <div class="menu">
    <div class="menu_a"><a href="admin_account.php" class="menu_a" >Home/</a></div>
	<div class="menu_a"><a href="users.php" class="menu_a" >User Management/</a></div>
	<div class="menu_a"><a href="admin_conversation.php" class="menu_a">Conversation/</a></div>
	<div class="menu_a"><a href="message_list.php" class="menu_a"> Message/</a></div>
	<div class="menu_a"><a href="country.php" class="menu_a"> Country/</a></div>
    <div class="menu_a"><a href="state.php" class="menu_a"> State/</a></div>
    <div class="menu_a"><a href="city.php" class="menu_a"> City/</a></div>
    <div class="menu_a"><a href="admin_login.php" class="menu_a" >Log Out</a></div>   
    
    </div>
    <h2 align="center"> Update  Admin Profile</h2>
    <form class="reg-form" name="add_form" id="add_form" action="admin_account_db.php" method="post" enctype="multipart/form-data">
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
        <div class="lable">User Name:</div>
		<div class="inp-con"><input type="text" name="user_name" id="user_name" 
                                       value="<?php echo $row['user_name']; ?>"/> </div>
		<div class="clear sep"></div>
		
		<div class="lable">Password:</div>
		<div class="inp-con"><input type="password" name="password" id="password" 
                                      value="<?php echo $row['password']; ?>"/> </div>
		<div class="clear sep"></div>
        
	    <div class="lable">Email:</div>
		<div class="inp-con"><input type="text" name="email" id="email" 
                                      value="<?php echo $row['email']; ?>"/> </div>
		<div class="clear sep"></div>
                 
        <div class="lable">Contact No:</div>
		<div class="inp-con"><input type="text" name="contact" id="contact" 
                                            value="<?php echo $row['contact']; ?>"onkeypress="return numberOnly(event);"/> </div>
		<div class="clear sep"></div>
                
        <div class="lable">&nbsp;</div>
		<div class="inp-con"><input type="submit" name="update" value="Update" /></div>
		<div class="clear sep"></div>
	
     </div>
     </form>
          </div>
      
<?php include('common/footer.php'); ?>