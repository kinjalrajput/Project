<div id="content" >
  <div id="box" style="height:650px;">
    <h3 class="user-heading">
      <div class="row-fluid white-box"> Country Manage </div>
      <div class="user-heading right"><span id="fieldrequried"> </span> </div>
    </h3>
     
    <script type="text/javascript">
		function dodelete()
		{
			var x="users_form";
			var i=0;
			for(count=0;count< document.getElementById(x).length;count++)
			{
				if(document.forms[x][count].type == "checkbox" && document.forms[x][count].checked == true)
				 {
					i++;
			   	 }
			}
			if(i>0)
			{
				document.getElementById("users_form").submit();		
			}
			else
			{
				alert("Please select atleast one checkbox.");
			}
		}
		function checkuncheck(x)
		{
			if(document.getElementById("checkall").checked == true)
			{
				for(count=0 ; count < document.getElementById(x).length ; count++)
				{
					if(document.forms[x][count].type == "checkbox")
					{
						document.forms[x][count].checked= true;
					}
				}		
			}
			else
			{
				for(count=0 ; count < document.getElementById(x).length ; count++)
				{
					if(document.forms[x][count].type == "checkbox")
					{
						document.forms[x][count].checked= false;
					}
				}
			}
		}
	</script>
    <div id="page-wrapper">
      <div class="panel panel-default">
        <div class="panel-body" id="all_messages">
          <?php
            $this->load->view("common/message");
            ?>
          <div class="row margin_20 nopadding">
            <div class="col-lg-6 col-md-3 col-sm-6"> </div>
            <div class="col-lg-3 col-md-3 col-sm-3"></div>
          </div>
          <div class="row">
            <form  name="users_form" id="users_form" method="post" action="<?php echo base_url('administrator/users/delete1');?>">
              <div class="form-group shift_portion"> </div>
              <input type="hidden" id="base_url" value="<?php echo base_url('administrator/users/'); ?>" >
              <div class="table-responsive">
                <table id="users_tbl" class="table table-striped table-bordered" cellspacing="0" width="100%" border="1" bordercolor="#666666" style="background-color:#B0B0FF;">
                  <thead >
                    <tr style="" >
                      <th width="0.1%" class="text-center" style="padding-left:8px !important;padding:10px;"> <input type="checkbox" class="chk" id="checkall" name="checkall"  onClick="return checkuncheck('users_form');"  /></th>
                      <th width="10%">Country Name</th>
                      <th width="10%" >State Name</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div></form>
              <br /> <input type="submit" style="margin-left:45%;"  value="Delete" name="submit" onclick="return dodelete()" style="margin-left:250px; margin-top:5px;" />
                    <br />
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
