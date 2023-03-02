<!DOCTYPE html>
<html>
<head>
	<title>Forget Password</title>
</head>
<body>
   <header>
		<div>
			<div>
				<table width="100%" align="center" border="1px solid black" style="border-collapse: collapse;">
					<tr>
						<td><img src="image/saradian.jpg" alt="" height="100px" width="200px"></td>
						<td align="right">
							<a href="main.php"> Home </a>&nbsp;|&nbsp;
							<a href="login.php"> Login </a>&nbsp;|&nbsp;
							<a href="registration.php"> Registration </a>
						</td>
					</tr>
			  <tr>


			  	  <?php
							$email=$emailErr=$msg="";

							if($_SERVER["REQUEST_METHOD"] == "POST"){
								$email = $_REQUEST['email'];

								//email validation
								if($email == null){
									$emailErr= "*Email is required<br>";
									$email = "";
								}
								else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							  		$emailErr = "*Invalid email format";
							  		$email = "";
								}
								else if(isset($email)){
									$data = file_get_contents("data.json");  
						            $data = json_decode($data, true);
						            if (isset($data)) {
						                foreach($data as $row)  
						                {  
						                	if ($row['Email'] == $email) {
							                    $msg = "Please check your mail for reset password";
						                    }
						                } 
						            }
								}
							}

						function test_input($data)
								{
										$data = trim($data);
										$data = stripslashes($data);
										$data = htmlspecialchars($data);
										return $data;
								}
						?>
			  	


	             <td colspan="2">
							<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
								<fieldset style="width:500px; height: 480px; margin: 0px auto; border: none;">
									<legend align="center"><h1>Forget Password</h1></legend>
									<table align="center" style="width:100%">
										<tr>
											<td>
												<label for="email">Email</label>
											</td>
											<td>
												<input type="text" name="email" id="email" value="<?php echo  $email;?>">
											</td>
											<td>
												<span style="color:red;"> <?php echo  $emailErr;?></span>
												<span style="color:green;"> <?php echo  $msg;?></span>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												<hr>
												<input type="submit" value="Submit">
											</td>
										</tr>


									</table>
									
									
						            
						            
						        </fieldset>
						    </form>
						</td>
					</tr>

					
				</table>
	</header>

	
</body>
</html>