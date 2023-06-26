
<?php include_once '../includes/header.php'; ?>
<div class="container">
<form action="../scripts/accountDetails.php" method="POST">
<?php include_once "../scripts/errors.php"?>

  <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="TEXT" class="form-control" name="username" placeholder="Username" value="<?php echo $_SESSION['username'] ; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="TEXT" class="form-control" name="email" placeholder="Email" value="<?php echo $_SESSION['email'] ; ?>">
    </div>
  </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Role</label>
     <div class="col-sm-10">
        <input type="TEXT" class="form-control" disabled name="role" placeholder="Role" value="<?php echo $_SESSION['role'] ; ?>">
     </div>
    </div>
    <div class="form-group row">
        <h1 class="h5"> Change your password </h1>
        <label class="col-sm-2 col-form-label">Current password</label>
     <div class="col-sm-10">
        <input type="password" class="form-control"  name="password" placeholder="Actual password" value="">
     </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">New password</label>
     <div class="col-sm-10">
        <input type="password" class="form-control"  name="passwordNew" placeholder="New password" value="">
     </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">New password</label>
     <div class="col-sm-10">
        <input type="password" class="form-control"  name="passwordConfirm" placeholder="Password confirmation" value="">
     </div>
    </div>
   <div class="form-group row">
      <button type="submit" name="submit" class="w-100 btn btn-lg btn-dark">Accept</button>
   </div><br/>
   <div class="form-group row">
      <button type="submit" name="passwordChange" class="w-100 btn btn-lg btn-danger">Change your password</button>
   </div>
  </form>

</div>
<?php include_once '../includes/footer.php'; ?>
