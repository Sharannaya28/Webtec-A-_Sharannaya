<!DOCTYPE html>
<html>
<head>
	<title> Lab Task</title>
</head>
<body>

	<?php

		$nameErr = $passErr == "";
		$name = $pass == "";

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
		 <legend> Login</legend>
		 	<label> Username:</label> &nbsp; 
		 	<input type="text" name="name" id="name" /> 
		 	<span class="error">* <?php echo $nameErr;?></span> 
		 	<br> <br>
		 	<label>Paasword: </label> &nbsp; 
		 	<input type="text" name="pass" id="pass" /><br>
		 	<span class="error">* <?php echo $passErr;?></span> <br>
		 	 <hr>
		 	<input type="checkbox" name="" value="">Remember Me <br> 
		 	<input type="submit" name="submit" value="submit">
		 	<a href=""> Forgot Password? </a>



		</fieldset>
	</form>

	<?php

	     echo $name;
		 echo "<br>";
		 echo $pass;

	 ?>


</body>
</html>