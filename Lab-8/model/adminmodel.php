<?php  

require_once 'db_connection.php';


//Check if email already exist
function checkEmail($email){
    $conn = db_conn();
    $sql = "select * from admin where Email = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $count = $stmt->fetchColumn();
        return $count;
    }
    catch(PDOException $e)
    {
        $message = "Error: " . $e->getMessage();
    }
}

//Check if username already exist
function checkUsername($username){
    $conn = db_conn();
    $sql = "select * from admin where Username = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $count = $stmt->fetchColumn();
        return $count;
    }
    catch(PDOException $e)
    {
        $message = "Error: " . $e->getMessage();
    }
}


//Add Admin / Registration admin to database
function addAdmin($data){
	$conn = db_conn();
    $sql = "INSERT into admin (Username, Name, Email, Phone, Gender, Address, Password, ProfilePic) 
    VALUES (:Username, :Name, :Email, :Phone, :Gender, :Address, :Password, :ProfilePic)";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
        	':Username'  => $data['uname'],
        	':Name'      => $data['name'],
        	':Email'     => $data['email'],
        	':Phone'     => $data['phone'],
        	':Gender'    => $data['gender'],
        	':Address'   => $data['address'],
        	':Password'  => $data['pass'],
        	':ProfilePic' => $data['profile']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}



//Show all Admin
function showAdmin(){
	$conn = db_conn();
    $sql = 'SELECT * FROM `admin` ';
    try{
        $stmt = $conn->query($sql);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


//for select id using session value
function selectid($info){
    $conn = db_conn();
    $sql = "SELECT * FROM `admin` where (Username = :Username or Email = :Email)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Username'  => $info,
            ':Email'      => $info
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}


//Show admin details by id
function showAdminById($id){
	$conn = db_conn();
	$sql = "SELECT * FROM `admin` where AdminId = ?";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}


//Search Admin
function searchAdmin($user_name){
    $conn = db_conn();
    $sql = "SELECT * FROM `admin` WHERE Username LIKE '%$user_name%'";
    try{
        $stmt = $conn->query($sql);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


//Update Admin
function updateAdminProfile($id, $data){
    $conn = db_conn();
    $sql = "UPDATE admin set Name = ?, Phone = ?, Gender = ?, Address = ? where AdminId = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
        	$data['name'], $data['phone'], $data['gender'], $data['address'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updateAdminPass($id, $data){
    $conn = db_conn();
    $sql = "UPDATE admin set Password = ? where AdminId = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $data['Password'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function updateAdminProfilepic($id, $data){
    $conn = db_conn();
    $sql = "UPDATE admin set ProfilePic = ? where AdminId = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $data['profile'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


//Delete Admin
function deleteAdmin($id){
	$conn = db_conn();
    $sql = "DELETE FROM `admin` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}
















?>