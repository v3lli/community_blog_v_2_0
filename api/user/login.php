<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
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
$user->password = $data->password;
if($user->if_email_exists()) {
    echo json_encode($user);
}else{
    echo json_encode( array(
       "message" => "no such user"
    ));
}


