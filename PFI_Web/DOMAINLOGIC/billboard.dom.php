<?php
    include "../CLASSES/ALBUM/album.php";
    //include "../CLASSES/MEDIA/media.php";

    function display_billboard()
    {
        $array = array();
        $sortedArray = array();
        $mostViews = 0;
        $indexMostViews;

        $albums = ALBUM::get_all_album();
        $medias = MEDIA::get_medias();

        foreach($albums as $a)
        {
            array_push($array, $a);
        }
        foreach($medias as $m)
        {
            array_push($array, $m);
        }
        var_dump($array);
        usort($array, "most_viewed");
        foreach($array as $elem)
        {
            $elem->display();
        }
        // while(!Empty($array))
        // {
        //     foreach($array as $elem)
        //     {
        //         if ($elem->get_views() > $mostViews)
        //         {
        //             $mostViews = $elem->get_views();
        //             $indexMostViews = $array[$elem];
        //         }
        //     }
        //     $sortedArray->array_push($elem);
        //     unset($array[$elem]);
        // }

        // Afficher le top N de sortedArrays!! NE PAS FAIRE BOUTON SHOW MORE

    }
    function most_viewed($x, $y)
    {
        if ($x->get_views() == $y->get_views()){
            return 0;
        }
        return ($x->get_views() < $y->get_views()) ? -1 : 1;
    }
?>