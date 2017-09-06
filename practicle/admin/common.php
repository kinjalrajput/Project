<?php include('includes/config.php');
	
	if((isset($_REQUEST['id']) && $_REQUEST['id'] != "") && (isset($_REQUEST['function']) && $_REQUEST['function'] != ""))
	{

			switch ($_REQUEST['function']) {
				case 'active':
					$sql = "Update users SET status=1 Where id='".$_REQUEST['id']."'";
					mysql_query($sql);
		
					$id = $_REQUEST['id'];
					$str = '<a href="javascript:void(0)" onclick="changeStatus('.$id.',0)" >Deactive</a>';
					echo "User activate successfully.******".$str;
					break;

				case 'deactive':
					$sql = "Update users SET status=0 Where id='".$_REQUEST['id']."'";
					mysql_query($sql);
					
					$id=$_REQUEST['id'];
					$str='<a href="javascript:void(0)" onclick="changeStatus('.$id.',1)" >Active</a>';
					echo "User deactivate successfully.******".$str; 
					break;	
				
				default:
					# code...
					break;
			}
	} 

?>