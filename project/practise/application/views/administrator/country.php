<div id="wrapper">
<div id="content">
<div id="box">
<h3 class="user-heading">
Country
<div class="user-heading right"><span id="fieldrequried">*</span> Fields are mandatory</div>
</h3>
<?php	$attributes = array('id' => 'add_form', 'name' => 'add_form', 'method'=>'POST','enctype'=>"multipart/form-data");
    echo form_open(base_url('administrator/country/save'), $attributes);
    ?>
<div id="add_DIV">
<div class="requriedfield"></div>
<div class="main-title">

<?php
    $this->load->view("common/message");
    ?>
  <p>
  <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
  <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>" />
  </p>
                        <div class="table-subbg-main01">
                        <div class="left-side">Country Name:<span id="fieldrequried">*</span></div>
                        <div class="right-side"><input name="country_name" type="text" id="country_name" value="<?php if(isset($countrydata['country_name'])) echo $countrydata['country_name'];?>" size="20" maxlength="35" class="int_cls"></div>
                        <div class="clear"></div>
                        </div>
										

                        <div class="table-subbg-main02 table-btn-top">
                        <div class="button-add-edit">
                            <div class="button">
                 <input type="submit" value="Save" value="<?php if($mode == 'add'){ ?>Save <?php }else{ ?> Update <?php }?>"/>
                          </div>
                            <div class="clear"></div>
                        </div>
                        <a href="<?php echo base_url('administrator/country/manage_country'); ?>">Country Management</a>

                        <div class="clear sep"></div>
                    </div>
                </div>
        <?php echo form_close(); ?>
        </div>
    </div>
</div>