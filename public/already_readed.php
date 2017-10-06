<script>
    $(document).ready(function () {
document.body.style.overflow = "auto";
});
</script>
<?php
require '../connect.php';
$bdd = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

/**
 * Created by PhpStorm.
 * User: emlv
 * Date: 06/10/17
 * Time: 04:22
 */

include 'header.php';

$req = "SELECT User_Category, User_Note, u.Username, b.title, b.author, b.year FROM User_has_Book ub
JOIN User u ON ub.User_idUser = u.id
JOIN Book b ON ub.Book_idBook = b.id";

$result = mysqli_query($bdd, $req);

?>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
            <?php
            while ($resp = mysqli_fetch_assoc($result)) :
                ?>


                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <!--<img src="..." alt="...">-->
                        <div class="caption">
                            <h3><?= $resp['title'] ?></h3>
                            <p>Author : <?= $resp['author'] ?></p>
                            <h4>Year : <?= $resp['year'] ?? 'Inconnue' ?></h4>
                            <?php if ($_SESSION['username']) : ?>
                                <p><a href="#" class="btn btn-success" role="button"><span
                                                class="glyphicon glyphicon-plus"></span> I have read it !</a>
                                    <a href="#" class="btn btn-primary" role="button"><span
                                                class="glyphicon glyphicon-edit"></span> I want it !</a></p>
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
