<?php
    include("config/config.php");

session_start();
if(file_exists("config/config.php"))
{
    include("config/config.php");
}
else {
  {
    header("Location: install.php");
  }
}
if(isset($_SESSION['login_success']) && $_SESSION['role'] === 'user' ){
    if(isset($_SESSION['error'])){
        echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['success'])){
        echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
        unset($_SESSION['success']);
    }
    echo '<form action="scripts/logout.php" method="post">
            <br/>
            <a href="pages/gameDifficulty.php" class="w-100 btn btn-lg btn-dark"> Start new game</a>
            <br/> <br/>
            <a href="pages/newWord.php" class="w-100 btn btn-lg btn-dark"> Add new word </a>
            <br/> <br/>
            <a href="pages/allWords.php" class="w-100 btn btn-lg btn-dark"> All words </a>
            <br/> <br/>
            <a href="pages/accountDetails.php" class="w-100 btn btn-lg btn-dark"> Account details </a>
            <br/> <br/>
            <button type="submit" name="logout" class="w-100 btn btn-lg btn-secondary">Logout</button>
          </form>';
        //   echo "Wartość roli: " . $_SESSION['role'];

    } elseif ( isset($_SESSION['login_success']) && $_SESSION['role'] = 'admin' ) {
        echo' <a href="pages/admin/usersAll.php" class="w-100 btn btn-lg btn-dark"> Users </a><br/><br/>';
        echo' <a href="pages/admin/wordsAll.php" class="w-100 btn btn-lg btn-dark"> Words </a><br/><br/>';
        echo' <a href="pages/admin/dashboard.php" class="w-100 btn btn-lg btn-danger"> Go to admin panel </a>';
    }
    else{
        echo '<a href="pages/login.php" class="w-100 btn btn-lg btn-dark">Login</a> <br/><br/>';
        echo '<a href="pages/registration.php" class="w-100 btn btn-lg btn-dark">Registration</a>';
    }
?>