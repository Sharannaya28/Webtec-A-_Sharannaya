<?php
	if(file_exists('data.json')){  
		$data = file_get_contents("data.json");  
		$data = json_decode($data, true);
		if (isset($data)) {
			foreach($data as $row){  
				if ($row['Username'] == $_SESSION['username']) {
			        $name = $row['Name'];
			        $email = $row['Email'];
			        $username = $row['Username'];
			        $pass = $row['Password'];
			        $gender = $row['Gender'];
			        $dob = $row['DOB'];
			    }            
			} 
		}
	}
?>