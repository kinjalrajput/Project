<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title></title>
</head>
<table width="100%" height="100%"  cellpadding="2" cellspacing="3">
	<tr>
		<td>Dear <?php echo $user_name ?>,</td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('client/client_authentication/reset_password?q='.$encrypturl); ?>">Click here</a> to reset your password.</td>
	</tr>
	<tr>
		<td>Thank you</td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url(); ?>"><?php echo $this->config->item('site_name'); ?></a></td>
	</tr>
	<tr>
		<td></td>
	</tr>
</table>
<body>
</body>
</html>
