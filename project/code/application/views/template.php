<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'; ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/theme4.css'; ?>">
        <!--[if IE 6]>
        <![endif]-->
        
        <?php  echo $this->assets_load->print_assets('header'); ?>
    </head>
    
    <body >
    	
        		<?php echo $header; ?>
            <?php  echo $content; ?>
            <?php echo $footer; ?>
             <script language="javascript">APPLICATION_URL="<?php echo base_url(); ?>"</script>
        	 <script language="javascript">ASSETS_URL="<?php echo base_url('assets'); ?>"</script>
        		 
        		 
        		  
        <?php
            echo $this->assets_load->print_assets('footer');
            ?>
        </div>
    </body>
</html>