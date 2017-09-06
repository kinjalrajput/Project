<?php
include"includes/config.php";

if(isset($_GET['id']))
	{
		$rs=$_GET['id'];
		$del="delete  from gallery where id='".$rs."'";
		$result=mysql_query($del); 
		
		if($result)
	   {
		$_SESSION['success']="Data delete successfully...";
		 header("Location:album_image.php?id=".$_REQUEST['redirect_url']);
    
	   }
	   else
	    {
		  $_SESSION['errors']=mysql_error();
		header("Location:album_image.php?id=".$_REQUEST['redirect_url']);
	}
   }
   
?>