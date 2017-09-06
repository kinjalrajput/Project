<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> <meta http-equiv="pragma" content="no-cache" /> <meta http-equiv="Expires" content="-1" /> <meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
<title><?php echo "Login | ".$this->config->item("site_name"); ?></title>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

<script type="text/javascript" >
$(function() {
  $("#user_name").focus();
  
});
</script>

</head>

<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ADMIN PANNEL</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li ><a href="lession4.php">Login<span class="sr-only">(current)</span></a></li>
	  <li ><a href="programme1.php">Admin Profile<span class="sr-only">(current)</span></a></li>
        <li ><a href="string.php">Form <span class="sr-only">(current)</span></a></li>
        
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">If Else <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="gradesystem.php">Grade Of Student </a></li>
            <li><a href="maxnumber.php">Max/Min Number</a></li>
            <li><a href="number_character.php">Find The Number Or Character </a></li>
            <li><a href="number_divisible.php">Number Divisible  </a></li>
           <li><a href="profitloss.php">Profit Or Loss </a></li>
             <li><a href="triangle.php">Triangles Programme </a></li>
             <li><a href="minite.php">Find The Total Minites</a></li>
             <li><a href="numberofnote.php">Number Of Notes</a></li>
             <li><a href="integernumber.php">Integer Number</a></li>
             <li><a href="votting.php">Eligible Voter</a></li>
             <li><a href="paybill.php">Electricsity Bill</a></li>

            </ul>
            </li>
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Swith Case<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="weekprogramme.php"> Find The Week Day </a></li>
          <li><a href="monthprogramme.php">Find The Month Of Days</a></li>
          <li><a href="digit_name.php">Print Digite Name </a></li>
          <li><a href="grade_declaration.php">Grade Declaration</a></li>
      </ul></li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Array<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="singlearray.php">Array Types</a></li>
          <li><a href="tablecontent.php">Table Content </a></li>
         <li><a href="arraycontent.php">Array Content</a></li>
         </ul></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Loop Content<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="forloop.php">ForLoop </a></li>
          <li><a href="forloop1.php">ForLoop1 </a></li>
          <li><a href="foreachloop.php">ForeachLoop</a></li>
          <li><a href="whileloop.php">WhileLoop</a></li>
          <li><a href="dateformat.php">DateFormat</a></li>
          </ul></li>
        
        <li ><a href="login.php">Login<span class="sr-only">(current)</span></a></li>

     </ul>
            </div>
  </div>
</nav>  
  
	
</body></html>
