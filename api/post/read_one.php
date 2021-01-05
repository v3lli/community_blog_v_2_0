<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

// Get ID
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get post
$post->read_single();

// Create array
$postListItem = array(
    'id' => $post->id,
    'cat_id' => $post->cat_id,
    'cat_name' => $post->cat_name,
    'author' => $post->author,
    'title' => $post->title,
    'body' => $post->body,
    'subtitle' => $post->subtitle,
    'description' => $post->description,
    'thumbnail' => $post->thumbnail,
    'spread' => $post->spread,
    'pc'=> $pc,
    'isvideo' => $post->isvideo,
    'created_at' => $post->created_at
);

// Make JSON
echo json_encode($postListItem);

