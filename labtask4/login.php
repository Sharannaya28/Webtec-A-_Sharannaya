<!DOCTYPE html>
<html>
<head>
	<title> Lab Task 4</title>
</head>
<body>
	<table width="100%" align="center" border="1px solid black" style="border-collapse: collapse;">
	<tr>
		<td align="left"><img src="image/saradian.jpg" alt="" height="100px" width="200px"> <a href="main.php"> Saradian jewels </a>
		</td>
		<td align="right">
			<a href="main.php"> Home </a>|
			<a href="login.php"> Login </a>|
			<a href="registration.php"> Registration </a>
		</td>
	</tr>
	<tr>
   <td colspan="3">

	<?php 

	     session_start();
	     $unameErr=$passErr="";
		 $uname=$pass=$rme=$msg="";

		//name validation
		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$uname = $_POST['uname'];
		
					if (empty($uname)) {
				    $nameErr = "Name can't be empty";
			} 

			
			

		//pass validation
		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$pass = $_POST['pass'];
			
			if (empty($pass)) {
				    $passErr = "pass can't be empty";
			} 

			
		}

		if($unameErr == null  &&  $passErr == null){ 
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
		 	<input type="text" name="uname" id="uname" value="<?php if(isset($_COOKIE['uname'])) {echo $_COOKIE['uname'];} ?>">
		 	<span class="error">* <?php echo $unameErr;?></span> 
		 	<br> <br>
		 	<label>Paasword: </label> &nbsp; 
		 	<input type="password" name="pass" id="pass" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>">
		 	<span class="error">* <?php echo $passErr;?></span> <br>
		 	 <hr>
            <input type="checkbox" name="rme" id="rme" <?php if(isset($_COOKIE['uname'])) {echo "checked";} ?>>Remember Me <br> 
		 	<input type="submit" name="submit" value="submit">
		 	<h1 style="color:darkred;" align="center"><?php echo $msg ?>
		 	</h1><a href="forgot.php"> Forgot Password?</a>



		</fieldset>
	</form>

	<?php include 'footer.php'?>

</td>

</table>

	
 
 </body>
</html>