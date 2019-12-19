<?php
    include "../CLASSES/ALBUM/album.php";

    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $userID = $_POST["userID"];

    if (!empty($titre)){
        Album::create_album($titre, $userID, $description);
    }
    
    header("Location: ../HTML/albumview.php");
    die();
?>