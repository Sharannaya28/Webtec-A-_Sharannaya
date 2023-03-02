<?php 
	session_start();
	if(isset($_SESSION['username']))
	{
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Dashboard</title>
</head>
<body>
	<table width="70%" align="center" border="1px solid black" style="border-collapse: collapse;">	
		<?php require "header.php"; ?>
		<tr>
			<?php require "menu.php"; ?>
	    <td>
		<form action="">
		<fieldset style="width:550px; height: 400px; margin: 0px auto;">
            <legend><h1>Dashboard</h1></legend>
			<table>
				<tr>
					<td>
	            		<b>Welcome to <b>Saradian Jewels</b> <?php echo $_SESSION['username']; ?></b>
					</td>
				</tr>
				<tr>
					<td>
					 product pictures

					</td>
					<td>
					 <img src="image/1.jpg" alt="" height="80px" width="70px">
					 <img src="image/2.jpg" alt="" height="80px" width="70px">
					 <img src="image/4.jpg" alt="" height="80px" width="70px">
					 <img src="image/5.jpg" alt="" height="80px" width="70px">
					 
					</td>
				</tr>
			</table>
		   </fieldset>
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