<?php
	include "common/common.php";

	class Database
	{
		public $host = "localhost";
		public $user = "root";
		public $password="kinju";
		public $database = "oopc";

		public function __construct()
		{
			mysql_connect($this->host,$this->user,$this->password) or die(mysql_error());	
			mysql_select_db($this->database) or die(mysql_error()) ;
		}

		public function doQuery($myquery)
		{
			$result = mysql_query($query) or die(mysql_error());

			return mysql_fetch_assoc($result);			
		}

		public function doInsert($myquery)
		{
			return mysql_query($myquery) or die(mysql_error());			
		}

		public function doMultipleQuery($myquery)
		{
			$result = mysql_query($myquery) or die(mysql_error());

			$records = array();

			while( $row = mysql_fetch_assoc($result) )
			{
				$records[] = $row;
			}			
			return $records;			
		}
	}

	class MyApp extends Database
	{
		public $search_keyword;
		public $form_data;

		public function home()
		{
			return $this->doQuery("SELECT * FROM `pages` WHERE id = 1");
		}

		public function about()
		{
			return $this->doQuery("SELECT * FROM `pages` WHERE id = 2");
		}

		public function pages()
		{
			return $this->doMultipleQuery("SELECT * FROM `pages` order by id desc");
		}

		public function search()
		{
			return $this->doMultipleQuery("SELECT title,description from `pages` WHERE title LIKE '%".$this->search_keyword."%' OR description LIKE '%".$this->search_keyword."%'");			
		}

		public function store()
		{
			$title = $this->form_data['title'];
			$desc = $this->form_data['description'];
			
			$result = $this->doInsert("INSERT INTO `pages` (title,description) values(\"".$title."\",'".$desc."')");			
			if(!$result)
			{
				exit(" please try again. There is no data inserted");
			}
		}
	}

?>