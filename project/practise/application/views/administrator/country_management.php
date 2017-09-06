<?php
    $this->load->view("common/message");
?>
<div class="content">
<form id="add_form" name="add_form" method="post" action="<?php echo base_url('/'); ?>" enctype="multipart/form-data">
		<h1 align="center">Country Management</h1>
		<div class="margin">
		<div class="tb2-main" style="">
		
		<div class="tb2-head tab-ename">Country Name</div>
		<div class="tb2-head tb2-border">Date</div>
		<div class="tb2-head tb2-border">Action</div>
		<div class="clear"></div>		
		
		<?php
			if($countrydata)
				{
					foreach($countrydata as $country)
					{
			?>
		
			<div class="tb2-data tab-ename"><a href=""><?php echo $country['country_name'];?></a></div>
			
			
			<div class="tb2-data tb2-border"><?php echo date("D M Y H:i a",strtotime($country['date']));?></div>
				
			<div class="tb2-data tb2-border">
						<a href="<?php echo base_url("administrator/country/edit_country/".$country['id']); ?>"><img src="<?php echo base_url('assets/icons/view.png'); ?>"></a> |
						<a href="<?php echo base_url("administrator/country/delete_country/".$country['id']); ?>"><img src="<?php echo base_url('assets/icons/remove.png'); ?>"></a>
						
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

