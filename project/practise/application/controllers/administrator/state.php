<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class State extends Template 
{
  public function __construct()
   {
      parent::__construct();
     
      $this->load->model('admin_model');
      $this->load->model('country_model');
      $this->load->model('state_model');
      $this->load->model('common_model');
      
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
  public function edit_state($id)
  {
    $data=array();
    $data['mode'] = "Update";
    $data['id']=$id;
    $data['countrydata'] = $this->country_model->get_country();
    $data['statedata']=$this->state_model->get_statedetail($id);
    //print_r($data);exit;
    $this->view("administrator/state",$data);
  }
  public function manage_state()
  {
    $data=array();
    $data['statedata']=$this->state_model->get_state();
    $this->view("administrator/state_management",$data);
  }

  public function add_state()
  {
    $data=array();
    $data['mode'] = "add";
    $data['countrydata'] =$this->country_model->get_country();
    $this->view("administrator/state",$data);
  }
  public function save_state()
  {
    //Initialize data
    
    $config = array(
             array(
                     'field'   => 'state_name',
                     'label'   => 'State Name',
                    ),
             );
    $fields =array('country_id','state_name');
    $data=$this->get_post_values($fields);
    $error=$this->required_field_advance_validation($config);
    
    if($error !='')
    { 
       $this->session->set_flashdata("errors",$error);
      redirect("administrator/state/add_state"); 
     
    }
    else
    {
      $this->common_model->set_fields($data);
      $this->common_model->save("state");
      $this->session->set_flashdata("success","state add successfully");
      redirect("administrator/state/add_state");
    }
    
  }

   public function delete_state($id)
  { 
    $this->common_model->remove("state",array("id"=>$id));
      $this->session->set_flashdata("success","State Deleted Successfully..");
    redirect("administrator/state/manage_state");
     
  }

  public function update_state($id)
  {
    $config = array(
             array(
                     'field'   => 'state_name',
                     'label'   => 'State Name',
                    ),
             );
        $fields =array('country_id','state_name');
    $data=$this->get_post_values($fields);
    $error=$this->required_field_advance_validation($config);
    
    if($error !='')
    {
      $this->session->set_flashdata("errors",$error);
      redirect("administrator/state/edit_state/".$id);
    }
    else
    {
      $this->common_model->set_fields($data);
      $this->common_model->updateData("state",array("id"=>$id));
      $this->session->set_flashdata("success","State Updated successfully");
      redirect("administrator/state/edit_state/".$id);
    

    }
    
  }

  public function save()
   {  $data  = array();
     $config = array(
              array(
                          'field'   => 'state_name', 
                          'label'   => 'State Name',
                          'rules'   => 'trim|required|is_unique[state.state_name]'

                       ),
                   );  
     $fields=array('country_id','state_name');
     $this->form_validation->set_rules($config);
     $data=$this->get_post_values($fields);
   
        
      if($this->form_validation->run() == FALSE)
    {
      
        $error = validation_errors();
        $this->session->set_flashdata('errors',$error);
        $this->session->set_flashdata('update_data',$data);
        redirect("administrator/state/add_state");
      
    }
    else
    {
      $mode = $this->input->post('mode');   
      if($mode=='add')
      {
        $this->common_model->set_fields($data);
        $this->common_model->save("state");
        $this->session->set_flashdata("success","State added successfully.");
        redirect("administrator/state/add_state");
      }
      else
      {
        $id = $this->input->post('id');
        $this->common_model->set_fields($data);
        $this->common_model->updateData("state",array("id"=>$id));
        $this->session->set_flashdata( "success", "State updated successfully.");
        redirect('administrator/state/edit_state/'.$id);
      }
    }
   }
  
  
}
?>