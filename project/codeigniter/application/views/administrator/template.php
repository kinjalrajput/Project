<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/theme4.css'; ?>">
        
        <script language="javascript" src="<?php echo base_url('assets/js/jquery-1.11.1.js'); ?>"></script>
        <?php  echo $this->assets_load->print_assets('header'); ?>
    </head>
    <style>
        .leftdivhome
        {
        float:left;
        width:200px;
        }
    </style>
    
    <body>
        <div class="bg-header">&nbsp;</div>
        <div id="container">
            <?php echo $header; ?>
            <?php  echo $content; ?>
            <?php echo $footer; ?>
        </div>
        <div class="clear"></div>
        <div class="bg-footer">
            
        </div>
        <script language="javascript">APPLICATION_URL="<?php echo base_url(); ?>"</script>
        <script language="javascript">ASSETS_URL="<?php echo base_url('assets'); ?>"</script>
       
         <?php
            echo $this->assets_load->print_assets('footer');
            ?>
        </div>
    </body>
</html>
