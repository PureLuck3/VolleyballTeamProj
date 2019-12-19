<?php
    include "../CLASSES/ALBUM/album.php";

    function display_Albums()
    {
        $array = array();

        $albums = ALBUM::get_all_album_by_userID($_SESSION["userID"]);

        foreach($albums as $a)
        {
            array_push($array, $a);
        }

        foreach($array as $elems)
        {
            $elems->display();                
        }
    }
?>