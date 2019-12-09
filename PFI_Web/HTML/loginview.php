<?php
    $title= "Login";
    include "../UTILS/sessionhandler.php";
    require "header.php";

    if(validate_session())
    {
        header("Location: error.php?ErrorMSG=Already%20Logged!");
        die();
    }
?>

    <div class="container" style="margin-top:30px">

        <div class="row">
            <div class="col-sm-4">
                <h2>LOGIN</h2>
                <form method = "post" action = "../DOMAINLOGIC/login.dom.php">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email"><br>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="pw" id="pwd"><br>
                    </div>
                    <button class="btn btn-success" type="submit">Login</button>
                </form>
            </div>
        </div>

    </div>
<?php
    require "footer.php";
?>
