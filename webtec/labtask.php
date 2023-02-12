<!DOCTYPE HTML>
<html> 
	<head>

	</head>

	<body>
		
        	<?php

        	$nameErr = $emailErr =  $dateErr = $genderErr = $degreeErr = $bloodErr = "";
        	$name = $email = $date = $gender = $degree = $blood = "";

        	if ($_SERVER["REQUEST_METHOD"] == "POST")
			 {
					if (empty($_POST["name"])) {
				    $nameErr = "Name can't be empty";
			} else {
								   $name = test_input($_POST["name"]);
								    
								    if (!preg_match("/^[a-zA-Z][a-zA-Z_\.\s]*$/",$name)) {
								      $nameErr = " Please Start with any letter ";
				    }

			}		 

			if (empty($_POST["email"])) 
			{
			   $emailErr = "Email must be given";
					  } 
			 else {
				    $email = test_input($_POST["email"]);
				   
				    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				      $emailErr = "Invalid email";
    					}
    				}



			if (empty($_POST["date"])) 
			{
			   $dateErr = "date can't be empty";
					  } 
			  else {
					    $date = test_input($_POST["dd"]);
					    $date = test_input($_POST["mm"]);
					    $date = test_input($_POST["yy"]);
					  };
			  if (empty($_POST["gender"]))
			   {
					    $genderErr = "At least one of them must be selected";
					  } else {
					    $gender = test_input($_POST["gender"]);
					    
					  }
					};



					   if (empty($_POST["degree"]))
			   	{
					    $degreeErr = "At least two of them must be selected";
					  } else {
					    $degree = test_input($_POST["degree"]);
					    
					  };
					
					   if (empty($_POST["blood"]))
			   	{
					    $bloodErr = "Must be selected";
					  } else {
					    $blood = test_input($_POST["blood"]);
					    
					  };
	
					

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

	     		<label > Name </label><br>
	     		<input type="text" name="name" id="name" />
				<span class="error">* <?php echo $nameErr;?></span> <br>

	     		<label> Email</label><br>
	     		<input type="email" name="email" id="email" />
	     		<span class="error">* <?php echo $emailErr;?></span>
	     		<br>
	     		<label> Date Of Birth</label> <br>
	     		<input type="text" name="dd" id="dd"  size="1" maxlength="3" />/
	     		<input type="text" name="mm" id="mm" size="1" maxlength="3" />/
	     		<input type="text" name="yy" id="yy" size="1" maxlength="3" />(dd/mm/yy)
	     		<span class="error">* <?php echo $dateErr;?></span> <br>
	     		<label> Gender</label> <br>
	     		 <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
	     		 <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
				<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
				<span class="error">* <?php echo $genderErr;?></span>  
	     		<br>
	     		<label> Degree</label> <br> 
	     		<input type="Checkbox" name="degree" <?php if (isset($degree) && $degree=="SSC") echo "checked";?> value="SSC">SSC 
	     		<input type="Checkbox" name="degree" <?php if (isset($degree) && $degree=="HSC") echo "checked";?> value="HSC">HSC 
				<input type="Checkbox" name="degree" <?php if (isset($degree) && $degree=="BSC") echo "checked";?> value="BSC">BSC 
				<input type="Checkbox" name="degree" <?php if (isset($degree) && $degree=="MSC") echo "checked";?> value="SSC">MSC
				<span class="error">* <?php echo $degreeErr;?></span>   
				<br>
	     		<label> Blood group</label>
	     		<select name="blood">
	     			       <option></option>
						    <option <?php if (isset($blood) && $blood=="A+") echo "checked";?> value="A+">A Positive
						    <option <?php if (isset($blood) && $blood=="A-") echo "checked";?> value="A-">A Negative
						    <option <?php if (isset($blood) && $blood=="B+") echo "checked";?> value="B+">B Positive
						    <option <?php if (isset($blood) && $blood=="B-") echo "checked";?> value="B-">B negative
						    <option <?php if (isset($blood) && $blood=="AB+") echo "checked";?> value="AB+">AB Positive
						    <option <?php if (isset($blood) && $blood=="AB-") echo "checked";?> value="AB-">AB Negative
						    <option <?php if (isset($blood) && $blood=="O+") echo "checked";?> value="O+">O Positive
						    <option <?php if (isset($blood) && $blood=="O-") echo "checked";?> value="O-">O Negative
			   </select>
			   <span class="error">* <?php echo $bloodErr;?></span> 


			   <br> <br> 


			   <input type="submit" name="submit" placeholder="Submit"/>

         </fieldset>
     		
     

     	</form>

     				<?php
						
						echo $name;
						echo "<br>";
						echo $email;
						echo "<br>";
						echo $date;
						echo "<br>";
						echo $gender;
						echo "<br>";
						echo $degree;
						echo "<br>";
						echo $blood;

					?>



	</body>








</html>