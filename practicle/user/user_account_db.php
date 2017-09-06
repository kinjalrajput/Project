<?php include("includes/config.php");
 
    echo"hellooooo";
	  $errors  = array();
	  
	  if( $_POST['first_name'] == "")
	  {
		  $errors[] = "First name is required.";
	  }
	  if($_POST['last_name'] == "")
	  {
		  $errors[] = "Last name is required.";
	  }
	  if($_POST['email'] == "")
	  {
		  $errors[] = "Email is required.";
	  }
	  if($_POST['user_name'] == "")
	  {
		  $errors[] = "User name is required.";
	  }
	  if($_POST['contact'] == "")
	  {
		  $errors[] = "Contact number is required.";
	  }
          if( $_POST['address'] == "")
          {
	          $errors[] = "Address is required.";
	   }
        if( $_POST['gender'] == "")
	   {
		$errors[] = "Gender is required.";
	   }
	   if( $_POST['language'] == "")
	   {
		$errors[] = "Language is required.";
	   }
       if( $_POST['country'] == "")
	   {
		$errors[] = "Country is required.";
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
		  
		  //$_SESSION['errors'] = $message;
		  //header("Location:user_account.php");
		  echo $message;
	  }
	  else
	  {
	      $y=$_FILES['fileup']['name'];
		    $tmp=$_FILES['fileup']['tmp_name'];
			move_uploaded_file($tmp,"photoes/".$y);
			
			if($y != "")
			{
				$res=mysql_query("SELECT path FROM users WHERE id='".$_SESSION['user_id']."'");
				$row=mysql_fetch_array($res,MYSQL_ASSOC);
		
				unlink("photoes/".$row['path']);
				
				$tmp=$_FILES['fileup']['tmp_name'];
				move_uploaded_file($tmp,"photoes/".$y);
				
			}
			else
			{
				$y = $_POST['old_img'];
			}
			
			$query_sub="select username from users where username='".$_post['username']."'";
			$select_sub=mysql_query($query_sub);
			$num_sub=mysql_num_rows($select_sub);
			if($num_sub==0)
			{  
                    $query="update users set first_name='".$_POST['first_name']."',last_name='".$_POST['last_name']."',
		  			user_name='".$_POST['user_name']."',email='".$_POST['email']."',contact='".$_POST['contact']."',
					address='".$_POST['address']."',gender='".$_POST['gender']."',language='".implode(",",$_POST['language'])."',country='".$_POST['country']."',path='".$y."'
					where id='".$_SESSION['user_id']."'";
			
			$result=mysql_query($query);
			
			if($result)
			{
				//$_SESSION['success']="Data updated successfully";
				//header("Location:user_account.php");
				echo"Data updated successfully...";
				exit;
			}
			else
			{
				//$_SESSION['errors']=mysql_error();
				//header("Location:user_account.php");
				echo mysql_error();
				exit;
			}
	  }
          }
?>