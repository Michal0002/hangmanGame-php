<?php include_once '../../includes/header.php'; ?>
<?php include_once '../../scripts/checkUserRole.php' ?>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://www.manticore.uni.lodz.pl/~mkasperk/hangman_php/pages/admin/dashboard.php#">
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
        <h1 class="h2">Dashboard</h1>

      </div>
      <h1 class="text-center">All users</h1>

<div class="d-flex justify-content-center">
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Word</th>
          <th>Email address</th>
          <th>Coins</th>
          <th>Role</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $limit = 10; 
        $page = isset($_GET['page']) ? $_GET['page'] : 1; 
        
        include_once '../../config/config.php';
        
        $countQuery = "SELECT COUNT(*) as count FROM users";
        $countResult = $conn->query($countQuery);
        $countRow = $countResult->fetch_assoc();
        $totalRows = $countRow['count'];
        
        $totalPages = ceil($totalRows / $limit);
        
        $offset = ($page - 1) * $limit;
        
        $query = "SELECT * FROM users LIMIT $limit OFFSET $offset";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $userId = $row["id"];
            $username = $row["username"];
            $email = $row["email"];
            $coins = $row["coins"];
            $role = $row["role"];
            echo "<tr>
                    <td>$username</td>
                    <td>$email</td>
                    <td>$coins</td>
                    <td>$role</td>
                    <td><a href='editUser.php?id=" . $userId . "'>Edit</a></td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='2'>No users found.</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <nav aria-label="Pagination">
      <ul class="pagination justify-content-center">
        <?php
        if ($totalPages > 1) {
          if ($page > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($page - 1) . "'>&laquo;</a></li>";
          }

          for ($i = 1; $i <= $totalPages; $i++) {
            $activeClass = ($page == $i) ? 'active' : '';
            echo "<li class='page-item $activeClass'><a class='page-link' href='?page=$i'>$i</a></li>";
          }

          if ($page < $totalPages) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "'>&raquo;</a></li>";
          }
        }
        ?>
      </ul>
    </nav>
  </div>
</div>
    </main>
  </div>
</div>


    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  

<?php include_once '../../includes/footer.php'; ?>

