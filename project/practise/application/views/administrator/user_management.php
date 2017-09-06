<div id="wrapper">
<div id="content">
<div id="box">
<h3 class="user-heading">
User Management
<div class="user-heading right"><span id="fieldrequried">*</span> Fields are mandatory</div>
</h3>
<?php	$attributes = array('id' => 'add_form', 'name' => 'add_form', 'method'=>'POST','enctype'=>"multipart/form-data");
    echo form_open(base_url('administrator/user/get_users'), $attributes);
    ?>
<div id="add_DIV">
<div class="requriedfield"></div>
<div class="main-title">
<?php
    $this->load->view("common/message");
?>
<div class="content">
<form id="add_form" name="add_form" method="post" action="<?php echo base_url('/'); ?>" enctype="multipart/form-data">
		<h1 align="center">Country Management</h1>
		<div class="margin">
		<div class="tb-main" style="">
		
		<div class="tb-head tab-uname">User Name</div>
		<div class="tb-head tab-uname">first Name</div>
		<div class="tb-head tab-uname">
		<div class="tb-head tb-border">Date</div>
		<div class="tb-head tb-border">Action</div>
		<div class="clear"></div>		
		
		<?php
			if($countrydata)
				{
					foreach($countrydata as $country)
					{
			?>
		
			<div class="tb-data tab-uname"><a href=""><?php echo $country['user_name'];?></a></div>
			
			
			<div class="tb-data tb-border"><?php echo date("D M Y H:i a",strtotime($country['date']));?></div>
				
			<div class="tb-data tb-border">
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
			
		
<div class="clear"></div>
</div>
<div class="clear sep"></div>
</div>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
