<?php
include"includes/config.php";

if(isset($_GET['id']))
	{
		
		$del="delete  from album where id='".$_GET['id']."'";
		$exe_del=mysql_query($del); 
		$_SESSION['success']="Data delete successfully...";
		 

  }
  header("Location:album_management.php");
   
?>