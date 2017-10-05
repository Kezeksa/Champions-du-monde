<?php
include 'header.php';
?>

<div class="bookHome">
  <h1 class="titles">Books</h1>
  <form class="hiddenForm" action="">
    <input type="text" name="research" autofocus><br>
  <input type="submit">
</form>
</div>
<div class="musicHome">
  <h1 class="titles">Musics</h1>
</div>
<script>
$(document).ready(function() {

   $(".musicHome").click(function() {
     $(".bookHome").addClass("moveUpBook");
     $(this).addClass("moveUpMusic");
   });

   $(".bookHome").click(function() {
     $(".musicHome").addClass("moveDownMusic");
     $(this).addClass("moveDownBook");
   });

});
</script>

<?php
include 'footer.php';
?>
