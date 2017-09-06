<?php   if (!defined('BASEPATH')) exit('No direct script access allowed');
	 class Users_model extends MY_Generic_Model{
	  
	  //initialize
	  
	  	public function __construct()
	  	{
		  	parent::__construct();
	  	
	  	}

		public function get_dt_users()
		{
			if ( $this->data['order_by']  == '')
			{
				$query 			= "SELECT `id`, `user_name`, `first_name`, `last_name`, `email`, `status` FROM ".$this->tables ["users"]." WHERE  1=1  ".$this->data['search_text']." LIMIT ".$this->data['limit_start'].",".$this->data['limit_length']." ";
				$query_count 	= "SELECT COUNT(id) as total FROM ".$this->tables ["users"]."  WHERE 1=1  ".$this->data['search_text'];
		
			}
			else
			{
				$query 			= "SELECT `id`, `user_name`, `first_name`, `last_name`, `email`, `status` FROM ".$this->tables ["users"]."  WHERE 1=1  ".$this->data['search_text']."  ORDER BY ".$this->data['order_by']." LIMIT ".$this->data['limit_start'].",".$this->data['limit_length']." ";
				$query_count 	= "SELECT COUNT(id) as total FROM ".$this->tables ["users"]."  WHERE 1=1  ".$this->data['search_text'];

			}
			/*echo $query;
			header("HTTP/1.0 500 Internal Server Error"); die;*/	
		
			$result = $this->query_result($query);
		
			$total  = $this->query_result($query_count);			
		
			return array('total'=>$total[0]->total,"result"=>$result) ;
		}
		
		
		
	
}