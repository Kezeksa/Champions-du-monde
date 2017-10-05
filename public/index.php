<?php
include 'header.php';
?>

<div class="bookHome">
  <h1 class="titles">Books</h1>
  <form class="hiddenFormBook" action="">
    <input class="autofocusBook" type="text" name="researchBooks"><br>
  <input type="submit">
</form>
</div>
<div class="musicHome">
  <h1 class="titles">Musics</h1>
  <form class="hiddenFormMusic" action="">
    <input class="autofocusMusic" type="text" name="researchMusics"><br>
  <input type="submit">
</form>
</div>
<script>
$(document).ready(function() {

   $(".musicHome").click(function() {
     $(".bookHome").addClass("moveUpBook");
     $(this).addClass("moveUpMusic");
     $(".hiddenFormMusic").removeClass("hiddenFormMusic");
     $(".autofocusMusic").focus();
   });

   $(".bookHome").click(function() {
     $(".musicHome").addClass("moveDownMusic");
     $(this).addClass("moveDownBook");
     $(".hiddenFormBook").removeClass("hiddenFormBook");
     $(".autofocusBook").focus();
   });

});
</script>

<?php
include 'footer.php';
?>
