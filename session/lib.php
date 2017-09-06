<?php

function validlogin()
{
	if(isset($_SESSION['username']))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function displyMessage()
{
	if(isset($_SESSION['error_msg']))
	{
		echo $_SESSION['error_msg'];
		unset($_SESSION['error_msg']);
	}	
}	
?>