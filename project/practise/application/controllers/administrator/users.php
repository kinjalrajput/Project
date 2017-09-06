<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Users extends Template
{
	public function __construct()
	{
      parent::__construct();
	  header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
      $this->load->helper('form');
	  $this->load->model("common_model");
      $this->load->library('file_uploader');
      $this->load->model('user_model');
	  $this->load->model('users_model');
	  $this->load->model('country_model');
	  $this->load->model('state_model');
     // $this->load->model("manage_model");
      $this->load->model('admin_model');
	  
	    $this->assets_load->add_css( base_url("assets/css/datatable/datatables.css"),"header" );
		$this->assets_load->add_css( base_url("assets/css/datatable/datatables.bootstrap.css"),"header" );
		$this->assets_load->add_js( base_url("assets/js/datatable/datatables.js"),"footer" );
		$this->assets_load->add_js( base_url("assets/js/datatable/datatables.bootstrap.js"),"footer" );
		
      $this->set_header_path('administrator/blocks/header');
      $this->set_footer_path('administrator/blocks/footer');   
	  //   $this->session->set_userdata("current_module","users_management");
   ///    if ( !$this->session->userdata("id") )
	//	{
	//		redirect('administrator/administrator/');
	//	} 
    }
	public function index()
	{		
		//redirect("administrator/users/dt_list");
	}

	public function user_list()
	{
		$data = array();
		$userinfo                  = $this->user_model->get_user_list();

		$data['userinfo']          = $userinfo['results'];
		$data["pages"]             = $userinfo["links"];		
		$data["link_description"]  = $userinfo["link_description"];		

		$this->view("administrator/user_list",$data);
	}
	
	public function user($id)
	{
		$data=array();
		$data['userinfo']=$this->user_model->getuser($id);
		$this->view("administrator/view_user",$data);
	}
    public function user1($id)
	{
		$data=array();
		$data['row']=$this->user_model->getuser($id);
		$this->view("administrator/users/view_user",$data);
	}
	
	public function auser($id)
	{
		$data=array();
		$data['userinfo']=$this->user_model->a_user($id);
		redirect("administrator/users/user_list");
	}
	public function duser($id)
	{
		$data=array();
		$data['userinfo']=$this->user_model->d_user($id);
		redirect("administrator/users/user_list");
	}
    public function auser1($id)
	{
		$data['status']=0;
		$this->common_model->set_fields($data);
        $this->common_model->updateData("users",array("id"=>$id));		
		redirect("administrator/users/listing");
	}
	public function duser1($id)
	{
	
		$data['status']=1;
		$this->common_model->set_fields($data);
        $this->common_model->updateData("users",array("id"=>$id));		
		redirect("administrator/users/listing");
	}
	
	public function delete()
	{
		$data=array();
		$data['userinfo']=$this->user_model->delete_user();
		redirect("administrator/users/user_list");
	}
	public function delete1()
	{
		if($_POST['chk']!= '')
		{
		  foreach($_POST['chk'] as $chk)
		  {
		  	  $this->common_model->remove("users", array('id'=> $chk ));
		  }
		  $this->session->set_flashdata("success","users deleted");
		  redirect("administrator/users/listing");
	    }
		
	}
	public function deleteuser($id)
	{
		$data=$this->common_model->remove("users",array("id"=>$id));
		if($data)
		{
				$this->session->set_flashdata("success",get_message("user_deleted"));
				redirect("administrator/users/user_list");
		}
	}
	public function deleteuser1($id)
	{
		$data=$this->common_model->remove("users",array("id"=>$id));
		if($data)
		{
				$this->session->set_flashdata("success",get_message("user_deleted"));
				redirect("administrator/users/listing");
		}
	}
	public function countrydetails()
	{
		$data = array();
		$userinfo                  = $this->manage_model->get_country_list();

		$data['countryinfo']          = $userinfo['results'];
		$data["pages"]             = $userinfo["links"];		
		$data["link_description"]  = $userinfo["link_description"];		

		$this->view("administrator/country_listing",$data);
	}
	/*--------------------------------------------------------------------------------------------------*/
	
	public function listing()
	{
		$this->assets_load->add_js(array(base_url('assets/js/vendors/users.js')),"footer");
		$this->set_title("Manage Users");
		$data = array();
		$data ["page_title"]		= "Manage Users";
		$this->view('administrator/users/listing',$data);
	}
	public function country_listing()
	{
		$this->assets_load->add_js(array(base_url('assets/js/vendors/country.js')),"footer");
		$this->set_title("Manage Country");
		$data = array();
		$data ["page_title"]		= "Manage Country";
		$this->view('administrator/users/country_listing',$data);
	}
	
	
	
	//get restaurants list view
	public function dt_list( $id = -1 )  
	{		
			
		   	$start_index 	= $this->input->get('iDisplayStart')!=null?xss_clean(trim($this->input->get('iDisplayStart'))):0;
			$end_index		= $this->input->get('iDisplayLength')?xss_clean(trim($this->input->get('iDisplayLength'))):10;		
			$search_text	= $this->input->get('sSearch')?xss_clean(trim($this->input->get('sSearch'))):''; 
			$sOrder 			= "";
			$aColumns		= array("id",'first_name','last_name','user_name',"status","email");
			$aColumns_where = array("id",'first_name','last_name',"user_name","status","email");
		
			if (  $this->input->get('iSortCol_0') !== FALSE )
			{		
				for ( $i=0 ; $i<intval( $this->input->get('iSortingCols') ) ; $i++ )
				{
					if ( $this->input->get( 'bSortable_'.intval($this->input->get('iSortCol_'.$i)) ) == "true" )
					{
						$sOrder .= $aColumns[ intval( ( $_GET['iSortCol_'.$i] ) ) ]."
						 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
					}
				}
				
				$sOrder = substr_replace( $sOrder, "", -2 );
			}
			
			//Filter multiple row
			$sWhere 	= " ";
			for ( $i=0 ; $i<count($aColumns_where) ; $i++ )
			{
				if ( isset($_GET['bSearchable_'.$i])  && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
				{
					if( $sWhere != '' )
					{
						$sWhere .= " AND ";
					}
					$sWhere .= $aColumns_where[$i]." = '".mysql_real_escape_string($_GET['sSearch_'.$i])."' ";
				}
			}
			
			if( isset($_GET['sSearch'])  )
			{					
				$sWhere .= ' AND ( ';	
				$or		= '';
				foreach( $aColumns_where as $row )
				{					
					$sWhere .= $or.$row." LIKE '%".$_GET['sSearch']."%'";
					if( $or == ''  )
					{
						$or 		= ' OR ';
					}
					
				}	
				$sWhere .= ')';
			}
			
			
			$this->users_model->set_fields(array('limit_start'=>$start_index,'limit_length'=>$end_index,'search_text'=>$sWhere,"order_by"=>$sOrder));		
		
				
		
			$user_info 	= $this->users_model->get_dt_users();
			
			$demo_results 		= $user_info['result'];
			$data					= array();
			$row_dt				= array();
			
			foreach( $demo_results as $row )
			{
					
					$row_dt   = array();
					$row_dt[] = '<input type="checkbox" id="chk" name="chk[]" class="case" value="'.$row->id.'">';
					
						
					$row_dt[] = $row->first_name;
					$row_dt[] = $row->last_name;
					$row_dt[] = $row->user_name;					
					if($row->email =="")
					{
						$row_dt[] = "-";
					}
					else
					{
						$row_dt[] = $row->email;
					}	
					
					if ( $row->status == 1 )
					{						
						$row_dt[]='<span class="active-btn">Inactive</span>';
					}
					else
					{
						$row_dt[]='<span class="deactive-btn">Active</span>';				
					}		
				    if($row->status==0)
					{
					$row_dt[] = '<a class="btn btn-effect-ripple btn-xs btn-success" title="Edit User" data-toggle="tooltip" href="'.base_url("administrator/users/user1/".$row->id).'" style="overflow: hidden; position: relative;margin-right: 6px;" data-original-title="Edit User">View</a>
					<a href="'.base_url("administrator/users/duser1/".$row->id).'" style="overflow: hidden; position: relative;margin-right: 6px;" data-original-title="Action">Inactive</a>
					 
					<a href="'.base_url("administrator/users/deleteuser1/".$row->id).'" title="Delete User" style="overflow: hidden; position: relative;" class="btn btn-effect-ripple btn-xs btn-danger deletebtn" id="remove">Delete</a>
					';
					} 
					else
					{
					$row_dt[] = '<a class="btn btn-effect-ripple btn-xs btn-success" title="Edit User" data-toggle="tooltip" href="'.base_url("administrator/users/user1/".$row->id).'" style="overflow: hidden; position: relative;margin-right: 6px;" data-original-title="Edit User">View</a>
					 <a href="'.base_url("administrator/users/auser1/".$row->id).'" style="overflow: hidden; position: relative;margin-right: 6px;" data-original-title="Action">Active</a>
					 <a href="'.base_url("administrator/users/deleteuser1/".$row->id).'" title="Delete User" style="overflow: hidden; position: relative;" class="btn btn-effect-ripple btn-xs btn-danger deletebtn" id="remove">Delete</a>
					';
					}
					     
				/*	if($row->status==0)
					{
					?>
                    <a href="<?php echo base_url("administrator/users/duser/".$row->id);?>">
                    <img src="<?php echo base_url('assets/icons/active.png'); ?>" ></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php 
							} else {
					?>
                    <a href="<?php echo base_url("administrator/users/auser/".$row->id);?>">
                    <img src="<?php echo base_url('assets/icons/inactive.png'); ?>" ></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <br />
                    <?php 
					}*/
				 
					$data[] = $row_dt;
					
			}

			$response['iTotalRecords'] 			= 7;
			$response['iTotalDisplayRecords'] 	= $user_info['total'];
			$response['aaData']					 	= $data;
			echo json_encode($response);
	}



	//<--  country data retrive.....-->//

	public function cdt_list( $id = -1 )  
	{		
			
		   	$start_index 	= $this->input->get('iDisplayStart')!=null?xss_clean(trim($this->input->get('iDisplayStart'))):0;
			$end_index		= $this->input->get('iDisplayLength')?xss_clean(trim($this->input->get('iDisplayLength'))):10;		
			$search_text	= $this->input->get('sSearch')?xss_clean(trim($this->input->get('sSearch'))):''; 
			$sOrder 			= "";
			$aColumns		= array("c.id",'c.country_name',"s.state_name");
			$aColumns_where = array("c.id",'c.country_name',"s.state_name");
		
			if (  $this->input->get('iSortCol_0') !== FALSE )
			{		
				for ( $i=0 ; $i<intval( $this->input->get('iSortingCols') ) ; $i++ )
				{
					if ( $this->input->get( 'bSortable_'.intval($this->input->get('iSortCol_'.$i)) ) == "true" )
					{
						$sOrder .= $aColumns[ intval( ( $_GET['iSortCol_'.$i] ) ) ]."
						 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
					}
				}
				
				$sOrder = substr_replace( $sOrder, "", -2 );
			}
			
			//Filter multiple row
			$sWhere 	= " ";
			for ( $i=0 ; $i<count($aColumns_where) ; $i++ )
			{
				if ( isset($_GET['bSearchable_'.$i])  && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
				{
					if( $sWhere != '' )
					{
						$sWhere .= " AND ";
					}
					$sWhere .= $aColumns_where[$i]." = '".mysql_real_escape_string($_GET['sSearch_'.$i])."' ";
				}
			}
			
			if( isset($_GET['sSearch'])  )
			{					
				$sWhere .= ' AND ( ';	
				$or		= '';
				foreach( $aColumns_where as $row )
				{					
					$sWhere .= $or.$row." LIKE '%".$_GET['sSearch']."%'";
					if( $or == ''  )
					{
						$or 		= ' OR ';
					}
					
				}	
				$sWhere .= ')';
			}
			
			
			$this->country_model->set_fields(array('limit_start'=>$start_index,'limit_length'=>$end_index,'search_text'=>$sWhere,"order_by"=>$sOrder));		
		
				
		
			$user_info 	= $this->country_model->get_dt_country();
			
			$demo_results 		= $user_info['result'];
			$data					= array();
			$row_dt				= array();
			
			foreach( $demo_results as $row )
			{
					
					$row_dt   = array();
					$row_dt[] = '<input type="checkbox" id="chk" name="chk[]" class="case" value="'.$row->id.'">';
					
						
					$row_dt[] = $row->country_name;
					$row_dt[] = $row->state_name;
					     
				/*	if($row->status==0)
					{
					?>
                    <a href="<?php echo base_url("administrator/users/duser/".$row->id);?>">
                    <img src="<?php echo base_url('assets/icons/active.png'); ?>" ></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php 
							} else {
					?>
                    <a href="<?php echo base_url("administrator/users/auser/".$row->id);?>">
                    <img src="<?php echo base_url('assets/icons/inactive.png'); ?>" ></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <br />
                    <?php 
					}*/
				 
					$data[] = $row_dt;
					
			}

			$response['iTotalRecords'] 			= 3;
			$response['iTotalDisplayRecords'] 	= $user_info['total'];
			$response['aaData']					 	= $data;
			echo json_encode($response);
	}

}
?>