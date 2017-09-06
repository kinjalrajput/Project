<?php
	$errors = $this->session->flashdata("errors");
	
	if ( $errors)
	{
		echo '<div class="clear sep"></div><center><div class="warning_msg" >'.$errors.'</div></center><div class="clear sep"></div>';
		
	} 


	$success = $this->session->flashdata("success");
	
	if ( $success)
	{
		echo '<div class="clear sep"></div><center><div class="success_msg" >'.$success.'</div></center><div class="clear sep"></div>';
	} 

?>	
