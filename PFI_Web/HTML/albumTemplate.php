<div class="Container">
    <?php
    $id = $user->get_id();
        echo "<div class='card' style='width:400px'>
                <div class='card-header'>
                    <a href=./picinalbumview?id=$id&title=$title&userID=$id>" . $title . "</a>" . "  " . $user->get_username() . "'s album " . " " . $date . 
                "</div>
            </div>";
    ?>
</div>