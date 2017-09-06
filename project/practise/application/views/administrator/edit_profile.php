<div id="wrapper">
<div id="content">
<div id="box">
<h3 class="user-heading">
Account Settings
<div class="user-heading right"><span id="fieldrequried">*</span> Fields are mandatory</div>
</h3>
<?php	$attributes = array('id' => 'add_form', 'name' => 'add_form', 'method'=>'POST','enctype'=>"multipart/form-data");
    echo form_open(base_url('administrator/admin_profile/profile_update'), $attributes);
    ?>
<div id="add_DIV">
<div class="requriedfield"></div>
<div class="main-title">

<?php
    $this->load->view("common/message");
    ?>
<!--<div style="text-align:right" >
* Fields are mandatory
</div>-->
<div class="table-subbg-main02" >
<div class="left-side">User Name:<span id="fieldrequried">*</span></div>
<div class="right-side"><input name="user_name" type="text" id="user_name" value="<?php echo htmlentities(html_entity_decode($user_info['user_name'])); ?>" size="30" maxlength="75" onkeyup="javascript:account.save(event);"class="int_cls"></div>
<div class="clear"></div>
</div>
<div class="table-subbg-main01">
<div class="left-side">First Name:<span id="fieldrequried">*</span></div>
<div class="right-side"><input name="first_name" type="text" id="first_name" value="<?php echo htmlentities(html_entity_decode($user_info['first_name'])); ?>" size="30" maxlength="45" class="int_cls"></div>
<div class="clear"></div>
</div>
<div class="table-subbg-main02">
<div class="left-side">Last Name:<span id="fieldrequried">*</span></div>
<div class="right-side"><input name="last_name" type="text" id="last_name" value="<?php echo htmlentities(html_entity_decode($user_info['last_name'])); ?>" size="30" maxlength="45" class="int_cls"></div>
<div class="clear"></div>
</div>
<div class="table-subbg-main01">
<div class="left-side">Email:<span id="fieldrequried">*</span></div>
<div class="right-side"><input name="email" type="text" id="email" value="<?php echo $user_info['email']; ?>" size="30" class="int_cls"  /></div>
<div class="clear"></div>
</div>

<div class="table-subbg-main01 table-btn-top">
<div class="button-add-edit">
<div class="button">
<input id="button1" name="update" type="submit" value="Update" />
<input id="button2" name="okay" type="reset" value="Reset">
</div>
</div>
<div class="clear"></div>
</div>
<div class="clear sep"></div>
</div>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>