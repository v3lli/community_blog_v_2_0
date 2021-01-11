<?php

include_once "../controllas/art.con.php";

function render_article(){
    $article = get_article($_GET["id"]);
    echo ' <div class="container">
                <header style="margin-top: 2rem;" class ="container">
                    <h3 style ="margin-left: 1rem; font-size: 140%">' . $article[0]->title . '</h3>
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
                </article>';
                render_comments($_GET['id']);
    echo '</div>';
}

function render_comments($id){
    // comment api call
    echo '<div id = "comment" class="well container">
                <h4 style ="opacity: 0.45;" class="my-5" >C O M M E N T S..</h4>';
    $yarns = get_comments($id);
    //looping render
    foreach ($yarns as $yarn)
    {
        echo '<header>
                        <p><strong>' . $yarn->user_handle . '</strong></p>
                   </header>
                   <p>' . $yarn->body . '
                   </p>
                   <small>' . $yarn->create_date . '</small>
                   <hr>';
    }
    //close div tag
    echo '</div>';
    //comment form or login form
    echo '<div id = "commentform" class= "py-5">';
        if (isset($_SESSION['handle'])){
            echo '<form  style ="opacity: 0.85" method="POST" action="../controllas/comment.con.php" class="w-100">
                        <input style = "height:1.5rem; width: 6.5rem; margin-left:0.2rem; " class = "form-control form-control-sm" type = "hidden" name = "url_comment" value ="' . $_SERVER["REQUEST_URI"] . '"/>
                         <div class="form-group">
                            <input type="hidden" name="uid" value="'. $_SESSION['id'] . '" class="w-50" required/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="articleid" value="'.$_GET['id'].'" class="w-50" required/>
                            </div>
                            <div class="form-group">
                                <textarea name="body" class="w-100" rows="3"
                                placeholder="leave a comment.." required></textarea>
                            </div>
                            <button type = "submit" name= "comment">Comment.</button>
                    </form>';
    }
    else{
        echo '<h3>Sign in to leave a comment..</h3>
                    <form class = "form-inline" action="../controllas/login.con.php" method = "POST">
                    <input style = "height:1.5rem; width: 6.5rem; margin-left:0.2rem; " class = " form-control form-control-sm" type = "hidden" placeholder = "Username" name = "url_log" value = "' .$_SERVER["REQUEST_URI"] . '"/>  
                          <input style = "height:1.5rem; width: 6.5rem; margin-left:0.2rem; " class = " form-control form-control-sm" type = "name" placeholder = "email" name = "email_log3" required/>
                          <input style = "height:1.5rem; width: 6.5rem; margin-left:0.2rem; " class = "form-control form-control-sm" type = "password" placeholder = "Password" name = "pass_log3" required/>
                          <button style = "height:1.5rem; width: 3rem; font-size:0.6rem; margin-left:0.2rem;" class = "form-control form-control-sm" type = "submit" name = "Login">LOG IN</button>
                    </form>
                    <h6>Or <a style = "align-self: center; height:3rem; width: 3rem; font-size:1.5rem; margin-left:8px;"href = "loginform.php">Sign up</a> if you havent done so already..</h6>';
    }
    //close div tag
    echo '</div>';
}
