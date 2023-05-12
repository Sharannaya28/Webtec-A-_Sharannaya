<?php
include '../controller/admininfo.php';
session_start();


$admins = fetchAdmin();

$error_id=$error_pass="";
								
$id=$pass=$rme=$msg="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_REQUEST['id'];
	$pass = $_REQUEST['pass'];


	//UserName validation
	if($id == null){
		$error_id = "*Phone/Email is required<br>";
		$id = "";
	}
									

	//password validation
	if($pass == null){
		$error_pass = "*Password is required";
		$pass = "";
	}




	if($error_id == null &&  $error_pass == null){
		//if remember me not checked
		
		if(isset($_REQUEST['rme']) == null){
			foreach ($admins as $i => $admin)
			{
				if (($admin['Username'] == $id || $admin['Email'] == $id) && password_verify($pass, $admin['Password'])) {
					setcookie("id", "");
					setcookie("password", "");
					$_SESSION['admin'] = $id;
					header("location:admin.php");
				}
				else{
					$msg = "Wrong username, email or password ";
				}         
			} 
		}

		else{
			//If Remember me is checked
			foreach ($admins as $i => $admin)
			{
				if (($admin['Username'] == $id || $admin['Email'] == $id) && password_verify($pass, $admin['Password'])) {
					$_SESSION['admin'] = $id;
					setcookie("id", $id, time()+86400);
					setcookie("pass", $pass, time()+86400);
					setcookie("color", "skyblue", time()+86400);
					header("location:admin.php");
				}  
				else{
					$msg = "Wrong username, email or password";
				}         
			} 
		}
	} 
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!-- header part include -->
	<?php require "include/localhead.php"; ?>


	<section id="login">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
						<table align="center" style="width:100%; ">
							<tr>
						        <td>
						        	<h3 align="center">Login</h3>
						           	

						           	<label for="id">Username/Email</label>
						           	<input style="background: <?php if(isset($_COOKIE['color'])) {echo $_COOKIE['color'];}?>" type="text" name="id" id="id" value="<?php if(isset($_COOKIE['id'])) {echo $_COOKIE['id'];} ?>">
						           	<span style="color:red;"><?php echo $error_id ?></span>

						           	<label for="pass">Password</label>
						           	<input style="background: <?php if(isset($_COOKIE['color'])) {echo $_COOKIE['color'];}?>" type="password" name="pass" id="pass" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>">
						           	<span style="color:red;"><?php echo $error_pass ?></span>
						           	<span style="color:red;"> <?php echo $msg; ?></span>
						           	<br>
						           	<a href="forgetpass.php">Forget Password?</a><br>
						           	<hr>
						           	<input type="checkbox" name="rme" id="rme" <?php if(isset($_COOKIE['id'])) {echo "checked";} ?>>
						           	<label for="rme">Remember me</label><br>
						           	
						           	<input type="submit" name="adminLogin" value="Submit">
						           	<p>Dont have an account?<br><a href="registration.php">Register here</a> </p>
						        	
						        </td>
						    </tr>
						</table>
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
				
		</div>
	</section>
	<?php include "include/footer.php"; ?>
	
</body>
</html>