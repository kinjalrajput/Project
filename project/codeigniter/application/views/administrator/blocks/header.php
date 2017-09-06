<div id="header">
	<div>
			<div class="header_left">Codeigniter </div>
				<div class="header_right">
				<?php
					if($this->session->userdata('admin_id'))
					{
						
				?>
				
				  <h3>Welcome <?php echo $this->session->userdata('admin_name'); ?> [ <a href="<?php echo base_url('administrator/authentication/logout'); ?>" title="Logout">Logout</a> ]</h3>				  
				  <div class="sep" style="float:right;color:#fff"><?php echo date("l, F d, Y h:i A "); ?></div>
				  <div class="clear"></div>
				<?php
					}
				?>
				</div>
				<div class="clear"></div>
	</div>
	<?php
		if($this->session->userdata('admin_id'))
		{
	?>
	<div id="topmenu1" class="main-menu">
		<ul>
			<li <?php if($this->session->userdata('current_module')=="account_settings"){ echo 'class="current"'; } ?> > <a href="<?php echo base_url('administrator/admin_profile/account_settings'); ?>" title="Dashboard">Dashboard</a></li>
	   </ul>
  </div>
  <?php
		}  
  ?>
	  
</div>
<?php
	if($this->session->userdata('admin_id'))
	{
?>
<div id="top-panel">
      <div id="panel">
      	<ul>
      	
      	<?php
      		if ( $this->session->userdata('current_module') == 'account_settings' )
      		{
      	?>
          <li><a href="<?php echo base_url('administrator/admin_profile/account_settings'); ?>" title="Account Settings" class="manage">Account Settings</a></li>
			  <li><a href="<?php echo base_url('administrator/admin_profile/change_password'); ?>" title="Change Password" class="manage">Change Password</a></li>
	      <?php	
         	}
         ?>
              
      </ul>
	</div>
</div> 
<?php
	}
?>
