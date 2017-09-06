<?php include"includes/config.php";


	
//update password for User
$a=trim($_POST['change_password']);
$b=trim($_POST['new_password']);
$c=trim($_POST['confirm_password']);
$np=md5($a);
			
	  $errors  = array();
	  if($_POST['old_password'] == "")
	  {
		  $errors[] = "Old Password is required.";
	  }
	  if($_POST['new_password'] == "")
	  {
		  $errors[] = "New Password is required.";
	  }
	  if($_POST['confirm_password'] == "")
	  {
		  $errors[] = "Confirm Password is required.";
	  }
	  
	  if($_POST['new_password'] != "" && $_POST['confirm_password'] != "")
	  {
	  		if($_POST['new_password'] != $_POST['confirm_password'])
			{
		  		$errors[] = "New password and Confirm password does not match..";
			}	
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
		  header("Location:changepassword.php");
	  }
	  else
				
	  {
		 
			$query="select * from users where id='".$_SESSION['user_id']."'";
			$result=mysql_query($query);		
			$fet_sel=mysql_fetch_array($result,MYSQL_ASSOC);
			
			
				if(md5($_POST['old_password']) == $fet_sel['password'])
				{
					$np=md5($b);
					$update="update users set password='".$np."' where id='".$_SESSION['user_id']."'"; 
					$exe=mysql_query($update);
					
					?>
					<script type="text/javascript">
                      alert("Your Password is change..");
				    </script>
				    <?php

					header('location:changepassword.php');
					exit;
					
				}
				else
				{
					$_SESSION['']="<font color='#FF0000'>Old Password is invalid</font>";
					header('location:changepassword.php');
					exit;
				}
		}
			

?>
