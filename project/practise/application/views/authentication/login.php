<form id="add_form" name="add_form" method="post" action="<?php echo base_url('authentication/do_login');?>" encrypt="multipart/form-data">
	<div class="content">
		
		</br><h1 align="center">Login</h1>
			<?php
    $this->load->view("common/message");
    ?>
    <div class="clear sep"></div>
									<div class="margin">
										<div class="lable">User Name :</div>
										<div class="inp-con"><input name="user_name" type="text" id="user_name" value="" ></div>
										
										<div class="lable">Password :</div>
										<div class="inp-con"><input name="password" type="password" id="password" value="" >
									   </div>
									
										<div class="lable">&nbsp;</div>
				  	                    <div class="inp-con"><input id="remember" name="remember" type="checkbox" <?php if($user_name != ''){echo 'checked="checked"'; } ?> > <strong>Remember me</strong></div>
				  	                 
				                       <div class="lable">&nbsp;</div>
				                       <div class="inp-con">
				                       <b><a href="<?php echo base_url('password/forgot_password'); ?>"> I have forgotten my password</a></b>
				                       </div>
										<div class="lable">&nbsp;</div>
										<div class="inp-con"><input type="submit" value="Login" name="login" > </div>
										<div class="clear"></div>
						             </div>
				     </div>
		</form>
