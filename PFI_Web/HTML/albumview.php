<?php
    $title= "MY ALBUMS";
    include "../UTILS/sessionhandler.php";
    include_once __DIR__ . "/../DOMAINLOGIC/album.dom.php";
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
            <div class="Container" style="width:400px">
                
                <h2><?php echo $name ."'s" . " Albums" ?></h2>
                    <div class='card' style='width:400px'>
                        <div class='card-header'>
                            <a href=''><?php  ?></a>
                        </div>
                        <div class='card-body'>
                            <?php display_Albums()?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php require "footer.php";?>