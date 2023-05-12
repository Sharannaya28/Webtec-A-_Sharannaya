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
	<title>Change Password</title>
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


				<?php

					$error_pass = $msg = "";
					$cpass=$npass=$cnpass="";
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$cpass = $_REQUEST['cpass'];
						$npass = $_REQUEST['npass'];
						$cnpass = $_REQUEST['cnpass'];


						if($cpass==null || $npass == null || $cnpass == null){
							$error_pass = "*Input Field can not be empty";
						}
						else if($cpass != $pass){
							$error_pass = "*Current password is wrong";
						}
						else if($npass == $cpass){
							$error_pass = "*Newpass can not be same as old pass";
						}
						else if($npass != $cnpass){
							$error_pass = "*Newpass and Confirmpass doesn't match";
						}
						else{
							$msg = "Password Reset Successful";
						}
					}

				?>



				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
					<fieldset style="width:550px; height: 400px; margin: 0px auto;">
			            <legend><h1>Change Password</h1></legend>
						<table>
							<tr>
			            		<td>
			            			<label for="cpass">Current Password :</label>
			            			<input type="text" name="cpass" id="cpass"><br><br>
									<label for="npass">New Password :</label>
			            			<input type="text" name="npass" id="npass"><br><br>
			            			<label for="cnpass">New Password :</label>
			            			<input type="text" name="cnpass" id="cnpass">
			            			<hr>
			            		</td>
			            	</tr>
			            	
			            	<tr>
			            		<td>
			            			<input type="submit" name="submit" value="Submit"><br><br>
			            			<span style="color:red;"><?php echo $error_pass ?></span>
			            			<span style="color:green;"><?php echo $msg ?></span>
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