<?php 
    $title= "Display";
    require "header.php";
    include "../CLASSES/MEDIA/media.php";

?>

<div class="container" style="margin-top:30px">
<?php
    $media_arr = Media::get_medias_by_albumID($albumID);
    foreach($media_arr as $media)
    {
        $media->display();
    }
?>

</div>

<?php
    require "footer.php";
?>