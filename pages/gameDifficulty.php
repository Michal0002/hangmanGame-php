<?php include_once '../includes/header.php'; ?>

<h1 class='text-center'> Choose game difficult </h1>
<form action="gameActivity.php" method="get">
  <select name="difficulty"class="form-select form-select-lg mb-3" >
  <?php include_once '../scripts/gameDifficulty.php'?>
  </select>
  <button type="submit" class="w-100 btn btn-lg btn-dark">Start new game</button>
</form>
<?php include_once '../includes/footer.php'; ?>
