<?php
	
	session_start();
	if(isset($_POST['register'])) {

	 $_SESSION['first_name'] = $_POST['first_name'];
	 $_SESSION['last_name']	= $_POST['last_name'];
	 $_SESSION['user_name']	= $_POST['user_name'];
	 $_SESSION['number']	= $_POST['number'];
	 $_SESSION['gender']	= implode(',',$_POST['gender']);
	 $_SESSION['Qualification']	= $_POST['Qualification'];
	 $_SESSION['language']= implode(',',$_POST['language']);
		
		if($_SESSION['first_name'] && $_SESSION['last_name'] && $_SESSION['user_name'] && $_SESSION['number'] && $_SESSION['gender']
			 && $_SESSION['Qualification'] && $_SESSION['language']) 
		{
			
			 $_SESSION['forms'][]= array('first_name'=>$_SESSION['first_name'], 'last_name'=>$_SESSION['last_name'] ,'user_name'=>$_SESSION['user_name'],
			'number'=>$_SESSION['number'] ,'gender'=>$_SESSION['gender'], 'Qualification'=>$_SESSION['Qualification'],'language'=>$_SESSION['language']);
			//echo"<pre>";
			//print_r($_SESSION['forms']);
			//exit;
		}
		else 
		{
			$_SESSION['error'] = 'Please enter data';			
		}
	}
	
	if(isset($_POST['update'])) {
		
		
	 $id = $_POST['id'];
	 $_SESSION['firstname'] = $_POST['first_name'];
	 $_SESSION['lastname']	= $_POST['last_name'];
	 $_SESSION['username']	= $_POST['user_name'];
	 $_SESSION['number']	= $_POST['number'];
	 $_SESSION['gender']	= implode(',',$_POST['gender']);
	 $_SESSION['Qualification']	= $_POST['Qualification'];
	 $_SESSION['language']= implode(',',$_POST['language']);
		
		if($_SESSION['firstname'] && $_SESSION['lastname'] && $_SESSION['username'] && $_SESSION['number'] && $_SESSION['gender']
			 && $_SESSION['Qualification'] && $_SESSION['language']) 
		{
			
			 $_SESSION['forms'][$id] = array('first_name'=>$_SESSION['firstname'], 'last_name'=>$_SESSION['lastname'] ,'user_name'=>$_SESSION['username'],
			'number'=>$_SESSION['number'] ,'gender'=>$_SESSION['gender'], 'Qualification'=>$_SESSION['Qualification'],'language'=>$_SESSION['language']);
			//echo"<pre>";
			//print_r($_SESSION['form']);
			//exit;
		}
		else 
		{
			$_SESSION['error'] = 'Please enter data';			
		}
	}
	
	
	

	header("Location:session2.php"); 