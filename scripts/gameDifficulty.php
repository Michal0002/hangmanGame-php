<?php
    include_once '../config/config.php';
    $query = "SELECT * FROM difficulty";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $difficulty = $row["name"];
        echo "<option value='$difficulty' class='text-center'>$difficulty</option>";
      }
    }
    $conn->close();
?>