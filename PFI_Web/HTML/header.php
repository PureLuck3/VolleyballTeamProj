<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title> <?php echo $title ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="jumbotron text-center" style="margin-bottom:0; background-color :aqua">
            <div class="container">
                <h1>PFI Web</h1>      
                <p>Les chiens sont lit !!!</p>
            </div>
        </div>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php
                        if (validate_session())
                        {
                            echo "<a class='nav-link' href='../DOMAINLOGIC/logout.dom.php'>LOGOUT</a>";
                        }
                        else
                        {
                            echo "<a class='nav-link' href='loginview.php'>LOGIN</a>";
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if (validate_session())
                        {
                            echo "<a class='nav-link' href='myProfileview.php'>MY PROFILE</a>";
                        }
                        else
                        {
                            echo "<a class='nav-link' href='registerview.php'>REGISTER</a>";
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="billboardview.php">BILLBOARD</a>
                </li>
                <li class="nav-item">
                    <?php 
                        if(validate_session())
                        {
                            echo "<a class='nav-link' href='albumview.php'>MY ALBUMS</a>";
                        }
                        else
                        {
                            echo "";
                        }
                    ?>
                </li>
            </ul>

            <div class="collapse navbar-collapse">
                <form class="form-inline my-2 my-lg-0" method = "post" action="./searchview.php">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="searchResult" id="searchResult">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
  