<?php
    $title= "MY ALBUMS";
    include "../UTILS/sessionhandler.php";
    require "header.php"; 

    if(!validate_session())
    {
        header("Location: ./error.php?ErrorMSG=Not%20Logged%20in!");
        die();
    }
?>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <h2>MY ALBUMS</h2>

            <div class="card">
                <div class="card-header">Header</div>
                <div class="card-body">Body</div>
                <div class="card-footer">Footer</div>
            </div>
        </div>
    </div>
</div>

<?php require "footer.php";?>