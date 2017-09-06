<?php include("includes/config.php");
	
	$errors = array();
	 
	if($_POST['album_name'] == "")
	{
		$errors[] = "Album name is required.";
	}
	
	if($errors)
	{	
		$msg=$errors;
		$_SESSION['errors'] = $msg ;
		header("Location:edit_album.php");
	
	}
	else
	{
		$image = $_FILES['image']['name'];
		$temp = $_FILES['image']['tmp_name'];
		move_uploaded_file($temp,"album/".$image);
		
		if($image != "")
		{
			$result = mysql_query("SELECT image FROM album WHERE id= '".$_SESSION['id']."'");
			$row = mysql_fetch_array($result);
			
			unlink("album/".$row['image']);
			
			$temp = $_FILES['image']['tmp_name'];
			move_uploaded_file($temp,"album/".$image);
		}
		else
		{
			$image = $_POST['old_image'];
		}
		
	
		$query = "UPDATE album SET album_name='".$_POST['album_name']."',
										 image='".$image."' 
										 where id='".$_SESSION['id']."'"; 
										
		$result = mysql_query($query); 
		
		if($result) 
		{
			$_SESSION['success'] = "Edit album successfully";
			header("Location:album_management.php");
		}
		else
		{
			$_SESSION['errors'] = mysql_error();
		}
		header("Location:edit_album.php");
	} 	
?>
		
	