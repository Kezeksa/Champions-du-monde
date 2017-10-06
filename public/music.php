<?php
include 'header.php';

if ($_GET) {

    $search = str_replace(" ", "+", $_GET['search']);
    $search_type = $_GET['search_type'];

    /*$request = 'http://ws.audioscrobbler.com/2.0/?method=' . $search_type . '.getinfo&api_key=c7adee048083f3f374589ba65810f6f7&' . $search_type . '=' . $search . '&format=json';*/

    $request = 'http://ws.audioscrobbler.com/2.0/?method=' . $search_type . '.gettopalbums&api_key=c7adee048083f3f374589ba65810f6f7&' . $search_type . '=' . $search . '&format=json';


    $response = file_get_contents($request);
    $resp_array = json_decode($response, true);

    $nb_results = $resp_array['topalbums']['@attr']['total'];
 /*   var_dump($resp_array['topalbums']['album'][0]['image']);*/
    $resp_array = $resp_array['topalbums']['album'];

}

?>

<script>
    $(document).ready(function () {
        document.body.style.overflow = "auto";
    });
</script>

<div class="row">
    <form action="#" method="get">
        <div class="form-group col-xs-6 col-xs-offset-1">
            <input type="text" class="form-control" id="searchBook" name="search"
                   value="<?= $_POST['search'] ?? '' ?>" placeholder="Find an album">
        </div>
        <div class="col-xs-4">
            <select name="search_type">
                <option value="artist">by artist</option>
                <option value="name">by title</option>
            </select>
            <button type="submit" class="btn btn-default"><span
                        class="glyphicon glyphicon-search"></span> Search
            </button>
        </div>
    </form>
</div>


<?php

if (!empty($_GET) and strlen($_GET['search']) > 0) : ?>
    <div>Searching result by <?= $_GET['search_type'] ?>
        : <?= $nb_results ?> <?= ($nb_results > 1) ? 'albums found' : 'album found' ?></div>


 <script>
     $(document).ready(function () {
 document.body.style.overflow = "auto";
 });
 </script>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
                <?php

                foreach ($resp_array as $resp) :
                    ?>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?= $resp['image'][3]['#text'] ?>" alt="image">
                            <div class="caption">
                                <h3><?= $resp['name'] ?></h3>
                                <p>Artist : <?php echo $resp['artist']['name'] ?></p>
                                <?php if (isset($_SESSION)) : ?>
                                    <p><a href="#" class="btn btn-success" role="button"><span
                                                    class="glyphicon glyphicon-plus"></span> I have listened to it !</a>
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
