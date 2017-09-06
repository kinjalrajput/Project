<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> <meta http-equiv="pragma" content="no-cache" /> <meta http-equiv="Expires" content="-1" /> <meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
<title><?php echo "Login | ".$this->config->item("site_name"); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/theme4.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.1.js') ?>"></script>
<script type="text/javascript" >
$(function() {
  $("#user_name").focus();
  
});
</script>
<style type="text/css">
	#content
	{
		width:550px; 
		margin-left:200px;
		min-height:140px;
	}
</style>

</head>

<body>
<div class="bg-header">

	
<div align="center" class="login-header">Codeigniter</div>
</div>
</div>
<div id="container">

  
	<div style="clear:both; height:99px;"></div>      
	<div id="wrapper">
		<div id="content" style="width:550px; margin:125px 0px 0px 350px;min-height:130px">
			<div id="box">
            	<h3 id="adduser">Administrator Login</h3>
					<div class="clear sep"></div>
					<form id="login_form" name="loginForm" method="post" action="<?php echo $this->config->item('base_url').'/administrator/authentication/do_login'; ?>">		
				  	<?php
				  		$this->load->view("common/message");
				  	?>             	
       				 
        		 <div class="table-subbg-main01">
					<div class="loginleft-side"><b>User Name :</b> </div> 
					<div class="loginright-side"><input type="text" name="user_name" id="user_name" tabindex="1" value="<?php echo $user_name; ?>" style="min-width:250px;" ></div>
					<div class="clear"></div>
				  </div>	
				  
				  <div class="table-subbg-main02">
					<div class="loginleft-side"><b>Password : </b></div>
					<div class="loginright-side"><input type="password" name="password" id="password" tabindex="2" value="<?php echo $password; ?>" style="min-width:250px;" ></div>
					<div class="clear"></div>
				  </div>	
				  
				  <div class="table-subbg-main01">
				  	<div class="loginleft-side">&nbsp;</div>
				  	<div class="loginright-side"><input id="send" name="submit" type="submit" value="Login"></div>
				  	<div class="clear"></div>
				  </div>	
				  <div class="table-subbg-main02">
				  	<div class="loginleft-side">&nbsp;</div>
				  	<div class="loginright-side"><input id="remember" name="remember" type="checkbox" <?php if($user_name != ''){echo 'checked="checked"'; } ?> > <strong>Remember me</strong></div>
				  	<div class="clear"></div>
				  </div>	
				  <div class="table-subbg-main01">
				   <div class="loginleft-side">&nbsp;</div>
				  <div class="loginright-side">
				  <b><a href="<?php echo base_url('administrator/authentication/forget_password');  ?>"> I have forgotten my password</a></b>
				  </div>
				 <div class="clear "></div>
				 </div>
				</form>
			</div>

			<div style="clear:both; padding:5px;"></div>
			<div style="text-align:center"></div>
		</div>
	</div>
	
</div>


</body></html>
