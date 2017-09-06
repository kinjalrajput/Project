<?php if(!defined('BASEPATH'))
		exit('No direct script access allowed');
class Users extends Template
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('file_uploader');
		$this->load->model('users_list_model');
		
		if ( !$this->session->userdata("id") )
		{
			redirect('users/authentication/login');
		}
		$this->load->model('common_model'); 
		$this->load->model('admin_model');
		$this->load->model('users_model');
		$this->set_header_path('blocks/header');
      	$this->set_footer_path('blocks/footer');
	}
	
	public function index()
	{
		//redirect('admin/users/all');
	}
	public function do_user_delete($id)
	{
		$data = array();
		$path = './assets/upload/users/';
		$image = $this->users_list_model->get_user_image($id);
		@unlink($path.$image['image']);
		$this->users_list_model->delete_user_msg($id);
		$this->common_model->remove("users",array("id"=>$id));
		$this->session->set_flashdata("success",get_message("user_deleted"));
		redirect("admin/users/all");
	}
	public function display_user($id)
	{
		$data = array();
		$data["userinfo"] = $this->users_list_model->get_user($id);
		$this->view('admin/user_view',$data);
	}
	public function do_active($id)
	{
		$this->users_list_model->updateActiveDeactive('active',$id);
		$str = '<a href="javascript:void(0)" onclick="changeStatus('.$id.',1)" >'.
			'<img src="../../assets/icons/inactive.png" />'.
			'</a>';
		echo "User activate successfully.*".$str;
		//$this->session->set_flashdata("success",get_message("user_active"));
		//redirect("admin/users/all");
	}
	public function do_deactive($id)
	{
		$this->users_list_model->updateActiveDeactive('deactive',$id);
		$str = '<a href="javascript:void(0)" onclick="changeStatus('.$id.',0)" >'.
			'<img src="../../assets/icons/active.png" />'.
			'</a>';
		echo "User Deactivate successfully.*".$str;
		//$this->session->set_flashdata("success",get_message("user_deactive"));
		//redirect("admin/users/all");
	}
	public function all()
	{
		$data = array();
		$userinfo					=$this->users_list_model->get_user_list();
		$data['userinfo']			=$userinfo['results'];
		$data['pages']				=$userinfo['links'];
		$data['link_description']	=$userinfo['link_description'];
		
		$this->view("admin/users_listing",$data);
	}
	public function deleteAll()
	{
		if($_POST['chk'] != '')
		{
			foreach($_POST['chk'] as $chk)
			{
				$this->common_model->remove("users",array("id"=>$chk));
			}
		}
		$this->session->set_flashdata("success","Deleted.");
		redirect("admin/users/all");
	}
}
?>