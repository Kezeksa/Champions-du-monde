<?php
// login page
require '../connect.php';
$bdd = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

session_start();

// Create user in bdd if not exist
$req = "SELECT * FROM User
        WHERE Username= '" . $_POST['username'] . "'";

$result = mysqli_query($bdd, $req);

if (mysqli_num_rows($result)) {
    $req = "INSERT INTO User (Username)
            VALUES ('" . $_POST['username'] . "')";

    $result = mysqli_query($bdd, $req);
}

// Add user to session
$_SESSION['username'] = $_POST;

header('Location: index.php');

?>