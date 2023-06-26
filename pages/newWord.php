<?php include_once '../includes/header.php'; ?>

<div class="container">
  <div class="row justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <main class="form-signin">
        <form action="../scripts/newWord.php" method="POST">
          <h1 class="h3 mb-3 fw-normal">Add new word</h1>
          <?php
          session_start();
          if(isset($_SESSION['error'])){
              echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
              unset($_SESSION['error']);
          }
          if(isset($_SESSION['success'])){
              echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
              unset($_SESSION['success']);
          }
          ?>
          <div class="form-floating">
            <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Enter new word name" required>
            <label for="floatingInput">Word name</label>
          </div>

          <select id="difficulty" name="difficulty" class="form-select form-select-lg mb-3">
          <?php include_once '../scripts/gameDifficulty.php'?>
          </select>
          <button class="w-100 btn btn-lg btn-dark" type="submit" name="submit">Add</button>
          <br/><br/>
          <a href="../index.php" class="w-100 btn btn-lg btn-secondary">Go back</a>
        </form>
      </main>
    </div>
  </div>
</div>

<?php include_once '../includes/footer.php'; ?>
