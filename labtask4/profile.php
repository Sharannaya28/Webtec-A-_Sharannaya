<?php 
	session_start();
	if(isset($_SESSION['username']))
	{
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
</head>
<body>

	<?php 

	$name = $email = $username = $pass = $gender = $dob = "";



	?>
		
	<form action="">

	  <fieldset style="width:750px; height: 500px; margin: 0px auto;">
	  	<table width="80%" align="center" border="1px solid black" style="border-collapse: collapse;">
	  		<?php require "header.php"; ?>

	  	<tr>
 			<?php require "menu.php"; ?>
 		<td>
 			<?php require "getdata.php"; ?>

 		<table align="right">

        <legend><h1>Profile</h1></legend>
		<tr>
		<td>
			<label for="">Name: <?php echo $name ?> </label><br><hr>
			<label for="">Email: <?php echo $email ?></label><br><hr>
			<label for="">Username: <?php echo $username ?></label><br><hr>
			<label for="">Password:<?php echo $pass ?> </label><br><hr>
			<label for="">Gender: <?php echo $gender ?> </label><br><hr>
			<label for="">Date of Birth : <?php echo $dob ?></label><br>  		
	    </td>
			<td align="right">
				<img src="image/logo.png" alt="" height="120px" width="110px"><br>
				<a href="changeprofile.php">Change</a>
			</td>

		</tr>
				<tr>
					<td colspan="2">
						<hr>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<a href="editprofile.php">Edit Profile</a>
					</td>
				</tr>
			</table>
			</table>
		</fieldset>
					<br>
				</form>
			</td>
			
		</tr>
		





		
		<?php include "footer.php"; ?>

	</table>


</body>
</html>
<?php
	}
	else{
		echo "Invalid request";
	}
?>

