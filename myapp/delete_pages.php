<?php

      define("PAGE_TITLE","DELETE RECORD");// page of title 
	  include("common/header.php"); // add header content like menus
	  include("class/class.php"); // add class file
   $app = new MyApp(); 
  	if(isset($_GET['id']))
  	{
		$id = $_GET['id'];
		$result = $app->doDelete("DELETE from `pages` where id = $id");

  	  if(!$result)
      {
          $_SESSION['error_msg'] = "Failed to delete your content.";
      }
      else
      {
          $_SESSION['success_msg'] = "Data has been removed successfully.";
      }

      header("Location:pages.php");
	}
?>
