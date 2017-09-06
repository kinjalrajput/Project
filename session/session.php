<<?php
	
	define("PAGE_TITLE","Index");
	include("common/header.php");
	session_start();
	
	/*if(isset($_POST['register']))
   {
	$_SESSION['first_name']=$_POST['first_name'];
	$_SESSION['last_name']=$_POST['last_name'];
	$_SESSION['user_name']=$_POST['user_name'];
	$_SESSION['number']=$_POST['number'];
	$_SESSION['gender']=$_POST['gender'];
	$_SESSION['Qualification']=$_POST['Qualification'];
	$_SESSION['planguage']=implode(',',$_POST['language']);
   }
   if(isset($_POST['update']))
   {
	$_SESSION['first_name']=$_POST['first_name'];
	$_SESSION['last_name']=$_POST['last_name'];
	$_SESSION['user_name']=$_POST['user_name'];
	$_SESSION['number']=$_POST['number'];
	$_SESSION['gender']=$_POST['gender'];
	$_SESSION['Qualification']=$_POST['Qualification'];
	$_SESSION['planguage']=implode(',',$_POST['language']);
   }
   */
?>
<body>
<div class="container">
<table class="table table-striped table-hover " border="1">
  <thead>
    <tr>
     
      <th>First Name</th>
      <th>Last Name</th>
      <th>User Name</th>
	  <th>Contact</th>
	  <th>Gender</th>
	  <th>Qualification</th>
	  <th>Programming Language</th>
	  <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php 
	  if(isset($_POST['register']))
      {echo $_SESSION['first_name'];}
       if(isset($_POST['update']))
      {echo $_SESSION['first_name'];}
        ?></td>
      <td><?php 
	  if(isset($_POST['register']))
      { echo $_SESSION['last_name'];}
       if(isset($_POST['update']))
      { echo $_SESSION['last_name'];}
	?></td>
      <td><?php if(isset($_POST['register']))
   { echo $_SESSION['user_name'];}
	if(isset($_POST['update']))
   { echo $_SESSION['user_name'];}
	?></td>
      <td><?php if(isset($_POST['register']))
   {echo $_SESSION['number'];}
		if(isset($_POST['update']))
     {echo $_SESSION['number'];}
		?></td>
	  <td><?php if(isset($_POST['register']))
   { echo $_SESSION['gender'];}
     if(isset($_POST['update']))
   { echo $_SESSION['gender'];}
		?></td>
      <td><?php if(isset($_POST['register']))
   { echo $_SESSION['Qualification'];}
		if(isset($_POST['update']))
   { echo $_SESSION['Qualification'];}
		?></td>
      <td><?php if(isset($_POST['register']))
   { echo $_SESSION['planguage'];} 
		if(isset($_POST['update']))
   { echo $_SESSION['planguage'];}
		?></td>
      <td><a href="edit.php">Edit/</a><a href="unset.php">Unset</a></td>
    </tr>
	</tbody>
	</table>
	</div>
	</body>