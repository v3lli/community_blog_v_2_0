<?php
include_once '../controllas/art.con.php';

 function render_banner($banner)
 {
     echo '<div 
            style="background-image: url('. $banner->spread . ');" 
            class="d-flex justify-self-center jumbotron-fluid jumbo align-content-center">
                <div class ="d-flex-inline text-center align-content-center darktron">
                    <h1 class="text-light animated fadeInUp">' . $banner->title . '</h1> 
                    <h5 class="text-light animated fadeInUp">' .$banner->subtitle. '</h5>
                    <p style="font-size: 0.8em" class = "text-light animated fadeIn">by ' . $banner->author . ' </p>
                    <a class = "animated fadeInLeft btn btn-outline-info" href="article.php?id=' . $banner->id . '">Read on..</a> 
                    </p>
                </div>
            </div>';
 }

 function render_media($arts){
    echo '<div class="container" id="content">';
    $post_number =  sizeof($arts);
    $page_number = $_GET['page'];
    $page_limit = 1;
    $initial = $page_number -1;
    $no_of_pages = ceil($post_number/$page_limit);
    $final = $initial + $page_limit;

    for ($i = $initial; $i < $final; $i++ )
    {
        if(isset($arts[$i]->id)){
        echo '<section class="align-content-center container my-2 py-2" data-aos="fade-up">
                <header id="type" class="content-card-type-header">Article : <small>'. $arts[$i]->cat_name.'
                </small>
                </header>
                <div class ="container row d-flex col-sm-10 col-md-7">
                    <figure class="col-sm-7">
                    <img class="thumbnail" src="' . $arts[$i]->thumbnail . '" alt="">
                    </figure>
                    <div class="col-sm-5 px-2 content-card-text">
                        <a href="article.php?id=' . $arts[$i]->id . '"><h6 id="title">' . $arts[$i]->title . '</h6></a>
                        <p id="author">' . $arts[$i]->author . '</p>
                        <p id="info" class ="mt-1">' . $arts[$i]->description . '</p>
                    </div>
                </div>
            </section>                            <hr class="w-75">';
    }
        else break;
    }
    echo '</div>';
    echo '<nav aria-label="Page navigation example">
          <ul id="pages" class="pagination justify-content-center">';
        if($page_number == 1){
            echo '<li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>';
        }else{
            echo '<li class="page-item">
              <a class="page-link" href="home.php?page='.($page_number-1).'" tabindex="-1">Previous</a>
            </li>';
        }
        for($j = 1; $j <= $no_of_pages;$j++){
            echo '<li class="page-item"><a class="page-link" href="home.php?page='.$j.'">'.$j.'</a></li>';
        }
        if ($page_number < $no_of_pages){
            echo '<li class="page-item">
              <a class="page-link" href="home.php?page='.($page_number+1).'">Next</a>
            </li>
            </ul>
          </nav>';
        }
        if ($page_number == $no_of_pages){
            echo '<li class="page-item disabled">
              <a class="page-link" href="#">Next</a>
            </li>
            </ul>
          </nav>';
        }
 }




function render_body($arts){
    $banner = array_shift($arts);

    render_banner($banner);

    render_media($arts);
 }