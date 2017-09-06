<div id="wrapper">
<div id="content">
<div id="box">
<h3 class="user-heading">
Conversation
<div class="user-heading right"><span id="fieldrequried">*</span> Fields are mandatory</div>
</h3>
<?php	$attributes = array('id' => 'add_form', 'name' => 'add_form', 'method'=>'POST','enctype'=>"multipart/form-data");
    echo form_open(base_url('administrator/conversation/message'), $attributes);
    ?>
<div id="add_DIV">
<div class="requriedfield"></div>
<div class="main-title">

<?php
    $this->load->view("common/message");
    ?>
    <div class="margin">

    	<div class="lable">Select User:</div>
		<div class="inp-con"><select name="receive_id">
		<option>Select User</option>
        <?php
            if($userdata)
            {
        ?>
        
    <?php
                foreach($userdata as $user)
                {
        ?>
             <option value="<?php echo $user['id'];?>"><?php echo $user['user_name']; ?></option>
     <?php }}
     ?>
		


		 
		</select></div>
<div class="clear sep"></div>

		<div class="lable">Chat:</div>
        <div class="inp-con"><textarea name="message"></textarea></div>
         <div class="clear sep"></div>

        <div class="lable">&nbsp;</div>
        <div class="inp-con"><input type="submit" value="Send"></div>
    	<div class="clear sep"></div>
	</div>

   <a href="<?php echo base_url('administrator/conversation/get_userlist'); ?> "> Manage Conversation</a>
    <div class="clear sep"></div>

    </div>
    </div>
    <?php echo form_close(); ?>
    </div>
    </div>
</div>