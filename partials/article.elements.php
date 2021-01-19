<?php

include_once "../controllas/art.con.php";

function render_article(){
    $article = get_article($_GET["id"]);
    echo ' <div class="container">
                <header class ="container article-header">
                    <h3>' . $article->title . '</h3>
                    <p>by ' . $article->author . '</p>
                </header>
                <article class="mx-auto col-sm-12 article-body">
                    <figure class="animated fadeIn mx-auto col-sm-10">
                        <img class="mx-auto col-sm-12" src="' . $article->spread . '">
                        <figcaption class ="py-2"><em>Photo Credit: ' . $article->pc . '</em></figcaption>
                    </figure>
                    <p class="font-weight-light col-sm-10">
                        ' . $article->body . '
                    </p>
                    <hr class="w-75">
                </article>';
                render_comments($_GET['id']);
    echo '</div>';
}

function render_comments($id){
    // comment api call
    echo '<div id = "comment" class="well container">
                <h4 class="my-5">C O M M E N T S..</h4>';
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
    echo '<div id = "commentform" class= "py-5 comment-form">';
        if (isset($_SESSION['handle'])){
            echo '<form method="POST" action="../controllas/comment.con.php" class="w-100">
                    <input type = "hidden" name = "url_comment" value ="' . $_SERVER["REQUEST_URI"] . '"/>
                    <input type="hidden" name="uid" value="'. $_SESSION['id'] . '" class="w-50" required/>
                    <input type="hidden" name="articleid" value="'.$_GET['id'].'" class="w-50" required/>
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
                    <input type = "hidden" name = "url_log" value = "' .$_SERVER["REQUEST_URI"] . '"/>  
                          <input class = " form-control form-control-sm article-sign-input" type = "name" placeholder = "email" name = "email_log3" required/>
                          <input class = "form-control form-control-sm article-sign-input" type = "password" placeholder = "Password" name = "pass_log3" required/>
                          <button class = "form-control form-control-sm article-sign-button" type = "submit" name = "Login">LOG IN</button>
                    </form>
                    <h6>Or <a class="article-sign-link" href = "loginform.php">Sign up</a> if you havent done so already..</h6>';
    }
    //close div tag
    echo '</div>';
}
