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
//
$number = $res->rowCount();
if ($number > 0) {
    $post_list = array();
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $postListItem = array(
            'id' => $id,
            'cat_id' => $cat_id,
            'cat_name' => $cat_name,
            'author' => $author,
            'title' => $title,
            'body' => html_entity_decode($body),
            'subtitle' => $subtitle,
            'description' => $description,
            'thumbnail' => $thumbnail,
            'spread' => $spread,
            'pc' => $pc,
            'isvideo' => $isvideo,
            'created_at' => $created_at
        );
        array_push($vid_list, $vidListItem);
    }
    print_r(json_encode($vid_list));
} else {
    return json_encode(
        array('message' => 'No Posts Found')
    );
}


