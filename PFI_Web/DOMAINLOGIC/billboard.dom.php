<?php
    include "../CLASSES/ALBUM/album.php";
    include "../CLASSES/MEDIA/media.php";

    function display_billboard()
    {
        $array = new array();
        $sortedArray = new array();
        $mostLikes = 0;

        $albums = ALBUM::get_all_album();
        $medias = MEDIA::get_medias();

        foreach($albums as $a)
        {
            $array->array_push($a);
        }
        foreach($medias as $m)
        {
            $array->array_push($m);
        }

        while(!Empty($array))
        {
            foreach($array as $elem)
            {
                if ($elem->get_views() > $mostLikes)
                {
                    $mostLikes = $elem->get_views();
                    $sortedArray->array_push($elem);
                    unset($array[$elem]);
                }
            }
        }

        // Afficher le top N de sortedArrays!! NE PAS FAIRE BOUTON SHOW MORE
    }
?>