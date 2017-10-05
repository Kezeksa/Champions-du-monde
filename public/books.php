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
    <div class="row">
        <form action="#" method="post">
            <div class="form-group col-xs-6 col-xs-offset-1">
                <input type="text" class="form-control" id="searchBook" name="search" value="<?= $_POST['search'] ?? '' ?>" placeholder="Rechercher un livre">
            </div>
            <div class="col-xs-4">
                <select name="search_type">
                    <option value="title">par titre</option>
                    <option value="author">par auteur</option>
                </select>
                <button type="submit" class="btn btn-default">Rechercher</button>
            </div>
        </form>
    </div>

    <?php
    if (!empty($_POST) and strlen($_POST['search']) > 0) : ?>
        <div>Résultat de la recherche : <?= $nb_results ?> <?= 'livres trouvés' ?></div>
    <?php endif ?>

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
                                <p>Auteur : <?php foreach ($resp['author_name'] as $auteur) {
                                        echo $auteur;
                                    } ?></p>
                                <h4>Année : <?= $resp['first_publish_year'] ?? 'Inconnue' ?></h4>
                                <p><a href="#" class="btn btn-success" role="button"><span
                                                class="glyphicon glyphicon-plus"></span> Je l'ai lu !</a>
                                    <a href="#" class="btn btn-primary" role="button"><span
                                                class="glyphicon glyphicon-edit"></span> Je le veux !</a></p>
                            </div>
                        </div>
                    </div>


                <?php endforeach ?>
            </div>
        </div>
    </div>

<?php
include 'footer.php'
?>