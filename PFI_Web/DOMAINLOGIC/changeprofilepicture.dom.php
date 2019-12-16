<?php

include "../CLASSES/MEDIA/media.php";

session_start();

if(isset($_FILES['Media']){
 
 $target_dir = "MEDIAS/";

 //obtenir l'extention du fichier uploader
 $media_file_type = pathinfo($_FILES['Media']['name'] ,PATHINFO_EXTENSION);
 //$media_file_ext = strtolower(end(explode('.',$_FILES['Media']['name'])));

 $img_extensions_arr = array("jpg","jpeg","png","gif");

 if(in_array($media_file_type, $img_extensions_arr)){
     $type = "image";
     echo "image";
 }
 else{
     echo "INVALID FILE TYPE";
     die();
 }

 $file_name = "profilepicture" . $_SESSION["userID"];
 
 //creation de l'url pour la DB
 $url = $target_dir . $file_name . "." . $media_file_type;
 
 //deplacement du fichier uploader vers le bon repertoire (MEDIAS)
 move_uploaded_file($_FILES['Media']['tmp_name'], "../" . $url);


 //redirection
 header("Location: ./myprofileview.php");
 die();
}