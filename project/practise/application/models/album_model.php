<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Album_model extends MY_Generic_Model
{
	//initialize
   public function __construct()
   {
		  	parent::__construct();
		  	//$this->load->library("pagination");
   }

   public function get_album()
	  	{	
	  		$query  = "SELECT id,album_name,image FROM ".$this->tables["album"]." WHERE user_id='".$this->session->userdata('user_id')."'";
			$result = $this->query($query);
		
			if ( $result->num_rows > 0)
			{
				return $result->result_array();	
			}
			return false;
	  	}
		 public function get_gallery($id)
	{
		 $query="select * from ".$this->tables["gallery"]." WHERE album_id='".$id."'";
		 $result = $this->query($query); 
		
		if ( $result->num_rows > 0)
		{
			return $result->result_array();	
		}
		return array();
	 }

	public function get_image($id)
	{
		 $query="select * from ".$this->tables["gallery"]." WHERE album_id='".$id."'";
		 $result = $this->query($query); 
		
		if ( $result->num_rows > 0)
		{
			return $result->result_array();	
		}
		return false;
	 }
	 public function get_albumimage($id)
	{
		 $query="select * from ".$this->tables["album"]." WHERE id='".$id."'";
		 $result = $this->query($query); 
		
		if ( $result->num_rows > 0)
		{
			return $result->row_array();	
		}
		return false;
	 }

	 public function get_galleryimage($id)
	{
		 $query="select * from ".$this->tables["gallery"]." WHERE id='".$id."'";
		 $result = $this->query($query); 
		
		if ( $result->num_rows > 0)
		{
			return $result->row_array();	
		}
		return false;
	 }


	 
}
   ?>
	
