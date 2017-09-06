<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Admin_profile extends Template 
{
	public function __construct()
	 {
      parent::__construct();
     
      $this->load->model('admin_model');
      $this->load->library('form_validation');
         
		if ( !$this->session->userdata("admin_id") )
		{
			redirect('administrator/administrator/');
		}      
		
		//Template settings
		$this->set_template("administrator/template");
		$this->set_header_path('administrator/blocks/header');
		$this->set_footer_path('administrator/blocks/footer');
		$this->set_title("DashBoard");      
      
      $this->session->set_userdata("current_module","account_settings");
      
	}

	public function index()
	{	
		//redirect("administrator/admin_profile/account_settings");
	}

	/*
	* Admin edit form
	*/

	public function admin_profile()
	{
		$this->assets_load->add_js( array(base_url("assets/js/vendors/common.js"),
													 base_url("assets/js/vendors/account_settings.js"),
											),"footer" );
		
		$this->set_title("Account Settings");
		$data =  array("user_info"=> $this->admin_model->get_user( $this->session->userdata("admin_id") ) );		
		
		$this->view("administrator/edit_profile",$data);
	}
	
	/*
 	 * Admin update profile
	 */	
	public function profile_update()
	{
		//Initialize data
		
		$config = array(
             array(
                     'field'   => 'user_name',
                     'label'   => 'user name', 
                     'rules'   => 'trim|required|alphanumeric'
                  ),
             array(
                     'field'   => 'first_name', 
                     'label'   => 'first name',
                     'rules'   => 'trim|required|alpha'
                  ),
             array(
                     'field'   => 'last_name',
                     'label'   => 'last name',
                     'rules'   => 'trim|required|alpha'
                  ),
             array(
                     'field'   => 'email', 
                     'label'   => 'email',
                     'rules'   => 'trim|required|valid_email'
                  ),
            
           			
              );			
			
		
		
		$fields = array ( "user_name","first_name","last_name","email");
		$data   = $this->get_post_values($fields);
	
		 $this->form_validation->set_rules($config);
      
      if ( $this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('errors',validation_errors());	
			redirect('administrator/admin_profile/account_settings');			
			return;			
		}
		else
		{								
			$id	= $this->security->xss_clean( trim( $this->session->userdata("admin_id") ) ) ;
			$data	= $this->get_post_values( $fields );
			
			 
			$this->admin_model->set_fields( $data );
			
			if( !$this->admin_model->admin_available($id))
			{
				$this->session->set_flashdata( "errors", get_message("authentication_invalid_id"));			
				redirect('administrator/admin_profile/account_settings');
				return;
			}	
			else
			{
			//echo $this->input->post("id"); die;
				$user_saved_id = $this->admin_model->update_profile( array( "id" => $id ) );
			}
		
			//Success
			
			$this->session->set_flashdata( "success",  get_message("authentication_admin_profile_update_success") ); 			
			redirect('administrator/admin_profile/account_settings');		
		}
	}
	/*
   * Admin change password form
   */
	public function change_password()
	{
		$this->set_title("Change Password");
		$this->view("administrator/change_password");	
	}
	
	/*
	* Admin update password 
	*/
	
	public function update_password()
	{			
		$config = array(
               array(
                     'field'   => 'password', 
                     'label'   => 'Password' 
                  ),
               array(
                     'field'   => 'new_password', 
                     'label'   => 'New password'
                  ),
              	array(
                     'field'   => 'c_password', 
                     'label'   => 'Confirm new password'
                  )
              );			
			
		$error   = $this->required_field_advance_validation( $config )	;	
		$fields 	= array ( 'password',"new_password","c_password" );
		$data		= $this->get_post_values( $fields );
				
		//Registraion check
		if($error != '')
		{
			//$error_message = $this->get_single_error( $fields );			
			$this->session->set_flashdata("errors", $error);
			redirect('administrator/admin_profile/change_password');
			return;
		}
		
		//compare password
		if( $data [ "new_password" ] != $data [ "c_password" ] )
		{
			$error = get_message("complare_password_fail");
			$this->session->set_flashdata( "errors", $error );
			redirect('administrator/admin_profile/change_password');			
		}
	
		//Check old password
		if( $this->admin_model->password_check( $this->session->userdata("id"), hash("sha512", $data["password"] ) ) )
		{
			$db_data							= array();
			$db_data["id"]					= $this->session->userdata("id");
			$db_data["new_password"] 	= hash("sha512", $data["new_password"] );			
				
			
			$this->admin_model->set_fields($db_data);
			$user_saved_id = $this->admin_model->save_new_password( );
	
			//Success
			$this->session->set_flashdata( "success", get_message("update_password_success") );	
			redirect('administrator/admin_profile/change_password');
			return ;
		}
		
		//Display error message
		$error = get_message("invalid_password");
		$this->session->set_flashdata( "errors", $error );		
		redirect('administrator/admin_profile/change_password');			
		return;
	}
	
}
?>