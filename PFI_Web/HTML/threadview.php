<!-- Put HTML for posts shown from thread after clicking on thread title -->

<?php
    $title= "Posts";
    require "header.php";
    include "../DOMAINLOGIC/billboard.dom.php";
?>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  padding: 2px 16px;
}
</style>
<div class="container" style="margin-top:30px">

        <div class="row">
            <div class="col-sm-8">
            <?php display_post_info($_GET["threadID"]); ?>
            </div>
            <div class="col-md-4 order-md-2 mb-4">
                <h2><?php echo $_GET["threadTitle"]; ?></h2>
                <form method = "post" action = "../DOMAINLOGIC/addPost.dom.php">
                    <div class="form-group">
                        <label for="post">Post:</label>
                        <input type="text" class="form-control" name="post" id="post">
                        <input type="hidden" name="threadID" id="threadID" value=<?php echo $_GET["threadID"] ?>>
                        <br>
                    </div>
                    <button class="btn btn-success" type="submit">Add Post</button>
                </form>
            </div>
        </div>
    </div>

<?php
    require "footer.php";
?>