<form  class="reg_form" id="reg_form" name="reg_form" method="post" action="<?php echo base_url('');?>" enctype="multipart/form-data">
	<div class="content">
			<br/><h1 align="center"> Manage Conversation</h1>
			<br/><br/>
					<?php
    $this->load->view("common/message");
    ?>

    <div class="margin">

 	    <div class="tb2-main" style="">
		
		<div class="tb2-head tab-ename">Message </div>
		<div class="tb2-head tb2-border">Date</div>
		<div class="tb2-head tb2-border">User Name</div>
		<div class="clear"></div>

		<?php 
			if($user_msg)
			{
				foreach($user_msg as $user)
				{	
		?>
			<div class="tb2-data tab-ename"><a href="<?php echo base_url("conversation/show_message/".$user['send_id']); ?>"><?php echo $user['message']; ?></a></div>
			<div class="tb2-data tb2-border" >
			
		<?php
				echo date("D M Y H:i a",strtotime($user['date']));
		?>
			</div>
				
			<div class="tb2-data  tab-ename" ><?php echo $user['user_name'] ?></div>
			<div class="clear sep"></div>
			<?php			
						
			}
		}
		?>
		<div class="clear"></div>


	</div>
</div>

 <div class="clear sep"></div>

    
</div>
</form>