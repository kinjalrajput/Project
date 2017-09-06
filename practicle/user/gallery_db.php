<?php include('includes/config.php');
     
	  $errors = array();
	  if(isset($_FILES['gallery_image']['name'][0]) && $_FILES['gallery_image']['name'][0] == "")
	  {
			$errors[] = "Please upload file.";	  	
	  }

	  if(!empty($errors))
	  {
	  	$message = "";

	  	foreach ($errors as $value) {
			$message .= $value;	  		
	  	}

	  	$_SESSION['errors'] = $message;
	  	header("Location:gallery.php");
	  }
	  else
	  {
	  		for($i=0;$i<count($_FILES['gallery_image']['name']);$i++)
			 { 
	  			$image = rand(11111,99999)."_".$_FILES['gallery_image']['name'][$i];

	  			if(move_uploaded_file($_FILES['gallery_image']['tmp_name'][$i], "gallery/".$image))
	  			{
					
	  			$sql = "Insert Into gallery (album_id,gallery_image) values('".$_POST['album_name']."','".$image."')";
	  				$rs = mysql_query($sql);

	  				if($rs)
	  				{
	  					$_SESSION['success'] = "Image added successfully.";
	  					header("Location:gallery.php");
	  				}
	  				else
	  				{
	  					$_SESSION['errors'] = mysql_error();
	  					header("Location:gallery.php");
	  				}
	  			}
	  		}
	  }
 ?>