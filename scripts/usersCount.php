<?php
session_start();
include_once '../../config/config.php';

$query = "SELECT COUNT(*) as usersCount FROM users";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $usersCount = $row['usersCount'];
    $_SESSION['usersCount'] = $usersCount;
    echo $usersCount;
    exit();
} else {
    echo "Mysql error: " . mysqli_error($conn);
    echo $query;
}
?>
