<?php 
    require "../HTML/header.php";

    if(!validate_session())
    {
        header("Location: ./error.php?ErrorMSG=Not%20Logged%20in!");
        die();
    }

    if(!isset($_get["search"])){
        header("Location: error.php?ErrorMSG=Bad%20Request!");
        die();
    }

    $title = "search";
    $content = array();
    array_push($content, "searchview.php");

    require "../HTML/footer.php";

?>