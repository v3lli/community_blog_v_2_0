<?php
include '../controllas/content.con.php';
include '../controllas/art.con.php';


 function render_banner()
 {
    $banner = get_banner_content();
     echo '<div 
            style="background-image: url('. $banner[0]->spread . ');background-repeat:no-repeat; background-position: center center"
            class="d-flex justify-self-center jumbotron-fluid jumbo align-content-center">
    <div class ="d-flex-inline text-center align-content-center darktron">
        <h1 class="text-light animated fadeInUp">' . $banner[0]->title . '</h1> 
        <h5 class="text-light animated fadeInUp">' .$banner[0]->subtitle. '</h5>
        <p style="font-size: 0.8em" class = "text-light animated fadeIn">by ' . $banner[0]->author . ' </p>
        <a class = "animated fadeInLeft btn btn-outline-info" href="article.php?id=' . $banner[0]->id . '">Read on..</a> 
        </p>
    </div>
    </div>';
 }

 function render_media(){
     echo 'rest of the shit goes here';
     echo $_SESSION['handle'];
 }

 function render_body(){
    render_banner();
    render_media();
 }