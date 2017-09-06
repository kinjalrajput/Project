<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users_list_model extends MY_Generic_Model
{
	//initialize
   public function __construct()
   {
		  parent::__construct();
		  	//$this->load->library("pagination");
   }
   public function get_user_image($id)
   {
   		$query  = "SELECT image FROM ".$this->tables["users"]." WHERE id = '".$id."'";
		//echo $query;
		$result = $this->query($query);
		
		if ( $result->num_rows > 0)
		{
			return $result->row_array();	
		}
		return false;
   }
   	public function get_user($id)
	{
		$query  = "SELECT * FROM ".$this->tables["users"]." WHERE id = '".$id."'";
		//echo $query;
		$result = $this->query($query);
		
		if ( $result->num_rows > 0)
		{
			return $result->row_array();	
		}
		return false;
	}
	public function updateActiveDeactive($status,$id)
	{
		$query = "UPDATE ".$this->tables["users"]." SET status = '".$status."' WHERE id = '".$id."'";
		$this->query($query);
	}
	public function get_user_list()
	{
		$this->load->library("pagination");
		$this->load->library('model_pagination');
				
		$fields ="id,user_name, first_name, last_name, email,status, DATE_FORMAT(date, '%d %M,%Y %h:%i %p') as date";
			
		$where = '';
		$searchText = $this->input->post('search');
		$searchArray = explode(" ", $searchText);
		if(count($searchArray) > 0)
		{
			$where .= " Where (";
			for($i = 0; $i < count($searchArray); $i++)
			{
				if($i == 0)
				{
					$where .= "first_name LIKE '".$searchArray[$i].
								"%' OR last_name LIKE '".$searchArray[$i].
								"%' OR user_name LIKE '".$searchArray[$i]."%' ";
				}
				else
				{
					$where .= " OR first_name LIKE '".$searchArray[$i].
								"%' OR last_name LIKE '".$searchArray[$i].
								"%' OR user_name LIKE '".$searchArray[$i]."%'";
				}
			}
			$where .= ")";
		}
		else
		{
			$where .= " Where (first_name LIKE '".$searchText.
						"%' OR last_name LIKE '".$searchText.
						"%' OR user_name LIKE '".$searchText."%' )";
		}
		$other   = " $where ORDER BY id DESC ";
		
		//echo $where; exit;
		$table_name = $this->tables ["users"];
		$this->model_pagination->set_prev_link
	
		("<span>","</span>","<small>&lt;&lt;</small>Previous");
		$this->model_pagination->set_next_link("<span>","</span>"," 
	
		Next<small>&gt;&gt;</small>");
		$this->model_pagination->set_ref($this);
				
		$this->model_pagination->set_per_page(2);
		$this->model_pagination->set_uri_segment("4");
		return  $this->model_pagination->query_pagination(base_url()."administrator/user/all/", $fields, $table_name, $other);
	}
	public function delete_user_msg($id)
	{
		$query  = "DELETE FROM ".$this->tables["message"]." WHERE send_id = '".$id."'";
		//echo $query;
		$result = $this->query($query);
		
		if ( $result->num_rows > 0)
		{
			return $result->result_array();	
		}
		return array();
	}
}
?>