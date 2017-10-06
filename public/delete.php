<?php
require '../connect.php';
$bdd = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
mysqli_set_charset($bdd,"utf8");

$req = "SELECT User_Category, User_Note, u.Username, b.title, b.author, b.year FROM User_has_Book ub
JOIN User u ON ub.User_idUser = u.id
JOIN Book b ON ub.Book_idBook = b.id
WHERE username='" . $_SESSION['username'] . "'
AND User_Category='" . $_POST['category'] . "'";

$req = "DELETE FROM User_has_Book ub
JOIN User u ON ub.User_idUser = u.id
JOIN Book b ON ub.Book_idBook = b.id
WHERE username='" . $_SESSION['username'] . "'
AND User_Category='" . $_POST['category'] . "'";

$result = mysqli_query($bdd, $req);

$destination = 'Location: already_readed.php?category=' . $POST['category'];
header($destination);