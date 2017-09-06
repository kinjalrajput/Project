<div id="content" >
    <div id="box">
        <h3 class="user-heading">
            Change Password
            <div class="user-heading right"><span id="fieldrequried">*</span> Fields are mandatory</div>
        </h3>
        <?php	$attributes = array('id' => 'add_form', 'name' => 'add_form', 'method'=>'POST','enctype'=>"multipart/form-data");
            echo form_open(base_url('administrator/admin_profile/update_password'), $attributes); 
        ?>
             <div id="add_DIV">
                <div class="requriedfield"></div>
                <div class="main-title">
                   
                    <?php
                        $this->load->view("common/message");
                        ?>
                    <div class="table-subbg-main01">
                        <div class="left-side">Current Password:<span id="fieldrequried">*</span></div>
                        <div class="right-side"><input name="password" type="password" id="password" value="" size="30" maxlength="45" class="int_cls"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="table-subbg-main02">
                        <div class="left-side">New Password:<span id="fieldrequried">*</span></div>
                        <div class="right-side"><input name="new_password" type="password" id="new_password" value="" size="30" maxlength="45" class="int_cls"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="table-subbg-main01">
                        <div class="left-side">Confirm New Password:<span id="fieldrequried">*</span></div>
                        <div class="right-side"><input name="c_password" type="password" id="c_password" value="" size="30" maxlength="45" onkeyup="javascript:account.password(event);" class="int_cls"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="table-subbg-main02 table-btn-top">
                        <div class="button-add-edit">
                            <div class="button">
                                <input id="button1" name="update" type="submit" value="Save" onclick="javascript:return account.savePassword();">
                                <!--<input id="button2" name="okay" type="reset" value="Cancel" ></div>-->
                                <a class="anchor-button" href="<?php echo base_url('administrator'); ?>">Cancel</a>
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