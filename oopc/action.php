<?php
define("PAGE_TITLE","OOPC");
include("common/header.php");
require_once("lib/class.php");


  
?>

<div class="container">
  <p>
  	<?php
		$info = new MyWebsite();
  		$page = $_GET['page'];
  		
  		switch ($page) {
  			
  			case 'home':
  				echo $info->home();
  				break;

  			case 'about':
  				echo $info->about();
  				break;
  			
			case 'contact':
  				echo $info->contact();
  				break;
			case 'default':
  				echo $info->info("kinjal zankat");
  				break;
			
  			default:
  				exit('Oppss !');
  				break;
  		}
		echo $info->title;
		echo $info->description;
  	?>  	
  </p>
</div>