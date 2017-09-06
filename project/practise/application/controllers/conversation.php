<?php if(!defined('BASEPATH')) 
	 	echo 'No direct Script access allowed';
	 
class Conversation extends Template
{
	public function __construct()
	 {
      parent::__construct();
     
      $this->load->model('common_model');
      $this->load->model('user_conversation_model');
	  $this->load->model('user_model');
	  $this->load->model('admin_model');
      $this->load->library('form_validation');
	 // if(!$this->session->userdata('id'))
	 // {
	  //	redirect('users/myaccount/register');
	  //}
      
	}

	public function index()
	{	
		
	}

	 public function show_message($id)
    {
    $data = array();
    $data['conversation'] = $this->user_conversation_model->get_user_message($id);
     //print_r($data['conversation']); exit;
   // $data['users'] = $this->user_conversation_model->get_user_message($id);
    //print_r($data['users']); exit;
    //$data['user_id'] = $id;
    $this->view("authentication/show_message",$data);
    }
	 public function get_userlist()
  {
    $data = array();
    $data['user_msg'] = $this->user_conversation_model->get_lastmsg();
    $this->view("authentication/message_management",$data);  
  }
	

public function user_conversation()
	{
		$data  = array();
		$data['userdata']=$this->user_conversation_model->get_users();
		//$data['message']=$this->user_conversation_model->get_conversation($id);

		$this->view("authentication/user_conversation",$data);
		
	}

	public function save_message()
	 {
		 $config = array(
							array(
				                  'field'   => 'message', 
				                  'label'   => 'Chat',
				               )
							   
				           );  
		 $fields=array('receive_id','message');
 		 $data=$this->get_post_values($fields);
		 $error=$this->required_field_advance_validation($config);
				
		if($error!='')
		{
			$this->session->set_flashdata("errors",$error);
			redirect("conversation/user_conversation/".$data['receive_id']);
		}
		else
		{
			//$data['receive_id']="0";
			$data['send_id']=$this->session->userdata("user_id");
			//$data['user_name']=$this->session->userdata("user_name");
			$this->common_model->set_fields($data);
			$this->common_model->save("user_conversation");
			$this->session->set_flashdata("success","Message send successfully");
			redirect("conversation/user_conversation/".$data['receive_id']);
			//echo $data['receive_id'];exit;
		}
	 } 
}
?>