<?php include('includes/config.php');
 if(!isset($_SESSION['user_id']) && $_SESSION['user_id'] == "")
 {
 	header("Location:index.php");
 }
 	define('PAGE_TITLE'," Photo Album");
	include('common/header.php');

	 $sql = "Select * from album where user_id='".$_SESSION['user_id']."'";
	$result = mysql_query($sql);
	
	

 ?>
 <div class="content">
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
       
<br/><br/>	<h2 align="center">View Album</h2>
	

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
	

		
		<?php 
			 if(mysql_num_rows($result) > 0 )
			  {
				while($row = mysql_fetch_array($result,MYSQL_ASSOC))
				{
					
					
		 ?>   
              <div style="float:left;" > <br/><br/><br/><br/><br/><br/><br/><br/><a href="album_image.php?id=<?php echo $row['id'];?>"><?php echo $row['album_name'] ?></a>
			  <a href="delete_album.php?id=<?php echo $row['id'];?>&function=single">Delete </a>
			  </div>
			  <div class="img" style="margin:5px;"> <a href="album_image.php?id=<?php echo $row['id'];?>"><img src="album/<?php echo $row['image']; ?>" height="150px" width="170px" /></a></div>
			  
			 
			 
			<?php			
				}

			} 
			
			else			{
		?>
				
			<div class="clear sep"></div>
		<?php		
			}
		?>
		 
		</div>
	</div>

 <?php include('common/footer.php');?>	