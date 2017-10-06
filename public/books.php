

<?php

if ($_POST) {
    // formating string search for request
    $search = str_replace(" ", "+", $_POST['search']);
    $search_type = $_POST['search_type'];

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
        <form action="#" method="post">
            <div class="form-group col-xs-6 col-xs-offset-1">
                <input type="text" class="form-control" id="searchBook" name="search"
                       value="<?= $_POST['search'] ?? '' ?>" placeholder="Find a book">
            </div>
            <div class="col-xs-4">
                <select name="search_type">
                    <option value="title">by title</option>
                    <option value="author">by author</option>
                </select>
                <button type="submit" class="btn btn-default"><span
                            class="glyphicon glyphicon-search"></span> Search
                </button>
            </div>
        </form>
    </div>

<?php
if (!empty($_POST) and strlen($_POST['search']) > 0) : ?>
    <div>Searching result by <?= $_POST['search_type'] ?>
        : <?= $nb_results ?> <?= ($nb_results > 1) ? 'books find' : 'book find' ?></div>


    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
                <?php

                foreach ($resp_array as $resp) :
                    ?>


                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <!--<img src="..." alt="...">-->
                            <div class="caption">
                                <h3><?= $resp['title'] ?></h3>
                                <p>Author : <?php foreach ($resp['author_name'] as $auteur) {
                                        echo $auteur;
                                    } ?></p>
                                <h4>Year : <?= $resp['first_publish_year'] ?? 'Inconnue' ?></h4>
                                <?php if (isset($_SESSION)) : ?>
                                    <p><a href="#" class="btn btn-success" role="button"><span
                                                    class="glyphicon glyphicon-plus"></span> I have read it !</a>
                                        <a href="#" class="btn btn-primary" role="button"><span
                                                    class="glyphicon glyphicon-edit"></span> I want it !</a></p>
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
