<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title><?php echo "Forget Password | ".$this->config->item("site_name"); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/theme4.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.1.js') ?>"></script>

</head>

<body>
<div class="bg-header">

	
<div align="center" class="login-header">Codeigniter</div>
	</div>
</div>
<div id="container">
	<div class="clear" style="height:99px;"></div>     
	<div id="wrapper">
		<div id="content" style="width:550px; margin:125px 0px 0px 350px;min-height:130px">
			<div id="box">
            	<h3 id="adduser">Administrator Forgot Password</h3>
				 
					<form id="form" name="loginForm" method="post" action="<?php echo $this->config->item('base_url').'/administrator/administrator/recover_password'; ?>">
						<?php
				  			$this->load->view("common/message");
						?>
					  <div class="table-subbg-main01">
						<div class="loginleft-side"><b>E-mail Address :</b> </div> 
						<div class="loginright-side"><input type="text" name="email" id="email" value="<?php if(isset($forgotemail['email'])){echo $forgotemail['email'];}?>" tabindex="1" size="22"></div>
						<div class="clear"></div>
					  </div>	
					  <div class="table-subbg-main02 table-btn-top">
						<div class="loginleft-side">&nbsp;</div>
					   <div class="loginright-side"><input id="button1" name="submit" type="submit" value="Submit">
						   <a class="anchor-button" href="<?php echo base_url('administrator/authentication') ?>" >Cancel</a>
					   </div>
					   <div class="clear"></div>
					  </div>
				  
					</form>
							</div>
			<div style="clear:both; padding:5px;"></div>
			<div style="text-align:center"></div>
		</div>
	</div>
	
</div>


</body></html>
