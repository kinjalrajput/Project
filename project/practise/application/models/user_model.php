<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends MY_Generic_Model
{
	//initialize
   public function __construct()
   {
		  	parent::__construct();
		  	//$this->load->library("pagination");
   }
	
	 /*  check user name and password and email for login
	 @param string
    @return array*/
	public function login( )
	{
		$query  = "SELECT id as user_id,user_name,password FROM ".$this->tables["users"]." WHERE user_name='".$this->data["user_name"]."' AND password='".$this->data["password"]."' ";
		$result = $this->query($query);
		
		if ( $result->num_rows > 0 )
		{
			return $result->row_array();
		}
		return array();		
	}
	public function get_user()
	{
		$query  = "SELECT * FROM ".$this->tables["users"]." WHERE id='".$this->session->userdata('user_id')."'";
		$result = $this->query($query);
		if ( $result->num_rows > 0)
		{
			return $result->row_array();	
		}
		return false;
	}
	
	public function getuser($id)
	{
		$query  = "SELECT * FROM ".$this->tables["users"]." WHERE id='".$id."'";
		$result = $this->query($query);
		if ( $result->num_rows > 0)
		{
			return $result->row_array();	
		}
		return false;
	}
	public function user_profile($id)
	{
		$query  = "SELECT * FROM ".$this->tables["users"]." WHERE id='".$id."'";
		$result = $this->query($query);
		if ( $result->num_rows > 0)
		{
			return $result->row_array();	
		}
		return false;
	}
	public function get_users()
	{
		$query  = "SELECT * FROM users";
		$result = $this->query($query);
		if ( $result->num_rows > 0)
		{
			return $result->result_array();	
		}
		return false;
	}
	public function check_user_name($name,$email)
	{
		$query = "SELECT * FROM ".$this->tables["users"]." WHERE user_name = '".$name."' OR email = '".$email."'";
		$result = $this->query($query);
		if($result->num_rows > 0)
		{
			return $result->row_array();
		}
		return array();
	}
	
}