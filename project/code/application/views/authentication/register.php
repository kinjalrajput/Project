<form id="add_form" name="add_form" method="post" action="<?php echo base_url('authentication/do_register'); ?>" enctype="multipart/form-data">
						<div id="add_DIV"><div class="content">
			<div class="grid-full">
				<h1 class="page-title">Register</h1>
<?php
    $this->load->view("common/message");
    ?>
				<div class="clear sep"></div>		
					<div class="title-brd-sep"></div>
				<div class="inner-box-main">
					<div class="customer-detail-right full-mainbox">
						<div class="cd-inner-new">
							<div class="cs-detail-lbox full-mainbox">
								<div class="cs-lbox-inner-new">
									<div class="acs-main">
										<div class="cs-lbox-left ac-left">First Name :</div>
										<div class="ac-lbox-right"><input name="first_name" type="text" id="first_name" value="" class="input-box ticker-ipt" ></div>
										<div class="clear sep"></div>
										<div class="cs-lbox-left ac-left">Last Name :</div>
										<div class="ac-lbox-right"><input name="last_name" type="text" id="last_name" value="" class="input-box ticker-ipt"></div>
										<div class="clear sep"></div>
										<div class="cs-lbox-left ac-left">Username :</div>
										<div class="ac-lbox-right"><input name="user_name" type="text" id="user_name" value="" class="input-box ticker-ipt" ></div>
										<div class="clear sep"></div>
										<div class="cs-lbox-left ac-left">Password :</div>
										<div class="ac-lbox-right"><input name="password" type="password" id="password" value="" class="input-box ticker-ipt" ></div>
										<div class="clear sep"></div>
										<div class="cs-lbox-left ac-left">Email :</div>
										<div class="ac-lbox-right"><input name="email" type="text" id="email" value="" class="input-box ticker-ipt" ></div>
										<div class="clear sep10"></div>
										<div class="cs-lbox-left ac-left">&nbsp;</div>
										<div class="ac-lbox-right"><input type="submit" value="Register" name="save" class="blue-btn"> </div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</div></div>
					</form>
