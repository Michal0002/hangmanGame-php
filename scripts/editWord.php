<?php
include_once '../includes/header.php';
include_once '../config/config.php';
include '../scripts/selectWord.php';
session_start();

// ini_set('display_errors', 'On');
// error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
if(isset($_POST['submit'])){
    $id = $_POST['id']; 
    $word = $_POST['word'];
    $difficulty = $_POST['difficulty'];
    $status = $_POST['status'];

    if(empty($word)){
        $_SESSION['error'] = "Please fill in all the fields.";
        header("Location: ../pages/admin/editWord.php");
        exit();
    } else {
        $query = "UPDATE words SET words.word = '$word', words.status = '$status', words.difficulty_id = '$difficulty' WHERE words.id = $id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $_SESSION['success'] = "Word has been updated successfully";
            header("Location: ../pages/admin/editWord.php?id=" . $id);
            exit();
        } else {
            echo "Mysql error: " . mysqli_error($conn);
            echo $query;
        }
    }
}
mysqli_close($conn);
?>
