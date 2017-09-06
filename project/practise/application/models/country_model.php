<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Country_model extends MY_Generic_Model
{
  //initialize
   public function __construct()
   {
        parent::__construct();
        //$this->load->library("pagination");
   }

   public function get_dt_country()
		{
			if ( $this->data['order_by']  == '')
			{
	$query = "SELECT c.country_name,s.state_name from state  s right join country  c on s.country_id=c.id ".$this->data['search_text']." LIMIT ".$this->data['limit_start'].",".$this->data['limit_length']." "; 
				$query_count 	= "SELECT COUNT(c.id)  as total FROM country c";  
		
			}
			else
			{
				$query 			= "SELECT c.country_name,s.state_name from state  s right join country c on s.country_id=country.id  ".$this->data['search_text']."  ORDER BY ".$this->data['order_by']." LIMIT ".$this->data['limit_start'].",".$this->data['limit_length']." ";
				$query_count 	= "SELECT COUNT(c.id) as total FROM country c";  

			}
			/*echo $query;
			header("HTTP/1.0 500 Internal Server Error"); die;*/	
		
			$result = $this->query_result($query);
		
			$total  = $this->query_result($query_count);			
		
			return array('total'=>$total[0]->total,"result"=>$result) ;
		}
		
  public function get_country()
	  	{	
	  		$query  = "SELECT * FROM ".$this->tables["country"]."";
			$result = $this->query($query);
		
			if ( $result->num_rows > 0)
			{
				return $result->result_array();	
			}
			return false;
	  	}
 public function get_countrydetail($id)
	  	{	
	  		$query  = "SELECT id,country_name FROM ".$this->tables["country"]." WHERE id='".$id."'";
			$result = $this->query($query);
		    if ( $result->num_rows > 0)
			{
				return $result->row_array();	
			}

			return false;
	  	}
	
}
?>