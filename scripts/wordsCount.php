<?php
session_start();
include_once '../../config/config.php';

$query = "SELECT COUNT(*) as wordsCount FROM words";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $wordsCount = $row['wordsCount'];
    $_SESSION['wordsCount'] = $wordsCount;
    echo $wordsCount;
    exit();
} else {
    echo "Mysql error: " . mysqli_error($conn);
    echo $query;
}
?>
