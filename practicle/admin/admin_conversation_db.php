<?php   
session_start();
include ("includes/config.php");
		$errors=array();
		if(isset($_POST['meassage']) && $_POST['meassage']=="")
		{
			$errors[]="Please enter message";
		}
		else
		{
			$_SESSION['message']=$_POST['message'];
		}
		if(!empty($errors))
		{
			$message="";
			foreach($errors as $er)
			{
					$message.="-".$er;
			}
			$_SESSION['errors']=$message;
			header("location:admin_conversation.php");
		}
		else
		{
			$query="insert into user_conversation(send_id,receive_id,user_name,message) values('".$_SESSION['admin_id']."','".$_POST['receive_id']."','".$_SESSION['user_name']."','".$_POST['message']."')";
			$result=mysql_query($query);
			if($result)
			{
				$_SESSION['success']=" message send successfully.... ";
				header("location:admin_conversation.php");
			}
			else
			{
				$_SESSION['errors']=mysql_error();
				header("location:admin_conversation.php");
			}
		}
?>