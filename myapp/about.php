<?php
 
 define("PAGE_TITLE","ABOUT US");// page of title 
  include("common/header.php"); // add header content like menus
  include("class/class.php"); // add class file


  $app = new MyApp(); 
?>
<div class="container">
  <?php
    $data = $app->about();   
    echo "<h1>".$data['title']."</h1>";
    echo "<p>".$data['description']."</p>";
  ?>
</div>