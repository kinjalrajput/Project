<?php     
            ob_start();
           session_start();
   
            mysql_connect("localhost","root","kinju") or die("Could not connect database");
            mysql_select_db("project") or die("Could not select database"); 
	 
?>