<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

//include model and db
include_once '../../config/Database.php';
include_once '../../models/Video.php';

//init and connect
$database = new Database();
$db = $database->connect();

//post instance
$vid = new Video($db);

//query
$res = $vid->read();

//count
$number = $res->rowCount();
if ($number > 0) {
    $vid_list = array();
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $vidListItem = array(
            'id' => $id,
            'video_url' => $video_url,
            'description' => html_entity_decode($description),
            'created_at' => $created_at
        );
        array_push($vid_list, $vidListItem);
    }
    print_r(json_encode($vid_list));
} else {
    return json_encode(
        array('message' => 'No Videos Found')
    );
}


