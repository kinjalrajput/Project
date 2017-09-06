<?php include("icludes/config.php");

	  if(!empty($_POST['chk']))
	  {
	  		
	  	 foreach($_POST['chk'] as $ids)
		 {
		 	 
			$delete = "Delete from users where id='".$ids."'";
			mysql_query($delete);
			$_SESSION['success'] = "Selected user deleted successfull.";
			header("Location:users.php");
		 }
	  }
	  else
	  {
	  	$_SESSION['errors'] = "Please select atleast one checkbox.";
		header("Location:users.php");
	  }
?>