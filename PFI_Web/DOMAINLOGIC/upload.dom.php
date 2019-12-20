<?php

include "../CLASSES/MEDIA/media.php";

if(isset($_FILES['Media']) && !empty($_POST['Name'])){
 
    $title = $_POST['Name'];
    $description = $_POST['description'];
    $albumID = $_POST['albumID'];
    $albumTitle = $_POST['albumTitle'];
    $target_dir = "Medias/";

    //obtenir l'extention du fichier uploader
    $media_file_type = pathinfo($_FILES['Media']['name'] ,PATHINFO_EXTENSION);
    //$media_file_ext = strtolower(end(explode('.',$_FILES['Media']['name'])));
  
    // Valid file extensions
    $img_extensions_arr = array("jpg","jpeg","png","gif");
    $vid_extensions_arr = array("webm", "avi", "wmv", "rm", "rmvb", "mp4", "mpeg");

    if(in_array($media_file_type, $img_extensions_arr)){
        $type = "image";
        echo "image";
    }
    else if(in_array($media_file_type, $vid_extensions_arr)){
        $type = "video";
        echo "video";
    }
    else{
        echo "INVALID FILE TYPE";
        die();
    }

    //creation d'un nom unique pour la "PATH" du fichier
    $path = tempnam("../Medias", '');
    unlink($path);
    $file_name = basename($path, ".tmp");
    
    //creation de l'url pour la DB
    $url = $target_dir . $file_name . "." . $media_file_type;
    
    //deplacement du fichier uploader vers le bon repertoire (Medias)
    move_uploaded_file($_FILES['Media']['tmp_name'], "../" . $url);

    //create entry in database
    Media::create_entry($type, $url, $title, $description, $albumID);
    //redirection
    header("Location: ../HTML/picinalbumview.php?id=$albumID&title=$albumTitle");
    die();
}

?>