<?php
    $title= "MY ALBUMS";
    include "../UTILS/sessionhandler.php";
    require "header.php"; 

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
        <div class="col-sm-4">    
            <?php include_once __DIR__ . "/../DOMAINLOGIC/album.dom.php";?>
        </div>
    </div>
</div>

<?php require "footer.php";?>