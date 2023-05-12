<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forget Password</title>
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
						<?php
							$email=$error_email=$msg="";

							if($_SERVER["REQUEST_METHOD"] == "POST"){
								$email = $_REQUEST['email'];

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
							                    $msg = "Please check your mail for reset password";
						                    }
						                } 
						            }
								}
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
												<span style="color:red;"> <?php echo  $error_email;?></span>
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

					<!-- footer part html start -->
					<?php include "design/footer.php"; ?>
				</table>
	</header>

	
</body>
</html7