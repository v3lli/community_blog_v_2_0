<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

//include model and db
include_once '../../config/Database.php';
include_once '../../models/User.php';

//init and connect
$database = new Database();
$db = $database->connect();

//post instance
$user = new User($db);

//query
$res = $user->read();
//count
$number = $res->rowCount();

if ($number > 0) {
    $user_list = array();
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $userListItem = array(
            'id' => $id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'mobile' => $mobile,
            'gender' => $gender,
            'password' => $password,
            'isadmin' => $isadmin,
            'created_at' => $created_at
        );
        array_push($user_list, $userListItem);
        print_r(json_encode($user_list));
    }
} else {
    return json_encode(
        array('message' => 'No User Found')
    );
}


