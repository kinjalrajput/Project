<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends MY_Generic_Model{

	//initialize

	public function __construct()
	{
		  	parent::__construct();
		  	
	}
	
	/*
	 * Will save data to the table. NOTE: set data before calling this function
	 * Params: $tableName - String
	 * Return: Last inserted Id;
	 */
	public function save($tableName)
	{			
		return $this->insert( $this->tables[$tableName], $this->data );		
	}	
	
	
	/*
	 * Will update data to the table. NOTE: set data before calling this function
	 * Params: $tableName - String, $where - Array with condition as key and value
	 * Return: true OR false
	 */
	public function updateData($tableName, $where )
	{
		
		return $this->update( $this->tables[$tableName],$this->data, $where );
	}
	
	/*
	 * Will delete records from table
	 * Params: $tableName - String, $where - Array with condition as key and value
	 * Return: true OR false
	 */
	public function remove($tableName, $where )
	{
		return $this->delete( $this->tables[$tableName],$where );
	}
	
	/*
	 * Will delete multiple records from table
	 * Params: $tableName - String, $where - Array with value, $where = array(4,7)
	 * Return: true OR false
	 */
	public function deleteMultiple($tableName, $where )
	{
		return $this->delete_multiple( $this->tables[$tableName],$where );
	}

	
}
?>
