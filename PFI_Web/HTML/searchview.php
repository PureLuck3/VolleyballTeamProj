<?php
    include "../CLASSES/ALBUM/album.php";
    include_once "../CLASSES/USER/user.php";
    include "../UTILS/sessionhandler.php";
    $title = "Search Result";
    require "header.php";
    $album_list = Album::search_album($_POST["searchResult"]);
    $user_list = user::search_album_by_user($_POST["searchResult"]);
    $media_list = media::search_Media($_POST["searchResult"]);
?>

<h1 class="my-4">Résultat de Recherche : </h1>
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-8">
            <?php  
                foreach($album_list as $album)
                {
                    $album->display();
                }

                echo "<br>";

                foreach($user_list as $user)
                {
                    $user->displayUser();
                }

                echo "<br>";

                foreach($media_list as $media)
                {
                    $media->display();
                }
            ?>
        </div>
    </div>
</div>

<?php
    require "footer.php";
?>
