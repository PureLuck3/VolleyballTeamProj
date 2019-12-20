<?php
    $title= "MY ALBUMS";
    include "../UTILS/sessionhandler.php";
    include_once __DIR__ . "/../DOMAINLOGIC/album.dom.php";
    require "header.php";
    include_once "../CLASSES/ALBUM/album.php";

    if(!validate_session())
    {
        header("Location: ./error.php?ErrorMSG=Not%20Logged%20in!");
        die();
    }
    else{
        $name = $_SESSION["userName"];
    }
?>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-8">  
            <div class="Container" style="width:400px">               
            <?php
                 echo "<h2>$name" . "'s" . " Albums" . "</h2>";
                 $array = array();
                 $albums = Album::get_all_album_by_userID($_SESSION["userID"]);
 
                foreach($albums as $a)
                {
                    array_push($array, $a);
                }
                foreach($array as $elem)
                {
                    $elem->display();
                    echo "<br>";
                }
            ?>               
            </div>
        </div>
        <div class="col-sm-4">
            <?php include "uploadalbumview.php";?>
        </div>
    </div>
</div>

<?php require "footer.php";?>
