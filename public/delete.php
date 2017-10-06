<?php
require '../connect.php';
$bdd = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
mysqli_set_charset($bdd,"utf8");

$req = "SELECT id FROM User
        WHERE username='" . $_SESSION['username'] . "'";

$result = mysqli_query($bdd, $req);
$idUser = mysqli_fetch_assoc($result)['id'];

$req = "SELECT id FROM Book
        WHERE title='" . $_POST['title'] . "'";

$result = mysqli_query($bdd, $req);
$idBook = mysqli_fetch_assoc($result)['id'];

$req = "DELETE FROM User_has_Book ub
WHERE User_idUser='" . $idUser . "' 
AND Book_idBook='" . $idBook . "'";

$result = mysqli_query($bdd, $req);

$destination = 'Location: already_readed.php?category=' . $POST['category'];
header($destination);