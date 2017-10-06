<?php

// adding some item to bdd
if ($_POST) {
    // adding entry to user bdd
    require '../connect.php';
    $bdd = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($bdd, "utf8");

    session_start();

    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $category = $_POST['category'];

    var_dump($_POST);

// Create Book in bdd if not exist
    $req = "SELECT * FROM Book
        WHERE title='" . $_POST['title'] . "'";

    $result = mysqli_query($bdd, $req);

    if (mysqli_num_rows($result) < 1) {
        $req = "INSERT INTO Book (title, author, year)
            VALUES ('$title', '$author', '$year')";

        $result = mysqli_query($bdd, $req);
    }

    // insert relation between book and user
    $req = "SELECT id FROM User
        WHERE username='" . $_SESSION['username'] . "'";

    $result = mysqli_query($bdd, $req);
    $idUser = mysqli_fetch_assoc($result)['id'];

    $req = "SELECT id FROM Book
        WHERE title='" . $_POST['title'] . "'";

    $result = mysqli_query($bdd, $req);
    $idBook = mysqli_fetch_assoc($result)['id'];

    $category = $_POST['category'];

    $req = "INSERT INTO User_has_Book (User_idUser, Book_idBook, User_Category)
            VALUES ('$idUser', '$idBook', '$category')";

    $result = mysqli_query($bdd, $req);

}

// launching api request
if ($_GET) {
    // formating string search for request
    $search = str_replace(" ", "+", $_GET['search']);
    $search_type = $_GET['search_type'];

    $request = 'http://openlibrary.org/search.json?' . $search_type . '=' . $search;
    $response = file_get_contents($request);
    $resp_array = json_decode($response, true);
    $nb_results = $resp_array['num_found'];
    $resp_array = $resp_array['docs'];
}

include 'header.php';
?>
<script>
    $(document).ready(function () {
        document.body.style.overflow = "auto";
    });
</script>
<div class="row">
    <form action="#" method="get">
        <div class="form-group col-xs-6 col-xs-offset-1 findBook">
            <input type="text" class="form-control" id="searchBook" name="search"
                   value="<?= $_GET['search'] ?? '' ?>" placeholder="Find a book">
        </div>


        <div class="col-xs-1 col-xs-offset-2 searchTitleAuthor">

            <select name="search_type">
                <option value="title">by title</option>
                <option value="author">by author</option>
            </select>

            <div class="col-xs-1 glyph-search">
                <button type="submit" class="btn btn-default"><span
                            class="glyphicon glyphicon-search"></span> Search
                </button>
            </div>

        </div>
    </form>
</div>

<?php

if (!empty($_GET) and strlen($_GET['search']) > 0) : ?>
    <div class="result_search">Searching result by <?= $_GET['search_type'] ?>
        : <?= $nb_results ?> <?= ($nb_results > 1) ? 'books find' : 'book find' ?></div>



    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
                <?php

                foreach ($resp_array as $resp) :
                    if (!array_key_exists('author_name', $resp)) {
                        continue;
                    } else {
                        $resp['author_name'] = $resp['author_name'][0];
                    }

                    ?>


                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3><?= $resp['title'] ?></h3>
                                <p>Author : <?= $resp['author_name'] ?></p>
                                <h4>Year : <?= $resp['first_publish_year'] ?? 'Inconnue' ?></h4>
                                <?php if (isset($_SESSION)) : ?>

                                   <div class="row">
<div class="col-xs-4 col-xs-offset-1">
                                    <form action="#" method="post">
                                        <input type="hidden" name="title" value="<?= $resp['title'] ?>">
                                        <input type="hidden" name="author" value="<?= $resp['author_name'] ?>">
                                        <input type="hidden" name="year" value="<?= $resp['first_publish_year'] ?>">
                                        <input type="hidden" name="category" value="readed">
                                        <button type="submit" class="btn btn-success"><span
                                                    class="glyphicon glyphicon-plus"></span> I have read it !
                                        </button>
                                    </form>
                                     </div>
<div class="col-xs-5">
                                    <form action="#" method="post">
                                        <input type="hidden" name="title" value="<?= $resp['title'] ?>">
                                        <input type="hidden" name="author" value="<?= $resp['author_name'] ?>">
                                        <input type="hidden" name="year" value="<?= $resp['first_publish_year'] ?>">
                                        <input type="hidden" name="category" value="wanted">
                                        <button type="submit" class="btn btn-infos"><span
                                                    class="glyphicon glyphicon-edit"></span> I want it !
                                        </button>
                                    </form>
                                     </div>
                                    </div>

                                <?php endif ?>
                            </div>
                        </div>
                    </div>


                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php
include 'footer.php'
?>
