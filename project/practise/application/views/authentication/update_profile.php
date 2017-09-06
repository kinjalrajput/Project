<form  class="reg_form" id="reg_form" name="reg_form" method="post" action="<?php echo base_url('update_profile/do_profile');?>" enctype="multipart/form-data">
	<div class="content">
			<br/><h1 align="center">Update Profile</h1>
					<?php
    $this->load->view("common/message");
    ?>
    	
					
<div class="clear sep"></div>
									<div class="margin">
										<div class="lable">First Name :</div>
										<div class="inp-con"><input name="first_name" type="text" id="first_name" value="<?php echo $row['first_name'];?>"  ></div>
									
										<div class="lable">Last Name :</div>
										<div class="inp-con"><input name="last_name" type="text" id="last_name" value="<?php echo $row['last_name'];?>" ></div>
										
										<div class="lable">User Name :</div>
										<div class="inp-con"><input name="user_name" type="text" id="user_name" value="<?php echo $row['user_name'];?>" ></div>
										
										<div class="lable">Email :</div>
										<div class="inp-con"><input name="email" type="text" id="email" value="<?php echo $row['email'];?>" ></div>
										
										<div class="lable">Contact :</div>
										<div class="inp-con"><input type="text" name="contact" id="contact" value="<?php echo $row['contact'];?>"></div>
										
										<div class="lable">Gender :</div>
										<div class="inp-con"><input type="radio" name="gender" id="gender"  value="male" <?php if($row['gender']== "male"){ echo "checked='checked'";}?> />Male
                                                                   <input type="radio" name="gender" id="gender"  value="female" <?php if($row['gender']== "female"){ echo "checked='checked'";}?>/>Female
										</div>
										
										<?php $language = explode(",",$row['language']); ?>
										<div class="lable">Language:</div>
										<div class="inp-con">
											<input type="checkbox" name="language[]" id="language" value="php"<?php if(in_array("php",$language)){ echo "checked='checked'";}?> >PHP
											<input type="checkbox" name="language[]" id="language"  value="android"<?php if(in_array("android",$language)){ echo "checked='checked'";}?>  >ANDROID
									    	<input type="checkbox" name="language[]" id="language"  value="iso" <?php if(in_array("iso",$language)){ echo "checked='checked'";}?>  >ISO
								        	<input type="checkbox" name="language[]" id="language" value="java" <?php if(in_array("java",$language)){ echo "checked='checked'";}?> >JAVA
								        <div class="clear sep"></div>
                                         <div class="lable">Country :</div
                                         <div class="inp-con"><select name="country" id="country" >
                                         <option value="india"<?php if($row['country']== "india"){ echo "selected='selected'";}?>/>India</option>
                                         <option value="australia"<?php if($row['country']== "australia"){ echo "selected='selected'";}?>/>Australia</option>
                                         <option value="japan"<?php if($row['country']== "japan"){ echo "selected='selected'";}?>>Japan</option>
                                         </select></div>
                                          
                                          <?php
			                              if($row['image'] != "")
			                              {
		                                  ?>
                                         <div class="lable"> Current Image :</div>
										<div class="inp-con"><img src="<?php echo base_url('assets/upload/users/'.$row['image']); ?>" width="100"  height       ="100" /></div>
			                              <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>"  />
			 
										<?php
									     }
									     ?>

									     <div class="lable">Image:</div>
		                                 <div class="img"><input type="file" name="image" id="image" /> </div>
		                                 <div class="clear sep"></div>
       
										<div class="lable">&nbsp;</div>
										<div class="inp-con"><input type="submit" value="Update Profile" name="save" class="blue-btn"> </div>
										<div class="clear"></div>
									</div>
								<div class="clear sep"></div>
							</div>
		</form>
