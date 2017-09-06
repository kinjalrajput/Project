<?php  
    include("includes/config.php");
    if(isset($_REQUEST['function']) && $_REQUEST['function'] != "")
    {

    	switch ($_REQUEST['function']) {
    		case 'single':
    			$query = "select image from album Where id='".$_REQUEST['id']."'";
    			$rs = mysql_query($query);

    			    if(mysql_num_rows($rs) > 0)
    				{
    					$row = mysql_fetch_array($rs,MYSQL_ASSOC);
    					unlink("album/".$row['image']);
    					
    					$sql = "Select gallery_image from gallary Where album_id='".$_REQUEST['id']."'";

    					$result = mysql_query($sql);
    					if(mysql_num_rows($result) > 0)
    					{
    						While($row = mysql_fetch_array($result))
    						{
    							unlink("gallary/".$row['gallery_image']);		
    						}
    					}				

    					$deletequery = "Delete From album Where id='".$_REQUEST['id']."'";

    					mysql_query($deletequery);

    					$_SESSION['success']="Album deleted successfully.";
						header("Location:album_management.php");
    				}
    			break;

    		case 'multiple':
    		    $query = "select image form album Whare album_id='".$_REQUEST."' "

    				# code...
    			break;	
    		
    		default:
    			# code...
    			break;
    	}
    }
	?>