<form  class="reg_form" id="reg_form" name="reg_form" method="post" action="<?php echo base_url('');?>" enctype="multipart/form-data">
	<div class="content">
			<br/><h1 align="center"> Show Conversation</h1>
			<br/><br/>
					<?php
    $this->load->view("common/message");
    ?>
 <div class="clear sep"></div>
 <div class="content">
 	<div class="margin">
<div class="conv">

<?php	
				if($conversation)
				{
					foreach($conversation as $con)
					{
						if($con['send_id'] == $this->session->userdata('user_id') )
						{
					
				?>
				<div style="float:left; margin-left:5px;"><font style="color:#CC0033;"><b><?php  echo $con['user_name']; ?></b></font>&nbsp;:<?php  echo $con['message']; ?></div>
				<div class="clear sep"></div>
				
				 <?php
						}
				 
				 		if($con['receive_id'] == $this->session->userdata('user_id') )
						{
					
					?>
				
				 <div style="float:right; margin-right:5px;"><?php  echo $con['message']; ?>:&nbsp;<font style="color:#CC0033;"><b><?php  echo $con['user_name']; ?></b></font></div>
				 <div class="clear sep"></div>
				 
				<?php
						}
				
					}
				}
			
				?>
</div>
</div>

 </div>

    
</div>
</form>