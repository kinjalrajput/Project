<div class="register_content">
	<div class="title"><h3>Users Management</h3></div>
	<script type="text/javascript" src="<?php echo base_url("assets/js/ajax/users.js");?>"></script>
	<?php
		$attributes = array('id'=>'users_form', 'name'=>'users_form', 'method'=>'post', 'enctype'=>"multipart/form-data");
		echo form_open(base_url("admin/users/all"),$attributes);
	?>	
	<div class="register_table">
	<div class="searchbox">
			<label>Search</label>
			<input type="text" class="inputBox" name="search" id="search" />
			<input type="submit" class="button" name="a" id="a" value="Search" />
	</div>
	<?php echo form_close();?>
	
	<?php
		$attributes = array('id'=>'user_form', 'name'=>'user_form', 'method'=>'post', 'enctype'=>"multipart/form-data");
		echo form_open(base_url("administrator/user/deleteAll"),$attributes);
	?>	
	
	<script type="text/javascript">
	
	function doDelete()
	{
		var x="user_form";
		var  i = 0;
		for(count=0 ; count < document.getElementById(x).length ; count++) {
			if(document.forms[x][count].type == "checkbox" && document.forms[x][count].checked == true) 			
			{
				i++;
			}
		}
		
		if(i > 0)
		{
			document.user_form.submit();
		}
		else
		{
			alert("Please select atleast one checckbox.");
		}
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
	<div id="msg"></div>
	<div class="clear"></div>
	<div class="error_msg"> <?php $this->load->view("common/message");?></div>
		<div class="user_row">
		<input type="submit" class="button" name="delete" id="delete" value="DELETE" onclick="return doDelete();" />
		</div>		

		<div class="title_row">
		
			<div class="checkbox">
			<input type="checkbox" onclick="return checkuncheckall('user_form');" id="checkall" name="checkall"/>
			</div>
			<div class="username">User Name</div>
			<div class="name">Full Name</div>
			<div class="email">Email</div>
			<div class="register_date">Registered Date</div>
			<div class="status">Status</div>
			<div class="action">Action</div>
		</div>
		<div class="clear"></div>
<?php if($userinfo)
	  { 
	  	foreach($userinfo as $user)
		{
?>
		<div class="user_row">
			<div class="checkbox">
		
			<input  type="checkbox" name="chk[]" value="<?php echo $user->id;?>" />
			</div>
			<div class="username"><?php echo $user->user_name; ?></div>
			<div class="name"><?php echo $user->first_name." ".$user->last_name; ?></div>
			<div class="email"><?php echo $user->email; ?></div>
			<div class="register_date"><?php echo $user->date; ?></div>
			<div class="status"><?php echo $user->status; ?></div>
			<div class="action">
			  <a href="<?php echo base_url("admin/users/display_user/".$user->id)?>" title="View">
			  <img src="<?php echo base_url('assets/icons/view.png'); ?>" >
			  </a>
			  <a href="<?php echo base_url("admin/users/do_user_delete/".$user->id);?>" title="Delete">
			  <img src="<?php echo base_url('assets/icons/remove.png'); ?>" >
			  </a>
			  <?php if($user->status == 'active')
			 		{ 
			  ?>
			  	<a id="user_status_<?php echo $user->id; ?>" onclick="changeStatus(<?php echo $user->id;?>,1)" href="javascript:void(0);" title="Deactive">
			  	<img src="<?php echo base_url('assets/icons/inactive.png'); ?>" />
			  	</a>
			  <?php 
			  		}
					else
					{
			  ?>
			  	<a id="user_status_<?php echo $user->id; ?>" 
				onclick="changeStatus(<?php echo $user->id;?>,0)" href="javascript:void(0);" title="Active">
			  	<img src="<?php echo base_url('assets/icons/active.png'); ?>" />
			  	</a>
				<?php 
				}
				?>
			  

			</div>
		</div>
<?php echo form_close();?>
<?php }
		}
		else
		{
?>
			<div class="row">No users found.</div>
<?php
	  	}
?>
	</div>
	<div class="clear"></div>
	<div class="page">
		<div class="page_left">
			<?php
			if(isset($link_description) && $link_description != "")
			{
				echo $link_description;	
			} 
			?>
		</div>
		<div class="page_right">
			<?php
			if(isset($link_description) && $link_description != "")
			{
				echo $pages;	
			} 
			?>
		</div>
</div>
<div class="clear"></div>
</div>