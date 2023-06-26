<?php
include_once '../includes/header.php';

$limit = 8; 
$page = isset($_GET['page']) ? $_GET['page'] : 1; 

include_once '../config/config.php';

$countQuery = "SELECT COUNT(*) as count FROM words";
$countResult = $conn->query($countQuery);
$countRow = $countResult->fetch_assoc();
$totalRows = $countRow['count'];

$totalPages = ceil($totalRows / $limit);

$offset = ($page - 1) * $limit;

$query = "SELECT w.word, d.name FROM words AS w 
INNER JOIN difficulty AS d ON w.difficulty_id = d.id 
LIMIT $limit OFFSET $offset";
$result = $conn->query($query);
?>

<h1 class="text-center">All words</h1>

<div class="d-flex justify-content-center">
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th class='text-center'>Word</th>
          <th class='text-center'>Difficulty Level</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $word = $row["word"];
            $level = $row["name"];
            echo "<tr>
                    <td class='text-center'>$word</td>
                    <td class='text-center'>$level</td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='2'>No words found.</td></tr>";
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

<a href="../index.php" class="w-100 btn btn-lg btn-dark">Back</a>

<?php include_once '../includes/footer.php'; ?>
