<?php
    $title= "Logout";
    require "header.php";
    include "../UTILS/sessionhandler.php";

    if(validate_session())
    {
        header("Location: ./error.php?ErrorMSG=Already%20Logged!");
        die();
    }
?>

    <h2>SUCCESSFULLY LOGGED OUT</h2>

<?php
    require "footer.php";
?>
