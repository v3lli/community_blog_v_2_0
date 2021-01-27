<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Video.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$vid = new Video($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$vid->url = $data->url;
$vid->description = $data->description;

//die($data);
// Create post
if ($vid->create()) {
    echo json_encode(
        array('message' => 'Video Created')
    );
    return true;
} else {
    echo json_encode(
        array('message' => 'Video Not Created')
    );
    return true;
}

