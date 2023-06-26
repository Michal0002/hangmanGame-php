<?php
include_once '../config/config.php';
session_start();
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    if(empty($username) || empty($email)){
        $_SESSION['error'] = "Please fill in all the fields.";
        header("Location: ../pages/accountDetails.php");
        exit();
    } else {
        $query = "UPDATE users SET username = '$username', email = '$email' WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $_SESSION['success'] = "User has been updated successfully";
            $_SESSION['username'] = $username;
            header("Location: ../pages/accountDetails.php");
            exit();
        } else {
            echo "Mysql error: " . mysqli_error($conn);
            echo $query;
        }
    }

} elseif(isset($_POST['passwordChange'])) {
    $password = $_POST['password'];
    $passwordNew = $_POST['passwordNew'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if(empty($password) || empty($passwordNew) || empty($passwordConfirm)){
        $_SESSION['error'] = "Please fill in all the fields.";
        header("Location: ../pages/accountDetails.php");
        exit();
    } else {
        $queryPasswordVerify = "SELECT password FROM users WHERE id = $id";
        $result = mysqli_query($conn, $queryPasswordVerify);
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            if ($passwordNew === $passwordConfirm) {
                $hashedPassword = password_hash($passwordNew, PASSWORD_DEFAULT);
                $passwordUpdate = "UPDATE users SET password = '$passwordNew' WHERE id = $id";
                $result = mysqli_query($conn, $passwordUpdate);
                if ($result) {
                    $_SESSION['success'] = "User has been updated successfully";
                    header("Location: ../pages/accountDetails.php");
                    exit();
                } else {
                    echo "Mysql error: " . mysqli_error($conn);
                }
            } else {
                $_SESSION['error'] = "Passwords don't match.";
                header("Location: ../pages/accountDetails.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Current password don't match.";
            header("Location: ../pages/accountDetails.php");

            exit();
        }
    }
}
?>
