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

<div class="container">
  <h1 class="mb-4">Welcome <?php echo $name ?> </h1>
    <div class="row">
      <div class="col-md-8 mb-4">
        <?php
          display_billboard();
        ?>
      </div>
    </div>
</div>