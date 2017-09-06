<?php include('includes/config.php');
 define('PAGE_TITLE',"Album Image");
 include"common/header.php";

	if(isset($_GET['id']))
	{
		$rs=$_GET['id'];
	    $query = "Select * from gallery where album_id='".$rs."'"; 
	    $result = mysql_query($query);
	
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
       
<br/><br/>	<h2 align="center">Album Images</h2>
	<?php
	if(mysql_num_rows($result)>0)
			{
				while($row = mysql_fetch_array($result,MYSQL_ASSOC))
				{
				?>
				 <div class="img" style="margin:5px;">	
				<a class="fancybox" href="gallery/<?php echo $row['gallery_image']; ?>" data-fancybox-group="gallery" title="TEST ETST"><img src="gallery/<?php echo $row['gallery_image']; ?>" height="100px" width="150px" alt="" /></a></div>
				<div style="float:left;"><a href="delete_image.php?id=<?php echo $row['id'];?>&redirect_url=<?php echo $_REQUEST['id']; ?>" ><br /><br /><br /><br /><br />Delete </a></div> 
			   <?php
				}
				
			}
	     }
		?>
	<div class="clear sep"></div>
</div>
<?php include"common/footer.php"?>