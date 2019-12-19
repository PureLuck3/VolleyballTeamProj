<?php
    include "../CLASSES/ALBUM/album.php";

    function display_Albums()
    {
        $array = array();

        $albums = ALBUM::get_all_album();

        foreach($albums as $a)
        {
            $array->array_push($a);
        }

        foreach($array as $elems)
        {
            $elems->display();                
        }
        
    }
?>