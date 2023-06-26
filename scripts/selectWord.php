<?php
include_once '../../config/config.php';

$id = $_GET['id'] ;

$query = "SELECT w.word, w.status, d.name FROM words AS w INNER JOIN difficulty AS d ON w.difficulty_id = d.id WHERE w.id = '$id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $word = $row["word"];
        $status = $row["status"];
        $difficulty = $row["name"];
    }
} else {
    echo "No data for ID: " . $id;
}
?>
