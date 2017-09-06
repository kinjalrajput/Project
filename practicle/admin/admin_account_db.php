<?php include("includes/config.php");

	  $errors  = array();
	  if($_POST['user_name'] == "")
	  {
		  $errors[] = "User name is required.";
	  }
	  if($_POST['password'] == "")
	  {
		  $errors[] = "Password is required.";
	  }
	  
	  if($_POST['email'] == "")
	  {
		  $errors[] = "Email is required.";
	  }
	  if($_POST['contact'] == "")
	  {
		  $errors[] = "Contact number is required.";
	  }
      
	  if(!empty($errors))
	  {
		  $message = "";
		  $i=1;
		  foreach($errors as $err)
		  {
			  $message .= $i.") ".$err."<br>";
			  $i++;
		  }
		  
		  $_SESSION['errors'] = $message;
		  header("Location:admin_account.php");
	  }
	  else
	  {
	        $query_sub="select id,user_name from admin where user_name='".$_post['user_name']."'";
			$select_sub=mysql_query($query_sub);
			$num_sub=mysql_num_rows($select_sub);
			if($num_sub==0)
			{  
              
			  $query="update admin set user_name='".$_POST['user_name']."',password='".md5($_POST['password'])."',email='".$_POST['email']."',
			  contact='".$_POST['contact']."'where id='".$_SESSION['admin_id']."'";
			
			$result=mysql_query($query);
			
			if($result)
			{
				$_SESSION['success']="Data updated successfully";
				header("Location:admin_account.php");
			}
			else
			{
				$_SESSION['errors']=mysql_error();
				header("Location:admin_account.php");
			}
	  }
          }
?>