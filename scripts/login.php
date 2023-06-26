<?php
include_once '../config/config.php';
session_start();

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);

        $hashed_password = $row['password'];

        if(password_verify($password, $hashed_password)){
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['coins'] = $row['coins'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['success'] = "Success";
            $_SESSION['login_success'] = true;
            header("Location: ../index.php");
            exit();
        } else{
            $_SESSION['error'] = "Incorrect username or password.";
            header("Location: ../pages/login.php");
            exit();
        }
    } else{
        $_SESSION['error'] = "Incorrect username or password.";
        header("Location: ../pages/login.php");
        exit();
    }
}
mysqli_close($conn);
?>
