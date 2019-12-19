<?php
  $title= "Billboard";
  include "../UTILS/sessionhandler.php";
  include "../DOMAINLOGIC/billboard.dom.php";
  require "header.php";

  if(validate_session()){
    $name = $_SESSION["userName"];
  }
  else{
    $name="Anon";
  }
?>

<div class="container mt-30">
  <h1 class="mb-4" >Welcome <?php echo $name ?> </h1>
    <?php
      display_billboard();
    ?>
    <div class="col-md-4 mb-4">
        <?php include "uploadview.php"; ?>
    </div>
</div>