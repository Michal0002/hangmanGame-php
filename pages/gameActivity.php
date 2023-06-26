<?php include_once '../includes/header.php'; ?>
<div class="container mt-4">
  <h1 class="text-center mb-4"><?php $selectedDifficulty = $_GET['difficulty']; echo $selectedDifficulty; ?> </h1>

  <div class="row justify-content-center">
    <div class="col-md-6">

    <div class="text-center mb-4">
      <img src="../images/hangman<?php echo $_SESSION['hangmanImage']; ?>.png" alt="Hangman Image" class="img-fluid img-thumbnail" style="max-width: 200px;">
      </div>

      <div class="text-center mb-4">
        <h3>Attempts left: <?php echo $_SESSION['attemptsLeft'];?></h3>
      </div>

      <div class="text-center mb-4">

    <?php 
        include_once '../scripts/gameActivity.php';
    ?>
      </div>

      <div class="text-center">
        <form method="POST">
        <input type="hidden" name="difficulty" value="<?php echo $selectedDifficulty; ?>">
           <div class="d-flex flex-wrap justify-content-center">
            <?php
            $letters = range('a', 'z');
            foreach ($letters as $letter) {
              echo '<button type="submit" name="letter" value="' . $letter . '" class="btn btn-dark m-2 btn-lg border">' . $letter . '</button>';
            }
            // echo '<a href="gameActivity.php" class="btn btn-secondary m-2 btn-lg border">Restart</a>';
            echo '<button type="submit" name="hint" value="hint" class="btn btn-danger m-2 btn-lg border">HINT</button>';
            ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include_once '../includes/footer.php'; ?>
