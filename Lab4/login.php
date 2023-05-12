<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
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
							<!-- Login part html starts -->
	
							<?php

								session_start();

								$error_name=$error_pass="";
								
								$uname=$pass=$rme=$msg="";

								if ($_SERVER["REQUEST_METHOD"] == "POST") {
									$uname = $_REQUEST['uname'];
									$pass = $_REQUEST['pass'];


									//UserName validation
									if($uname == null){
										$error_name = "*Name is required<br>";
										$uname = "";
									}
									

									//password validation
									if($pass == null){
										$error_pass = "*Password is required";
										$pass = "";
									}



									if($error_name == null &&  $error_pass == null){

										//if remember me not checked
										if(isset($_REQUEST['rme']) == null){
											if(file_exists('data.json'))  
								            {  
								                $data = file_get_contents("data.json");  
							                    $data = json_decode($data, true);
							                    if (isset($data)) {
							                        foreach($data as $row)  
							                        {  
							                            if ($row['Username'] == $uname && $row['Password'] == $pass) {
							                            	setcookie("username", "");
												            setcookie("password", "");
												            $_SESSION['username'] = $uname;
												            header("location:welcome.php");
							                            }   
							                            else{
							                            	$msg = "Wrong username or password";
							                            }         
							                        } 
							                    }
							                }
								            
								        }
								        else{
								        	//If Remember me is checked
								        	if(file_exists('data.json'))  
								            {  
								                $data = file_get_contents("data.json");  
							                    $data = json_decode($data, true);
							                    if (isset($data)) {
							                        foreach($data as $row)  
							                        {  
							                            if ($row['Username'] == $uname && $row['Password'] == $pass) {
							                            	
							                            	$_SESSION['username'] = $uname;
							                                setcookie("uname", $uname, time()+86400);
												            setcookie("pass", $pass, time()+86400);
												            setcookie("color", "skyblue", time()+86400);
												            header("location:welcome.php");
							                            }   
							                            else{
							                            	$msg = "Wrong username or password";
							                            }         
							                        } 
							                    }
							                } 
								        }
									}
								}
							?>



							<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
								<fieldset style="width:500px; height: 480px; margin: 0px auto; border: none;">
						            <legend align="center"><h1>Login</h1></legend>
						            <table align="center" style="width:100%;">
						            	<tr>
						            		<td>
						            			<span style="color:red;"> <?php echo $msg; ?></span>
						            		</td>
						            	</tr>
						            	<tr>
						            		<td>
						            			<label for="uname">User Name</label>
						            		</td>
						            		<td>
						            			<input style="background: <?php if(isset($_COOKIE['color'])) {echo $_COOKIE['color'];}?>" type="text" name="uname" id="uname" value="<?php if(isset($_COOKIE['uname'])) {echo $_COOKIE['uname'];} ?>">
						            		</td>
						            		<td>
						            			<span style="color:red;"><?php echo $error_name ?></span>
						            		</td>
						            	</tr>
						            	<tr>
						            		<td>
						            			<label for="pass">Password</label>
						            		</td>
						            		<td>
						            			<input style="background: <?php if(isset($_COOKIE['color'])) {echo $_COOKIE['color'];}?>" type="password" name="pass" id="pass" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>">
						            		</td>
						            		<td>
						            			<span style="color:red;"><?php echo $error_pass ?></span>
						            		</td>
						            	</tr>
						            	<tr>
						            		<td colspan="3">
						            			<hr>
						            			<input type="checkbox" name="rme" id="rme" <?php if(isset($_COOKIE['uname'])) {echo "checked";} ?>>
						            			<label for="rme">Remember me</label>
						            		</td>
						            	</tr>
						            	<tr>
						            		<td colspan="3">
						            			<br>
						            			<input type="submit" name="submit" value="Submit">
						            			<a href="forgetpass.php">Forget Password?</a>
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
	
</body>
</html>