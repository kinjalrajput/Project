<script language="javascript" src="<?php echo base_url('assets/js/user.js'); ?>"></script>
<form  class="reg_form" id="reg_form" name="reg_form" method="post" action="<?php echo base_url('authentication/do_registration');?>" enctype	="multipart/form-data">
	<div class="content">
			<br/><h1 align="center">Registration</h1>
					<?php
    $this->load->view("common/message");
    ?>
    	<div class="clear sep"></div>

									<div class="margin">
										<div class="lable">First Name :</div>
										<div class="inp-con"><input name="first_name" type="text" id="first_name" value=""  ></div>
									
										<div class="lable">Last Name :</div>
										<div class="inp-con"><input name="last_name" type="text" id="last_name" value="" ></div>
										
										<div class="lable">Username :</div>
										<div class="inp-con"><input name="user_name" type="text" id="user_name" value="" ></div>
										
										<div class="lable">Password :</div>
										<div class="inp-con"><input name="password" type="password" id="password" value="" ></div>
										
										<div class="lable">Email :</div>
										<div class="inp-con"><input name="email" type="text" id="email" value="" ></div>
										
										<div class="lable">Contact :</div>
										<div class="inp-con"><input type="text" name="contact" id="contact" ></div>
										
										<div class="lable">Gender :</div>
										<div class="inp-con"><input type="radio" name="gender" id="gender"  value="male" >Male
                                                                   <input type="radio" name="gender" id="gender"  value="female">Female
										</div>
										
										<div class="lable">Language:</div>
										<div class="inp-con"><input type="checkbox" name="language[]" id="language" value="php" >PHP
										<input type="checkbox" name="language[]" id="language"  value="android"  >ANDROID
									    <input type="checkbox" name="language[]" id="language"  value="iso"  >ISO
								        <input type="checkbox" name="language[]" id="language" value="java" >jAVA
								        <div class="clear sep"></div>
                                         <div class="lable">Country :</div
                                         <div class="inp-con"><select name="country" id="country" >
                                         <option value="select country">--Select Country--</option>
                                         <option value="india">India</option>
                                         <option value="australia">Australia</option>
                                         <option value="japan">Japan</option>
                                         </select></div>
                                         
                                         <div class="lable">Image :</div>
										<div class="inp-con"><input type="file" name="image" id="image" /></div>
										
										
										<div class="lable">&nbsp;</div>
										<div class="inp-con"><input type="submit" value="Register" name="save" class="blue-btn"> </div>
										<div class="clear"></div>
									</div>
								<div class="clear sep"></div>
							</div>
		</form>
