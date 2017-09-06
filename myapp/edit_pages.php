<?php

      define("PAGE_TITLE","EDIT RECORD");// page of title 
	  include("common/header.php"); // add header content like menus
	  include("class/class.php"); // add class file
		$app = new MyApp(); 
  	if(isset($_POST['action']))
  	{
  		$title=$_POST['title'];
		$description=$_POST['description'];
		$id=$_POST['id'];
  	  	$query = "UPDATE `pages` set title=\"".addslashes($title)."\",description=\"".addslashes($description)."\" where id=$id";    
		
		$result = $app->doUpdate($query);

      if(!$result)
      {
          $_SESSION['error_msg'] = "Failed to update your content.";
      }
      else
      {
          $_SESSION['success_msg'] = "Data has been updated successfully.";
      }

      header("Location:pages.php");
	
  	}
?>

<div class="container">
	<?php
		require_once "form.php";
	?>
</div>