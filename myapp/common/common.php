<?php

	/**
	* print an array	
	*/
	function pr($var,$quit=false)
	{
		echo "<pre>";
    	print_r($var);
    	echo "</pre>";

    	if($quit)
    	{
    		exit;
    	}    	
	}
	/**
	* print an success or error message	
	*/
	function displayMsg()
	{
		$msg = null;
		if(isset($_SESSION['error_msg']))
		{
			$msg = '<div class="alert alert-dismissible alert-danger">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Great!</strong> "'.$_SESSION['error_msg'].'"
			</div>';			

		}
		elseif(isset($_SESSION['success_msg']))
		{			
			$msg = '<div class="alert alert-dismissible alert-success">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Great!</strong> "'.$_SESSION['success_msg'].'"
			</div>';
			
		}
		echo $msg;		
		session_destroy();
	}
?>