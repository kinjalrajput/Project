<?php
    define('PAGE_TITLE',"User Management");
	include('common/header.php');
	
	

 ?>
<div class="content" align="center">
<div class="menu">
    <div class="menu_a"><a href="admin_account.php" class="menu_a" >Home/</a></div>
	<div class="menu_a"><a href="users.php" class="menu_a" >User Management/</a></div>   
	<div class="menu_a"><a href="message_list.php" class="menu_a"> Conversation/</a></div>
	<div class="menu_a"><a href="message_list.php" class="menu_a"> Message/</a></div>
    <div class="menu_a"><a href="country.php" class="menu_a"> Country/</a></div>
    <div class="menu_a"><a href="state.php" class="menu_a"> State/</a></div>
    <div class="menu_a"><a href="city.php" class="menu_a"> City/</a></div>
    <div class="menu_a"><a href="admin_login.php" class="menu_a" >Log Out</a></div>   
    
    </div>

	<h1 align="center">User Management</h1>

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
	     <div id="msg"></div>
        <div class="tbl-main">
        <div class="tbl-head tab-uname"></div>
		<div class="tbl-head tab-uname">Username</div>
		<div class="tbl-head tab-uname">Full Name</div>
		<div class="tbl-head tab-email">Email</div>
		<div class="tbl-head tab-email">Register Date</div>
		<div class="tbl-head tbl-border">Action</div>
		<div class="clear"></div>

		<?php
		include("includes/config.php");
	   
	
         //include("includes/config.php");
		$sql = "Select id, user_name, first_name, last_name, email,created_date,status from users Order by id DESC";
	     $result = mysql_query($sql);
			if(mysql_num_rows($result) > 0)
			{
				while ($val = mysql_fetch_array($result)) {
		?>          <div class="tbl-data tab-uname"><input type="checkbox" name="chk[]" value="<?php echo $val['id']; ?>"> </div>
					<div class="tbl-data tab-uname"><?php echo $val['user_name']; ?></div>
					<div class="tbl-data tab-uname"><?php echo $val['first_name']." ".$val['last_name']; ?></div>
					<div class="tbl-data tab-email"><?php echo $val['email']; ?></div>
					<div class="tbl-data tab-email">
							<?php 
								echo date('d M, Y H:i a',strtotime($val['created_date'])); 
							?>
					</div>
					<div class="tbl-data tbl-border">
							<a href="view.php?id=<?php echo $val['id'] ?>">View</a> |
							<a href="update.php?id=<?php echo $val['id'] ?>">Update</a> |
							<a href="delete.php?id=<?php echo $val['id'] ?>">Delete</a> |
							<?php
								if($val['status'] == 0)
								{
							?>
									<span id="user_status_<?php echo $val['id']; ?>"><a onclick="changeStatus(<?php echo $val['id']; ?>,1)" href="javascript:void(0)">Active</a>
							<?php		
								}
								else
								{
							?>		
									<span id="user_status_<?php echo $val['id']; ?>"><a onclick="changeStatus(<?php echo $val['id']; ?>,0)" href="javascript:void(0)">Deactive</a>
							<?php		
								} 
							?>
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
		
	</div>
</div>
 <?php include('common/footer.php'); ?>