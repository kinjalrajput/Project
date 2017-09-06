<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class City_model extends MY_Generic_Model
{
  //initialize
   public function __construct()
   {
        parent::__construct();
        //$this->load->library("pagination");
   }
  public function get_city()
	  	{	
	  		$query  = "SELECT * FROM ".$this->tables["city"]."";
			$result = $this->query($query);
		
			if ( $result->num_rows > 0)
			{
				return $result->result_array();	
			}
			return false;
	  	}

	public function get_citydetail($id)
	  	{	
	  		$query  = "SELECT id,state_id,city_name FROM ".$this->tables["city"]." WHERE id='".$id."'";
			$result = $this->query($query);
		    if ( $result->num_rows > 0)
			{
				return $result->row_array();	
			}

			return false;
	  	}
	
}
?>