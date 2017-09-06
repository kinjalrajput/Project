<?php
    $this->load->view("common/message");
?>
<div class="content">
<form id="add_form" name="add_form" method="post" action="<?php echo base_url('/'); ?>" enctype="multipart/form-data">
		<h1 align="center">City Management</h1>
		<div class="margin">
		<div class="tb2-main" style="">
		
		<div class="tb2-head tab-ename">City Name</div>
		<div class="tb2-head tb2-border">Date</div>
		<div class="tb2-head tb2-border">Action</div>
		<div class="clear"></div>		
		
		<?php
			if($citydata)
				{
					foreach($citydata as $city)
					{
			?>
		
			<div class="tb2-data tab-ename"><a href=""><?php echo $city['city_name'];?></a></div>
			
			
			<div class="tb2-data tb2-border"><?php echo date("D M Y H:i a",strtotime($city['date']));?></div>
				
			<div class="tb2-data tb2-border">
						<a href="<?php echo base_url('administrator/city/edit_city/'.$city['id']); ?>"><img src="<?php echo base_url('assets/icons/view.png'); ?>"></a> |
						<a href="<?php echo base_url("administrator/city/delete_city/".$city['id']); ?>"><img src="<?php echo base_url('assets/icons/remove.png'); ?>"></a>
						
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

