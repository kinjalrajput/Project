<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Admin_conversation_model extends  MY_Generic_Model  
{
	public function __construct()
	{
      parent::__construct();
    }
	public function index()
	{			
	}

	public function get_user()
	{
		$query  = "SELECT id,user_name FROM ".$this->tables["users"]." Where id != '".$this->session->userdata('admin_id')."' ";
		$result = $this->query($query);
		//print_r($result); exit;
		if ( $result->num_rows > 0)
		{
			return $result->result_array();	
		}
		return false;
	}
	public function get_message()
	{
		$query = "Select * From user_conversation";
		
		$result = $this->query($query);
		//print_r($result); exit;
		if ( $result->num_rows > 0)
		{
			return $result->result_array();	
		}
		return false;
	}
	public function show_message($id)
	{
		$query = "SELECT * FROM ".$this->tables["user_conversation"]." WHERE receive_id = '".$id."' OR send_id = '".$id."' ";
		
		$result = $this->query($query);
		
		if($result ->num_rows > 0 )
		{
			return $result->result_array();
		}
		return false;
	}

	public function get_user_message($id)
	{
		$query= "SELECT * FROM ".$this->tables["user_conversation"]." WHERE send_id='".$id."' OR receive_id='".$id."'";
	 	$result = $this->query($query);
		
		if($result->num_rows > 0)
		{
			$row = $result->result_array();
			$returnArray = array();
			$i=0;
			foreach($row  as $rs)
			{
				$returnArray[$i] = $rs;
				if($rs['send_id'] == 0)
				{
					$returnArray[$i]['user_name'] = "Admin";
				}
				else
				{
					$Query = "Select user_name From ".$this->tables['users']." Where id='".$rs['send_id']."'";
					
					$res = $this->query($Query);
					if($res->num_rows > 0)
					{
						$row1 = $res->row_array();
						$returnArray[$i]['user_name'] = $row1['user_name'];
					}
					else
					{
						$returnArray[$i]['user_name'] = NULL;
					} 
				}
				$i++;
			}
			
			return $returnArray;
			
		} 
		else
		{
			return false;
		}
	}
	public function get_lastmsg()
	{
		$query = "SELECT send_id,message,date FROM ".$this->tables["user_conversation"].
	   " where id IN(select MAX(id) from user_conversation group by receive_id,send_id) AND receive_id = 0";
		
		$result = $this->query($query);
		
		if($result ->num_rows > 0 )
		{
			return $result->result_array();
		}
		return false;
		
	}
	
}
	?>