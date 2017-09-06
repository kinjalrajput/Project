<?php   
ob_start();
include ("includes/config.php");
define('PAGE_TITLE',"Admin  Conversation");
include ("common/header.php");
if(!isset($_SESSION['admin_id']) or $_SESSION['admin_id'] == "")
{
    header("Location:admin_login.php");
}

?>
</div>

<div class="content">
	<form name="form" method="post" action="admin_conversation_db.php" enctype="multipart/form-data">
    <div class="menu">
    <div class="menu_a"><a href="admin_account.php" class="menu_a" >Home/</a></div>
	<div class="menu_a"><a href="users.php" class="menu_a" >User Management/</a></div>
	<div class="menu_a"><a href="admin_conversation.php" class="menu_a">Conversation/</a></div>
	<div class="menu_a"><a href="message_list.php" class="menu_a"> Message/</a></div>
	<div class="menu_a"><a href="country.php" class="menu_a"> Country/</a></div>
    <div class="menu_a"><a href="state.php" class="menu_a"> State/</a></div>
    <div class="menu_a"><a href="city.php" class="menu_a"> City/</a></div>
    <div class="menu_a"><a href="admin_login.php" class="menu_a" >Log Out</a></div>   
    </div>

    <br/><br/> <h2 align="center"> Admin Conversation</h2>
 
        
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

	<div class="margin">  
		<div class="lable">Select User:</div>
		<div class="inp-con"><select name="receive_id">
		<option>Select</option>
		

        <?php
		 $sql = "select id,user_name from users";
		 $result = mysql_query($sql);
					if($result)
					{
						while($rows = mysql_fetch_array($result,MYSQL_ASSOC))
						{
						
		?>
			<option value="<?php echo $rows['id']; ?>"><?php echo $rows['user_name']; ?></option>
			 
			
			<?php			
						}
					}
			 ?>
		 
		</select></div>
<div class="clear sep"></div>

		<div class="lable">Message:</div>
        <div class="inp-con"><textarea name="message"></textarea></div>
         <div class="clear sep"></div>

        <div class="lable">&nbsp;</div>
        <div class="inp-con"><input type="submit" value="Send"></div>
    	<div class="clear sep"></div>
	</div>
   
		</div>
		</form>
	</div>
</div>

<?php  
include "common/footer.php";
?>