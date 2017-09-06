<form id="add_form" name="add_form" method="post" action="<?php echo base_url('authentication/profile_update'); ?>" enctype="multipart/form-data">
						<div id="add_DIV"><div class="content">
			<div class="grid-full">
				<h1 class="page-title">Account Settings</h1>
				
				<div class="clear sep"></div>		
					<div class="title-brd-sep"></div>
				<div class="inner-box-main">
					<div class="customer-detail-right full-mainbox">
						<div class="cd-inner-new">
							<div class="cs-detail-lbox full-mainbox">
								<div class="cs-lbox-inner-new">
									<div class="acs-main">
										<div class="cs-lbox-left ac-left">First Name :</div>
										<div class="ac-lbox-right"><input name="first_name" type="text" id="first_name" value="<?php $data['first_name']; ?>" class="input-box ticker-ipt" readonly=""></div>
										<div class="clear sep"></div>
										<div class="cs-lbox-left ac-left">Last Name :</div>
										<div class="ac-lbox-right"><input name="last_name" type="text" id="last_name" value="<?php $data['last_name']; ?>" class="input-box ticker-ipt"></div>
										<div class="clear sep"></div>
										<div class="cs-lbox-left ac-left">Username :</div>
										<div class="ac-lbox-right"><input name="email" type="text" id="user_name" value="<?php $data['email']; ?>" class="input-box ticker-ipt" readonly="readonly"></div>
										<div class="clear sep"></div>
										<div class="cs-lbox-left ac-left">Email :</div>
										<div class="ac-lbox-right"><input name="email" type="text" id="email" value="<?php $data['contact']; ?>" class="input-box ticker-ipt" onkeyup="javascript:account.save(event);"></div>
										<div class="clear sep10"></div>
										<div class="cs-lbox-left ac-left">&nbsp;</div>
										<div class="ac-lbox-right"><a href="javascript:void(0);" class="blue-btn" onclick="javascript:return account.saveAccount();">Save</a> &nbsp; <input type="reset" class="blue-btn" style="height:34px;" value="RESET"></div>
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
