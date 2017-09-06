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
			
				$query="select id,user_name,status from users where user_name='".$_POST['user_name']."' 
				AND password='".md5($_POST['password'])."'";
				$result=mysql_query($query);
		         
				 if(mysql_num_rows($result) > 0)
		         {
			        $row = mysql_fetch_array($result);
			        if($row['status'] == 0)
			       {
				        $_SESSION['user_id'] =$row['id'];
				        $_SESSION['user_name'] = $row['user_name'];
				        header("Location:user_account.php");
		
			       }
			     else
			     {		
				    $_SESSION['errors'] = "Your account deactivated.";
		  		    header("Location:login.php");
			     }
		        }
		       else
		         {
			        $_SESSION['errors'] = "Invalid username or password.";
		  	         header("Location:login.php");
		          }			
			

?>