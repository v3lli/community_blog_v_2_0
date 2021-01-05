<?php

require "../config/Database.php";
require "../models/User.php";

if(isset($_POST["Signup"]))
{

    $pw = $_POST["pw_new"];
    $cpw = $_POST['cpw_new'];
    $handle = $_POST["handle_new"];
    $email = $_POST["email_new"];
    $curloc = $_POST["url_new"];

        if (empty($handle) || empty($pw) || empty($pwc) || empty($handle))
        {
            header("Location:" . $curloc . "?error=emptyfields");
            exit();
        }else {
            $data = array(
                'handle' => $handle,
                'password' => $pw,
                'email' => $email
            );
            $ch = curl_init();
            $url = 'http://localhost:8888/rviii/api/user/create.php';
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Access-Control-Allow-Origin: *',
                'Content-Type: application/json'
            ]);
            $res = curl_exec($ch);
            curl_close($ch);
            //var_dump($res);
        }}
