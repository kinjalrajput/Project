<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends MY_Generic_Model
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
		$query  = "SELECT id,user_name,first_name,last_name,email,created_date FROM ".$this->tables["admin"]." WHERE user_name='".$this->data["user_name"]."' AND password='".$this->data["password"]."' ";
		$result = $this->query($query);
		
		if ( $result->num_rows > 0 )
		{
			return $result->row_array();
		}
		return array();		
	}	
	
	 /*  check user name 
	 @param string
    @return array*/
	public function login_secure( )
	{
		$query  = "SELECT id,user_name,first_name,last_name,email,created_date FROM ".$this->tables["admin"]." WHERE user_name='".$this->data["user_name"]."' AND password='".$this->data["password"]."' AND email = '".$this->data["email"]."'"; 
		$result = $this->query($query);
		
		if ( $result->num_rows > 0 )
		{
			return $result->row_array();
		}
		return array();		
	}
	
	 /* Update user profile 
	  @params userID string
    @return string*/
	public function update_profile( $where )
	{
		return $this->update( $this->tables["admin"],$this->data, $where );	
	}

	 /* Check email exists 
	  @params email string
    @return array*/
	public function is_email_id_exists()
	{
		$query  = "SELECT id,user_name,email,password FROM ".$this->tables["admin"]." WHERE email='".$this->data["email"]."'";
		$result = $this->query($query);
		
		if ( $result->num_rows > 0)
		{
			return $result->row();	
		}
		return false;
	}	
	
	 /* Check user exists or not
	 @params username string
    @return array*/
	public function is_user_exists( )
	{
		$query  = "SELECT id,email,password FROM ".$this->tables["admin"]." WHERE user_name='".$this->data["user_name"]."'";
		$result = $this->query($query);
		
		if ( $result->num_rows > 0)
		{
			return $result->row();	
		}
		return false;		
	}
	 /* Get admin information by admin id
	 @param string
    @return array*/
	public function admin_available( $id )
	{
		$query  = "SELECT id,password FROM ".$this->tables["admin"]." WHERE id='".$id."'";
		//echo $query;
		$result = $this->query($query);
		
		if ( $result->num_rows > 0)
		{
			return $result->row();	
		}
		return false;
	}
	 /* Get admin email
	   @return string*/
	public function get_admin_email_id()
	{
		$query  = "SELECT email FROM ".$this->tables["admin"];
		$result = $this->query( $query );
		
		if(  $result->num_rows > 0 )
		{
			$row = $result->row();
		
			return $row->email;				
		}
		
		return array();
		
	}	
	 /* Get admin information 
	 @params adminId integer
    @return array*/
	public function get_user( $id )
	{
		$query  = "SELECT * FROM ".$this->tables["admin"]." WHERE id='".$id."'";
		//echo $query;
		$result = $this->query($query);
		
		if ( $result->num_rows > 0)
		{
			return $result->row_array();	
		}
		return false;
	}
     /* Get admin information
	    @return array*/
    public function get_admin_data()
	{
		$query  = "SELECT * FROM ".$this->tables["admin"]." order by id desc limit 1";
		//echo $query;
		$result = $this->query($query);
		
		if ( $result->num_rows > 0)
		{
			return $result->row_array();
		}
		return false;
	}
	 /* Check Password for admin 
	 @params adminId integer and password stirng
    @return array*/
	public function password_check( $id , $password )
	{
		$query  = "SELECT id,password FROM ".$this->tables["admin"]." WHERE id='".$id."' AND password='".$password."'";
	  	$result = $this->query($query);
		
		if ( $result->num_rows > 0)
		{
			return $result->row();	
		}
		return false;
	}
	
	 /* Upadte admin password 
	 @params adminId integer
    @return string*/
	public function save_new_password( )
	{
			$data  = array(	"password" => $this->data["new_password"]);
			$where = array( "id" => $this->data["id"] );			
			
			$this->update( $this->tables["admin"],$data, $where );
			//echo $this->db->last_query(); 
			return true;
	}
	/**
	 * will update admin's password
	 * @params adminId integer
	 
	*/
	public function update_password($where)
	{
		$this->update($this->tables["admin"] ,$this->data,$where);
		return true;;
	}
}
?>