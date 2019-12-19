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

  //$lst // Array d'objets entre MEDIAS et ABLUMS
?>

<div class="container mt-30">
  <h1 class="mb-4" >Welcome <?php echo $name ?> </h1>
    <?php
      display_billboard();
      // foreach($lst as $elem)
      // {
      //   $elem->display();
      // }
      
    ?>
        <div class="col-md-4 mb-4">
            <?php include "uploadview.php"; ?>
        </div>
    </div>

</div>

<!--
if ($type = "album")
        {
          echo "<?php //include "albumview.php"; ?>"
        }
        else
        {
          echo "<div class="row">"
          echo "<div class="col-sm-8">"
          echo "<?php //include "mediaTemplate.php"; ?>"
          echo "</div>"
        }
-->