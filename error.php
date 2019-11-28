<?php
    
    require "header.php";

    function generateErrorMSG(){
        $errorMSG = $_GET["ErrorMSG"];
        echo "<h2>$errorMSG</h2></br>";
    }
 
    generateErrorMSG();
?>

<?php
    require "footer.php";
?>
