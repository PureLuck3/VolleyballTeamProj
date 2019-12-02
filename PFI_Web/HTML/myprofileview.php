<?php
    $title= "My Profile";
    require "header.php";
    include "../UTILS/sessionhandler.php";

    if(!validate_session())
    {
        header("Location: ./error.php?ErrorMSG=Not%20Logged%20in!");
        die();
    }
?>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <h2>MY PROFILE</h2>
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
    </div>
</div>

<?php
    require "footer.php";
?>