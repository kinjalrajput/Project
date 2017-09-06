<form  class="reg_form" id="reg_form" name="reg_form" method="post" action="<?php echo base_url('conversation/save_message');?>" enctype="multipart/form-data">
	<div class="content">
			<br/><h1 align="center">Conversation</h1>
			<br/><br/>
					<?php
    $this->load->view("common/message");
    ?>

    <div class="margin">
    	<div class="lable">Select User:</div>
		<div class="inp-con"><select name="receive_id">
		<option>Select User</option>
		<option value="0">Admin</option>
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
		<div class="inp-con">
		<input type="submit" name="submit" value="send" /></div>
		<div class="clear sep"></div>

        <a href="<?php echo base_url('conversation/get_userlist'); ?> "> Manage Conversation</a>
        <div class="clear sep"></div>

    </div>
</div>
</form>