<?php
    $title= "Logout";
    include "../UTILS/sessionhandler.php";
    require "header.php";

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
