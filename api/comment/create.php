<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Comment.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
// Instantiate blog post object
$comment = new Comment($db, $data->art_id);

$comment->user_id = $data->user_id;
$comment->body = $data->body;

if ($comment->create()) {
    echo json_encode(
        array('message' => 'Post Created')
    );
    return true;
} else {
    echo json_encode(
        array('message' => 'Post Not Created')
    );
    return true;
}

