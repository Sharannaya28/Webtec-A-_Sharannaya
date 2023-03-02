<?php 
	session_start();
	if(isset($_SESSION['username']))
	{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile Picture</title>
</head>
<body>
	<table width="80%" align="center" border="1px solid black" style="border-collapse: collapse;">	
		<?php require "header.php"; ?>
	<tr>
	  <?php require "menu.php"; ?>
	 <td>
	   <?php require "getdata.php"; ?>
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