<?php  include("includes/config.php");
	
	$errors = array();
	if(isset($_POST['first_name']) && $_POST['first_name'] == "")
	{            
		$errors[] = "First name is required.";
	}

	if(isset($_POST['last_name']) && $_POST['last_name'] == "")
	{
		$errors[] = "Last name is required.";
	} 

	if(isset($_POST['user_name']) && $_POST['user_name'] == "")
	{
		$errors[] = "User name is required.";
	}
    if(isset($_POST['user_name']) && $_POST['user_name'] != "")
	{
		$userQuery = "Select id from users Where user_name = '".$_POST['user_name']."'";
		$rs = mysql_query($userQuery);
	if(mysql_num_rows($rs) > 0)
	{
		$errors[] = "User name already exist.";
	}
	}
	if(isset($_POST['email']) && $_POST['email'] == "")
	{
		$errors[] = "Email is required.";
	}
        if(isset($_POST['email']) && $_POST['email'] != "")
	{
		$userQuery = "Select id from users Where email = '".$_POST['email']."'";
		$rs = mysql_query($userQuery);
		if(mysql_num_rows($rs) > 0)
		{
			$errors[] = "User name already exist.";
		}
	}
	
    if(isset($_POST['password']) && $_POST['password'] == "")
	{
		$errors[] = "Password is required.";
	}  
     if(isset($_POST['contact']) && $_POST['contact'] == "")
	{
		$errors[] = "Contact no. is required.";
	}  
     if(isset($_POST['address']) && $_POST['address'] == "")
     {
	    $errors[] = "Address is required.";
	 }
     if($_POST['gender'] == "")
	{
		$errors[] = "Gender is required.";
	}
	if($_POST['language'] == "")
	{
		$errors[] = "Language is required.";
	}
	if($_POST['country'] == "")
	{
		$errors[] = "country is required.";
	}

	if(!empty($errors))
	{
		$message = "";
		$i = 1;

		foreach($errors as $err)
		{
			$message .= $i.") ".$err."<br>";
			$i++;
		}
		//$_SESSION['errors'] = $message;                         
		//header("Location:index.php");
		echo  $message;
	}
	
    else{     
     	//print_r($_POST);
		//print_r($_FILES);
                    //exit;
            $image = "";
                if(isset($_FILES['album_image']['name']) && $_FILES['album_image']['name'] != "")
                {
                    $image = rand(11111,99999)."_".$_FILES['album_image']['name'];
                    
                    move_uploaded_file($_FILES['album_image']['tmp_name'], "photoes/".$image);
                }    
        
		$sql="INSERT INTO users(first_name,last_name,user_name,email,password,contact,address,gender,language,country,path) 
									VALUES ('".$_POST['first_name']."',
									         '".$_POST['last_name']."',
											 '".$_POST['user_name']."',
											 '".$_POST['email']."',
											 '".md5($_POST['password'])."',
											 '".$_POST['contact']."',
											 '".$_POST['address']."',
											 '".$_POST['gender']."',
											 '".implode(",",$_POST['language'])."',
											 '".$_POST['country']."',
											 '".$image."'
											 )";
	 $result = mysql_query($sql);

		if($result)
		{
			$_SESSION['success'] = "User registration successfully.";
			header("Location:index.php");
			
			exit;
		}
		else
		{
			//$_SESSION['errors'] = mysql_error();
			//header("Location:index.php");
			echo mysql_error();
			exit;
		
		}
	}
?>