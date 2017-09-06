<?php include("includes/config.php");
	
	
	$errors = array();
	if(isset($_POST['email']) && $_POST['email'] == "")
	{
		$errors[] = "Email is requid.";
	}
	
	if($_POST['email'] != "")
	{
		  $query="select email from admin where email='".$_POST['email']."'";
		  $q=mysql_query($query);
		  $result = mysql_fetch_array($q);
                  $email = $result['email'];
                 while($row = mysql_fetch_array($result))
                 {
                     $email = $row['email'];
                 }
              if($email != $_POST['email'])
              {
                  $errors[]="wrong email";
              }
		 
		 
		  else
		{ 
		    $random= rand(1111,9999);
			 $md=md5($random);
			$query = "select password from admin where email='".$_POST['email']."'";
			$result = mysql_query($query);
			if($result)
			{
				while($row = mysql_fetch_array($result))
				{
					$password = $row['password'];
				}
			}
			//$pass=$password;
			$_SESSION['success']="Your password  ".$random." Update successfully..";
			header("Location:forgotpassword.php");
		}
	
	}
        
		
	if(!empty($errors))
	{
		$message="";
		$i = 1;
		foreach($errors as $err)
			{
				$message.="-".$err."<br>";
				$i++;
			}
			$_SESSION['errors']=$message;
			header("Location:forgotpassword.php");
	}
?>