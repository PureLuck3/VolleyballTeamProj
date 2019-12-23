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
            if (validate_session())
            {
                if ($_GET['userID'] == $_SESSION['userID'])
                {
                    echo "<form method='post' action='../DOMAINLOGIC/deletemedia.dom.php'>";
                    echo "<button class='btn btn-success' id='btnDelMedia'>Delete</button>";
                    echo "<input type='hidden' id='mediaID' name='mediaID' value=" . $elem->get_id() . ">";
                    echo "<input type='hidden' id='url' name='url' value=" . $elem->get_URL() . ">";
                    echo "</form>";
                }
            }
            echo "<br>";
        }
    }
?>