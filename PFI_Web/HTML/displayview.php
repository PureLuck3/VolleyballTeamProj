<?php 
    $title= "Display";
    require "header.php";
    include "../CLASSES/MEDIA/media.php";

?>

<div class="container" style="margin-top:30px">
<?php
    $media_arr = Media::get_all_media();
    foreach($media_arr as $media)
    {
        $media->display();
    }
?>

</div>

<?php
    require "footer.php";
?>