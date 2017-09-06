<form  class="reg_form" id="reg_form" name="reg_form" method="post" action="<?php echo base_url('album/do_album');?>" enctype="multipart/form-data">
	<div class="content">
			<br/><h1 align="center">Album</h1>
					<?php
    $this->load->view("common/message");
    ?>
    	
					
<div class="clear sep"></div>
<div class="margin">

<div class="lable">Album Name :</div>
<div class="inp-con"><input name="album_name" type="text" value="<?php echo $row['album_name'];?>"></div>

<div class="lable">Choose Image :</div>
<div class="inp-con"><input name="image" type="file" id="image" size="30" /></div>

<div class="lable">&nbsp;</div>
<div class="inp-con"><input type="submit" name="submit" id="submit" vlaue="Submit" return="checknull()"></div>
<div class="clear sep"></div>
<div class="lable">&nbsp;<a href="<?php echo base_url('album/view_album');?>" align="center">View Album</a></div>

	</div>
</div>
</form>