<?php
echo '<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Page Title</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css">
      <link rel="stylesheet" type="text/css" media="screen" href="../styles/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300&display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="container">

      Welcome, Boss , Would you like to post?<br>
      rn
      thats all im Good for..<br>

      Though I am thinking of inventory <br>
      then maybe analytics as a long term.<br>
      should be fun.<br>

      For now though.. just post!<br>
        <br>
        <br>
      <form method="post" action="../controllas/post.con.php" class="w-100" enctype="multipart/form-data">
          <input class = "form-control-sm form-former" type = "hidden" name = "url_post" value ="' . $_SERVER["REQUEST_URI"] . '"/>
          <div class="form-group">
              <label for="cat_id">Category</label>
            <select name="cat_id">
                <option value = "1">Official</option>
                <option value = "2">Lit</option>
                <option value = "3">Personal</option>
                <option value = "4">Think</option>
              </select>
          </div>
          <div class="form-group">
              <label for="isvideo">Video?</label>
              <select name="isvideo">
                  <option value = "0">No</option>
                  <option value = "1">Yes</option>
              </select>
          </div>
          <div class="form-group">
            <label for ="title"> Title </label>
            <input type="text" name="title" value="" class="w-100"/>
          </div>
          <div class="form-group">
              <label for ="subtitle"> Subtitle </label>
              <input type="text" name="subtitle" value="" class="w-100"/>
          </div>
          <div class="form-group">
              <label for ="author"> Author </label>
              <input type="text" name="author" value="" class="w-100"/>
            </div>
          <div class="form-group">
              <label for ="description">Short-Description</label>
              <textarea type="text" name="description" value="" class="w-100" rows="2"></textarea>
          </div>
          <div class="form-group">
              <label for ="body">Body</label>
              <textarea type="text" name="body" value="" class="w-100" rows="4"></textarea>
          </div>
          <div class="form-group">
              <label for ="pc">Image Credits</label>
              <input type="text" name="pc" value="" class="w-100"/>
          </div>
          <div class="form-group">
              <label for ="spread">Spread image </label>
              <input type="file" name="spread" value="" class="w-100"/>
          </div>
          <button type = "submit" name= "submit_post">Upload</button>
      </form>
  </div>';