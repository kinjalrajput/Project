<?php

	define("PAGE_TITLE","Login");
	include("common/admin_header.php");
	include("lib.php");
	session_start();
	displyMessage();
	$flag=validlogin();
	//print_r($_SESSION);
	//exit;
	if($flag)
	{
		header("location:home.php");
	}
?>
<style>
  .col-xs-8 {
    width: 60%;
    background-color:white;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.modal-header {
	border-bottom:none;
}

</style
<body>
<div class="container">
  <div id="login-overlay" class="modal-dialog">
      <div class=" col-xs-8 col-md-offset-2">
          <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Login Here</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-13  col-md-offset3">
                      <div class="well">
                          <form id="loginForm" method="post" action="home.php" >
                              <div class="form-group">
                                  <label for="user_name" class="control-label">User Name</label>
                                  <input type="text" class="form-control" id="user_name" name="user_name" title="Please enter your Name" autofocus>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password"  title="Please enter your Password">
                                  <span class="help-block"></span>
                              </div>
                              <button type="submit" class="btn btn-success btn-block" name="login" id="login" >Login</button>
                              
							  <div class="checkbox ">
							<label>
							<input type="checkbox" > Remember me
							</label>
							</div>
                           
							
							<a href="register.php">&nbsp;&nbsp;&nbsp;Register Here</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="forgotpassword.php">Forgot Password</a>
							
                          </form>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>

</body>
