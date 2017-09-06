<?php include("includes/config.php");
	
	if(!isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == "")
 {
 	header("Location:admin_login.php");
 }
	define("PAGE_TITLE","Admin message conversion");
	include("common/header.php");


	 $sql = "Select id,send_id,receive_id,user_name,message,created_date from user_conversation where id IN(select MAX(id) from user_conversation group by send_id, receive_id) AND receive_id = 1 ";
	$result = mysql_query($sql); 

	

?>

<div class="content">
	<div class="menu">
    <div class="menu_a"><a href="admin_account.php" class="menu_a" >Home/</a></div>
	<div class="menu_a"><a href="users.php" class="menu_a" >User Management/</a></div>
	<div class="menu_a"><a href="admin_conversation.php" class="menu_a">Conversation/</a></div>
	<div class="menu_a"><a href="message_list.php" class="menu_a">Message/</a></div>
	<div class="menu_a"><a href="country.php" class="menu_a"> Country/</a></div>
    <div class="menu_a"><a href="state.php" class="menu_a"> State/</a></div>
    <div class="menu_a"><a href="city.php" class="menu_a"> City/</a></div>
    <div class="menu_a"><a href="admin_login.php" class="menu_a" >Log Out</a></div>   
    </div>
		<form id="form" name="form" action="show_message.php" enctype="multipart/form-data" method="post">
		<div class="margin">
		<h2  align="center" > Message List</h2>
		
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
		<div class="tbl-main" style="width:495px; margin-left:-50px; " >
		<div class="tbl-head" align="center">Message</div>
		<div class="tbl-head" align="center">Date</div>
		<div class="tbl-head" align="center">User</div>
		<div class="clear "></div>
		
		<?php 
			if(mysql_num_rows($result) > 0 )
			{
				while($row = mysql_fetch_array($result,MYSQL_ASSOC))
				{	
		?>
			<div class="tbl-data" align="center"><a href="show_message.php?id=<?php echo $row['send_id']; ?>"><?php echo $row['message'] ?></a></div>
			<div class="tbl-data" align="center">
			
			<?php
				echo date("D M Y H:i a",strtotime($row['created_date']));
				?>
				</div>
				
			<div class="tbl-data" align="center"><?php echo $row['user_name'] ?></div>
			<div class="clear "></div>
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
		<div class="clear"></div>
	</div></div>
	</form>
</div>
	
<?php include("common/footer.php"); ?> 