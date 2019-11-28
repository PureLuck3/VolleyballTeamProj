<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
        <title> Upload </title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">

                    <!-- PORTER ATTENTION AU ENCTYPE -->
                    <form method = "post" action = "./Logic/upload.dom.php" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="Name">Titre</label>
                            <input type="Name" class="form-control" name="Name" id="Name" required />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <div class="form-group">
                            <label for="Media">Media</label>
                            <input type="file" class="form-control" name="Media" id="Media" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <button class="btn btn-success" type="submit">Upload</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </body>

</hmtl>