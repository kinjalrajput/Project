<form class="reg_form" id="reg_form" name="reg_form" method="post" action="<?php echo base_url('album/view_album');?>" enctype="multipart/form-data">
	<div class="content">
			<br/><h1 align="center">View Album</h1>
					<?php
    $this->load->view("common/message");
	if($album)
	{
	  foreach($album as $albums)
	  {
					
	?>		
                
        <div style="float:left;"><a href="<?php echo base_url("album/view_image/".$albums['id']); ?>"><?php echo $albums['album_name'];?></a>&nbsp;&nbsp;&nbsp;
		<a href="<?php echo base_url("album/delete_album/".$albums['id']); ?>"><img src="<?php echo base_url('assets/icons/remove.png'); ?>" ></a></br>
		<a href="<?php echo base_url("album/view_image/".$albums['id']); ?>"><img src="<?php echo base_url("./assets/upload/album/".$albums['image']);?>" width="150" height="150"/></a>&nbsp;&nbsp;</div>
    
    <?php     
	  
	  }
	
	}
				
	else
    {
	
	?>
    <div align="center">No record Found.</div>
    <?php
	}
    ?>
   </div>
	<?php form_close();?>

</div>
</form>