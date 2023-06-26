<?php
include_once '../../config/config.php';

$id = $_GET['id'] ;

$query = "SELECT * FROM users where id='$id' ";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $username = $row["username"];
        $email = $row["email"];
        $coins = $row["coins"];
        $role = $row["role"];
    }
} else {
    echo "No data for ID: " . $id;
}
?>
