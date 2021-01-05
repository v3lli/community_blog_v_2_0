<?php
include '../controllas/content.con.php';
include '../controllas/art.con.php';

 function render_header(){
     session_start();
     if(isset($_SESSION['handle'])){

         echo'<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Real Visionaries Initiative</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<header class="mainheader">
    <div class = "d-flex justify-content-between container">
        <img class="ml-3 " style = "max-height: 5rem;" src="../images/imageonline-co-whitebackgroundremoved.PNG" alt="">
        <div class = "ml-auto d-inline-flex justify-content-around align-items-center">
        <p class="my-1"> Hi ' . $_SESSION["handle"] . '</p><br>
                <form class="" action = "controlla/logout.con.php" method = "POST">
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
     else{

         echo'<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Real Visionaries Initiative</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<header class="mainheader">
    <div class = "d-flex justify-content-between container">
        <img class="ml-3" style ="max-height: 5rem;" src="../images/imageonline-co-whitebackgroundremoved.PNG" alt="">
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

 function render_footer(){
     echo'
<div class="footer">
          <div id="accordion">
            <div class="card">
              <div class="card-header">
                <a class=" pity-sans collapsed card-link font-weight-bold" data-toggle="collapse" href="#collapseOne">
                  Our Sponsors
                </a>
              </div>
              <div id="collapseOne" class="collapse show" data-parent="#accordion">
                <div class="card-body container">
                    <ul class="list-unstyled">
                    <a href="#"><li>Grace Cottage</li>
                    <a href="#"><li>Sanwo Olu</li>
                    <a href="#"><li>Dr Peeeeee</li>
                      </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <a class=" pity-sans collapsed card-link font-weight-bold" data-toggle="collapse" href="#collapseTwo">
                  Help Us
                </a>
              </div>
              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body container">
                    <ul class="list-unstyled">
                    <a href="#"><li>Become a real Visionary</li>
                    <a href="#"><li>Make A Donation</li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <a class="pity-sans collapsed card-link font-weight-bold" data-toggle="collapse" href="#collapseThree">
                  Help You
                </a>
              </div>
              <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card-body container" style="height: fit-content;">
                    <ul class=" pity-sans list-unstyled">
                    <a href="#"><li>Join a Support Group</li>
                    <a href="#"><li>Educate yourself on our many Topics</li>
                    <a href="#"><li>Join or Start a Discussion</li>
                    <a href="#"><li>Call Someone to Talk to</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
      </div>
      <footer class="d-block d-flex p-3 " style="font-size: small;"> 
        <div class="mr-auto mt-3">Privacy Legal Notice</div>
        <ul class="mt-3 list-inline mx-auto">
          <li class="list-inline-item px-1">
            <img src="../images/icons/facebook (1).png">
          </li>
          <li class="list-inline-item px-1">
              <img src="../images/icons/instagram.png">
          </li>
          <li class="list-inline-item px-1">
              <img src="../images/icons/twitter.png">
          </li>
          <li class="list-inline-item px-1">
              <img src="../images/icons/whatsapp (1).png">
          </li>
        </ul>
        <div class="ml-auto mt-3">© 2019 R.V.I.</div>
      </footer>
      <script src = "../scripts/jquery-3.5.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>  
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script src ="../scripts/scripts.js"></script>
  </body>
</html>';
 }

 function render_article(){
     $article = get_article($_GET["id"]);
     echo '
<div class="container">
        <header style="margin-top: 2rem;" class ="container">
            <h3 style ="margin-left: 1rem; font-size: 140%" >' . $article[0]->title . '</h3>
            <p style ="margin-left: 1rem; font-size: 80%">by ' . $article[0]->author . '</p>
        </header>
        <article class="mx-auto col-sm-12">
            <figure class="animated fadeIn mx-auto col-sm-10">
                <img class="mx-auto col-sm-12" src="' . $article[0]->spread . '">
                <figcaption class ="py-2" style ="margin-left: 1rem; font-size: 80%"><em>Photo Credit: insery here</em></figcaption>
            </figure>
            <p class="font-weight-light col-sm-10"style="margin: auto; margin-top: 2rem; font-size: 100%; font-family: \'Gupter\', serif;">
                ' . $article[0]->body . '
            </p>
            <hr style="margin:auto;margin-top:3rem;" class="w-75">
        </article>
        </div>';
        render_comments();
}

function render_comments(){
     // comment api call
    session_start();
    $yarns = get_comments($_GET['id']);
     echo '<div id = "comment" class="well container">
                <h4 style ="opacity: 0.45;" class="my-5" >C O M M E N T S..</h4>';
     //looping render
            foreach ($yarns as $yarn){
                echo '
               <header>
                    <p><strong>' . $yarn->user_handle . '</strong></p>
               </header>
               <p>' . $yarn->body . '
               </p>
               <small>' . $yarn->create_date . '</small>
               <hr>
           </div>';

        }

        if (isset($_SESSION['handle'])){
            echo '<div id = "commentform" class= "py-5">
                    <form  style ="opacity: 0.85" method="POST" action="controlla/comment.con.php" class="w-100">
                        <input style = "height:1.5rem; width: 6.5rem; margin-left:0.2rem; " class = "form-control form-control-sm" type = "hidden" placeholder = "Username" name = "url_comment" value ="<?php echo $_SERVER[\\\'REQUEST_URI\\\']?>"/>\';
                         <div class="form-group">
                            <input type="hidden" name="uid" value="<?php echo $userid;?>" class="w-50" required/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="author" value="<?php echo $uzaname;?>" class="w-50" required/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="articleid" value="<?php echo $payload;?>" class="w-50" required/>
                            </div>
                            <div class="form-group">
                                <label for ="comment">' . $_SESSION['handle'] . '</label>
                                <textarea name="comment" class="w-100" rows="3"
                                placeholder="leave a comment.." required></textarea>
                            </div>
                            <button type = "submit" name= "submit_comment">Comment.</button>
                    </form>
                    </div>';
        }
        else{
            echo '
                <div class="py-3">
                    <h3>Sign in to leave a comment..</h3>
                    <form class = "form-inline" action="../controllas/login.con.php" method = "POST">
                    <input style = "height:1.5rem; width: 6.5rem; margin-left:0.2rem; " class = " form-control form-control-sm" type = "hidden" placeholder = "Username" name = "url_log" value = "' .$_SERVER["REQUEST_URI"] . '"/>  
                          <input style = "height:1.5rem; width: 6.5rem; margin-left:0.2rem; " class = " form-control form-control-sm" type = "name" placeholder = "email" name = "email_log3" required/>
                          <input style = "height:1.5rem; width: 6.5rem; margin-left:0.2rem; " class = "form-control form-control-sm" type = "password" placeholder = "Password" name = "pass_log3" required/>
                          <button style = "height:1.5rem; width: 3rem; font-size:0.6rem; margin-left:0.2rem;" class = "form-control form-control-sm" type = "submit" name = "Login">LOG IN</button>
                    </form>
                    <h6>Or <a style = "align-self: center; height:3rem; width: 3rem; font-size:1.5rem; margin-left:8px;"href = "loginform.php">Sign up</a> if you havent done so already..</h6>
            </div>
         </div>';
        }}

 function render_body(){
    render_banner();
    render_media();
 }