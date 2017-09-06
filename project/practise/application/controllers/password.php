<?php if(!defined('BASEPATH')) 
	 	echo 'No direct Script access allowed';
	 
class Password extends Template
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
	 public function changepassword()
	{
		$data  = array();
		$this->view("authentication/changepassword",$data);
		
	}

	public function index()
	{	
		
	}

   public function forgot_password()
	{
		$data  = array();
		$this->view("authentication/forgot_password",$data);
		
	}
	public function dom_import_simplexmlforgot_password()
	{
		$email = $this->security->xss_clean( trim($this->input->post("email")) );		
		$data['email'] = $email;
		if($email == "")
		{
			$this->session->set_flashdata( "errors", get_message('forget_password_blank'));
			$this->session->set_flashdata('forgotemail',$data);	
			redirect('password/forgot_password');
			return;	
		}		
		
		$this->user_model->set_field("email",$email);
		$row = $this->user_model->is_email_id_exists();
		
		if(!$row )
		{
			$error= get_message("authentication_forget_password_invalid_email_id");	
			$this->session->set_flashdata('forgotemail',$data);	
			$this->session->set_flashdata( "errors", $error);			
			redirect('password/forgot_password');
			return;
		}	
		else
		{
			$createpassword=$this->createRandomPassword();
			$password = hash("sha512",$createpassword,false);
				
			$row->password	=  $createpassword;
			$data['password'] = $password;
			$this->user_model->set_fields($data);
			$update =$this->user_model->forgot_password(array("email"=> $email));
			
			$this->session->set_flashdata( "success", $createpassword);			
			redirect('password/forgot_password');
		}					
			
			
	}
	private function createRandomPassword() 
	{
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while ($i <= 7) 
		{
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
		return $pass;
	}		
	

	

	public function change_password()
	{
		$config = array(
				array(
						'field' => 'old_password',
						'label' => 'Old Password'
					 ),
					 
			   array(
						'field' => 'new_password',
						'label' => 'New Password'
					 ),
					);
		$fields=array('old_password','new_password');
		$data=$this->get_post_values($fields);
		$error=$this->required_field_advance_validation($config);
		if($error !='')
		{
			$this->session->set_flashdata("errors",$error);
			redirect("password/change_password");
		}
		else
		{
			
					if( $this->user_model->password_check( $this->session->userdata("user_id"), hash("sha512", $data["old_password"] ) ) )
					{
						$data_db=array();
						$data_db["id"]= $this->session->userdata("user_id");
						$data_db["password"]=hash("SHA512", $data["new_password"]);
						$this->user_model->set_fields( $data_db );
						$row = $this->user_model->change_password( "errors", get_message("authentication_login_error"));
						
					$this->session->set_flashdata("success",get_message("update_password_success"));
					//$this->session->set_userdata($row);
					
					redirect("password/change_password");
					}
				else
				{
					$this->session->set_flashdata("errors",get_message("invalid_password"));
					redirect("password/change_password");
				}
		}
					 	
	}
}
	?>