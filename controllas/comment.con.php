<?php
 if(isset($_POST['Comment'])){
     $cur_loc = $_POST['url_comment'];
     $artid = $_POST['articleid'];
     $body = $_POST['body'];
     $uid = $_POST['uid'];

     $data = array(
         'body' => $body,
         'user_id' => $uid,
         'art_id' => $artid
     );

     $ch = curl_init();
     $url = 'http://localhost:8888/rviii/api/comment/create.php';
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
     curl_setopt($ch, CURLOPT_HTTPHEADER, [
         'Access-Control-Allow-Origin: *',
         'Content-Type: application/json'
     ]);
     $res = curl_exec($ch);
     $res = json_decode($res);

     if($res){
         curl_close($ch);
         header("Location:" . $cur_loc);
     }
     else{
         curl_close($ch);
         header("Location:" . $cur_loc ."?alert=comment_not_posted");
     }






 }