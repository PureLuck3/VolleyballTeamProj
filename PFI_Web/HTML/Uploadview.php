<!-- PORTER ATTENTION AU ENCTYPE -->
<form method = "post" action = "../DOMAINLOGIC/upload.dom.php" enctype="multipart/form-data">
    <h2>Add Media</h2>
    <div class="form-group">
        <label for="Name">Titre</label>
        <input type="Name" class="form-control" name="Name" id="Name" required />
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" />
    </div>

    <div class="form-group">
        <label for="Media">Media</label>
        <input type="file" class="form-control" name="Media" id="Media" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <input type="hidden" name="albumID" id="albumID" value=<?php echo $_GET["id"] ?>>
    <input type="hidden" name="albumTitle" id="albumTitle" value=<?php echo $_GET['title'] ?>>
    <button class="btn btn-success" type="submit">Upload</button>

</form>
