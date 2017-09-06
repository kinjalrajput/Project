<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
	Date 				: 25/12/2013
	Developed By 	: Er. Ronak Amlani
	About Class		: This class will helps to develop master template concept easily
	Class	purpose	: This class contain most frequently usefull functions and template configuration,
						  This class will to helps achieve reuse concept.
						  
	How to use		:
			--For Beginner
						: step 1: Create new controller_name.php on application/controller
						  step 2: class Controller_name extends Template
						  step 3: //Template view call
						  			 $this->view('view_name',$data);
			--Upload Image
						: Just call upload_file()		 	 
			
*/


/********Base class..********/
class MY_Controller extends CI_Controller {

	public $_default_template_name = "template" ;

	//Initialize
	public function __construct()
	{
        	parent::__construct();
	}
}


/********Derived class..********/
class Template extends MY_Controller {

	protected $_title			= "";
	protected $_footer		= array();
	protected $_header		= array();
	protected $_footer_path = "blocks/footer";
	protected $_header_path	="blocks/header";

	public function __construct()
	{
    	parent::__construct();
		
		$this->load->library ('parser');
		$this->load->library ('assets_load');
		$this->load->helper  ('message');
				
		$this->_title = $this->config->item("site_name");
	}

	/* <optional>	Set browser Title*/
	public function set_title($title)	
	{
		if ( $title != '' )
		{
			$this->_title	= $title." | ".$this->config->item("site_name");
			//$this->_title	= $title;
		}
	}
	
	/* <optional>	Set Another Template*/
	public function set_template($template_name)	
	{
		if ( $template_name != '' )
		{
			$this->_default_template_name	= $template_name;
		}
	}

	/* <optional>	Set another Footer*/
	public function set_footer_path ( $footer_path )
	{
		$this->_footer_path = $footer_path;
	}

	/*	<optional> Set Footer */
	public function set_footer ( $footer )
	{
		$this->_footer	= $footer;
	}
	
	
	
	/* <optional>	Set Header*/
	public function set_header_path ( $header_path )
	{
		$this->_header_path = $header_path;
	}

	/*	<optional> Set Header */
	public function set_header ( $header )
	{
		$this->_header	= $header;
	}
	
	
	

	/* use this file for insert content on view
	*/
	public function view( $view_file_name, $data = array() )
	{
			
		$template_data = array();
		$template_data ['title'] 	= $this->_title;
		$template_data ["header"] 	= $this->load->view( $this->_header_path, array_merge( $data, $template_data ),TRUE );
		$template_data ["content"] = $this->load->view( $view_file_name, array_merge( $data, $template_data ),TRUE );
		$template_data ['footer'] 	= $this->load->view ( $this->_footer_path, $this->_footer,TRUE );
					
		
		$this->parser->parse( $this->_default_template_name, $template_data );
	}
	
	
	/*
	* --Upload Image--
		arguments 
			1) Field name
			2) Upload path
	*/	
	public function upload_image($field_name,$file_clone_path = '/uploads/')
	{
		return $this->file_upload( $field_name, 'gif|jpg|png', $file_clone_path );
	} 
	
	public function get_post_values($keys)
	{
		$returnArray = array();
		foreach( $keys as $k => $field )
		{
			$returnArray[$field] = xss_clean( trim($this->input->post($field)) );
		}
		return $returnArray;
	} 
	
	//check and return 
	public function is_session_active( $redirect_enable = false )
	{
		
		if ( ! $this->session->userdata('id')  )
		{
			if ( $redirect_enable )
				redirect('');
			return false;
		}	
		return $this->session->userdata('id');
	}
	
	public function encrypt( $password )
	{
		//$str = do_hash($str); // SHA1
		
		return do_hash($password, 'SHA1'); // MD5 	
	} 
	
	/*-----Upload Other file----
			arguments 
					1) Field name
					2) Upload path
	*/	
	public function upload_file($field_name,$file_clone_path = '/uploads/')
	{
		return $this->file_upload( $field_name, 'txt|pdf|doc', $file_clone_path );
	} 

	//After logout use this function to clear cache	
	public function clear_cache()
	{
		//$this->cache->clean();
		$this->db->cache_delete_all();
		
		header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");	
	}
		
	/*
	* Function for upload any types of file 
	*/
	private function file_upload( $field_name, $allowed_type='gif|jpg|png' ,$file_clone_path = '/uploads/' )
	{
		//Initailize
		$config['upload_path'] = $file_clone_path;
		$config['allowed_types'] = $allowed_type;
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		//Assign file name
		if ( $this->get_file_name ( $field_name ) )
		{
			$config ['file_name']  = $this->get_file_name ( $field_name ) ; 
		}
		return 	array("status"=>"404");	
		
		$this->load->library('upload', $config);

		//Uploading process
		if ( ! $this->upload->do_upload($field_name) ) //File upload fail
		{
			$error = array('error' => $this->upload->display_errors());

			return array_merge( array("status"=>"500"), $error );
		}
		else		//File upload success
		{
			return array_merge( array("status"=>"200"), $error );
			return $this->upload->data();
		}	
	}
	
	
	public function required_field(  $fields,$all=false )
	{
		$error = '';
		foreach( $fields as $field )
		{
				if ( trim( $this->input->post($field) )=='' )
				{
					$error = "<div>".$field ." field is required. </div>";
					if ( $all == false )
						break;
				} 			
		}	
		return $error;
	}
	
	/*
		Validation like codeigniter
		$config = array(
               array(
                     'field'   => 'username', 
                     'label'   => 'Username', 
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => 'Password', 
                  )
                 );	
	*/	
	
	public function required_field_advance_validation(  $fields, $pre_msg='', $post_msg=' is required.' )
	{
		//print_r( $fields ); 
		$error = '';
		foreach( $fields as $field )
		{
				//print_r( $field['field'] ); 
				if ( trim( $this->input->post( $field['field']  ) ) =='' )
				{
					$error .= "<div>".$pre_msg.$field['label'] .$post_msg."</div>";
				}			
		}
	
		return $error;

	}

	/*Get current path*/
	
	public function get_current_url()
	{
		$protocol 		= ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		//$server_name 	= $_SERVER['HTTP_HOST'].'/'.ltrim($_SERVER['REQUEST_URI'], '/');
		$server_name 	= ltrim($_SERVER['REQUEST_URI'], '/');
		return 	($protocol.$server_name);
	}	
	
	
	/*
	* File name Generator  	
	*/
	private function get_file_name ( $field_name )
	{
		//$ext = end(explode(".", $_FILES [ $field_name ] ['name']));
		if( !file_exists( $_FILES[$field_name] ['tmp_name']) || !is_uploaded_file ( $_FILES[$field_name]['tmp_name']) )
		{
			return false;
		}
		return rand(0000,1111).$_FILES [ $field_name ] ['name'];	
	}

}

