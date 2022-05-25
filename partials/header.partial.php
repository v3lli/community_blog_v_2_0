<?php
function render_header(){
session_start();
if(isset($_SESSION['handle'])){
    if($_SESSION['isadmin'])
    {
        echo '<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Real Visionaries Initiative</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type= "text/css" media="screen" href="../slick/slick.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/media-queries.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<header class="mainheader">
    <div class = "d-flex justify-content-between">
        <img class="ml-3 logo" src="../images/imageonline-co-whitebackgroundremoved.PNG" alt="">
        <div class = "ml-auto d-inline-flex justify-content-around align-content-center">
            <p class="align-self-center my-1"> Hi ' . $_SESSION['handle'] . '</p><br>
            <form class="align-self-center" action = "../controllas/logout.con.php" method = "POST">
                <button class = "mt-2 align-self-center mx-3 btn-sm btn-outline-secondary" type = "submit" name = "logout">Log Out</button>
            </form>
        </div>
    </div>
    <nav class="ml-4 navbar navbar-light navbar-expand-lg bg-transparent navbar-custom">
        <!-- Brand -->
        <a class="navbar-brand" href="#">R V I</a>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="#">MH Topics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Discussions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Archives</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Creator</a>
                </li>
            </ul>
        </div>
    </nav>
</header>';
    }
    else {
        echo '<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Real Visionaries Initiative</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" media="screen" href="../slick/slick.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/media-queries.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<header class="mainheader">
    <div class = "d-flex justify-content-between container">
        <img class="ml-3 logo " src="../images/imageonline-co-whitebackgroundremoved.PNG" alt="">
        <div class = "ml-auto d-inline-flex justify-content-around align-items-center">
            <p class="my-1"> Hi ' . $_SESSION['handle'] . '</p><br>
            <form class="" action = "../controllas/logout.con.php" method = "POST">
                <button class = "form-control-sm mx-3 btn-sm btn-outline-secondary" type = "submit" name = "logout">Log Out</button>
            </form>
        </div>
    </div>
    <nav class="ml-4 navbar navbar-light navbar-expand-lg bg-transparent navbar-custom">
        <!-- Brand -->
        <a class="navbar-brand" href="#">R V I</a>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="#">MH Topics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Discussions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Archives</a>
                </li>
            </ul>
        </div>
    </nav>
</header>';
    }
}
else{

echo'<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Real Visionaries Initiative</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" media="screen" href="../slick/slick.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/media-queries.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<header class="mainheader">
    <div class = "d-flex justify-content-between container">
        <img class="ml-3 logo" src="../images/imageonline-co-whitebackgroundremoved.PNG" alt="">
        <div class = "ml-auto d-inline-flex justify-content-around align-items-center">
            <form class = "form-group form-inline d-l-block" action="../controllas/login.con.php" method = "POST">
                <input class = "form-control-sm form-former" type = "hidden" name = "url_log" value ="' . $_SERVER["REQUEST_URI"] . '"/>
                <input class = "form-control-sm form-former  btn-outline-info" type = "name" placeholder = "Username/email" name = "email_log2" required/>
                <input class = "form-control-sm form-former  btn-outline-info" type = "password" placeholder = "Password" name = "pass_log2" required/>
                <button class = "form-control-sm btn-sm btn-outline-secondary" type = "submit" name = "Login">LOG IN</button>
            </form>
        </div>
    </div>
    <nav class="ml-4 navbar navbar-light navbar-expand-lg bg-transparent navbar-custom">
        <!-- Brand -->
        <a class="navbar-brand" href="#">R V I</a>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="#">MH Topics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Discussions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Archives</a>
                </li>
            </ul>
        </div>
    </nav>
</header>';
}
}