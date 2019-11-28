<?php
    include __DIR__ . "/../CLASSES/POSTS/post.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    if(!validate_session()){
        header("Location: ../error.php?ErrorMSG=Not%20logged%20in!");
        die();
    }

    if(!isset($_POST["postID"]) || empty($_POST['content'])){
        header("Location: ../error.php?ErrorMSG=Bad%20Requests!");
        die();
    }

    $post = new post();
    $post->load_post($_POST["postID"]);

    if(!$post->get_authorID() == $_SESSION["userID"]){
        header("Location: ../error.php?ErrorMSG=Bad%20Requests!");
        die();
    }

    $post->set_content($_POST['content']);
    $post->update();

    header("Location: ../billboard.php");
    die();
