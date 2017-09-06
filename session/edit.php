<?php
	
	
	define("PAGE_TITLE","Edit");
	include("common/header.php");
	session_start();
	$id = $_GET['id'];
	
?>
<style>
  .col-xs-10 {
    width: 100%;
    background-color:white;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.modal-header {
	border-bottom:none;
}
</style>
<div class="container">
  <div id="login-overlay" class="modal-dialog">
      <div class=" col-xs-10 col-md-offset-1">
          <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Here</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-13  col-md-offset3">
                      <div class="well">
                          <form id="loginForm" method="post" novalidate action="form_process.php" >
                              
							  <div class="form-group">
                                  <label for="first_name" class="control-label">First Name</label>
                                  <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $_SESSION['forms'][$id]['first_name']; ?>" >
                                  <span class="help-block"></span>
                              </div>
								<div class="form-group">
								<div class="form-group">
                                  <label for="last_name" class="control-label">Last Name</label>
                                  <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $_SESSION['forms'][$id]['last_name']; ?>" >
                                  <span class="help-block"></span>
                              </div>
                                  <label for="user_name" class="control-label">User Name</label>
                                  <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $_SESSION['forms'][$id]['user_name'];?>" >
                                  <span class="help-block"></span>
                              </div>
                              
							  <div class="form-group">
                                  <label for="contact" class="control-label">Contact</label>
                                  <input type="text" class="form-control" id="number" name="number" value=" <?php echo $_SESSION['forms'][$id]['number']; ?>">
                                  <span class="help-block"></span>
                              </div>
							  <div class="form-group">
                               <label for="gender" class="control-label">Gender</label>
                                  
							  <div class="radio">
								<label>
								<input type="radio" name="gender[]" id="gender" value="female"<?php if( $_SESSION['forms'][$id]['gender']=="female"){echo "checked=='checked'";}?>>
								Female
								</label>
								</div>
								<div class="radio">
								<label>
								<input type="radio" name="gender[]" id="gender" value="male"<?php if(  $_SESSION['forms'][$id]['gender']=="male"){echo "checked=='checked'";}?>>
								Male
								</label>
								</div>
								</div>
								<div class="form-group">
                              <label for="gender" class="control-label" >Qualification</label>
      
								<select class="form-control" id="select" title="select your Qualification" name="Qualification">
								<option value="be"<?php if($_SESSION['forms'][$id]['Qualification']=="be"){echo "selected=='selected'";}?>>B.E</option>
								<option value="bsc"<?php if($_SESSION['forms'][$id]['Qualification']=="bsc"){echo "selected=='selected'";}?>>BSC</option>
								<option value="bsc It"<?php if($_SESSION['forms'][$id]['Qualification']=="bsc It"){echo "selected=='selected'";}?>>BSC IT</option>
								<option value="bca"<?php if($_SESSION['forms'][$id]['Qualification']=="bca"){echo "selected=='selected'";}?>>BCA</option>
								<option value="me"<?php if($_SESSION['forms'][$id]['Qualification']=="me"){echo "selected=='selected'";}?>>M.E</option>
								<option value="msc"<?php if($_SESSION['forms'][$id]['Qualification']=="msc"){echo "selected=='selected'";}?>>MSC</option>
								<option value="msc It"<?php if($_SESSION['forms'][$id]['Qualification']=="msc It"){echo "selected=='selected'";}?>>MSC IT</option>
								<option value="mca"<?php if($_SESSION['forms'][$id]['Qualification']=="mca"){echo "selected=='selected'";}?>>MCA</option>
								<option value="m.phill"<?php if($_SESSION['forms'][$id]['Qualification']=="m.phill"){echo "selected=='selected'";}?>>M.PHILL</option>
								</select>
								</div>
								<?php $planguage= explode(',', $_SESSION['forms'][$id]['language']);?>
							  <div class="form-group">
                                <label for="language" class="control-label">Programming Language Known</label>
                                <div class="checkbox">
								<label>
								<input type="checkbox" name="language[]" id="language" value="php"<?php  if(in_array("php",$planguage)){echo "checked='checked'";}?> > PHP
								</label>
								</div>
								<div class="checkbox">
								<label>
								<input type="checkbox" name="language[]" id="language" value="android"<?php  if(in_array("android",$planguage)){echo "checked='checked'";}?>> ANDROID
								</label>
								</div>
								<div class="checkbox">
								<label >
								<input type="checkbox" name="language[]" id="language" value="asp.net"<?php  if(in_array("asp.net",$planguage)){echo "checked='checked'";}?>> ASP.NET
								</label>
								</div>
								<div class="checkbox">
								<label>
								<input type="checkbox" name="language[]" id="language" value="ios"<?php  if(in_array("ios",$planguage)){echo "checked='checked'";}?>> IOS          
								</label>
								</div>
								</div>
								
							  <input type="hidden" name="id" value="<?php echo $id; ?>" >
                              <button type="submit" class="btn btn-success btn-block" name="update" id="register">Update</button>
                              <br>
                            <p id="message"></p>
							
							
							
                          </form>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>

</body>
