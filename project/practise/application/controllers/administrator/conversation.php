<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Conversation extends Template 
{
  public function __construct()
   {
      parent::__construct();
     
      $this->load->model('admin_model');
      //$this->load->model('admin_conversation_model');
      $this->load->model('state_model');
      $this->load->model('common_model');
      $this->load->model('city_model');
      $this->load->model('user_model');
      $this->load->model('admin_conversation_model');

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
  /*
  * Will show login form
  */
  public function index()
  {   
  }

  public function manage_message()
  {
    $data=array();
    //$data['userdata']=$this->user_model->get_users();
    //$data['messages'] = $this->admin_conversation_model->get_message();
    $this->view("administrator/manage_conversation",$data);
  }
  public function admin_conversation()
  {
    $data=array();
    $data['userdata']=$this->user_model->get_users();
    $data['messages'] = $this->admin_conversation_model->get_message();
    $this->view("administrator/admin_conversation",$data);
  }

  public function message()
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
      redirect("administrator/conversation/admin_conversation/".$data['receive_id']);
    }
    else
    {
      $data['send_id']="0";
      //$data['user_name']=$this->session->userdata("user_name");
      $this->common_model->set_fields($data);
      $this->common_model->save("user_conversation");
      $this->session->set_flashdata("success","Message send successfully");
      redirect("administrator/conversation/admin_conversation/".$data['receive_id']);
      //echo $data['receive_id'];exit;
    }
   } 

   public function get_userlist()
  {
    $data = array();
    $data['user_msg'] = $this->admin_conversation_model->get_lastmsg();
     //print_r($data['user_msg']);exit;
    $data['userdata'] = $this->admin_conversation_model->get_user();
    //print_r($data);exit;
    $this->view("administrator/manage_conversation",$data);  
  }

   public function show_message($id)
  {
    $data = array();
    $data['conversation'] = $this->admin_conversation_model->get_user_message($id);
   // $data['users'] = $this->admin_conversation_model->get_user_message($id);
    //print_r($data); exit;
    $data['user_id'] = $id;
    $this->view("administrator/show_conversation",$data);
  }

}?>