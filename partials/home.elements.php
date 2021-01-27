<?php
include_once '../controllas/art.con.php';
include '../controllas/content.con.php';

 function render_banner()
 {$banner = get_page_content(0,1);
     echo '<div 
            style="background-image: url('. $banner[0]->spread . ');" 
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
    echo '<div class="container" id="content">';
    $page_number = $_GET["page"];
    if(isset($_SESSION["limit"])){
        $limit = $_SESSION["limit"];
    }else{
       $limit = 1;
    }
    $offset = (($page_number -1) * $limit)+1;
    $arts = get_content();
    $post_number =  sizeof($arts);
    $parts = get_page_content($offset, $limit);
    $no_of_pages = ceil($post_number/$limit);
    for ($i = 0; $i < $limit; $i++)
    {
        if(isset($parts[$i]->id)){
        echo '<section class="align-content-center container my-2 py-2" data-aos="fade-up">
                <header id="type" class="content-card-type-header">Article : <small>'. $parts[$i]->cat_name.'
                </small>
                </header>
                <div class ="container row d-flex col-sm-10 col-md-7">
                    <figure class="col-sm-7">
                    <img class="thumbnail" src="' . $parts[$i]->thumbnail . '" alt="">
                    </figure>
                    <div class="col-sm-5 px-2 content-card-text">
                        <a href="article.php?id=' . $parts[$i]->id . '"><h6 id="title">' . $parts[$i]->title . '</h6></a>
                        <p id="author">' . $parts[$i]->author . '</p>
                        <p id="info" class ="mt-1">' . $parts[$i]->description . '</p>
                    </div>
                </div>
                <p class="content-card-dated">on '.$parts[$i]->created_at.'</p>
            </section>                            <hr class="w-75">';
    }
        else break;
    }
    echo '</div>';

    echo '<form class="form-control-sm" method="post" action="../controllas/page.con.php">
                <select name = "per_page" class="form-select ml-4 mt-5" aria-label="Default select example">
                  <option selected>Page Limit</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="5">5</option>
                  <option value="10">10</option>
                  <option value="15">15</option>
                </select>
                <button class="form-control-sm" type="submit" name="submit_limit">Go</button>
            </form>';

    echo '<nav aria-label="">
          <ul id="pages" class="pagination justify-content-center">
            <li id="prev" class="page-item disabled">
              <a  class="page-link" href="" tabindex="-1">Previous</a>
            </li>';

        for($j = 1; $j < $no_of_pages;$j++){
            echo '<li class="page-item"><a class="page-link" href="home.php?page='.$j.'">'.$j.'</a></li>';
        }

        echo '<li id="next" class="page-item">
          <a class="page-link" href="" tabindex="">Next</a>
        </li>
        </ul>
      </nav>';
 }

 function render_video_slide(){
     echo '<!-- Top content -->
        <div class="top-content my-2 py-2 video-slide">
	        <div class="container">
	        	<!-- Title and description row -->
	            <div class="row">
	                <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2">
	                	<h4 class="text-left">Watch</h4>
	                	<hr>
	                </div>
	            </div>
	            <!-- End title and description row -->
	            <!-- Carousel row -->
	            <div class="row">
	                <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2">
	                	<!-- Carousel -->
	                	<div id="carousel-example" class="carousel slide">
	       					<ol class="carousel-indicators">
	       						<li data-target="#carousel-example" data-slide-to="0" class="active"></li>
	       						<li data-target="#carousel-example" data-slide-to="1"></li>
	       						<li data-target="#carousel-example" data-slide-to="2"></li>
	       					</ol>
	       					<div class="carousel-inner">
	       						<div class="carousel-item active">
	       						        <p class="description">
                                            This is a free Carousel template with Videos made with the Bootstrap 4 framework. 
                                            Click on the indicators, controls and links to interact with the page.
                                        </p>
									<div class="embed-responsive embed-responsive-16by9">
	       								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/6hgVihWjK2c?rel=0" allowfullscreen></iframe>
	       							</div>
	       						</div>
	       						<div class="carousel-item">
	       							<div class="embed-responsive embed-responsive-16by9">
	       								<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/84910153?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff" allowfullscreen></iframe>
	       							</div>
	       						</div>
	       						<div class="carousel-item">
	       							<div class="embed-responsive embed-responsive-16by9">
	       								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/oiKj0Z_Xnjc" allowfullscreen></iframe>
	       							</div>
	       						</div>
	       					</div>
							<a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
	       				</div>
	                	<!-- End carousel -->
	                </div>
	            </div>
	            <!-- End carousel row -->
	        </div>
        </div>';
 }


function render_body(){

    render_banner();
    render_media();
    render_video_slide();
 }