<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="http://www.manticore.uni.lodz.pl/~mkasperk/hangman_php/index.php">The Hangman</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        <?php 
        session_start();
        if(isset($_SESSION['login_success']) ){ 
            echo '<li class="nav-item"><a href="#" class="btn btn-link nav-link">Welcome ' . $_SESSION['username'] . ' number of coins: ' . $_SESSION['coins'] . '</a></li>';
            echo '<li class="nav-item"><a href="http://www.manticore.uni.lodz.pl/~mkasperk/hangman_php/scripts/logout.php" class="btn btn-link nav-link">Log out</a></li>';
        } else{
                }
        ?>
            </ul>
        </div>
    </div>
</nav>