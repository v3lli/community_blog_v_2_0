<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

//include model and db
include_once '../../config/Database.php';
include_once '../../models/User.php';

//init and connect
$database = new Database();
$db = $database->connect();

$user = new User($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
$user->email = $data->email;
die(var_dump($data));
if($user->if_email_exists()){
    if ($user->password == $data->password){
        session_start();
        $_SESSION['first_name'] = $user->first_name;
        $_SESSION['last_name'] = $user->last_name;
        $_SESSION['gender'] = $user->gender;
        $_SESSION['mobile'] = $user->mobile;
        $_SESSION['email'] = $user->email;
        $_SESSION['password'] = $user->password;
        $_SESSION['created_at'] = $user->created_at;
        $_SESSION['isadmin'] = $user->isadmin;
        $_SESSION['handle'] = $user->handle;

        return true;
    }
    else{
        return false;
    }
}else{
    return false;
}


