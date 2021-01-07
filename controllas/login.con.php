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
        curl_close($ch);
//        var_dump($res);
        if($res!=0){
            session_start();
            $_SESSION['first_name'] = $res[0]->first_name;
            $_SESSION['last_name'] = $res[0]->last_name;
            $_SESSION['gender'] = $res[0]->gender;
            $_SESSION['mobile'] = $res[0]->mobile;
            $_SESSION['email'] = $res[0]->email;
            $_SESSION['password'] = $res[0]->password;
            $_SESSION['created_at'] = $res[0]->created_at;
            $_SESSION['isadmin'] = $res[0]->isadmin;
            $_SESSION['handle'] = $res[0]->handle;
            header("Location:" . $cur_loc);
            }else{
            header("Location:" . $cur_loc . "?error=something_wrong");

            }

    }

}





