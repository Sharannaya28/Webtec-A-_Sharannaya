<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	
	<title> Forgot password</title>
</head>
<body>

	
	<?php

		$cpassErr = $npassErr = $rpassErr = $msg == "";
		$cpass = $npass = $rpass = $msg == "";

		//current password validation 

		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$cpass = $_POST['cpass'];
		
					if (empty($cpass)) {
				    $cpassErr = "Current Password can't be empty";
			} 

			else if($cpass != $currPass){
						$cpassErr = "*Current password is wrong";
					}

			}

		// new password validation 


			if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$npass = $_POST['npass'];
		
					if (empty($npass)) {
				    $npassErr = "New Password can't be empty";
			} 

			else if($npass == $cpass){
					$npassErr = "*Newpass can not be same as old pass";
				}

			}

		// Retype password validation

			if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$rpass = $_POST['rpass'];
		
					if (empty($rpass)) {
				    $rpassErr = "Retype Password can't be empty";
			} 

			else if($rpass != $npass){
					$rpassErr = "*Newpass and Confirmpass doesn't match";
				}
			else{
					$msg = "Password has changed successfully";
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

	<p><span class="error">* required field</span></p>
     	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<fieldset>
		 <legend> Change Password</legend>
		 	<label> Current Password:</label> &nbsp; 
		 	<input type="text" name="cpass" id="cpass" /> 
		 	<span class="error">* <?php echo $cpassErr;?></span> 
		 	<br> <br>
		 	<label> New Paasword: </label> &nbsp; 
		 	<input type="text" name="npass" id="npass" /><br>
		 	<span class="error">* <?php echo $npassErr;?></span> <br>

		 	<label> Retype Paasword: </label> &nbsp; 
		 	<input type="text" name="rpass" id="rpass" /><br>
		 	<span class="error">* <?php echo $rpassErr;?></span> 
		 	<span style="color:green;"><?php echo $msg ?></span><br>
		 	 <hr>
		 	
		 	<input type="submit" name="submit" value="submit">
		 	<a href="login.php">Login</a>
		 	



		</fieldset>
	</form>
 
   <?php 

   		echo $cpass;
   		echo "<br>";
   		echo $npass;
   		echo "<br>";
   		echo $rpass;
   		echo "<br>";
   		echo $msg
    ?>



</body>
</html>