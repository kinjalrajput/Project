<?php if(!defined('BASEPATH')) 
	 	echo 'No direct Script access allowed';
	 
class Album extends Template
{
	public function __construct()
	 {
      parent::__construct();
     
      $this->load->model('common_model');
	  $this->load->model('user_model');
	  $this->load->model('album_model');
      $this->load->library('form_validation');
	 
	}
	public function index()
	{	
		
	}
	public function albummanagement()
	{
		$data=array();
		$this->view("authentication/album_management");
	}
	public function view_image($id)
	{
		$data=array();
		$data['row'] =$this->album_model->get_image($id);
		$this->view("authentication/view_image",$data);
	}
	 public function add_gallery()
	{
		$data  = array();
		$data['info'] = $this->album_model->get_album();
		$this->view("authentication/gallery",$data);
		
	}
	public function view_album()
	{
		$data  = array();
		$data['album'] = $this->album_model->get_album();
		$this->view("authentication/view_album",$data);
		
	}
	 public function add_album()
	{
		$data  = array();
		$data['row'] = $this->session->flashdata('row');
		$this->view("authentication/album",$data);
		
	}

	public function do_album()
	{
		$config=array(
					array(
							'field'=>'album_name',
							'label'=>'Album Name'
						),
						
		);
		$fields=array('album_name','image');
		$data=$this->get_post_values($fields);
		$error=$this->required_field_advance_validation($config);
		
		if($error !='')
		{
			$this->session->set_flashdata("errors",$error);
			redirect("album/add_album");
		}
		else
		{
			if (array_key_exists("image", $_FILES) && $_FILES['image']["name"] != '') //validate image
			{
				
			$data['user_id'] = $this->session->userdata('user_id');	
			$file = $_FILES['image']["name"]; 
			$path = './assets/upload/album/';
			$data['image']=$file;		
				
			$this->file_uploader->set_default_upload_path($path);
						 
						$client_image_ref = $this->file_uploader->upload_image('image'); //returned path
					 	 // print_r($client_image_ref); exit;
						if ($client_image_ref["status"] == 200)
						{
							$client_image = $client_image_ref["data"]; 
							if($this->input->post('old_image') != "")
							{
								@unlink($path.$this->input->post('old_image'));	
							}
							$this->load->library('image_lib');
							$config_manip = array(
									'image_library' =>'gd2',
									'library_path'  => '/usr/X11R6/bin/',
									'source_image'  => $path.$client_image,
									'new_image'     => $path.$client_image,
									'maintain_ratio'=> FALSE ,
									'create_thumb'  => FALSE ,
									'width'         => 150,
									'height'        => 100,
									);
								
							   $this->image_lib->initialize($config_manip);
							   $this->image_lib->resize();
							   $this->image_lib->display_errors();
							   $client_image = str_replace(' ','_',$client_image);
							   $data['image'] = $client_image;	
						}
			}
			$this->common_model->set_fields($data);
			$this->common_model->save("album");
			$this->session->set_flashdata("success",get_message("album_created"));
			redirect("album/add_album");
		}


	}


	public function do_gallery()
	{
		$config = array(
						array(
							'field'=>'album_id',
							'label'=>'Album Name'
							),
						);
		$field = array('album_id');
		$data = $this->get_post_values($field);
		//print_r($data); exit;
		if($data['album_id'] == '' && $data['image'] == '')
		{
				$this->session->set_flashdata("errors",get_message("empty_album"));
		}
		if (array_key_exists("image", $_FILES) && $_FILES['image']["name"] != '')
				{
					$file = $_FILES['image']["name"]; 
					$path = './assets/upload/gallery/';
					$this->file_uploader->set_default_upload_path($path);	 
					$image_ref = $this->file_uploader->file_multi_upload('image');
					if($image_ref['status']== 200)
					{
						foreach($image_ref['data'] as $img)
						{

							$data['image'] = $img;
							$data['user_id'] = $this->session->userdata("user_id");
							$this->common_model->set_fields($data);
							$this->common_model->save("gallery");	
						}
						$this->session->set_flashdata("success",get_message("image") );
					}
					else
					{
						$this->session->set_flashdata("errors",get_message("upload_fail"));
							
					}
				}
			redirect("album/add_gallery");
		}   
	
	public function delete_album($id)
	{	
		$image = $this->album_model->get_albumimage($id);
		$path='./assets/upload/album/';
		@unlink($path.$image['image']);
		$gallery = $this->album_model->get_gallery($id);
		if($gallery)
		{
			$path1 = './assets/upload/gallery/';
			foreach($gallery as $image)
			{
				@unlink($path1.$image['image']);
				$this->common_model->remove("get_gallery",array("id"=>$image['id']));	
			}
		}
		$this->common_model->remove("album",array("id"=>$id));
	    $this->session->set_flashdata("success","Album Deleted Successfully..");
		redirect("album/view_album");		
	}

	public function delete_image($id)
	{	
		$image = $this->album_model->get_galleryimage($id);
 
		$path='./assets/upload/gallery/';
		@unlink($path.$image['image']);
		$this->common_model->remove("gallery",array("id"=>$id));
	    $this->session->set_flashdata("success","Album Image Deleted Successfully..");
		redirect("album/view_album");

		
	}
	

}

?>