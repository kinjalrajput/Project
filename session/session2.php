<?php

    define("PAGE_TITLE","Session 2");
	include("common/header.php");
	session_start();
    
	
    if(isset($_SESSION['forms'])) {
				$forms = $_SESSION['forms'];
				
				echo '<table border=2 cellpadding="4">';
				echo '<tr>
				<th>Index</th>
					<th>FirstName</th>
					<th>LastName</th>
					<th>UserName</th>
					<th>Contact</th>
					<th>Gender</th>
					<th>Qualification</th>
					<th>Language</th>
					<th>Action</th>
				</tr>';
				
			foreach($forms as $key=>$form) 
			{
				
					echo '<tr>';
					$_SESSION['id']=$key+1;
					//print_r( $_SESSION['id']);
					//exit;
				    echo "<td>$key</td>
					<td>$form[first_name]
					</td>
					<td>$form[last_name]</td>
					<td>$form[user_name]</td>
					<td>$form[number]</td>
					<td>$form[gender]</td>
					<td>$form[Qualification]</td>
					<td>$form[language]</td>
					<td><a href='edit.php?id=$key'>Edit/</a>
						<a href='unset.php?id=$key'>Unset</a>
					</td>";
					echo '</tr>';
				}
				
				echo '</table>';
				//unset($_SESSION['forms']);
			}
	
	?>
	<a href="destroy.php"> All Data Delete</a>