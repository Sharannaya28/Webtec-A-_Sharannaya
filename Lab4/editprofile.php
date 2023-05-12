<?php 
	session_start();
	if(isset($_SESSION['username']))
	{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile</title>
</head>
<body>
	<table width="70%" align="center" border="1px solid black" style="border-collapse: collapse;">	
		<!-- header part html start -->
		<?php require "design/header.php"; ?>





		<!-- body part html start -->
		<tr>
			<!-- Menu part html start -->
			<?php require "design/menu.php"; ?>



			<!-- profile part html start -->
			<td>
				<!-- get data from json file -->
				<?php require "design/getdata.php"; ?>



				<form action="">
					<fieldset style="width:550px; height: 400px; margin: 0px auto;">
			            <legend><h1>Edit Profile</h1></legend>
						<table>
							<tr>
								<td>
				            		<label for="name">Name  &emsp;&emsp;&ensp;&nbsp;: </label>
				            		<input type="text" name="name" id="name" value="<?php echo $name ?>">
				            		<br><hr>
				            		<label for="email">Email  &emsp;&emsp;&ensp;   : </label>
				            		<input type="text" name="email" id="email" value="<?php echo $email ?>">
				            		<br><hr>
				            		<label for="uname">Username  &nbsp;&ensp;    : </label>
				            		<input type="text" name="uname" id="uname" value="<?php echo $username ?>">
				           			<input type="hidden" name="pass" id="pass" value="<?php echo $pass ?>">
				           			<br><hr>
				           			<label for="">Gender   &emsp;&emsp;     :</label>
				           			<input type="radio" name="gender" value="Male" id="male" <?php if($gender=="Male") {echo "checked";} ?>>
									<label for="male">Male</label>
									<input type="radio" name="gender" value="Female" id="female" <?php if($gender=="Female") {echo "checked";} ?>>
									<label for="female">Female</label>
									<input type="radio" name="gender" value="Others" id="others" <?php if($gender=="Others") {echo "checked";} ?>>
									<label for="others">Others</label>
				           			<br><hr>
				           			<label for="dob">Date of Birth :</label>
				           			<input type="text" name="dob" id="dob" value="<?php echo $dob ?>">(dd/mm/yyyy)
				           			<br> <hr> 
				           			<input type="submit" name="submit" value="Submit">		
								</td>
							</tr>
						</table>
					</fieldset>
					<br>
				</form>
			</td>
			<!-- profile part html end -->
		</tr>
		<!-- body part html end -->






		<!-- footer part html start -->
		<?php include "design/footer.php"; ?>
		
	</table>
</body>
</html>

<?php
	}
	else{
		echo "Invalid request";
	}
?>