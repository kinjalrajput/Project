<?php   
        include("includes/config.php");
		$errors=array();
		
		if(isset($_POST['user_name']) && $_POST['user_name']=="")
		{
			$errors[]="Please enter user name";
		}
		if(isset($_POST['password']) && $_POST['password']=="")
		{
			$errors[]="Please enter password";
		}
			
		
		else
		{	
			
		$sql = "Select * from admin Where user_name='".$_POST['user_name']."' AND password='".md5($_POST['password'])."' ";
		$result = mysql_query($sql);
		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				//echo "hello";
				$admin = mysql_fetch_array($result,MYSQL_ASSOC);
				 $_SESSION['admin_id'] = $admin['id'];
				 $_SESSION['user_name'] = $admin['user_name'];
				
			    header("Location:admin_account.php");

			}
			else
			{
				$_SESSION['errors'] = mysql_error();
				header("Location:admin_account.php");	
			}
		}
		else
		{
			$_SESSION['errors'] = mysql_error();
			header("Location:admin_account.php");
		}	
               
     }
?>