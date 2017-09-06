<form id="reg_form" name="reg_form" method="post" action="<?php echo base_url('password/do_forgot_password');?>" encrypt="multipart/form-data">
	<div class="content">
		<br/><h1 align="center">Forget Password </h1>
			<?php
    $this->load->view("common/message");
    ?>
    <div class="clear sep"></div>
    <div class="margin">
<div class="lable">E-mail</div>
<div class="inp-con"><input type="text" name="email" id="email" /></div>

<div class="lable">&nbsp;</div>
<div class="inp-con"><input type="submit" name="login" id="button1" value="Login">
<input type="reset" name="cancel" id="button2" value="Clear"></div>
<div class="clear sep"></div>
</div>