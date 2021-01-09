<?php

//require "../config/Database.php";
//require "../models/User.php";

if(isset($_POST["Login"]))
{
    if ((isset($_POST['pass_log1'])) && (isset($_POST['email_log1']))){
        $pw = $_POST['pass_log1'];
        $email = $_POST['email_log1'];
    }elseif ((isset($_POST['pass_log2'])) && (isset($_POST['email_log2']))){
        $pw = $_POST['pass_log2'];
        $email = $_POST['email_log2'];
    }elseif ((isset($_POST['pass_log3'])) &&( isset($_POST['email_log3']))){
        $pw = $_POST['pass_log3'];
        $email = $_POST['email_log3'];
    }
    if(isset($_POST['url_log']))
    {
        $cur_loc = $_POST['url_log'];
    }
    else{
        $cur_loc = '/RVIII/partials/home.php';
    }
    if (empty($email) || empty($pw))
    {
        header("Location:" . $cur_loc . "?error=emptyfields");
        exit();
    }
    else
    {

        $data = array(
            'password' => $pw,
            'email' => $email
        );

        $ch = curl_init();
        $url = 'http://localhost:8888/rviii/api/user/login.php';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Access-Control-Allow-Origin: *',
            'Content-Type: application/json'
        ]);
        $res = json_decode(curl_exec($ch));
//        die(var_dump($res->handle));
        if($res->handle!= null){
            session_start();
            $_SESSION['first_name'] = $res->first_name;
            $_SESSION['last_name'] = $res->last_name;
            $_SESSION['email'] = $res->email;
            $_SESSION['mobile'] = $res->mobile;
            $_SESSION['handle'] = $res->handle;
            $_SESSION['isadmin'] = $res->isadmin;
            $_SESSION['created_at']= $res->created_at;
            curl_close($ch);
            header("Location:" . $cur_loc. "?alert=success");
            }else{
            curl_close($ch);
            header("Location:" . $cur_loc . "?error=something_wrong");
            }
    }

}





