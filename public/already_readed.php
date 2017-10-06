
<?php
require '../connect.php';
$bdd = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
mysqli_set_charset($bdd,"utf8");
/**
 * Created by PhpStorm.
 * User: emlv
 * Date: 06/10/17
 * Time: 04:22
 */

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
                                <p><a href="delete.php?" class="btn btn-danger" role="button"><span
                                                class="glyphicon glyphicon-minus"></span> Delete it !</a></p>
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
