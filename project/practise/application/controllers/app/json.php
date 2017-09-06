<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {
	
	public function __construct()
	{
      parent::__construct();
	  	header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
		$this->load->helper('form');
		$this->load->library('file_uploader');
		$this->load->model("common_model");
		$this->load->model("user_model");
		  
	}

 public function required_field( $json, $fields )
		{ 
			$error = '';
			foreach( $fields as $field )
			{
				if ( trim( $json [$field] )=='' )
				{
					$error = str_replace("_", " ", $field . " is required.");
					break;		
				} 			
			}	
			return $error;
		}

public function do_register()
	{
		$reuturnArray = array();
		$json = json_decode(file_get_contents("php://input"),true);
	   	$json = $_REQUEST;
		
		$fields=array('first_name','last_name','user_name','password','email','contact','gender','language','country');
		$data=$this->get_post_values($json,$fields);
		$error =$this->required_field( $json, $fields );

			if ( $error !='' )
			{
				$reuturnArray['success'] = "no";
		   	 	$reuturnArray['message'] = $error;
		   	 	$reuturnArray['data'] 	= array();
				echo json_encode($reuturnArray,true);
				exit;	
			}
			else
			{
                $check = $this->user_model->check_user_name($data['user_name'],$data['email']);
			
			    if($check)
			    {
				   $reuturnArray['success'] = "no";
				   $reuturnArray['message'] = "User name or email address already exists.";
				   $reuturnArray['data'] = array();
				   echo json_encode($reuturnArray,true);
				   exit;
			    }

				$file_name = 'kinju.jpg';
		
				/*if($_FILES['image']['name'] != "")
				{
					$file_name = rand(111,999)."-".$_FILES['image']['name'];

					$path = './upload/';

					move_uploaded_file($_FILES['image']['tmp_name'], $path.$file_name);
				}*/
				$data["password"] = hash("SHA512", $data["password"]);
				$data['image'] = $file_name;
				$this->common_model->set_fields($data);
				//print_r($json); exit;
				$success=$this->common_model->save("users");	
		  
			   if($success)
			   {

			   	 $data = array();
			   	 
			   	 $reuturnArray['success']  = "yes";
			   	 $reuturnArray['message']  = "save successfully..";
			   	 $reuturnArray['data']	 = $json;

			   	 echo json_encode($reuturnArray);
			   	 exit;
			   }
			   else
			   {
			   		$reuturnArray['success'] = "no";
			   	 	$reuturnArray['message'] = "No record found";
			   	 	$reuturnArray['data'] 	= array();

			   	 	echo json_encode($reuturnArray,true);
			   	 	exit;
			   }
			}

	}
	public function update_user()
	{

		$reuturnArray = array();
		$json = json_decode(file_get_contents("php://input"),true);
	   	$json = $_REQUEST;
		
	}

	public function get_userinfo()
		{
			    $reuturnArray = array();
				$json = json_decode(file_get_contents("php://input"),true);
	   			$json = $_REQUEST;

			 	$user_data = $this->user_model->user_profile($json['id']);
			   if($user_data)
			  {
			   	 $reuturnArray['success'] = "yes";
			   	 $reuturnArray['message'] = "User information";
			   	 $reuturnArray['data'] = $user_data;

			   	 echo json_encode($reuturnArray);
			   	 exit;
			   }
			   else
			   {
			   		$reuturnArray['success'] = "no";
			   	 	$reuturnArray['message'] = "No record found";
			   	 	$reuturnArray['data'] = array();

			   	 	echo json_encode($reuturnArray,true);
			   	 	exit;
			   }
		}
		public function get_usersinfo()
		{
			    $reuturnArray = array();
				
				$json = json_decode(file_get_contents("php://input"),true);
	   			$json = $_REQUEST;

			 	$user_data = $this->user_model->get_users();
			   if($user_data)
			   {
			 	 $reuturnArray['success'] = "yes";
			   	 $reuturnArray['message'] = "";
			   	 $reuturnArray['data'] = $user_data;

			   	 echo json_encode($reuturnArray);
			   	 exit;
			   }
			   else
			   {
			   		$reuturnArray['success'] = "no";
			   	 	$reuturnArray['message'] = "No record found";
			   	 	$reuturnArray['data'] = array();

			   	 	echo json_encode($reuturnArray,true);
			   	 	exit;
			   }
		}

	public function update_profile()
	{
		$reuturnArray = array();
		$json = json_decode(file_get_contents("php://input"),true);
   		$json = $_REQUEST;
		$fields = array ('id','first_name','last_name','user_name','password','email','contact','gender','language','country');
		$data=$this->get_post_values($json,$fields);
		
		$error = $this->required_field( $json, $fields );
		
		if ( $error !='' )
		{
			$reuturnArray['success'] = "no";
		   	$reuturnArray['message'] = $error;
		   	$reuturnArray['data'] = array();
			echo json_encode($reuturnArray,true);
			exit;	
		}
		else
		{	
			$check = $this->user_model->check_user_name($data['user_name'],$data['email']);
			
			    if($check)
			    {
				   $reuturnArray['success'] = "no";
				   $reuturnArray['message'] = "User name or email address already exists.";
				   $reuturnArray['data'] = array();
				   echo json_encode($reuturnArray,true);
				   exit;
			    }

	       		
			$file_name = 'kinju.jpg';
		
				
			$data['image'] = $file_name;
			$this->common_model->set_fields($data);
				

			//$this->common_model->set_fields( $json );
			//$id=$this->session->userdata("id");
			$this->common_model->updateData("users",array("id"=>$json['id']));
			
				$reuturnArray['success'] = "success";
		   	 	$reuturnArray['message'] = "Updated.";
		   	 	$reuturnArray['data'] = $data;
				echo json_encode($reuturnArray,true);
				exit;
			
		}		
	}
	public function delete()
	{
		$reuturnArray = array();
		$json = json_decode(file_get_contents("php://input"),true);
   		$json = $_REQUEST;
		
		$fields = array ("id");
		$error = $this->required_field( $json, $fields );
		
		if ( $error !='' )
		{
			$reuturnArray['success'] = "no";
		   	$reuturnArray['message'] = $error;
		   	$reuturnArray['data'] = array();
			echo json_encode($reuturnArray,true);
			exit;	
		}
		else
		{
			$this->common_model->set_fields( $json );
			$this->common_model->remove("users",array("id"=>$json['id']));
			
			if($json['id'])
			{
				$reuturnArray['success'] = "yes";

		   		$reuturnArray['message'] = "Delete success.";
		   		$reuturnArray['data'] = $json;
				echo json_encode($reuturnArray,true);
				exit;
			}
			else
			{
				$reuturnArray['success'] = "no";
		   	 	$reuturnArray['message'] = "Delete failed.";
		   	 	$reuturnArray['data'] = array();
				echo json_encode($reuturnArray,true);
				exit;
			}
			
		}
			
	}	


//get post vailue 
	public function get_post_values( $json, $keys )
	{
		$returnArray = array();
		foreach( $keys as $k => $field )
		{
			$returnArray[$field] = $this->security->xss_clean($json[$field]);
		}
		return $returnArray;
	}
	
}

?>