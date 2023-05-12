<?php
include '../controller/admininfo.php';
session_start();


$admins = fetchAdmin();

$error_id=$error_pass="";
								
$id=$pass=$rme=$msg="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_REQUEST['id'];
	$pass = $_REQUEST['pass'];


	//UserName validation
	if($id == null){
		$error_id = "*Phone/Email is required<br>";
		$id = "";
	}
									

	//password validation
	if($pass == null){
		$error_pass = "*Password is required";
		$pass = "";
	}




	if($error_id == null &&  $error_pass == null){
		//if remember me not checked
		if(isset($_REQUEST['rme']) == null){
			foreach ($admins as $i => $admin)
			{
				if (($admin['Username'] == $id || $admin['Email'] == $id) && password_verify($pass, $admin['Password'])) {
					setcookie("id", "");
					setcookie("password", "");
					$_SESSION['admin'] = $id;
					header("location:admin.php");
				}
				else{
					$msg = "Wrong username, email or password ";
				}         
			} 
		}

		else{
			//If Remember me is checked
			foreach ($admins as $i => $admin)
			{
				if (($admin['Username'] == $id || $admin['Email'] == $id) && password_verify($pass, $admin['Password'])) {
					$_SESSION['admin'] = $id;
					setcookie("id", $id, time()+86400);
					setcookie("pass", $pass, time()+86400);
					setcookie("color", "skyblue", time()+86400);
					header("location:admin.php");
				}  
				else{
					$msg = "Wrong username, email or password";
				}         
			} 
		}
	} 
}

?>