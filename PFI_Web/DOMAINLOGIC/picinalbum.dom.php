<?php
    include "../CLASSES/MEDIA/media.php";

    function display_album($albumID)
    {
        $array = array();
        $medias = MEDIA::get_medias_by_albumID($albumID);

        foreach($medias as $m)
        {
            array_push($array, $m);
        }
        foreach($array as $elem)
        {
            $elem->display();
            echo "<br>";
        }
    }
?>