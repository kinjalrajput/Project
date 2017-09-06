<?php include("config.php");

	   $json = json_decode(file_get_contents("php://input"),true);
	   $json = $_REQUEST;

	   switch ($json['function']) {
	   		
	   	case 'addprofile':
	   		addprofile();
	   		break;
	   	case 'get_allprofile':
	   		get_allprofile();
	   		break;
	   	case 'delete':
	   		delete();
	   		break;	
	   	case 'updateprofile':
	   		updateprofile();
	   		break;	
	   	default:
	   		# code...
	   		break;
	   }


	   function addprofile()
		{
			$reuturnArray = array();
			$json = json_decode(file_get_contents("php://input"),true);
   			$json = $_REQUEST;

			$fields = array ("first_name", "last_name", "user_name", "email", "password", "contact", "address", "gender", "language", "country", "path");
			$error = required_field( $json, $fields );

			if ( $error !='' )
			{
				$reuturnArray['success'] = "no";
		   	 	$reuturnArray['message'] = $error;
		   	 	$reuturnArray['data'] = array();
				echo json_encode($reuturnArray,true);
				exit;				}
			else
			{   
				$query = "Select id from users where  user_name='".$json['user_name']."'";
				$rs = mysql_query($query);

				if(mysql_num_rows($rs) > 0)
				{
					$reuturnArray['success'] = "no";
		   	 		$reuturnArray['message'] = "Username  already exist.";
		   	 		$reuturnArray['data'] = array();
					echo json_encode($reuturnArray,true);
					exit;
				}
				
				$Insert = "INSERT INTO users (first_name,last_name,user_name,email,password,contact,address,gender,language,country,path)
							VALUES ('".$json['first_name']."','".$json['last_name']."','".$json['user_name']."','".$json['email']."','".$json['password']."','".$json['contact']."','".$json['address']."','".$json['gender']."','".$json['language']."','".$json['country']."')";
				
				$success = mysql_query($Insert);
				if($success)
				{
					$reuturnArray['success'] = "yes";
		   	 		$reuturnArray['message'] = "Data insert successfully";
		   	 		$reuturnArray['data'] = $json;
					echo json_encode($reuturnArray,true);
					exit;

				}
				else
				{
					$reuturnArray['success'] = "no";
		   	 		$reuturnArray['message'] = "Registration failed.";
		   	 		$reuturnArray['data'] = array();
					echo json_encode($reuturnArray,true);
					exit;

				}
			}
		
		}

?>