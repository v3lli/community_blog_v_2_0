<?php

function get_content(){
    $ch = curl_init();
    $url = 'http://localhost:8888/rviii/api/post/read_all.php';
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

function get_page_content($off, $lim){
    $ch = curl_init();
    $url = 'http://localhost:8888/rviii/api/post/read.php?off='.$off.'&lim='.$lim;
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

function get_vids(){
    $ch = curl_init();
    $url = 'http://localhost:8888/rviii/api/video/read.php';
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