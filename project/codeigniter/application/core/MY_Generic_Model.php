<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/********Base class..********/
class MY_Generic_Model extends CI_Model
{
	
	protected 	$tables	;
	protected 	$data  ;	
	
	//Initialize
	public function __construct()
	{
        	parent::__construct();
			
			//initialize 
			$this->data		= array();
			$this->tables	= array(
										"admin"									=> "admin",
										"users"									=> "users",
										
									);  
	}
	
	//Fields setter
	public function set_fields($data)
	{
		$this->data = $data;
	} 
	 
	
	public function set_field($key,$value)
	{
		$this->data [$key] = $value ; 
	}
	
	public function update_fields($data)
	{
		foreach( $data as $key=>$value )
		{
			$this->data [$key] = $value ;
		}	
	}
	
	//Field getter
	public function get_field( $field_name )
	{
		if ( array_key_exists( $field_name, $this->data ) )
			return $this->data [ $field_name  ];
		return false;	
	}

	
	//insert query
	public function insert($table_name,$data)
	{
		$this->db->insert($table_name,$data);
		return $this->db->insert_id();
	}
	
	//update query
	public function update($table_name,$data,$where_arr)
	{
		$this->db->where($where_arr);
		//print_r($data);exit();
		$this->db->update($table_name,$data);
	}
	
	//Delete query
	public function delete ($table_name,$where_arr)
	{
		$this->db->where($where_arr);
		return $this->db->delete($table_name);
		
	}
	
	//Select query
	public function query($query)
	{
		return $this->db->query($query);	
	}
	
	public function select_query( $fields,$table_name,$where = array() )
	{
		
		$this->db->select($fields);		
		$this->db->from($table_name);
		
		if ( !empty($where) )
		{
				$this->db->where($where);
		}
		
		return $this->db->get();
	}
	
	//Select query and return result
	public function query_result($query)
	{ 
		$query =  $this->db->query($query);
		if ( $query->num_rows > 0 )
			return $query->result();
		
		return array();	
	}
	
	//public function 	
	
	//Insert batch records
	public function insert_batch($table_name,$data)
	{
		$this->db->insert_batch($table_name, $data);		 	
		return $this->db->insert_id();		 	
	}
	
	//Generate an array for drop down
	public function get_drop_down( $query, $key, $value, $name,$defaultname='' )
	{
        //echo $defaultname;
		$query 		= $this->db->query($query);
		$records = $query->result_array(); //array of arrays
		
		if($defaultname=='')
            $data=array(""=>"SELECT ".$name." ");
        else
            $data=array(""=>$defaultname);
		
		
		foreach ($records as $row)
    	{
      	$data[ $row[$key] ] = $row[ $value ];
    	}
    	
		return $data;
	}
    
    
	
	/* generate random password*/
	public function createRandomPassword() {
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		
		srand((double)microtime()*1000000);
		
		$i = 0;
		
		$pass = '' ;
		
		while ($i <= 7) {
		
			$num = rand() % 33;
		
			$tmp = substr($chars, $num, 1);
		
			$pass = $pass . $tmp;
		
			$i++;
		
		}
		return $pass;
	}
	
	/* send mail*/
	public function sendmail($to,$subject,$emailBody) {
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
		$headers .= "From: Emall <noreply@emall.com> \r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $emailBody, $headers);
	}
	
}
?>
