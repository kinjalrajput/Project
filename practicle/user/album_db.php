<?php  include("includes/config.php");
	
	$errors = array();
	if(isset($_POST['album_name']) && $_POST['album_name'] == "")
	{            
		$errors[] = "Album  name is required.";
	}
	if(isset($_POST['album_name']) && $_POST['album_name'] != "")
	{
		$userQuery = "Select id from album Where album_name = '".$_POST['album_name']."'";
		$rs = mysql_query($userQuery);
	if(mysql_num_rows($rs) > 0)
	{
		$errors[] = "Album  name already exist.";
	}
	}

	 if(isset($_FILES['album_image']['name']) && $_FILES['album_image']['name'] == "")
     {
         $errors[] ="Photo is required.";
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
		$_SESSION['errors'] = $message;                         
		header("Location:album.php");
	}
	else

	{
       //print_r($_FILES);
       //exit;

                $image = "";
                if(isset($_FILES['album_image']['name']) && $_FILES['album_image']['name'] != "")
                {
                    $image = rand(11111,99999)."_".$_FILES['album_image']['name'];
                    
                    move_uploaded_file($_FILES['album_image']['tmp_name'], "album/".$image);
                }    
           
		   $sql="INSERT INTO `album` (user_id,album_name,image)VALUES 
		                                           ('".$_SESSION['user_id']."',
													  '".$_POST['album_name']."',
		                                             '".$image."')";
		   
		   $result = mysql_query($sql);

		if($result)
		{
			$_SESSION['success'] = "Album upload successfully.";
			header("Location:album.php");
			
		}
		else
		{
			$_SESSION['errors'] = mysql_error();
			header("Location:album.php");
		}
	}
?>
									