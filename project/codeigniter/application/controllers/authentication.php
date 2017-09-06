<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends Template {
	
	public function __construct()
	{
      parent::__construct();
	  	header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
		$this->load->helper('form');
		$this->load->library('file_uploader');
		$this->load->model("common_model");
	}
	
	

	public function register()
	{
		$data = array();
		$data['register_data'] = $this->session->flashdata('register_data');
		$this->view('authentication/register',$data);
	}
	
	public function do_register()
	{
		$data	  = array();
		$fields = array("first_name","last_name","user_name","password","email");
		$config = array(
							array(
									'field'	=> 'first_name',
									'label'	=>	'First Name',
									'rules'   => 'trim|required'
									),
							array(
									'field'	=> 'last_name',
									'label'	=>	'Last Name',
									'rules'   => 'trim|required'
									),
							array(
									'field'	=> 'user_name',
									'label'	=>	'User Name',
									'rules'   => 'trim|required|is_unique[users.user_name]'
									),	
							array(
									'field'	=> 'password',
									'label'	=>	'Password',
									'rules'	=>	'trim|required'
									),		
							array(
									'field'	=> 'email',
									'label'	=>	'Email',
									'rules'   => 'trim|required|valid_email|is_unique[users.email]'
									)	
							);
		$this->form_validation->set_rules($config);
		$data 	= $this->get_post_values($fields);	
		if($this->form_validation->run() == FALSE)
		{
			
				$error = validation_errors();
				$this->session->set_flashdata('errors',$error);
				$this->session->set_flashdata('register_data',$data);
				redirect("authentication/register");
			
		}
		else 
		{
			/*if( array_key_exists("profile_picture",$_FILES) &&  $_FILES['profile_picture']["name"]!='' ) //validate image
			{
				$file = $_FILES['profile_picture']["name"];
				$path 				= './assets/upload/users/';
				$this->file_uploader->set_default_upload_path($path);
				$image_ref1	= $this->file_uploader->upload_image('profile_picture'); //returned path
				$image_ref = str_replace(' ', '_',$image_ref1);
				if ($image_ref["status"] == 200)
				{
					$image	= $image_ref [ "data" ];
					$data ["profile_picture"] 	= $image;
					
				}
				else
				{
					
						$error = validation_errors();
						$this->session->set_flashdata('errors',get_message("upload_valid_file")); //Upload valid profile picture file.
						$this->session->set_flashdata('register_data',$data);
						redirect("authentication/register");
					
				}
				
			}*/
			
			$data['password'] = hash('SHA512',$data['password']);
			
			$this->common_model->set_fields($data);
			$this->common_model->save("users");
		
			$this->session->set_flashdata("success",get_message("register_success")); 
			redirect("authentication/register");	
		}
	}
	
}
