
<?php
/**
 * Created by PhpStorm.
 * User: wilder8
 * Date: 06/10/17
 * Time: 02:23
 */

function addBookToBdd() {
    // Add a book to bdd
    require '../connect.php';
    $bdd = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($bdd,"utf8");

    session_start();

// Create user in bdd if not exist
    $req = "SELECT * FROM User
        WHERE Username='" . $_POST['username'] . "'";

    $result = mysqli_query($bdd, $req);
//var_dump(mysqli_fetch_assoc());

    if (mysqli_num_rows($result)<1) {
        $req = "INSERT INTO User (Username)
            VALUES ('" . $_POST['username'] . "')";

        $result = mysqli_query($bdd, $req);
    }
}
