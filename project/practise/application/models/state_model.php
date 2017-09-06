<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class State_model extends MY_Generic_Model
{
  //initialize
   public function __construct()
   {
        parent::__construct();
        //$this->load->library("pagination");
   }
  public function get_state()
	  	{	
	  		$query  = "SELECT * FROM ".$this->tables["state"]."";
			$result = $this->query($query);
		
			if ( $result->num_rows > 0)
			{
				return $result->result_array();	
			}
			return false;
	  	}
	public function get_statedetail($id)
	  	{	
	  		$query  = "SELECT id,country_id,state_name FROM ".$this->tables["state"]." WHERE id='".$id."'";
			$result = $this->query($query);
		    if ( $result->num_rows > 0)
			{
				return $result->row_array();	
			}

			return false;
	  	}
}
?>