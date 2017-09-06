<?php
    include("includes/config.php");
	if(!isset($_SESSION['user_id']) && $_SESSION['user_id'] == "")
    {
 	   header("Location:login.php");
    }
	define('PAGE_TITLE',"Album Management");
	include('common/header.php');
	
	$sql = "Select id, album_name, image ,created_date from album Order by id DESC";
	$result = mysql_query($sql)

 ?>
  <script type="text/javascript">
	
	function doDelete()
	{
		var x="form";
		var  i = 0;
		for(count=0 ; count < document.getElementById(x).length ; count++) {
			if(document.forms[x][count].type == "checkbox" && document.forms[x][count].checked == true) {
				i++;
			}
		}
		
		if(i > 0)
		{
			document.form.submit();
		}
		else
		{
			alert("Please select atleast one checckbox.")
;		}
	}
	
	function checkuncheckall(x){
		if(document.getElementById("checkall").checked == true){
			for(count=0 ; count < document.getElementById(x).length ; count++){
				if(document.forms[x][count].type == "checkbox"){
					document.forms[x][count].checked= true;
				}
			}		
		}else{
			for(count=0 ; count < document.getElementById(x).length ; count++){
				if(document.forms[x][count].type == "checkbox"){
				document.forms[x][count].checked= false;
				}
			}
	
		}
	}
</script>

<div class="content" align="center">
<nav id="primary_nav_wrap">
<ul id="nav">
<li> <a href="index.php">Home</a></li>   
    <li><a href="changepassword.php"  >Change Password</a></li>
	<li><a href="album.php" >Album</a></li>
	<li><a href="gallery.php">Gallery</a></li>
	<li><a href="photo_album.php"> Photo Album</a></li>
	<li><a href="album_management.php"class="current-menu-item" >  Album Management</a>
    <li><a href="user_conversation.php" >Conversation</a></li>
   <li><a href="login.php" >Log Out</a></li>
	

</ul>
</nav>
       
 
	<br/><br/><h2 align="center">Album  Management</h2>

	<?php

			if(isset($_SESSION['errors']) && $_SESSION['errors'] != "")
			{
				echo $_SESSION['errors'];
				unset($_SESSION['errors']);
			}
			if(isset($_SESSION['success']) && $_SESSION['success'] != "")
			{
				echo $_SESSION['success'];
				unset($_SESSION['success']);
			} 
		?>
	    <form action="delete_album.php?&function=multiple" method="post" name="form" id="form" enctype="multipart/form-data"> 
 
        <div class="tb2-main">
        <div class="tb2-head tab-aname"><input type="checkbox" name="checkall" id="checkall" onclick="checkuncheckall('form');" /></div>
        <div class="tb2-head tab-aname">Album Name</div>
		<div class="tb2-head tab-aimage">Album Image</div>
		<div class="tb2-head tb2-border">Register Date</div>
		<div class="tb2-head tab-aname">Action</div>
		<div class="clear"></div>
        
		<?php
			if(mysql_num_rows($result) > 0)
			{   
				//$rs="";
				while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {

					$rs=$row;
		?>         
		            <div class="tb2-data tab-aname"> <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/><input type="checkbox" name="chk[]" value="<?php echo $row['id'];?>"/></div>
					<div class="tb2-data tab-aname"><?php echo $row['album_name']; ?></div>
					<div class="tb2-data tab-aimage"><?php echo substr($row['image'],0,10); ?></div>
					<div class="tb2-data tb2-border">
							<?php 
								echo date('d M,Y H:i a',strtotime($row['created_date'])); 
							?>
					</div>
					<div class="tb2-data tab-aname">
							<a href="edit_album.php?id=<?php echo $row['id'];?>">Edit</a> |
							<a href="album_delete.php?id=<?php echo $row['id'] ?>">Delete</a> 
												</div>			
					<div class="clear"></div>
		<?php			
				}

			} 
			else
			{
		?>
			<div align="center"><strong>No record found.</strong></div>
		<?php		
			}
		?>
</form>
       <div class="lable"><input type="submit" name="btn_delete" value="Delete" ></div>
	</div>
</div>
 <?php include('common/footer.php'); ?>