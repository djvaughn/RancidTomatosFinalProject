<?php
      require_once ('./model.php');
      $quoteMethods = new Model();
?>
<h1>Quotes </h1>
<div class = "frame">
      <a href="quotes.php?mode=new">New</a>
<?php
for ($i=0; $i < $quoteMethods->getRowCount() ; $i++) {
  if (!$quoteMethods->isFlagged($i)) {
?>
<div class="box">
  <div class = "quote">
  <p>"<?= $quoteMethods->getAllQuotes() [$i] ['quote'] ?>"</p>
    <div class = "author">
  <p>-<?= $quoteMethods->getAllQuotes() [$i] ['author'] ?></p>
</div>
  </div>
  <div class = "ratingbox">
  <p class ="rating"><?= $quoteMethods->getAllQuotes() [$i] ['rating'] ?></p>
  <form class = "flag" action="./controller.php" method="post">
    <input type="submit" value="flag">
  <input type="hidden" name="ID"  value="<?= $quoteMethods->getAllQuotes() [$i] ['id']?>">
  <input type="hidden" name="QR" value="<?= $quoteMethods->getAllQuotes() [$i] ['rating']?>">
  <input type="hidden" name="Button" value="flag">
</form>
  <form class = "plus" action="./controller.php" method="post">
    <input type="submit" value="+">
  <input type="hidden" name="ID" value="<?= $quoteMethods->getAllQuotes() [$i] ['id']?>">
  <input type="hidden" name="QR" value="<?= $quoteMethods->getAllQuotes() [$i] ['rating']?>">
  <input type="hidden" name="Button" value="+">
</form>
<br>
<br>
<form class = "minus" action="./controller.php" method="post">
    <input type="submit" value="-">
  <input type="hidden" name="ID" value="<?= $quoteMethods->getAllQuotes() [$i] ['id']?>">
  <input type="hidden" name="QR" value="<?= $quoteMethods->getAllQuotes() [$i] ['rating']?>">
  <input type="hidden" name="Button" value="-">
</form>

</div>
</div>

<?php } } ?>
</div>
