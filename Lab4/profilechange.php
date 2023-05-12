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
	<title>Profile Picture</title>
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
			            <legend><h1>Profile Picture</h1></legend>
						<table>
							<tr>
								<td>
				            		<img src="images/11.jpeg" alt="" height="200px" width="200px"><br>
								    Select image to upload: <br>
								    <input type="file" name="fileToUpload" id="fileToUpload"><br>
								    <hr>
							        <input type="submit" value="Submit" name="submit">	
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