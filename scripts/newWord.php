
<?php
include_once '../config/config.php';
session_start();

if(isset($_POST['submit'])){
    $name = strtolower($_POST['name']);
    $difficulty = $_POST['difficulty'];

    if(empty($name) ){
        $_SESSION['error'] = "Please fill in all the fields.";
        header("Location: ../pages/newWord.php");
        exit();
    } elseif(strlen($name) < 3) {
        $_SESSION['error'] = "The password must be at least 6 characters long.";
        header("Location: ../pages/newWord.php");
        exit();
    } else {
        $check_query = "INSERT INTO `words` (`word`, `difficulty_id`) VALUES ('$name', (SELECT `id` FROM `difficulty` WHERE `name` = '$difficulty'))";
        $result = mysqli_query($conn, $check_query);
        if ($result) {
            $_SESSION['success'] = "New word has been successfully added to the database with status 'waiting'";
            header("Location: ../pages/newWord.php");
            exit();
          } else {
            echo "Mysql error: " . mysqli_error($conn);
            echo $check_query;
          }
    }
}
mysqli_close($conn);
?>

