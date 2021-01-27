<?php

if(isset($_POST["submit_limit"])){
    session_start();
    $cur_loc = $cur_loc = '/RVIII/index.php';
    $limit = $_POST["per_page"];
    $_SESSION["limit"] = $limit;
    header("Location:" . $cur_loc);
}
else{
    header("Location:/RVIII/index.php");
}



