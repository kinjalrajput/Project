<form  class="reg_form" id="reg_form" name="reg_form" method="post" action="<?php echo base_url('album/do_gallery');?>" enctype="multipart/form-data">
	<div class="content">
			<br/><h1 align="center">Gallery</h1>
					<?php
    $this->load->view("common/message");
    ?>
    	
					
<div class="clear sep"></div>
<div class="margin">
<div class="lable">Album Name:</div>
<div class="inp-con">
<select name="album_id">
	<option value="">Select Album</option>
    <?php
    if($info)
    {
		foreach($info as $r)
		{
								     
	?>
    <option value="<?php echo $r['id']; ?>"><?php echo $r['album_name'];?></option>
    <?php }
   }
    ?>
</select>

</div>
 

<div class="lable"> Album image:</div>
<div class="inp-con"><input name="image[]" type="file" id="image"  multiple="multiple" size="30"/></div>

<div class="lable">&nbsp;</div>
<input type="submit"  name="submit" value="Upload"/>
<input type="reset"  name="reset" value="Reset">

</div>
</div>
