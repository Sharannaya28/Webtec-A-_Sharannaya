<?php  

require_once ('../model/adminmodel.php');

function fetchAdmin(){
	return showAdmin();
}
function fetchAdminById($id){
	return showAdminById($id);
}

function fetchadminid($info){
	return selectid($info);
}

?> 