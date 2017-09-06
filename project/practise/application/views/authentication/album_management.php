<form  class="reg_form" id="reg_form" name="reg_form" method="post" action="<?php echo base_url('album/multiple');?>" enctype="multipart/form-data">
	<div class="content">
			<br/><h1 align="center">Album Management</h1>
<?php
 $this->load->view("common/message");
?>
<div class="tb2-main">
        <div class="tb2-head tab-aname"><input type="checkbox" name="checkall" id="checkall" onclick="checkuncheckall('form');" /></div>
        <div class="tb2-head tab-aname">Album Name</div>
		<div class="tb2-head tab-aimage">Album Image</div>
		<div class="tb2-head tb2-border">Register Date</div>
		<div class="tb2-head tab-aname">Action</div>
		<div class="clear"></div>
        
		<?php
			if(mysql_num_rows($result) > 0)
			{   
				//$rs="";
				while ($row = mysql_fetch_array($result)) {

					$rs=$row;
		?>         
		            <div class="tb2-data tab-aname"> <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/><input type="checkbox" name="chk[]" value="<?php echo $row['id'];?>"/></div>
					<div class="tb2-data tab-aname"><?php echo $row['album_name']; ?></div>
					<div class="tb2-data tab-aimage"><?php echo substr($row['image'],0,10); ?></div>
					<div class="tb2-data tb2-border">
							<?php 
								echo date('d M,Y H:i a',strtotime($row['date'])); 
							?>
					</div>
					<div class="tb2-data tab-aname">
							<a href="edit.php?id=<?php echo $row['id'];?>">Edit</a> |
							<a href="album_delete.php?id=<?php echo $row['id'] ?>">Delete</a> 
												</div>			
					<div class="clear"></div>
		<?php			
				}

			} 
			else
			{
		?>
			<div align="center"><strong>No record found.</strong></div>
		<?php		
			}
		?>

       <div class="lable"><input type="submit" name="btn_delete" value="Delete" ></div>
	</div>    	
					
