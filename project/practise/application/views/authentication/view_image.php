<form class="reg_form" id="reg_form" name="reg_form" method="post" action="<?php echo base_url('album/view_image');?>" enctype="multipart/form-data">
	<div class="content">
			<br/><h1 align="center">Album Images</h1>
			<br/><br/>
					<?php
    $this->load->view("common/message");

				
					if($row)
					
					 {
					
						foreach($row as $album)
						{
		           ?>
                <div style="float:left;">
		        <img src="<?php echo base_url("./assets/upload/gallery/".$album['image']);?>" width="150px;" height="150px;" />
                <a href="<?php echo base_url("album/delete_image/".$album['id']); ?>"><img src="<?php echo base_url('assets/icons/remove.png'); ?>" ></a></br>
		  		
                 </div> 	
                 <?php  }
					 }
				   else
					{
					?>
                    	<div align="center">No record Found.</div>
                    <?php
				}
		?>
	
    
     <?php form_close();?>

</div>
</form>