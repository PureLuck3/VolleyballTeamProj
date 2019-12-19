<?php
    $title= "My Profile";
    include "../UTILS/sessionhandler.php";
    require "header.php";

    if(!validate_session())
    {
        header("Location: ./error.php?ErrorMSG=Not%20Logged%20in!");
        die();
    }
?>

<div class="container" style="margin-top:30px">
<h2>MY PROFILE</h2>
    <div class="row">
        <div class="col-sm-4">
            <form method = "post" action = "../DOMAINLOGIC/updateInfo.dom.php">
                
                <div class="form-group">
                    <label for="email">New Email:</label>
                    <input type="email" class="form-control" name="email" id="email"><br>
                </div>
                
                <div class="form-group">
                        <label for="username">New Username:</label>
                        <input type="text" class="form-control" name="username" id="username"><br>
                </div>

                <button class="btn btn-success" type="submit">Update</button>
            </form>

                

            <form method = "post" action = "../DOMAINLOGIC/updatePw.dom.php">
            
                <div class="form-group">
                    <label for="oldPw">Old Password:</label>
                    <input type="password" class="form-control" name="oldPw" id="oldPw"><br>
                </div>

                <div class="form-group">
                    <label for="pwd">New Password:</label>
                    <input type="password" class="form-control" name="pwd" id="pwd"><br>
                </div>
                
                <div class="form-group">
                    <label for="pwValidation">Password Validation:</label>
                    <input type="password" class="form-control" name="pwValidation" id="pwValidation"><br>
                </div>

                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
        <div class="col-md-4 order-md-2 mb-4">

            <form method = "post" action = "../DOMAINLOGIC/changeProfilePicture.dom.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="Media">Profile Picture</label>
                    <?php include "./profilepictureview.php" ?>
                    <input type="file" class="form-control" name="Media" id="Media" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <button class="btn btn-success" type="submit">Upload</button>

            </form>
        </div>
    </div>
</div>

<?php
    require "footer.php";
?>