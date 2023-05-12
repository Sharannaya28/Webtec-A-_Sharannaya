<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
</head>
<body>
	<header>
		<div>
			<div>
				<table width="70%" align="center" border="1px solid black" style="border-collapse: collapse;">
					<tr>
						<td><img src="images/logo.png" alt="" height="100px" width="200px"></td>
						<td align="right">
							<a href="home.php"> Home </a>&nbsp;|&nbsp;
							<a href="login.php"> Login </a>&nbsp;|&nbsp;
							<a href="registration.php"> Registration </a>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
								<fieldset style="width:97%; height: 480px; margin: 0px auto; border: none;">
						            <h1 align="center" style="color:green;">Welcome to <b>HASI PHARMA</b>.</h1>

						        </fieldset>
						    </form>
						</td>
					</tr>

					<!-- footer part html start -->
					<?php include "design/footer.php"; ?>
					<!-- footer part html end -->
				</table>
	</header>

	
</body>
</html7