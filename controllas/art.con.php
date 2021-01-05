<?php

function get_article($id){
    $ch = curl_init();
    $url = 'http://localhost:8888/rviii/api/post/read.php?id=' . $id;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Access-Control-Allow-Origin: *',
        'Content-Type: application/json'
    ]);
    $res = json_decode(curl_exec($ch));
    curl_close($ch);
    return $res;
}

function get_comments($id){
    $ch = curl_init();
    $url = 'http://localhost:8888/rviii/api/comment/read.php?id=' . $id;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Access-Control-Allow-Origin: *',
        'Content-Type: application/json'
    ]);
    $res = json_decode(curl_exec($ch));
    curl_close($ch);
    return $res;
}