<?php if(!defined('BASEPATH')) 
	 	echo 'No direct Script access allowed';
	 
class Update_profile extends Template
{
	public function __construct()
	 {
      parent::__construct();
     
      $this->load->model('common_model');
	  $this->load->model('user_model');
      $this->load->library('form_validation');
	 // if(!$this->session->userdata('id'))
	 // {
	  //	redirect('users/myaccount/register');
	  //}
      
	}

	public function index()
	{	
		
	}
	

public function profile()
	{
		$data  = array();
		$data["row"] = $this->user_model->get_user($id);
		//print_r($data["userinfo"]); exit;
		$this->view("authentication/update_profile",$data);
		
	}
	public function do_profile()
	{
		$config = array(
                array(
                     'field'   => 'first_name', 
                     'label'   => 'First Name'
                  ),
				array(
                     'field'   => 'last_name', 
                     'label'   => 'Last Name'
                  ),
				array(
                     'field'   => 'user_name', 
                     'label'   => 'User Name' 
                  ),
				array(
                     'field'   => 'email', 
                     'label'   => 'Email'
                  ),
				array(
                     'field'   => 'gender', 
                     'label'   => 'Gender'
                  ),    
                array(
                     'field'   => 'contact', 
                     'label'   => 'Contact'
                  ),
				 array(
                     'field'   => 'country', 
                     'label'   => 'Country'
                  ),    
				 
              );
		
		$fields = array ('first_name','last_name','user_name','email','contact','language','gender','country');
		$data	= $this->get_post_values( $fields );
		$error  = $this->required_field_advance_validation($config );	
		
		if($error != '')
		{
			$this->session->set_flashdata("errors",$error);
			redirect('update_profile/update_profile');
		}
		else
		{
			$user_id = $this->session->userdata("id");
			$data['language']=implode(",",$_POST['language']);

					if (array_key_exists("image", $_FILES) && $_FILES['image']["name"] != '') //validate image
					{
												$file = $_FILES['image']["name"]; 
						$path = './assets/upload/users/';
						$this->file_uploader->set_default_upload_path($path);
						 
						$client_image_ref = $this->file_uploader->upload_image('image'); //returned path
						
						if ($client_image_ref["status"] == 200)
						{
							
							$client_image = $client_image_ref["data"]; 
							if($this->input->post('old_image') != "")
							{
								
								@unlink($path.$this->input->post('old_image'));
								
							}
							$this->load->library('image_lib');
							$config_manip = array(
									'image_library' =>'gd2',
									'library_path'  => '/usr/X11R6/bin/',
									'source_image'  => $path.$client_image,
									'new_image'     => $path.$client_image,
									'maintain_ratio'=> FALSE ,
									'create_thumb'  => FALSE ,
									'width'         => 100,
									'height'        => 100,
									
									);
									//print_r($config_manip);
								$this->image_lib->initialize($config_manip);
							   $this->image_lib->resize();
							   $this->image_lib->display_errors();
							   $client_image = str_replace(' ','_',$client_image);
							 $data['image'] = $client_image;
							
							
						}
					}
					
			$this->common_model->set_fields($data);
			$update = $this->common_model->updateData("users",array("id"=>$this->session->userdata('user_id')));
			$this->session->set_flashdata("success",get_message("authentication_admin_profile_update_success"));
			redirect("update_profile/profile");
		}
	}
	
}
	?>