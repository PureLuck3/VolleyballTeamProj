<?php

    include "../CLASSES/ALBUM/album.php";
    require "header.php";
    $album_list = Album::search_album($_GET["search"]);
?>

<h1 class="my-4">Résultat Recherche : </h1>
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-8">
            <?php  
                foreach($album_list as $album)
                {
                    $album->display();
                }
            ?>
        </div>
    </div>
</div>

<?php
    require "footer.php";
?>
