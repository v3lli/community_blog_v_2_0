<?php

    include "thumbnail.gen.php";

    $title = $_POST["title"];
    $subtitle = $_POST["subtitle"];
    $cat_id = $_POST["cat_id"];
    $author =$_POST["author"];
    $description = $_POST["description"];
    $body = $_POST["body"];
    $isvideo = $_POST["isvideo"];
    $spread = $_FILES["spread"];
    $pc = $_POST["pc"];
    $cur_loc = $_POST["url_post"];


    function horpload($file){
        $currentDir = "../";
        $uploadDirectory = "images/";

        $errors = []; // Store all foreseen and unforseen errors here

        $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmpName  = $file['tmp_name'];
        $fileType = $file['type'];
        $full_name = explode(".",$fileName);
        $fileExtension = strtolower(end($full_name));

        $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                // echo "The file " . basename($fileName) . " has been uploaded";
                return substr($uploadPath, 3);
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }

    }

    // $currentDir = "../../";
    // //getcwd();
    // $uploadDirectory = "/images/";

    // $errors = []; // Store all foreseen and unforseen errors here

    // $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    // $fileName = $thumb['name'];
    // $fileSize = $thumb['size'];
    // $fileTmpName  = $thumb['tmp_name'];
    // $fileType = $thumb['type'];
    // $fileExtension = strtolower(end(explode('.',$fileName)));

    // $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

// $image = $_FILES['image']['tmp_name'];
// if($image==false){
//     $msg="Please insert an image";
//     echo $msg;

// }else{
//     $target = "images/".basename($_FILES['image'],['name']);
//     $image = $_FILES['image']['name'];
//     $query = "INSERT INTO content(title, type, author, info, body, thumb, spread ) VALUES ('$title', '$type', '$author', '$info', '$body', '$thumb', '$spred')";
//     $db = mysqli_query($connection,$query);
//     if(move_uploaded_file($_FILES['image']['tmp_name']),$target){
//         header("Location:./index.php");
//     }
// }
    if(isset($_POST["submit_post"]))
    {
        $spread_dir = horpload($spread);
        $spread_loc = explode(".",$spread_dir);
        $file_ext = array_pop($spread_loc);
        $thumb_dir = $spread_loc[0] . "-thumb." . $file_ext;
        $thumb_make = new thumbnailGenerator;
        $thumb_make->generate($spread_dir, 400, 400, $thumb_dir);

        $data = array(
            'cat_id' => $cat_id,
            'author' => $author,
            'title' => $title,
            'description' => $description,
            'thumbnail' => $thumb_dir,
            'spread' => $spread_dir,
            'subtitle' => $subtitle,
            'pc' => $pc,
            'isvideo' => $isvideo,
            'body' => $body
        );
        $ch = curl_init();
        $url = 'http://localhost:8888/rviii/api/post/create.php';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Access-Control-Allow-Origin: *',
            'Content-Type: application/json'
        ]);
        $res = curl_exec($ch);

        if(json_decode($res)){
            curl_close($ch);
            header("Location:" . $cur_loc ."?alert=success");
        }else{
            curl_close($ch);
            header("Location:" . $cur_loc ."?alert=something_wrong");
        }}






        // if (! in_array($fileExtension,$fileExtensions)) {
        //     $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        // }

        // if ($fileSize > 2000000) {
        //     $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        // }

        // if (empty($errors)) {
        //     $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        //     if ($didUpload) {
        //         echo "The file " . basename($fileName) . " has been uploaded";
        //     } else {
        //         echo "An error occurred somewhere. Try again or contact the admin";
        //     }
        // } else {
        //     foreach ($errors as $error) {
        //         echo $error . "These are the errors" . "\n";
        //     }
        // }
        // echo $thumbdir;
        // echo $spreaddir;


