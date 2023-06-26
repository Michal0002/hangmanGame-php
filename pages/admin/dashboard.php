<?php include_once '../../includes/header.php'; ?>
<?php include_once '../../scripts/checkUserRole.php' ?>
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
            <a class="nav-link" href="usersAll.php">
              <span data-feather="file" class="align-text-bottom"></span>
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
        <h1>Dashboard</h1>
      </div>
      <div>
    </div>
    <div>
    </div>
</main>
  </div>    
</div>
<?php include_once '../../includes/footer.php'; ?>
