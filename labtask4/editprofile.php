<?php 
	session_start();
	if(isset($_SESSION['username']))
	{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
</head>
<body>
	<table width="80%" align="center" border="1px solid black" style="border-collapse: collapse;">	
		<?php require "header.php"; ?>
    <tr>
		<?php require "menu.php"; ?>
	<td>
		<?php require "getdata.php"; ?>
    <form action="">
	 <fieldset style="width:750px; height: 500px; margin: 0px auto;">
	    <legend><h1>Edit Profile</h1></legend>
		<table>
		<tr>
		 <td>
    		<label for="name">Name: </label>
    		<input type="text" name="name" id="name" value="<?php echo $name ?>">
    		<br><hr>
    		<label for="email">Email: </label>
    		<input type="text" name="email" id="email" value="<?php echo $email ?>">
    		<br><hr>
    		<label for="uname">Username: </label>
    		<input type="text" name="uname" id="uname" value="<?php echo $username ?>">
   			<input type="hidden" name="pass" id="pass" value="<?php echo $pass ?>">
   			<br><hr>
   			<label for="">Gender:</label>
   			<input type="radio" name="gender" value="Male" id="male" <?php if($gender=="Male") 
   			{echo "checked";} ?>>
			<label for="male">Male</label>
			<input type="radio" name="gender" value="Female" id="female" <?php if($gender=="Female")
			{echo "checked";} ?>>
			<label for="female">Female</label>
			<input type="radio" name="gender" value="Others" id="others" <?php if($gender=="Others")
			{echo "checked";} ?>>
			<label for="others">Others</label>
   			<br><hr>
   			<label for="dob">Date of Birth :</label>
   			<input type="text" name="dob" id="dob" value="<?php echo $dob ?>">(dd/mm/yyyy)
   			<br> <hr> 
   			<input type="submit" name="submit" value="Submit">		
			</td>
		   </tr>
			 </table>
			</fieldset> <br>
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