<div class="register_content">
	<div class="title"><h3>Users Management</h3></div>
	<script type="text/javascript" src="<?php echo base_url("assets/js/ajax/users.js");?>"></script>
	<?php
		$attributes = array('id'=>'users_form', 'name'=>'users_form', 'method'=>'post', 'enctype'=>"multipart/form-data");
		echo form_open(base_url("administrator/user/all"),$attributes);
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
		
		<table border="1">
		<tr>
			<th>
			<input type="checkbox" onclick="return checkuncheckall('user_form');" id="checkall" name="checkall"/>
			</th>
			<th>User Name</th>
			<th>Full Name</th>
			<th>Email</th>
			<th>Registered Date</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	<tr>
<?php if($userinfo)
	  { 
	  	foreach($userinfo as $user)
		{
?>
		<td>
	
		
			<input  type="checkbox" name="chk[]" value="<?php echo $user->id;?>" />
			</td>
			<td><?php echo $user->user_name; ?></td>
			<td><?php echo $user->first_name." ".$user->last_name; ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo $user->date; ?></td>
			<td><?php echo $user->status; ?></td>
			<td>
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
			  

			</td>
		</tr>
	</table>
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