<div id="wrapper">
<div id="content">
<div id="box">
<h3 class="user-heading">
Show Conversation
<div class="user-heading right"><span id="fieldrequried">*</span> Fields are mandatory</div>
</h3>
<?php	$attributes = array('id' => 'add_form', 'name' => 'add_form', 'method'=>'POST','enctype'=>"multipart/form-data");
    echo form_open(base_url(''), $attributes);
    ?>
<div id="add_DIV">
<div class="requriedfield"></div>
<div class="main-title">

<?php
    $this->load->view("common/message");
 ?>
 <h1 align="center"> Show Message</h1>
 <br/><br/>
 <div class="margin">
 	<div class="conv">
 <?php	
				if($conversation)
				{
					foreach($conversation as $con)
					{
						if($con['send_id'] == $user_id && $con['receive_id'] == 0 )
						{
					
				?>
				<div style="float:left; margin-left:5px;"><font style="color:#CC0033;"><b><?php  echo $con['user_name']; ?></b></font>&nbsp;:<?php  echo $con['message']; ?></div>
				<div class="clear sep"></div>
				
				 <?php
						}
				 
				 		if($con['receive_id'] == $user_id && $con['send_id'] ==0 )
						{
					
					?>
				
				 <div style="float:right; margin-right:5px;"><?php  echo $con['message']; ?>:&nbsp;<font style="color:#CC0033;"><b><?php  echo $con['user_name']; ?></b></font></div>
				 <div class="clear sep"></div>
				 
				<?php
						}
				
					}
				}
			
				?>
</div>
</div>
<div class="clear sep"></div>
</div>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>