<?php
include_once '../includes/header.php';
include_once '../config/config.php';
include '../scripts/selectUser.php';
session_start();

// ini_set('display_errors', 'On');
// error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
if(isset($_POST['submit'])){
    $id = $_POST['id']; 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $coins = $_POST['coins'];
    $role = $_POST['role'];

    if (empty($username) || empty($email) || empty($coins)) {
        $_SESSION['error'] = "Please fill in all the fields.";
        header("Location: ../pages/admin/editUser.php?id=" . $id);
        exit();
    } else {
        $query = "UPDATE users SET username = '$username', email = '$email', coins = '$coins', role = '$role' WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $_SESSION['success'] = "User has been updated successfully";
            header("Location: ../pages/admin/editUser.php?id=" . $id);
            exit();
        } else {
            echo "Mysql error: " . mysqli_error($conn);
            echo $query;
        }
    }
}
mysqli_close($conn);
?>
