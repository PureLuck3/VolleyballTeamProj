<form method="post" action="../DOMAINLOGIC/uploadalbum.dom.php">
    <h2>Add Album</h2>
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" name="titre" id="titre">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description">
    </div>
    <input type="hidden" name="userID" id="userID" value=<?php echo $_SESSION["userID"] ?>>
    <button class="btn btn-success" type="submit">Add</button>
</form>