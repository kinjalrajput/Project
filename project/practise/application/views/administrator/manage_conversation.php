<div id="wrapper">
<div id="content">
<div id="box">
<h3 class="user-heading">
Manage Conversation
<div class="user-heading right"><span id="fieldrequried">*</span> Fields are mandatory</div>
</h3>
<?php	$attributes = array('id' => 'add_form', 'name' => 'add_form', 'method'=>'POST','enctype'=>"multipart/form-data");
    echo form_open(base_url('administrator/conversation/'), $attributes);
    ?>
<div id="add_DIV">
<div class="requriedfield"></div>
<div class="main-title">

<?php
    $this->load->view("common/message");
 ?>
 <h1 align="center"> Manage Message</h1>
 <br/><br/>
 <div class="margin">

 	    <div class="tb2-main" style="">
		
		<div class="tb2-head tab-ename">Message </div>
		<div class="tb2-head tb2-border">Date</div>
		<div class="tb2-head tb2-border">User Name</div>
		<div class="clear"></div>		
		
		<?php 
			if($user_msg)
			{
				foreach($user_msg as $user)
				{	
		?>
			<div class="tb2-data tab-ename"><a href="<?php echo base_url("administrator/conversation/show_message/".$user['send_id']); ?>"><?php echo $user['message']; ?></a></div>
			<div class="tb2-data tb2-border" >
			
		<?php
				echo date("D M Y H:i a",strtotime($user['date']));
		?>
			</div>
		<?php 
			if($userdata)
			{
				foreach($userdata as $uname)
				{
					if($uname['id'] == $user['send_id'])
					{
		?>		
			<div class="tb2-data  tab-ename" ><?php echo $uname['user_name'] ?></div>
			<div class="clear sep"></div>
			<?php			
					}
				}
			}		
			}
		}
		?>
		<div class="clear"></div>
	</div>


                  <div class="clear sep"></div>
                    </div>
                </div>
        <?php echo form_close(); ?>
        </div>
    </div>
</div>