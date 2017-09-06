<?php include("includes/config.php");
	
	if(!isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == "")
 {
 	header("Location:admin_login.php");
 }
	define("PAGE_TITLE","Show message ");
	include("common/header.php");


	
?>

<div class="content">
	<div class="menu">
    <div class="menu_a"><a href="admin_account.php" class="menu_a" >Home/</a></div>
	<div class="menu_a"><a href="users.php" class="menu_a" >User Management/</a></div>
	<div class="menu_a"><a href="admin_conversation.php" class="menu_a">Conversation/</a></div>
	<div class="menu_a"><a href="message_list.php" class="menu_a"> Show Message/</a></div>
    <div class="menu_a"><a href="admin_login.php" class="menu_a" >Log Out</a></div>   
    </div>
		<form id="form" name="form" action="show_message.php" enctype="multipart/form-data" method="post">
		<div class="margin">
		<br/><br/>
		<h2  align="">Show message</h2>
		
		<?php

				if(isset($_SESSION['errors']) && $_SESSION['errors'] != "")
				{
					echo "<div class='error-msg'>". $_SESSION['errors']. "</div>";
					unset($_SESSION['errors']);
				}
				if(isset($_SESSION['success']) && $_SESSION['success'] != "")
				{
					echo "<div class='sussess-msg'>". $_SESSION['success']. "</div>";
					unset($_SESSION['success']);
				}
		
		
		?>
		<div class="conversation">
			<?php 
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];	
		 		$query = "select * from user_conversation where send_id ='".$id."' or receive_id= '".$id."'";
				$rs = mysql_query($query);  
				
				if(mysql_num_rows($rs) > 0 )
				{
				?>
				
				<?php
					while($msg = mysql_fetch_array($rs))
					{
						if($msg['send_id'] == $id)
						{
					
				?>
				<div style="float:right;"><font style="color:#CC0033;"><b><?php  echo $msg['user_name']; ?></b></font>&nbsp;:<?php  echo $msg['message']; ?></div>
				<div class="clear sep"></div>
				
				 <?php
				}
				 
				 if($msg['receive_id'] == $id)
						{
					
				?>
				
				 <div style="float:left;"><?php  echo $msg['message']; ?>:&nbsp;<font style="color:#CC0033;"><b><?php  echo $msg['user_name']; ?></b></font></div>
				 <div class="clear sep"></div>
				 
				<?php
				}
				
					}
				}
			}
				?>
	</div>
		<div class="clear sep"> </div>
	</div>
		</form>
	</div>
	
		
<?php include("common/footer.php"); ?> 