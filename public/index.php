<?php
include 'header.php';

?>
<div class="sections">
<div class="bookHome">
  <h1 class="titles">Books</h1>
  <form class="formBook hiddenFormBook" action="">
    <input class="autofocusBook" type="text" name="researchBooks"><br>
  <input type="submit">
</form>
</div>
<div class="musicHome">
  <h1 class="titles">Musics</h1>
  <form class="formMusic hiddenFormMusic" action="">
    <input class="autofocusMusic" type="text" name="researchMusics"><br>
  <input type="submit">
</form>
</div>
</div>
<div class="item arrowMusic floating hiddenArrowMusic">
<span class="glyphicon">&#xe114;</span>
</div>
<div class="item arrowBook floating hiddenArrowBook">
<span class="glyphicon">&#xe113;</span>
</div>
<script>
$(document).ready(function() {

   $(".musicHome").click(function() {
     $(".bookHome").addClass("moveUpBook");
     $(this).addClass("moveUpMusic");
     $(".formMusic").fadeIn();
     $(".autofocusMusic").focus();
     $(".arrowMusic").delay(2000).removeClass("hiddenArrowMusic");
   });

   $(".bookHome").click(function() {
     $(".musicHome").addClass("moveDownMusic");
     $(this).addClass("moveDownBook");
     $(".formBook").fadeIn();
     $(".autofocusBook").focus();
     $(".arrowBook").delay(2000).removeClass("hiddenArrowBook");
   });

   $(".arrowBook").click(function() {
     $(".bookHome").removeClass("moveDownBook");
     $(".musicHome").removeClass("moveDownMusic");
     $(this).addClass("hiddenArrowBook");
     $(".formBook").fadeOut();

   });

   $(".arrowMusic").click(function() {
     $(".bookHome").removeClass("moveUpBook");
     $(".musicHome").removeClass("moveUpMusic");
     $(this).addClass("hiddenArrowMusic");
     $(".formMusic").fadeOut();
   });
});
</script>

<?php
include 'footer.php';
?>
