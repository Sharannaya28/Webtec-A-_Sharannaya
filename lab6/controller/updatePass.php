<?php
	require_once '../model/adminmodel.php';
	$error_pass = $msg = "";
	$cpass=$npass=$cnpass="";

if (isset($_POST['changepass'])) {
	require_once 'admininfo.php';
	$admin = fetchAdminById($_REQUEST['id']);





	

	$currpass = $admin['Password'];
	$cpass = $_REQUEST['cpass'];
	$npass = $_REQUEST['npass'];
	$cnpass = $_REQUEST['cnpass'];

	$data['Password'] = password_hash($cnpass, PASSWORD_BCRYPT, ["cost" => 12]);;



	if($cpass==null || $npass == null || $cnpass == null){
		$error_pass = "*Input Field can not be empty";
	}
	else if(!password_verify($cpass, $admin['Password'])){
		$error_pass = "*Current password is wrong";
	}
	else if($npass == $cpass){
		$error_pass = "*Newpass can not be same as old pass";
	}
	else if($npass != $cnpass){
		$error_pass = "*Newpass and Confirmpass doesn't match";
	}
	else if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]*$/",$cnpass)){
		$error_pass ="*Must contain one upper letter,lower letter,digit and special character. <br>";
	}
	else if(strlen($cnpass)<= 8){
		$error_pass = "*Password need to be 8 character or more <br>";
	}
	else{
		if (updateAdminPass($_POST['id'], $data)) {
			session_start();
			session_destroy();
			setcookie("id", "");
			setcookie("pass", "");
			setcookie("admin", "");
			setcookie("user", "");
			setcookie("color", "");
		  	header('Location: ../view/login.php');
		}
	}
	
}

?>