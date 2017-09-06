<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends Template {
	
	public function __construct()
	{
      parent::__construct();
	  	header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
		$this->load->helper('form');
		$this->load->library('file_uploader');
		$this->load->model("common_model");
		$this->load->model("user_model");
		$this->load->library('session');
		$this->set_template("template");
        $this->set_header_path('blocks/user_header');
        $this->set_footer_path('blocks/user_footer');
          
	}
	
	

	
	public function registration()
	{
		$data = array();
		$data['register_data'] = $this->session->flashdata('register_data');
		$this->view('authentication/registration',$data);
	}
	public function login()
	{
		$data = array();
		$data['register_data'] = $this->session->flashdata('register_data');
		$this->view('authentication/login',$data);
	}
	


	public function do_login()
	{
		$config=array(
						array(
							'field'=>'user_name',
							'label'=>'User Name'
						),
						array(
							'field'=>'password',
							'label'=>'Password'
						),
					);
		$fields=array('user_name','password');			
		$data=$this->get_post_values($fields);
		$error=$this->required_field_advance_validation($config);
		
		if($error!='')
		{
			$this->session->set_flashdata("errors",$error);
			/*$this->session->set_flashdata("user_name",$data['user_name']);*/
			redirect("authentication/login");
		}
		else
		{
			
			 $password 	= $data["password"];
		     $data["password"] = hash("SHA512", $data["password"] );
			 $this->user_model->set_fields( $data );
		     $row = $this->user_model->login();
		
		if ( !$row )
		{	
			$this->session->set_flashdata( "errors", get_message("authentication_login_error") );
         	$this->session->set_flashdata( 'user_name',$data['user_name'] );
			redirect("authentication/login");
			return;		
		}
		else
		{ 
				$this->session->set_flashdata( "success ", "successfully" );
				$this->session->set_userdata($row);
				redirect('update_profile/profile');
			
			
		}
	}
	}

	public function do_registration()
	{
		$data	  = array();
		$fields = array("first_name","last_name","user_name","password","email","contact","gender","country");
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
									),
							array(
									'field'	=> 'contact',
									'label'	=>	'Contact',
									'rules'   => 'trim|required|valid_contact|contact.length!=10|is_NaN[users.contact]'
									),
							array(
									'field'	=> 'gender',
									'label'	=>	'Gender',
									'rules'   => 'trim|required'
									),
							array(
									'field'	=> 'country',
									'label'	=>	'Country',
									'rules'   => 'trim|required'
									),
						   
							);
		$this->form_validation->set_rules($config);
		$data 	= $this->get_post_values($fields);	
		if($this->form_validation->run() == FALSE)
		{
			
				$error = validation_errors();
				$this->session->set_flashdata('errors',$error);
				$this->session->set_flashdata('register_data',$data);
				redirect("authentication/registration");
			
		}
		else 
		{
			
			if( array_key_exists("image",$_FILES) &&  $_FILES['image']["name"]!='' ) //validate image
			{

				$file = $_FILES['image']["name"];
				$path 				= './assets/upload/users/';
				$this->file_uploader->set_default_upload_path($path);
				$image_ref1	= $this->file_uploader->upload_image('image'); //returned path
				$image_ref = str_replace(' ', '_',$image_ref1);
				if ($image_ref["status"] == 200)
				{
					$image	= $image_ref [ "data" ];
					$data ["image"] 	= $image;
				}
				else
				{
						$error = validation_errors();
						$this->session->set_flashdata('errors',get_message("upload_valid_file")); //Upload valid profile picture file.
						$this->session->set_flashdata('register_data',$data);
						redirect("authentication/registration");
				
				}
				
			} 
			$data['password'] = hash('SHA512',$data['password']);
			$data['language'] =implode(",",$_POST['language']);			
			$this->common_model->set_fields($data);
			$this->common_model->save("users");// insert data into databsase 
		
			$this->session->set_flashdata("success",get_message("register_success")); 
			redirect("authentication/registration");	
		}
	}

}

?>