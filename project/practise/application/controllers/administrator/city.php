
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class City extends Template 
{
  public function __construct()
   {
      parent::__construct();
     
      $this->load->model('admin_model');
      $this->load->model('state_model');
      $this->load->model('common_model');
      $this->load->model('city_model');

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
  public function edit_city($id)
  {
    $data=array();
    $data['mode'] = "Update";
    $data['id']=$id;
    $data['statedata'] = $this->state_model->get_state();
    $data['citydata']=$this->city_model->get_citydetail($id);
    //print_r($data);exit;
    $this->view("administrator/city",$data);
  }
  public function manage_city()
  {
    $data=array();
    $data['citydata']=$this->city_model->get_city();
    $this->view("administrator/city_management",$data);
  }

  public function add_city()
  {
    $data=array();
     $data['mode'] = "add";
    $data['statedata'] =$this->state_model->get_state();
    
    $this->view("administrator/city",$data);
  }
  public function save_city()
  {
    //Initialize data
    
    $config = array(
             array(
                     'field'   => 'city_name',
                     'label'   => 'City Name',
                    ),
             );
    $fields =array('state_id','city_name');
    $data=$this->get_post_values($fields);
    $error=$this->required_field_advance_validation($config);
    
    if($error !='')
    {
      $this->session->set_flashdata("errors",$error);
      redirect("administrator/city/add_city");
    }
    else
    {
      $this->common_model->set_fields($data);
      $this->common_model->save("city");
      $this->session->set_flashdata("success","city add successfully");
      redirect("administrator/city/add_city");
    

    }
    
}     
  
public function delete_city($id)
  { 
    $this->common_model->remove("city",array("id"=>$id));
      $this->session->set_flashdata("success","City Deleted Successfully..");
    redirect("administrator/city/manage_city");
     
  } 

   public function update_city($id)
  {
    $config = array(            
             array(
                     'field'   => 'city_name',
                     'label'   => 'City Name',
                    ),
             );
      $fields =array('city_name');
    $data=$this->get_post_values($fields);
    $data['state_id']  = $this->input->post('state_id');
    $error=$this->required_field_advance_validation($config);
    
    if($error !='')
    {
      $this->session->set_flashdata("errors",$error);
      redirect("administrator/city/edit_city/".$id);
    }
    else
    {
      $this->common_model->set_fields($data);
      $this->common_model->updateData("city",array("id"=>$id));
      $this->session->set_flashdata("success","City Updated successfully");
      redirect("administrator/city/edit_city/".$id);
    

    }
    
  }
  public function save()
   {  $data  = array();
     $config = array(
              array(
                          'field'   => 'city_name', 
                          'label'   => 'City Name',
                          'rules'   => 'trim|required|is_unique[city.city_name]'

                       ),
                   );  
     $fields=array('state_id','city_name');
     $this->form_validation->set_rules($config);
     $data=$this->get_post_values($fields);
   
        
      if($this->form_validation->run() == FALSE)
    {
      
        $error = validation_errors();
        $this->session->set_flashdata('errors',$error);
        $this->session->set_flashdata('update_data',$data);
        redirect("administrator/city/add_city");
      
    }
    else
    {
      $mode = $this->input->post('mode');   
      if($mode=='add')
      {
        $this->common_model->set_fields($data);
        $this->common_model->save("city");
        $this->session->set_flashdata("success","City added successfully.");
        redirect("administrator/city/add_city");
      }
      else
      {
        $id = $this->input->post('id');
        $this->common_model->set_fields($data);
        $this->common_model->updateData("city",array("id"=>$id));
        $this->session->set_flashdata( "success", "City updated successfully.");
        redirect('administrator/city/edit_city/'.$id);
      }
    }
   } 




}
?>