<?php
    $title= "Billboard";
    require "header.php";
    include "../DOMAINLOGIC/search.dom.php";
    $searchResult = $_POST["searchResult"];
?>

<div class="container" style="margin-top:30px">

        <div class="row">
            <div class="col-sm-8">
            <?php search_result($searchResult); ?>
            </div>
        </div>
    </div>

<?php
    require "footer.php";
?>
