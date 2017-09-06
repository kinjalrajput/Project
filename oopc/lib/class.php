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
<?php

	class MyWebsite
	{
		public $title;
		public $description;
		/*this function used to display welcometitle  this known as constructor*/
		public function MyWebsite()
		{
			echo"Welcome to MyWebsite";
		}
		public function home()
		{
			$this->title="<h3>This is My HomePage</h3>";
			$this->description="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
			Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
			deserunt mollit anim id est laborum.</p>";
		}

		public function about()
		{
			$this->title="<h3>This is My AboutPage</h3>";
			$this->description="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
			Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
			deserunt mollit anim id est laborum.</p>";
		}
		
		public function contact()
		{
			
			$this->description='<div class="container">
		    <div id="login-overlay" class="modal-dialog">
			  <div class=" col-xs-10 col-md-offset-1">
				  <div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Contact Here</h4>
				  </div>
					  <div class="modal-body">
						  <div class="row">
							  <div class="col-xs-13  col-md-offset3">
								  <div class="well">
									  <form id="loginForm" method="post" action="json.php" novalidate="novalidate" >
										 <div class="form-group">
										 <label for="user_name" class="control-label">User Name</label>
											  <input type="text" class="form-control" id="user_name" name="user_name" value="" required="" title="Please enter your  User Name" placeholder="">
											  <span class="help-block"></span>
										  </div>
										  <div class="form-group">
											  <label for="contact" class="control-label">Contact</label>
											  <input type="number" class="form-control" id="number" name="number" value="" required="" title="Please enter your Contact No">
											  <span class="help-block"></span>
											</div>
											<div class="form-group">
											<label for="message" class="control-label">Message</label>
											  <textarea type="text" class="form-control" id="user_name" name="user_name" value="" required="" title="Please enter your  User Name" placeholder="">
											 </textarea> 
											 <span class="help-block"></span>
										  </div>
											<button type="submit" class="btn btn-success btn-block" name="register"  value="register" id="register">Register</button>
										  <br>
										<p id="message"></p>
										
										
										
									  </form>
								  </div>
							  </div>

						  </div>
					  </div>
				  </div>
			  </div>';
		}
		public function info($name,$country="Austrilia")
		{	
			echo"<br>";
			echo $name." lived in ".$country;
			
		}
		public function __construct()
		{
			echo " welcome to myweb  ";
		}
	}

?>