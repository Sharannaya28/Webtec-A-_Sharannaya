<?php
	require_once '../model/adminmodel.php';
	$error_cpass =$error_npass =$error_cnpass = $msg = "";
	$cpass=$npass=$cnpass="";

if (isset($_POST['changepass'])) {
	require_once 'admininfo.php';
	$admin = fetchAdminById($_REQUEST['id']);


	$currpass = $admin['Password'];
	$cpass = $_REQUEST['cpass'];
	$npass = $_REQUEST['npass'];
	$cnpass = $_REQUEST['cnpass'];

	$data['Password'] = password_hash($cnpass, PASSWORD_BCRYPT, ["cost" => 12]);;



	if($cpass==null){
		$error_cpass = "*Input Field can not be empty";
	}
	else if(!password_verify($cpass, $admin['Password'])){
		$error_cpass = "*Current password is wrong";
	}



	if($npass == null){
		$error_npass = "*New Password can not be empty";
	}
	else if($npass == $cpass){
		$error_npass = "*Newpass can not be same as old pass";
	}
	else if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]*$/",$npass)){
		$error_npass ="*Must contain one upper letter,lower letter,digit and special character. <br>";
	}
	else if(strlen($npass)<= 8){
		$error_npass = "*Password need to be 8 character or more <br>";
	}




	
	if($cnpass == null){
		$error_cnpass = "*Confirm Password can not be empty";
	}
	else if($npass != $cnpass){
		$error_cnpass = "*Password doesn't match";
	}
	
	if($error_cpass=="" && $error_npass=="" && $error_cnpass==""){
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