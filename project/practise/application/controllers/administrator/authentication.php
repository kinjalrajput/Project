<?php 
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Authentication extends Template 
{
	public function __construct()
	 {
      parent::__construct();
	  	header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
      $this->load->helper('form');
      $this->load->library('file_uploader');
      
      
       $this->session->set_userdata("current_module","account_settings");
       
      $this->load->model('admin_model');
      $this->set_header_path('administrator/blocks/header');
      $this->set_footer_path('administrator/blocks/footer');   
	}
	/*
	* Will show login form
	*/
	public function index()
	{		
	
		$user_name = "";
		$password = "";
		 
		//if($this->input->cookie('user_name') && $this->input->cookie('password'))
		if(isset($_COOKIE['user_name']) && isset($_COOKIE['admin_password']))
		{
			
			$user_name = $_COOKIE['user_name'];
			$password = $_COOKIE['admin_password'];
	
			$data["user_name"]	= $user_name;
			$data["password"] = hash("SHA512", $password );
					
			$this->admin_model->set_fields( $data );
			$row = $this->admin_model->login();
			
			if($row)
			{
								
	         $this->session->set_userdata('admin_id', $row ["id"]);
	         $this->session->set_userdata('admin_name', $row ["user_name"]);
				$this->session->set_flashdata( $row );
				
				setcookie("user_name",$user_name, time()+3600*24*60,"/",$this->config->item("cookie_domain"));
				setcookie("admin_password",$password, time()+3600*24*60,"/",$this->config->item("cookie_domain"));
				
				redirect("administrator/admin_profile/account_settings");
			}
		}
		$data['user_name'] 	= $user_name;
		$data['password'] 	= $password;
		
		if ( !$this->session->userdata("admin_id"))
		{
			if ( $this->session->flashdata("user_name") && $this->session->flashdata("password") )
			{				
				$data = array();
				$data ["user_name"] = $this->session->flashdata("user_name"); 
				$data ["password"] = $this->session->flashdata("password");
				
				$this->load->view( "administrator/ajax_pages/login_security_page", $data );		
			}
			else
			{
				$data ["user_name"] = $this->session->flashdata("user_name"); 
				$data ["password"] = $this->session->flashdata("password");
				 $this->load->view("administrator/login",$data);
			}	
		}
		else
		{
			
			redirect("administrator/admin_profile/account_settings");
		}
			
	}
	
	/* Authenticate user */
	public function do_login()
	{    
		$config = array(
               array(
                     'field'   => 'user_name', 
                     'label'   => 'User name' 
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => 'Password'
                  ),
              );
		
		$fields = array ( 'user_name','password' );
		$data	  = $this->get_post_values( $fields );
		$error  = $this->required_field_advance_validation(  $config )	;	
		
		//Registraion check
		if ( $error !='' )
		{			
		
			if ( !$this->input->is_ajax_request())
			{	
			
				$this->session->set_flashdata( "errors", $error);
				$this->session->set_flashdata( 'user_name',$data['user_name'] );
				redirect('administrator/authentication');
			}
			else
			{
				echo json_response(500,$error,array());
				return;
			}
			
		}
		
		//Fetch data
		
        $password = $data["password"];
		$data["password"] = hash("SHA512", $data["password"] );
			
		$this->admin_model->set_fields( $data );
		$row = $this->admin_model->login();
		
		if ( !$row )
		{	
			$this->session->set_flashdata( "errors", get_message("authentication_login_error") );
         // redirect("admin_profile/account_settings");
         	         $this->session->set_flashdata( 'user_name',$data['user_name'] );
			redirect('administrator/authentication');
			return;		
		}
        
		if(isset($_REQUEST['remember']) && $_REQUEST['remember'] == 'on')
		{
         setcookie("user_name",$data["user_name"], time()+3600*24*60,"/",$this->config->item("cookie_domain"));
			setcookie("admin_password",$password, time()+3600*24*60,"/",$this->config->item("cookie_domain"));
		}
		else
		{
         setcookie("user_name",$data["user_name"], time()-1000,"/",$this->config->item("cookie_domain"));
			setcookie("admin_password",$password, time()-1000,"/",$this->config->item("cookie_domain"));
		}
		
		//Success				
		if ( !$this->input->is_ajax_request())
		{
			
			//$data["password"]  = hash("SHA512", $data["password"] );
			$data["remember"]	 = $this->input->post("remember");
         $data["id"]			 = $row["id"];
            
			$row ["id"]        = $data["id"];
         $row ["user_name"] = $data["user_name"];
			$row ["password"]  = $data["password"];
			$row ["remember"]	 = $this->input->post("remember");					
         $this->session->set_flashdata( $row );
			redirect("administrator/authentication");
		
		}
		else
		{
			//$data["password"]  = hash("SHA512", $data["password"] );
			$data["remember"]	 = $this->input->post("remember");
			echo json_response(200,'',array("page"=>$this->load->view("administrator/ajax_pages/login_security_page.php",$data,true)));
			return;
		}
	}
	
	public function do_secure_login()
	{

		$fields 	         = array ( 'user_name','password','email' );
		$data		         = $this->get_post_values( $fields );
	
		$this->admin_model->set_fields( $data );
		$row = $this->admin_model->login_secure();
		//print_r($row)
		if( $row )
		{
			$row['admin_id'] = $row['id'];	
			$row['admin_name'] = $row['user_name'];
			$this->session->set_userdata( $row );
			$this->session->set_userdata('admin_id', $row ["id"]);
			$this->session->set_userdata('admin_name', $row ["user_name"]);
			$this->session->set_flashdata( $row );
			redirect('administrator/admin_profile/account_settings');	
		}
		else 
		{
			$this->session->set_flashdata( "errors", get_message('administrator_email_does_not_exists'));
			redirect("administrator/authentication");
		}	
	}
	
	/*
	* Will show forgot password form
	*/
	public function forget_password()
	{
		$data['forgotemail']  = $this->session->flashdata('forgotemail');
		$this->load->view("administrator/forget_password",$data);
	}
	/*
	* Recover password
	*/
		
	public function recover_password()
	{
		$email = $this->security->xss_clean( trim($this->input->post("email")) );		
		$data['email'] = $email;
		if($email == "")
		{
			$this->session->set_flashdata( "errors", get_message('forget_password_blank'));
			$this->session->set_flashdata('forgotemail',$data);	
			redirect('administrator/authentication/forget_password');
			return;	
		}		
		
		$this->admin_model->set_field("email",$email);
		$row = $this->admin_model->is_email_id_exists();
				
		if(!$row )
		{
			$error	= get_message("authentication_forget_password_invalid_email_id");	
			$this->session->set_flashdata('forgotemail',$data);	
			$this->session->set_flashdata( "errors", $error);			
			redirect('administrator/authentication/forget_password');
			return;
		}	
		else
		{
			
			$createpassword=$this->createRandomPassword();
			$password = hash("sha512",$createpassword,false);
				
			$row->password	=  $createpassword;
			//Send mail
			$content		= $this->load->view("common/forgot_password.php",$row,TRUE);
			
			$this->load->library('email');
			$this->email->from('noreplay@esp.com', 'ANALYTIC');
			$this->email->to( $email ); 
			
			$this->email->subject("Forgot Password"." - "." ".$this->config->item('site_name'));
			$this->email->set_mailtype("html");
			$this->email->message($content);	
			
			$this->email->send(); 
		
			
			$data['password'] = $password;
			$this->admin_model->set_fields($data);
			$update =$this->admin_model->update_password(array("email"=> $email));
			
			$message	= get_message("authentication_forget_password_send_email_success");
			$this->session->set_flashdata( "success", $message);			
			
			redirect('administrator/authentication/forget_password');
		}		
	}
	
	
	/*
	* For logout
	*/
	public function logout()
	{
		//$this->session->sess_destroy();
		setcookie("user_name","", time()-300,"/",$this->config->item("cookie_domain"));
		setcookie("admin_password","", time()-300,"/",$this->config->item("cookie_domain"));
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_name');
		$this->clear_cache();
		redirect('administrator/authentication');
	}	
	
	public function clear_cache()
	{
		//$this->cache->clean();
		$this->db->cache_delete_all();
		
		header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");	
	}

	//For return request(get/post) data in form of array
	public function get_post_values( $keys )
	{
		$returnArray = array();
		foreach( $keys as $k => $field )
		{
			$returnArray[$field] = $this->security->xss_clean( $this->input->post($field) );
			//$returnArray[$field] =  $this->input->post($field) ;
		}
		return $returnArray;
	}
	
	
	public function required_field(  $fields )
	{
		$error = '';
		foreach( $fields as $field )
		{
				if ( trim( $this->input->post($field) )=='' )
				{
					$error = $field ." required field.";
					break;		
				} 			
		}	
		return $error;
	} 
	
	/*
	* Generate random password
	*/
	private function createRandomPassword() {
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		
		srand((double)microtime()*1000000);
		
		$i = 0;
		
		$pass = '' ;
		
		while ($i <= 7) {
		
			$num = rand() % 33;
		
			$tmp = substr($chars, $num, 1);
		
			$pass = $pass . $tmp;
		
			$i++;
		}
		return $pass;
	}		
	
}
?>
