<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Country extends Template 
{
	public function __construct()
	 {
      parent::__construct();
     
      $this->load->model('common_model');
      $this->load->model('country_model');
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

	public function add_country()
	{
		$data=array();
		$data['mode'] = "add";
		$this->view("administrator/country",$data);
	}
	public function edit_country($id)
	{
		$data=array();
		$data['mode'] = "Update";
		$data['id']=$id;
		//$this->country_model->set_fields(array("id"=>$id));
		$data['countrydata']=$this->country_model->get_countrydetail($id);
		//print_r($data);exit;
		$this->view("administrator/country",$data);
	}
	public function manage_country()
	{
		$data=array();
		$data['countrydata']=$this->country_model->get_country();
		$this->view("administrator/country_management",$data);
	}
	public function save_country()
	{
		//Initialize data
		
		$config = array(
             array(
                     'field'   => 'country_name',
                     'label'   => 'Country Name',
                    ),
             );
        $fields =array('country_name');
		$data=$this->get_post_values($fields);
		$error=$this->required_field_advance_validation($config);
		
		if($error !='')
		{
			$this->session->set_flashdata("errors",$error);
			redirect("administrator/country/add_country");
		}
		else
		{
            $this->common_model->set_fields($data);
			$this->common_model->save("country");
			$this->session->set_flashdata("success","country update successfully");
			redirect("administrator/country/edit_country");
		

		}
		
       }
       public function delete_country($id)
	{	
		$this->common_model->remove("country",array("id"=>$id));
	    $this->session->set_flashdata("success","Country  Deleted Successfully..");
		redirect("administrator/country/manage_country");


	}
	public function update_country($id)
	{
		$config = array(
             array(
                     'field'   => 'country_name',
                     'label'   => 'Country Name',
                    ),
             );
        $fields =array('country_name');
		$data=$this->get_post_values($fields);
		$error=$this->required_field_advance_validation($config);
		
		if($error !='')
		{
			$this->session->set_flashdata("errors",$error);
			redirect("administrator/country/edit_country/".$id);
		}
		else
		{
            $this->common_model->set_fields($data);
			$this->common_model->updateData("country",array("id"=>$id));
			$this->session->set_flashdata("success","Country Updated successfully");
			redirect("administrator/country/edit_country/".$id);
		

		}
		
	}
	public function save()
	 {	$data  = array();
		 $config = array(
							array(
				                  'field'   => 'country_name', 
				                  'label'   => 'Country Name',
								  'rules'   => 'trim|required|is_unique[country.country_name]'

				               ),
				           );  
		 $fields=array('country_name');
		 $this->form_validation->set_rules($config);
 		 $data=$this->get_post_values($fields);
	 
				
	    if($this->form_validation->run() == FALSE)
		{
			
				$error = validation_errors();
				$this->session->set_flashdata('errors',$error);
				$this->session->set_flashdata('update_data',$data);
				redirect("administrator/country/add_country");
			
		}
		else
		{
			$mode = $this->input->post('mode');		
			if($mode=='add')
			{
				$this->common_model->set_fields($data);
				$this->common_model->save("country");
				$this->session->set_flashdata("success","Country added successfully.");
				redirect("administrator/country/add_country");
			}
			else
			{
				$id = $this->input->post('id');
				$this->common_model->set_fields($data);
				$this->common_model->updateData("country",array("id"=>$id));
				$this->session->set_flashdata( "success", "Country updated successfully.");
				redirect('administrator/country/edit_country/'.$id);
			}
		}
	 }
	 
}
?>