<?php 
	session_start();
	if(isset($_SESSION['admin']))
	{
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit profile</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/profile.js"></script>
	<style>
		#editprofile .editprofile input[type=text]{
			padding: 5px;
			width: 100%;
		}

		#editprofile input[type=submit] {
		    padding: 10px;
		    font-size: 18px; 
		    background-color: #99cc33;
		    color: green;
		    border: none;
		    margin-left: 150px;
		}
		#editprofile table{
			border: 1px solid black;
			margin: 20px 0;
		}
	</style>
</head>
<body>
	<?php require "include/adminhead.php"; ?>



	<?php
	require_once '../controller/admininfo.php';
	$admin = fetchadminid($_SESSION['admin']);
	?>

	<?php include "../controller/updateAdmin.php"?>


	<section id="editprofile">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="editprofile">
						<form name="profileedit" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
							<table width="100%">
								<tr>
									<td colspan="2">
										<h1 align="center">Profile</h1>
										<input type="hidden" name="id" id="id" value="<?php echo $admin['AdminId'] ?>">

										<label for="name">Name: </label>
										<input type="text" name="name" id="name" value="<?php echo $admin['Name'] ?>" onblur="checkName()" onkeyup="checkName()"><br>
										<span style="color:red;" id="name_error"><?php echo  $error_name;?> </span><br>
										<label for="phone">Phone:</label>
										<input type="text" name="phone" id="phone" value="<?php echo $admin['Phone'] ?>" onblur="checkPhone()" onkeyup="checkPhone()"><br>
										<span style="color:red;" id="phone_error"><?php echo  $error_phone;?> </span><br>
										<label for="gender">Gender : </label><br>
										<input type="radio" name="gender" value="Male" id="male" <?php if($admin['Gender']=="Male") {echo "checked";} ?>>
										<label for="male">Male</label>
										<input type="radio" name="gender" value="Female" id="female" <?php if($admin['Gender']=="Female") {echo "checked";} ?>>
										<label for="female">Female</label>
										<input type="radio" name="gender" value="Others" id="others" <?php if($admin['Gender']=="Others") {echo "checked";} ?>>
										<label for="others">Others</label><br>
										<span style="color:red;" id="gender_error"><?php echo  $error_gender;?> </span><br>
										<label for="address">Address : </label> 
										<input type="text" name="address" id="address" value="<?php echo $admin['Address'] ?>" onblur="checkAddress()" onkeyup="checkAddress()"><br>
										<span style="color:red;" id="address_error"><?php echo  $error_address;?> </span>
										<br>

										<input type="submit" name="editprofile" value="Update" >
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</section>
	<?php include "include/footer.php"; ?>
</body>
</html>




<?php
	}
	else{
		echo "Invalid request";
	}
?>
