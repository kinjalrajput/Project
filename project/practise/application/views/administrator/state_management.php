<?php
    $this->load->view("common/message");
?>
<div class="content">
<form id="add_form" name="add_form" method="post" action="<?php echo base_url('/'); ?>" enctype="multipart/form-data">
		<h1 align="center">State Management</h1>
		<div class="margin">
		<div class="tb2-main" style="">
		
		<div class="tb2-head tab-ename">State Name</div>
		<div class="tb2-head tb2-border">Date</div>
		<div class="tb2-head tb2-border">Action</div>
		<div class="clear"></div>		
		
		<?php
			if($statedata)
				{
					foreach($statedata as $state)
					{
			?>
		
			<div class="tb2-data tab-ename"><a href=""><?php echo $state['state_name'];?></a></div>
			
			
			<div class="tb2-data tb2-border"><?php echo date("D M Y H:i a",strtotime($state['date']));?></div>
				
			<div class="tb2-data tb2-border">
						<a href="<?php echo base_url('administrator/state/edit_state/'.$state['id']); ?>"><img src="<?php echo base_url('assets/icons/view.png'); ?>"></a> |
						<a href="<?php echo base_url("administrator/state/delete_state/".$state['id']); ?>"><img src="<?php echo base_url('assets/icons/remove.png'); ?>"></a>
						
			</div>
			<div class="clear"></div>
			<?php     
					}
				}
				
				else
				{
					?>
                    	<div align="center">No record Found.</div>
                    <?php
				}
		?>
		</div></div>
			<br/><br/>
			
		
</form>
</div>
	<?php form_close();?>
</div>

