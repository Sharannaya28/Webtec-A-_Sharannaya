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
	<title>Change Profile</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
		#changepass table{
			border: 1px solid black;
			margin-top: 20px;
		}
		#changepass input[type=text],input[type=password]{
			padding: 5px;
			width: 100%;
			height: 50px;
		}
		#changepass label{
			font-size: 20px;
			padding: 10px 0;
		}


		#changepass input[type=submit] {
		    padding: 10px;
		    font-size: 18px; 
		    background-color: #99cc33;
		    color: green;
		    border: none;
		    margin-left: 150px;
		}
	</style>
</head>
<body>
	<?php require "include/adminhead.php"; ?>

	<?php
	include '../controller/admininfo.php';
	$admin = fetchadminid($_SESSION['admin']);
	?>

	<?php include "../controller/updatePass.php"?>



	<section id="changepass">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="changepass">
						<form action="" method="POST" enctype="multipart/form-data">
							<table width="100%">
								<tr>
									<td>
										<h3 align="center">Login</h3>
										<input type="hidden" name="id" id="id" value="<?php echo $admin['AdminId'] ?>"><br>
										<label for="cpass">Current Password</label>
										<input type="text" name="cpass" id="cpass">
										<label for="npass">New Password</label>
										<input type="text" name="npass" id="npass">
										<label for="cnpass">Confirm New Password</label>
										<input type="text" name="cnpass" id="cnpass">
										<span style="color:red;"><p align="center"><?php echo $error_pass ?></p></span>
				            			<input type="submit" name="changepass" value="Submit">
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

    <br><br>
	<?php include "include/footer.php"; ?>
</body>
</html>









<?php
	}
	else{
		echo "Invalid request";
	}
?>