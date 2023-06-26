<?php include_once '../includes/header.php'; ?>

<div class="container">
  <div class="row justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <main class="form-signin">
        <form action="../scripts/registration.php" method="POST">
          <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
          <?php
          session_start();
          if(isset($_SESSION['error'])){
              echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
              unset($_SESSION['error']);
          }
          if(isset($_SESSION['success'])){
              echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
              unset($_SESSION['success']);
          }
          ?>
          <div class="form-floating">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Enter your username" required>
            <label for="floatingInput">Username</label>
          </div>

          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>

          <div class="form-floating">
            <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Enter password</label>
          </div>

          <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
            <label for="floatingEmail">Email address</label>
          </div>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="agree" required> I agree to the terms and conditions
            </label>
          </div>

          <button class="w-100 btn btn-lg btn-dark" type="submit" name="submit">Register</button>
          <br/><br/>
          <a href="login.php" class="w-100 btn btn-lg btn-secondary">Go back</a>

        </form>
      </main>
    </div>
  </div>
</div>

<?php include_once '../includes/footer.php'; ?>
