<?php
include"common/header.php";
include"includes/config.php";
if(isset($_GET['id']))
	{
		$res=mysql_query("SELECT image FROM gallery WHERE id='".$_GET['id']."'");
		$row=mysql_fetch_array($res,MYSQL_ASSOC);
		
		unlink("album/".$row['image']);
		$del="delete from gallery where id='".$_GET['id']."'";
		$exe_del=mysql_query($del);
		
		header("Location:view.php?cat=".$_GET['cat_id']);
		

	}
?>
<?php
if(isset($_GET['id']))
	{
		$res=mysql_query("SELECT image FROM gallery WHERE id='".$_GET['id']."'");
		$row=mysql_fetch_array($res,MYSQL_ASSOC);
		
		unlink("album/".$row['image']);
		$del="delete from gallery where id='".$_GET['id']."'";
		$exe_del=mysql_query($del);
		
		header("Location:manage_album.php");
		

	}
?>