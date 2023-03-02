<!DOCTYPE HTML>
<html> 
	<head>

	</head>

	<body>

		<?php include 'navbar.php'

		$nameErr = $emailErr = $unameErr = $passErr = $cpassErr = $dateErr = $genderErr = $message = "";
		$name = $email = $uname = $pass = $cpass = $gender = $dd = $mm = $yy = $message = "";

		//name validation
		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$name = $_POST['name'];
		
					if (empty($name)) {
				    $nameErr = "Name can't be empty";
			} 

			else if(strlen($name)<2)
			{ 
			$nameErr= "*Name must contain two words<br>";
			$name ="";
			
			}

			else if(!preg_match("/^[a-zA-Z][a-zA-Z\-\.\s]*$/",$name))
			{
			$nameErr = "*Name can contain alpha numeric characters, period, dash or underscore only<br>";
			$name ="";
			}

			}



		//email validation

			if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$email = $_POST['email'];
		
					if (empty($name)) {
				    $emailErr = "Email can't be empty";
			} 
			else {
			    $email = test_input($_POST["email"]);
			    // check if e-mail address is well-formed
			    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			      $emailErr = "Invalid email format";
   				 }
			}

		}


		//username validation
		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$uname = $_POST['uname'];
		
					if (empty($uname)) {
				    $unameErr = "Username should be given";
			} 

			else if(strlen($uname)<2)
			{ 
			$unameErr= "*Name must contain two words<br>";
			$uname ="";
			
			}

			else if(!preg_match("/^[a-zA-Z][a-zA-Z\-\.\s]*$/",$uname))
			{
			$unameErr = "*Name can contain alpha numeric characters, period, dash or underscore only<br>";
			$uname ="";
			}

			}


		//pass validation
		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$pass = $_POST['pass'];
			
			if (empty($pass)) {
				    $passErr = "pass can't be empty";
			} 

			else if(strlen($pass)<8){
			$passErr = "*Password must not be less than eight (8) characters";
			$pass = "";
			}
			
			else if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#@$%]).{8,}$/", $pass)){
			$passErr = "*. Password must contain at least one of the special characters (@, #, $,%)";
			$pass = "";

			}

		}

		//confirm password validation

		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$cpass = $_POST['cpass'];
		
					if (empty($cpass)) {
				    $cpassErr = "Confirm Password can't be empty";
			} 

			else if($cpass != $pass){
					$cpassErr = "*Newpass and Confirmpass doesn't match";
					$cpassErr ="";
				}

			}

			// date validation

			if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$dd = $_POST['dd'];
			$mm = $_POST['mm'];
			$yy = $_POST['yy'];
		
					if (empty($dd)) {
				    $dateErr = "Date is required";
			} 
			else if (empty($mm)) {
				    $dateErr = "month is required";

				 }

			else if (empty($yy)) {
				    $dateErr = "year is required";
				 }

			else if(!checkdate($mm,$dd,$yy)){
					$dateErr= "*Date is invalid<br>";
					$dd = $mm = $yy ="";
				}
				else{
					$dob = "$dd|$mm|$yy";
				}

			}

			// gender validation
			if(!isset($_POST['gender'])){
					if(empty($gender)){
						$genderErr = "*Select your gender please";
						$gender = "";
					}

				}
				else{
					$gender = $_POST['gender'];
				}


				function test_input($data)
					 {
						  $data = trim($data);
						  $data = stripslashes($data);
						  $data = htmlspecialchars($data);
						  return $data;
						}



				//write file in json

				if($nameErr=="" && $emailErr=="" && $unameErr=="" && $passErr=="" && $cpassErr=="" && $dateErr=="" && $genderErr==""){
					if(file_exists('data.json'))  
		           {  
		                $current_data = file_get_contents('data.json');  
		                $array_data = json_decode($current_data, true);  
		                $new_data = array(  
		                     'Name'      =>     $name,  
		                     'Email'     =>     $email,  
		                     'Username'  =>     $uname,  
		                     'Password'  =>     $pass,  
		                     'Gender'    =>     $gender,  
		                     'DOB'       =>     $dob
		                );  
		                $array_data[] = $new_data;  
		                $final_data = json_encode($array_data);  
		                if(file_put_contents('data.json', $final_data))  
		                {  
		                     $message = "Your Registration is Successful";  
		                }  
		           }  
		           else  
		           {  
		                $message = 'JSON File not exits';  
		           }
				}






			



			?>
				
		        	

        <p><span class="error">* required field</span></p>
     	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

           <fieldset>
           		 <legend> REGISTRATION</legend>
	     		<label for="name"> Name </label><br>
	     		<input type="text" name="name" id="name" />
				<span class="error">* <?php echo $nameErr;?></span> <br>
				<hr>
	     		<label for="email"> Email</label><br>
	     		<input type="email" name="email" id="email" />
	     		<span class="error">* <?php echo $emailErr;?></span>
	     		<br> <hr>
	     		<label for="uname"> Username:</label> &nbsp; 
			 	<input type="text" name="uname" id="uname" /> 
			 	<span class="error">* <?php echo $unameErr;?></span> 
			 	<br> <hr>
			 	<label for="pass">Paasword: </label> &nbsp; 
			 	<input type="text" name="pass" id="pass" /><br>
			 	<span class="error">* <?php echo $passErr;?></span> <br>
			 	<hr>
			 	
			 	<label for="cpass"> Confirm Paasword: </label> &nbsp; 
			 	<input type="text" name="cpass" id="cpass" /><br>
			 	<span class="error">* <?php echo $cpassErr;?></span> 
			 	<hr>
				<label for="DOB"> Date Of Birth</label> <br>
	     		<input type="text" name="dd" id="dd"  size="1" maxlength="3" />/
	     		<input type="text" name="mm" id="mm" size="1" maxlength="3" />/
	     		<input type="text" name="yy" id="yy" size="1" maxlength="3" />(dd/mm/yy)
	     		<span class="error">* <?php echo $dateErr;?></span> <br> <hr>
	     		<label> Gender</label> <br> 
	     		<input type="radio" name="gender" value="male" id="male">Male
	     		<input type="radio" name="gender"  value="female" id="female">Female
				<input type="radio" name="gender" value="others" id="others">Others
				<span class="error">* <?php echo $genderErr;?></span> 
	     		 


			     <hr>


			   <input type="submit" name="submit" placeholder="Submit"/>
			   <input type="reset" name="reset" placeholder="Reset">
			   <span style="color:green;"><?php echo $message ?></span>

         </fieldset>
     		
     			<?php include 'footer.php' ?>
     

     	</form>

     				<?php
						
						echo $name;
						echo "<br>";
						echo $email;
						echo "<br>";
						echo $uname;
						echo "<br>";
						echo $pass;
						echo "<br>";
						echo $cpass;
						echo "<br>";
						echo "$dd|$mm|$yy <br>";
						echo $gender;
						
					?>



	</body>








</html>





