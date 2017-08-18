<?php

define("PAGE_TITLE","Index");
	include("common/header.php");
	session_start();
	

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
                <h4 class="modal-title" id="myModalLabel">Register Here</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-13  col-md-offset3">
                      <div class="well">
                          <form id="loginForm" method="post" novalidate action="form_process.php" >
                              
							  <div class="form-group">
                                  <label for="first_name" class="control-label">First Name</label>
                                  <input type="text" class="form-control" id="first_name" name="first_name" value="" required="" title="Please enter your First Name" placeholder="kinjal">
                                  <span class="help-block"></span>
                              </div>
								<div class="form-group">
								<div class="form-group">
                                  <label for="last_name" class="control-label">Last Name</label>
                                  <input type="text" class="form-control" id="last_name" name="last_name" value="" required="" title="Please enter your  Last Name" placeholder="zankat">
                                  <span class="help-block"></span>
                              </div>
                                  <label for="user_name" class="control-label">User Name</label>
                                  <input type="text" class="form-control" id="user_name" name="user_name" value="" required="" title="Please enter your  User Name" placeholder="kinju555">
                                  <span class="help-block"></span>
                              </div>
                              
							  <div class="form-group">
                                  <label for="contact" class="control-label">Contact</label>
                                  <input type="number" class="form-control" id="number" name="number" value="" title="Please enter your Contact No" placeholder="9898897056">
                                  <span class="help-block"></span>
                              </div>
							  <div class="form-group">
                               <label for="gender" class="control-label">Gender</label>
                                  
							  <div class="radio">
								<label>
								<input type="radio" name="gender[]" id="gender" value="female" >
								Female
								</label>
								</div>
								<div class="radio">
								<label>
								<input type="radio" name="gender[]" id="gender" value="male">
								Male
								</label>
								</div>
								</div>
								<div class="form-group">
                              <label for="gender" class="control-label" >Qualification</label>
      
								<select class="form-control" id="select" title="select your Qualification" name="Qualification">
								<option value="be">B.E</option>
								<option value="bsc">BSC</option>
								<option value="bsc It">BSC IT</option>
								<option value="bca">BCA</option>
								<option value="me">M.E</option>
								<option value="msc">MSC</option>
								<option value="msc It">MSC IT</option>
								<option value="mca">MCA</option>
								<option value="m.phill">M.PHILL</option>
								</select>
								</div>
							  <div class="form-group">
                                <label for="language" class="control-label">Programming Language Known</label>
                                <div class="checkbox">
								<label>
								<input type="checkbox" name="language[]" id="language" value="php" > PHP
								</label>
								</div>
								<div class="checkbox">
								<label>
								<input type="checkbox" name="language[]" id="language" value="android"> ANDROID
								</label>
								</div>
								<div class="checkbox">
								<label >
								<input type="checkbox" name="language[]" id="language" value="asp.net"> ASP.NET
								</label>
								</div>
								<div class="checkbox">
								<label>
								<input type="checkbox" name="language[]" id="language" value="ios"> IOS          
								</label>
								</div>
								</div>
								
							  
                              <button type="submit" class="btn btn-success btn-block" name="register" id="register">Register</button>
                              <br>
                              <center>
                              	Made By Kinjal Rajput
                              </center>
                            <p id="message"></p>
							
							
							
                          </form>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>

</body>

<br/><br/><br/>
	<?php
			/*if(isset($_SESSION['forms'])) {
				$forms = $_SESSION['forms'];
				
				echo '<table border cellpadding="4">';
				echo '<tr>
					<th>FirstName</th>
					<th>LastName</th>
					<th>UserName</th>
					<th>Contact</th>
					<th>Gender</th>
					<th>Qualification</th>
					<th>Language</th>
				</tr>';
				
				foreach($forms as $form) {
					echo '<tr>';
					echo "<td>$form[first_name]</td>
					<td>$form[last_name]</td>
					<td>$form[user_name]</td>
					<td>$form[number]</td>
					<td>$form[gender]</td>
					<td>$form[Qualification]</td>
					<td>$form[language]</td>";
					echo '</tr>';
				}
				
				echo '</table>';
				//unset($_SESSION['forms']);
			}*/
		?>