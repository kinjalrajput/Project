<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_message'))
{
	function get_message($message_key)
	{
		switch($message_key)
		{
			
         	case "administrator_email_does_not_exists":
					return "Login failed, email does not exists.";
			case "email_exits":
			                return "Email address already exists.";
			case "user_exits":
			                return "User name already exists.";
			case "user_email_exits":
			                return "User name or email already exists.";
			case "authentication_login_error":
			                return "Invalid username or password.";
			case "authentication_forget_password_invalid_email_id":
			                return "Email address does not match with current records.";
			case "forget_password_blank":
			                return "Enter email address.";
			case "valid_email":
			                return "Please provide valid email address.";
			case "Password_snd_mail":
			                return "Your password has been sent to your registered email address successfully.";
			case "valid_password":
			                return "Invalid current password, please try again.";
			case "password_success":
			                return "Password changed successfully.";
			case "authentication_admin_change_password_fail":
			                return "Invalid current password.";
			case "authentication_admin_profile_update_success":
			                return "Your account information has been updated successfully.";
			case "authentication_invalid_id":
			                return "Invalid admin id.";
			case "authentication_client_invalid_id":
			                return "Invalid client id.";
			case "complare_password_fail":
			                return "Confirm password does not match.";
			case "update_password_success":
			                return "Your password has been updated successfully.";
			case "invalid_password":
			                return "Please provide valid current password.";
			case "image_valid":
			                return "Kindly upload image.";
			case "authentication_forget_password_invalid_email_id":
			                return "Email address does not exists.";
			case "authentication_forget_password_send_email_success":
			                return "Your password has been sent to your registered email address successfully.";

			case  "register_success":
				return "User registeration successfully.";                
							 
			 					 	 					 					       
				
			default :
				return "";
		}
	}
	
	function file_required($file)
	{
	    if($file['size']===0)
	    {
	        $this->CI->form_validation->set_message('file_required','Uploading a file for %s is required.');
	        return FALSE;
	    }
	    return TRUE;
	}
}
