<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

//include model and db
include_once '../../config/Database.php';
include_once '../../models/Comment.php';

//init and connect
$database = new Database();
$db = $database->connect();

//comment instance


// Get ID
$art_id = isset($_GET['id']) ? $_GET['id'] : die();
$comment = new Comment($db, $art_id);
//query
$res = $comment->read();

//count
$number = $res->rowCount();

if ($number > 0){

    $comment_list = array();
    while($row = $res->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $commentListItem = array(
            'id' => $id,
            'user_handle' => $user_handle,
            'user_id' => $user_id,
            'art_id' => $art_id,
            'body' => $body,
            'create_date' => $create_date
        );
        array_push($comment_list, $commentListItem);
        echo(json_encode($comment_list));
    }
}else{
    echo (json_encode(
        array('message' => 'No Comment')
    ));
}


