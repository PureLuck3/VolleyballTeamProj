<?php
    include __DIR__ . "/../CLASSES/MEDIA/media.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    if(!validate_session()){
        header("Location: ../HTML/error.php?ErrorMSG=Not%20logged%20in!");
        die();
    }
    
    unlink($_POST['url']);
    Media::remove_media($_POST['mediaID']);

    header("Location: ../HTML/billboardview.php");
    die();
?>