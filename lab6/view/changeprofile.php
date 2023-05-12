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
		#changeprofile input[type=submit] {
		    padding: 10px;
		    font-size: 18px; 
		    background-color: #99cc33;
		    color: green;
		    border: none;
		    margin-left: 80px;
		}
		#changeprofile img{
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<?php require "include/adminhead.php"; ?>

	<?php
	include '../controller/admininfo.php';
	$admin = fetchadminid($_SESSION['admin']);
	?>

	<?php include "../controller/updateprofile.php"?>
	<section id="changeprofile">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					 <form action="" method="POST" enctype="multipart/form-data"> -->
						<table>
							<tr>
								<td>
									<h1 align="center">Profile Picture</h1>
							        <img src="images/<?php echo $admin['ProfilePic'] ?>" alt="" height="200px" width="200px"><br>
									<input type="hidden" name="id" id="id" value="<?php echo $admin['AdminId'] ?>"><br>
									<label for="profile">Select image to upload:</label>
									<input type="file" name="profile" id="profile"><br>
									<span style="color:red;"><?php echo  $error_profile;?> </span>
									<hr>
									<input type="submit" name="ChangeProfilePicture" value="Change Profile Picture">	
								</td>
							</tr>
						</table>
					</form>
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
