<?php include("includes/config.php");
define("PAGE_TITLE","Update Album ");
	include("common/header.php");
	
	if(!isset($_SESSION['user_id']) && $_SESSION['user_id'] == "")
	{
		header("Location:login.php");
	}
	
if(isset($_GET['id']))
	{
	$_SESSION['id'] = $_GET['id'];
	$query = "SELECT id,album_name,image FROM album where id='".$_SESSION['id']."'";
	
	$result = mysql_query($query);
	
		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				 $row = mysql_fetch_array($result,MYSQL_ASSOC); 
			}
			else
			{
				echo "erroor in not result found.";
			}	
			
		}
		}
		else
		{
		   
			echo mysql_error();
			exit;
		}
	
	
	
	
?>

<div class="content">
		<form id="form" name="form" action="edit_album_db.php" enctype="multipart/form-data" method="post">
		
		<h2 align="center" > Update Album</h2>
		
		<?php 
		
		if(isset($_SESSION['errors']) && $_SESSION['errors'] != "")
		{
			echo "<div class='error-msg'>". $_SESSION['errors']. "</div>";
			unset($_SESSION['errors']);
		}
		
		if(isset($_SESSION['success']) && $_SESSION['success'] != "")
		{
			echo "<div class='success-msg'>". $_SESSION['success']. "</div>";
			unset($_SESSION['success']);
		}
		?>
		
		<div class="lable">Album Name:</div>
		<div class="inp-con"><input type="hidden" name="album_name" value="<?php echo $row['id']; ?>"/><input type="text" name="album_name" id="album_name" value="<?php echo $row['album_name']; ?>" /></div>
		<div class="clear sep"> </div>
		
				
		<?php
			if(isset($row['image']) && $row['image'] != "" )
			{
			?>
		<div class="lable">Current image:</div>
		<div class="inp-con"><img src="album/<?php echo $row['image']; ?>"  width="100px"/></div>
		<input type="hidden" name="old_image" value="<?php echo $row['image']; unset($row['image']);?>" />
		<div class="clear sep"> </div>
		<?php
			}
		
		?>
		<div class="lable">Image:</div>
		<div class="inp-con"><input type="file" id="img" name="img"/></div>
		<div class="clear sep"> </div>
		
			
		<div class="lable">&nbsp;</div>
		<div class="inp-con" colspan="2">
		<input type="submit" name="update" value="Update" />
		</div>
		<div class="clear sep"> </div>
		</form>
	</div>
<?php 

include("common/footer.php"); ?>
