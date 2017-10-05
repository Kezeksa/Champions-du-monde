<?php
include 'header.php';
?>

<div class="bookHome">
  <h1 class="titles">Livres</h1>
</div>
<div class="musicHome">
  <h1 class="titles">Musiques</h1>
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
