<?php
    $title= "Album" . " " . $_GET['title'];
    include "../UTILS/sessionhandler.php";
    include "../DOMAINLOGIC/picinalbum.dom.php";
    require "header.php";
    $userID = $_GET['userID'];
?>
<div class="container">
    <h2><?php echo $_GET['title']?>  </h2>
    <div class="row">
      <div class="col-md-8 mb-4">
        <?php
          display_album($_GET["id"]);
        ?>
      </div>
      <?php
        if ($userID == $_SESSION['userID']){
          echo "<div class='col-md-4 mb-4'>
                <?php include 'Uploadview.php'; ?>
                </div>"
        }
      ?>
    </div>
</div>

<?php
    require "footer.php";
?>
