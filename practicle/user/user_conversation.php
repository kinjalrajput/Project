<?php
ob_start();

include("includes/config.php");
define('PAGE_TITLE',"User  Conversation");
include('common/header.php');
if(!isset($_SESSION['user_id']) or $_SESSION['user_id'] == "")
{
	header("Location:login.php");
}
?>
<div class="content" >
<form name="form" method="post" action="user_conversation_db.php" enctype="multipart/form-data">
    <div class="clear" style="padding:0px;"></div>
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
		$query="select from user_conversation where user_id='".$_SESSION['user_id']."'";
		$result="mysql_query($query)";
	?>
<nav id="primary_nav_wrap">
<ul id="nav">
<li> <a href="index.php">Home</a></li>   
    <li><a href="changepassword.php"  >Change Password</a></li>
	<li><a href="album.php" >Album</a></li>
	<li><a href="gallery.php">Gallery</a></li>
	<li><a href="photo_album.php"> Photo Album</a></li>
	<li><a href="album_management.php"class="current-menu-item" >  Album Management</a>
    <li><a href="user_conversation.php" >Conversation</a></li>
	<li><a href="login.php">Log Out</a></li>
	

</ul>
</nav>
<div class="margin">
	
<?php
	
		$sel = "Select send_id,receive_id,message FROM user_conversation";
		$rs = mysql_query($sel);
		
			
		if($rs)
		{
			if(mysql_num_rows($rs) > 0)
			{
			?>
		<div class="conv">
		<?php
		while($val=mysql_fetch_array($rs,MYSQL_ASSOC))
		{
		    if($val['send_id'] == $_SESSION['user_id'])
			{
		?>
		<div style="float:right;"><?php  echo $val['message']; ?></div>
		<div class="clear sep"></div>
		 <?php 
		 	} 
		if($val['receive_id'] == $_SESSION['user_id'])
		{
		?>
			<div style="float:left;"><?php  echo $val['message']; ?></div>
		<div class="clear sep"></div>
		<?php
		}
		}
		?>
		</div>
		<?php 
		}
		}
		?>

         <div class="clear sep"></div>
        <br/><h2 style="margin-left:-400px;"> User Conversation</h2>
        <div class="lable">Chat:</div>
		<div class="inp-con"><textarea name="message"></textarea></div>
		<div class="clear sep"> </div>
		
	
		<div class="lable">&nbsp;</div>
		<div class="inp-con"  align="center">
		<input type="submit" name="submit" value="send" /></div>
		<div class="clear sep"> </div></div>
        </form>	</div>
		<?php
        include("common/footer.php");
        ?>