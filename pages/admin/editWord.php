<?php include_once '../../includes/header.php'; ?>
<?php include_once '../../scripts/checkUserRole.php' ?>

<?php include '../../scripts/selectWord.php'; ?>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://www.manticore.uni.lodz.pl/~mkasperk/hangman_php/pages/admin/dashboard.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="usersAll.php"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="wordsAll.php">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Words
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit word</h1>
      </div>
<?php include_once "../../scripts/errors.php" ?>
  <form action="../../scripts/editWord.php" method="POST">
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Word</label>
    <div class="col-sm-10">
      <input type="TEXT" class="form-control" name="word" placeholder="Word" value="<?php echo $word; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Difficulty</label>
    <div class="col-sm-10">
        <select class="form-control" name="difficulty">
            <option value="1" <?php if ($difficulty === 'Easy') echo 'selected'; ?>>Easy</option>
            <option value="2" <?php if ($difficulty === 'Medium') echo 'selected'; ?>>Medium</option>
            <option value="3" <?php if ($difficulty === 'Hard') echo 'selected'; ?>>Hard</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Difficulty</label>
    <div class="col-sm-10">
        <select class="form-control" name="status">
            <option value="accepted" <?php if ($status === 'accepted') echo 'selected'; ?>>Accepted</option>
            <option value="waiting" <?php if ($status === 'waiting') echo 'selected'; ?>>Waiting</option>
            <option value="banned" <?php if ($status === 'banned') echo 'selected'; ?>>Banned</option>
        </select>
    </div>
</div>
   <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Accept</button>
    </div>
   </div>
  </form>
    </main>
  </div>
</div>
<?php include_once '../../includes/footer.php'; ?>
