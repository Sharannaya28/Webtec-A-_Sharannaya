<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Registratin</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!-- header part include -->
	<?php require "include/localhead.php" ?>
	<h1 style="color:green;" align="center">
		<?php  
			session_start();
			if(isset($_SESSION['success'])) {
				echo $_SESSION['success']; 
				session_destroy();
			} 
			else{
				echo "";
			}  
		?>
	</h1>

	<?php include "../controller/addAdmin.php"?>
	

	<!-- registration part html start -->
	<section id="registration">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="" method="POST" enctype="multipart/form-data">
							<table align="center">
								<tr>
									<td></td>
									<td>
										<h1 >Registration</h1>
									</td>
									<!-- <td></td> -->
								</tr>	

								<!-- username part  -->
								<tr>
									<td width="24%">
										<label for="uname">User Name</label>
									</td>
									<td width="40%">
										<input type="text" name="uname" id="uname" value="<?php echo $uname ?>">
									</td>
									<td width="36%">
										<span style="color:red;"><?php echo  $error_uname;?> </span>
									</td>
								</tr>

								<!-- name part  -->
								<tr>
									<td width="24%">
										<label for="name">Name</label>
									</td>
									<td width="40%">
										<input type="text" name="name" id="name" value="<?php echo $name ?>">
									</td>
									<td width="36%">
										<span style="color:red;"><?php echo  $error_name;?> </span>
									</td>
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
										<span style="color:red;"><?php echo  $error_email;?> </span>
									</td>
								</tr>
								


								<!-- phone part  -->
								<tr>
									<td>
										<label for="phone">Phone Number</label>
									</td>
									<td>
										<input type="text" name="phone" id="phone" value="<?php echo $phone ?>">
									</td>
									<td>
										<span style="color:red;"> <?php echo  $error_phone;?></span>
									</td>
								</tr>


								<!-- gender part -->
								<tr>
									<td>
										Gender
									</td>
									<td>
										<input type="radio" name="gender" value="Male" id="male" <?php if($gender=="Male") {echo "checked";} ?>>
										<label for="male">Male</label>
										<input type="radio" name="gender" value="Female" id="female" <?php if($gender=="Female") {echo "checked";} ?>>
										<label for="female">Female</label>
										<input type="radio" name="gender" value="Others" id="others" <?php if($gender=="Others") {echo "checked";} ?>>
										<label for="others">Others</label>
									</td>
									<td>
										<span style="color:red;"><?php echo  $error_gender;?> </span>
									</td>
								</tr>


								<!-- address part  -->
								<tr>
									<td>
										<label for="address">Address</label>
									</td>
									<td>
										<input type="text" name="address" id="address" value="<?php echo $address ?>">
									</td>
									<td>
										<span style="color:red;"> <?php echo  $error_address;?></span>
									</td>
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
								


								<!-- confirm password part  -->
								<tr>
									<td>
										<label for="cpass">Confirm Password</label>
									</td>
									<td>
										<input type="Password" name="cpass" id="cpass" value="<?php echo $cpass ?>">
									</td>
									<td>
										<span style="color:red;"><?php echo  $error_cpass;?> </span>
									</td>
								</tr>


								<!-- profile picture part -->
								<tr>
									<td>
										<label for="profile">Profile Picture</label>
									</td>
									<td>
										<input type="file" name="profile" id="profile">
									</td>
									<td>
										<span style="color:red;"><?php echo  $error_profile;?> </span>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<input type="submit" name="AddAdmin" value="Submit">
										<input type="submit"  name="reset" value="Reset">
									</td>
									<td></td>
								</tr>	
							</table>
						</fieldset>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>					
	</section>
	<?php include "include/footer.php"; ?>
</body>
</html>