<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
</head>
<body>
	<header>
		<div>
			<div>
				<table width="70%" align="center" border="1px solid black" style="border-collapse: collapse;">
					<tr>
						<td><img src="images/logo.png" alt="" height="100px" width="200px"></td>
						<td align="right">
							<a href="home.php"> Home </a>&nbsp;|&nbsp;
							<a href="login.php"> Login </a>&nbsp;|&nbsp;
							<a href="registration.php"> Registration </a>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php 

								$name=$email=$uname=$pass=$cpass=$date=$month=$year=$gender=$degree=$blood=$degrees=$message="";


								$error_name=$error_email=$error_uname=$error_pass=$error_gender=$error_degree=$error_blood=$error_date=$error_cpass="";


								if ($_SERVER["REQUEST_METHOD"] == "POST") {

									$name = $_REQUEST["name"];
									$email =  $_REQUEST["email"];
									$uname =  $_REQUEST["uname"];
									$pass =  $_REQUEST["pass"];
									$cpass =  $_REQUEST["cpass"];
									$date =  $_REQUEST["dd"];
									$month =  $_REQUEST["mm"];
									$year = $_REQUEST["yyyy"];

									
									
									//Name validation
									if($name == null){ //null check
										$error_name = "*Name is required<br>";
										$name = "";
									}
									else if(strlen($name)<2){ //if less than two charecter
										$error_name = "*Name must contain two words<br>";
										$name = "";
									}
									else if(!preg_match("/^[a-zA-Z][a-zA-Z\-\.\s]*$/",$name)){
										$error_name = "*Only contain a-z or A-Z or dot(.) or dash(-) and must start with a letter<br>";
										$name = "";
									}



									//email validation
									if($email == null){
										$error_email= "*Email is required<br>";
										$email = "";
									}
									else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
								  		$error_email = "*Invalid email format";
								  		$email = "";
									}
									else if(isset($email)){
										$data = file_get_contents("data.json");  
							            $data = json_decode($data, true);
							            if (isset($data)) {
							                foreach($data as $row)  
							                {  
							                	if ($row['Email'] == $email) {
							                    $error_email = "*Email already exist";
							                    $email = "";
							                    }                
							                } 
							            }
									}



									//username validation
									if($uname == null){
										$error_uname = "*Username is required";
										$uname = "";
									}
									else if(isset($uname)){
										$data = file_get_contents("data.json");  
							            $data = json_decode($data, true);
							            if (isset($data)) {
							                foreach($data as $row)  
							                {  
							                	if ($row['Username'] == $uname) {
							                    $error_uname = "*Username already exist";
							                    $uname = "";
							                    }                
							                } 
							            }
									}



									//password validation
									if($pass == null){
										$error_pass = "*Password is required";
										$pass = "";
									}
									else if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$pass)){
										$error_pass = "*Must contain one upper letter,lower letter and digit. 
														Not more than 6 digit <br>";
									}
									else if(strlen($pass)<= 8){
										$error_pass = "*8 digit only <br>";
									}
									


									//confirm pass validation
									if($cpass == null){
										$error_cpass = "*Confirm Password is required";
										$cpass = "";
									}
									else if($pass != $cpass){
										$error_pass = "*Password do not match";
										$error_cpass = "*Password do not match";
										$pass = "";
										$cpass = "";
									}





									//date of birth
									if($date == null){
										$error_date= "*Date is required<br>";
										$date = "";
									}
									else if($month == null ){
										$error_date= "*Date is required<br>";
										$month = "";
									}
									else if($year == null){
										$error_date= "*Date is required<br>";
										$year = "";
									}
									else if(!checkdate($month,$date,$year)){
										$error_date= "*Date is invalid<br>";
										$date = $month = $year ="";
									}
									else{
										$dob = "$date|$month|$year";
									}





									//gender validation
									if(!isset($_REQUEST['gender'])){
										if($gender == null){
											$error_gender = "*Select your gender please";
											$gender = "";
										}

									}
									else{
										$gender = $_REQUEST['gender'];
									}




									//write file in json
									if($error_name=="" && $error_email=="" && $error_uname=="" && $error_pass=="" && $error_cpass=="" && $error_date=="" && $error_gender==""){
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
							                     $message = "Registration Successful";  
							                }  
							            }  
							            else  
							            {  
							                $message = 'JSON File not exits';  
							            }
									}
								}
							?>

							<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
								<fieldset style="width:550px; height: 480px; margin: 0 auto;">
						      		<legend align="center"><h1>Registration</h1></legend>
									<table align="center" style="width:100%">
										
										<!-- name part  -->
										<tr>
											<td width="25%">
												<label for="name">Name</label>
											</td>
											<td width="40%">
												<input type="text" name="name" id="name" value="<?php echo $name ?>">
											</td>
											<td width="35%">
												<span style="color:red;"> <?php echo  $error_name;?></span>
											</td>

										</tr>
										<tr>
											<td colspan="3"><hr></td>
										</tr>


										<!-- email part -->
										<tr>
											<td>
												<label for="email">Email</label>
											</td>
											<td>
												<input type="text" name="email" id="email" value="<?php echo $email ?>">
											</td>
											<td>
												<span style="color:red;"> <?php echo $error_email;?></span>
											</td>
										</tr>
										<tr>
											<td colspan="3"><hr></td>
										</tr>


										<!-- username part  -->
										<tr>
											<td>
												<label for="uname">User Name</label>
											</td>
											<td>
												<input type="text" name="uname" id="uname" value="<?php echo $uname ?>">
											</td>
											<td>
												<span style="color:red;"> <?php echo  $error_uname;?></span>
											</td>

										</tr>
										<tr>
											<td colspan="3"><hr></td>
										</tr>


										<!-- password part  -->
										<tr>
											<td>
												<label for="pass">Password</label>
											</td>
											<td>
												<input type="Password" name="pass" id="pass" value="<?php echo $pass ?>">
											</td>
											<td>
												<span style="color:red;"> <?php echo  $error_pass;?></span>
											</td>

										</tr>
										<tr>
											<td colspan="3"><hr></td>
										</tr>


										<!-- confirm password part  -->
										<tr>
											<td>
												<label for="cpass">Confirm Password</label>
											</td>
											<td>
												<input type="Password" name="cpass" id="cpass" value="<?php echo $cpass ?>">
											</td>
											<td>
												<span style="color:red;"> <?php echo  $error_cpass;?></span>
											</td>

										</tr>
										<tr>
											<td colspan="3"><hr></td>
										</tr>


										<!-- gender part -->
										<tr>
											<td>
												Gender
											</td>
											<td>
												<input type="radio" name="gender" value="Male" id="male">
												<label for="male">Male</label>
												<input type="radio" name="gender" value="Female" id="female">
												<label for="female">Female</label>
												<input type="radio" name="gender" value="Others" id="others">
												<label for="others">Others</label>
											</td>
											<td>
												<span style="color:red;"> <?php echo $error_gender;?></span>
											</td>
										</tr>
										<tr>
											<td colspan="3"><hr></td>
										</tr>



										<!-- date of birth -->
										<tr>
											<td>
												<label for="DOB">Date of Birth</label>
											</td>
											<td>
												<input type="text" name="dd" id="dd" size="1" maxlength="2" value="<?php echo $date ?>"> /
												<input type="text" name="mm" id="mm" size="1" maxlength="2" value="<?php echo $month ?>"> /
												<input type="text" name="yyyy" id="yyyy" size="2" maxlength="4" value="<?php echo $year ?>">(dd/mm/yyyy)
											</td>
											<td><span style="color:red;"> <?php echo $error_date;?></span></td>
										</tr>
										<tr>
											<td colspan="3"><hr></td>
										</tr>

										<tr>
											<td colspan="3">
												<input type="submit" value="Submit">
												<input type="reset" value="Reset">
											</td>
										</tr>
										<tr>
											<td colspan="3">
												<h1 style="color:green;" align="center"><?php echo $message ?></h1>
											</td>
										</tr>
									</table>
								</fieldset>
							</form>
						</td>
					</tr>

					<!-- footer part html start -->
					<?php include "design/footer.php"; ?>

				</table>
			</div>
		</div>
	</header>

	<section>
		<div>
			<div>
				
			</div>
		</div>
	</section>

	
	
</body>
</html>