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
	<title>Dashboard</title>
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
				<form action="">
					<fieldset style="width:550px; height: 400px; margin: 0px auto;">
			            <legend><h1>Dashboard</h1></legend>
						<table>
							<tr>
								<td>
				            		<h1>Welcome to <b style="color:green;">HASI PHARMA</b> <?php echo $_SESSION['username']; ?></h1>
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