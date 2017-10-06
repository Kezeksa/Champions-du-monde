<?php
session_start();
require '../connect.php';
$bdd = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
mysqli_set_charset($bdd, "utf8");

if ($_POST) {
    $req = "SELECT id FROM User
        WHERE username='" . $_SESSION['username'] . "'";

    $result = mysqli_query($bdd, $req);
    $idUser = mysqli_fetch_assoc($result)['id'];

    $req = "SELECT id FROM Book
        WHERE title='" . $_POST['title'] . "'";

    $result = mysqli_query($bdd, $req);
    $idBook = mysqli_fetch_assoc($result)['id'];

    $req = "DELETE FROM User_has_Book
            WHERE User_idUser='" . $idUser . "' 
            AND Book_idBook='" . $idBook . "'";

    $result = mysqli_query($bdd, $req);
}

include 'header.php';

$req = "SELECT User_Category, User_Note, u.Username, b.title, b.author, b.year FROM User_has_Book ub
JOIN User u ON ub.User_idUser = u.id
JOIN Book b ON ub.Book_idBook = b.id
WHERE username='" . $_SESSION['username'] . "'
AND User_Category='" . $_GET['category'] . "'";

$result = mysqli_query($bdd, $req);

?>
<script>
    $(document).ready(function () {
        document.body.style.overflow = "auto";
    });
</script>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
            <?php
            while ($resp = mysqli_fetch_assoc($result)) :
                ?>


                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3><?= $resp['title'] ?></h3>
                            <p>Author : <?= $resp['author'] ?></p>
                            <h4>Year : <?= $resp['year'] ?? 'Inconnue' ?></h4>
                            <?php if ($_SESSION['username']) : ?>

                                <form action="#" method="post">
                                    <input type="hidden" name="title" value="<?= $resp['title'] ?>">
                                    <input type="hidden" name="author" value="<?= $resp['author'] ?>">
                                    <input type="hidden" name="year" value="<?= $resp['year'] ?>">
                                    <button type="submit" class="btn btn-infos"><span
                                                class="glyphicon glyphicon-garbage"></span> Delete it !
                                    </button>
                                </form>

                            <?php endif ?>
                        </div>
                    </div>
                </div>


            <?php endwhile ?>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>
