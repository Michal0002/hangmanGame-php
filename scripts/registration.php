<?php
include_once '../config/config.php';
session_start();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $email = $_POST['email'];

    if(empty($username) || empty($password) || empty($email)){
        $_SESSION['error'] = "Please fill in all the fields.";
        header("Location: ../pages/registration.php");
        exit();
    } elseif($password !== $password_confirmation) {
        $_SESSION['error'] = "The passwords provided do not match.";
        header("Location: ../pages/registration.php");
        exit();
    } elseif(strlen($password) < 6) {
        $_SESSION['error'] = "The password must be at least 6 characters long.";
        header("Location: ../pages/registration.php");
        exit();
    } else {
        $check_query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $check_query);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['error'] = "A user with the provided username already exists.";
            header("Location: ../pages/registration.php");
            exit();
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, password, email, coins) VALUES ('$username', '$hashed_password', '$email', 150)";

            if(mysqli_query($conn, $query)){
                $_SESSION['success'] = "The user has been successfully added to the database.";
                header("Location: ../pages/registration.php");
                exit();
            } else{
                $_SESSION['error'] = "Mysql error: " . mysqli_error($conn);
                header("Location: ../pages/registration.php");
                exit();
            }
        }
    }
}
mysqli_close($conn);
?>
