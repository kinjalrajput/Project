<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('user_model');
	 	}


	public function index()
	{

		$data['users']=$this->user_model->get_all_users();
		$this->load->view('user_view',$data);
	}
	public function user_add()
		{
			$data = array(
					'user_name' => $this->input->post('user_name'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
					
				);
			$insert = $this->user_model->user_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id)
		{
			$data = $this->user_model->get_by_id($id);



			echo json_encode($data);
		}

		public function user_update()
	{
		$data = array(
				'user_name' => $this->input->post('user_name'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				
			);
		$this->user_model->user_update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function user_delete($id)
	{
		$this->user_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}



}
