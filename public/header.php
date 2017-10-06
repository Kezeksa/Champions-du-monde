<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <title>Hackathon</title>
</head>


<body>

<header>
    <div class="container-fluid">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php"><img src="assets/images/logo.png"
                        class="logoHeader img-responsive"></a>
            </div>
            <div class="collapse navbar-collapse pull-right">
                <!--<ul class="nav navbar-nav">-->
                <ul id="menu-demo2">
                    <?php if (!empty($_SESSION)) { ?>
                        <li><a href="books.php">My books</a>
                            <ul>
                                <li><a href="already_readed.php?category=readed" class="navbarFontColor">Books I've read</a></li>
                                <li><a href="already_readed.php?category=wanted" class="navbarFontColor">Books I'd like to read</a></li>
                            </ul>
                        </li>
                        <li><a href="#">My musics</a>
                            <ul>
                                <li><a href="#" class="navbarFontColor">Musics I've listened</a></li>
                                <li><a href="#" class="navbarFontColor">Musics I'd like to listen</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="active"><a href="#" class="navbarFontColor">Home</a></li>
                        <li><a href="books.php" class="navbarFontColor">Books</a></li>
                        <li><a href="music.php" class="navbarFontColor">Musics</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
    <div class="jumbotron">
        <div class="container">

            <h1><span><img class="fbook1" src="http://umanitoba.ca/bookstore/images/FlyingBook.png"></span>Welcome to the Music Books !<span><img class="fbook2" src="http://umanitoba.ca/bookstore/images/FlyingBook.png"></span></h1>


            <!-- Large modal -->
            <?php if (empty($_SESSION)) { ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".form_login">Log in
                </button>
            <?php } else { ?>
                <p>
                    <a class="btn btn-danger btn-lg" href="logout.php">Log out</a>
                </p>
            <?php } ?>
            <div class="modal fade form_login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form action="login.php" method="post" class="form-horizontal form_header">
                            <fieldset>
                                <legend>Already registered ?</legend>
                                <div class="form-group">
                                    <label for="login" class="col-sm-2 control-label">Login</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="username" value="" id="login"
                                               placeholder="Votre nom ici">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-1 col-sm-10">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>

    $(document).ready(function () {

        $(".fbook1").click(function () {
          $(this).animate({top: "-=300px", left: "-=300px"}, 4000);
        });

        $(".fbook2").click(function () {
          $(this).animate({top: "-=300px", left: "+=300px"}, 4000);
        });

});
        </script>
