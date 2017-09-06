<?php
session_start();
if(isset($_GET['id']) && $_GET['id'] != '')
{
	$id = $_GET['id'];
	unset($_SESSION['forms'][$id]);
}
header("location:session2.php");
?>