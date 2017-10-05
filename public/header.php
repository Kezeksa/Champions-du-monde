<?php
/**
 * Created by PhpStorm.
 * User: wilder12
 * Date: 05/10/17
 * Time: 16:19
 */
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
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="assets/images/e7a9a0a3e7f001893c6b4a3594fa376e.png" class="logoHeader">
            </div>
            <div class="collapse navbar-collapse pull-right">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#" class="navbarFontColor">Home</a></li>
                    <li><a href="#about" class="navbarFontColor">About</a></li>
                    <li><a href="#contact" class="navbarFontColor">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron">
        <div class="container">
            <h1>Welcome to the Music Books !</h1>

            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".form_login">Log in
            </button>

            <div class="modal fade form_login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form action="" method="post" class="form-horizontal form_header">
                            <fieldset>
                                <legend>Déjà enregistré ?</legend>
                                <div class="form-group">
                                    <label for="login" class="col-sm-2 control-label">Login</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="user_name" value="" id="login"
                                               placeholder="Votre nom ici">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-1 col-sm-10">
                                        <button type="submit" class="btn btn-default">Envoyer</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>


            <p>
                <a class="btn btn-danger btn-lg" href="logout.php">Log out</a>
            </p>
        </div>
    </div>
</header>

