<?php require_once("includes/header.php"); ?>

<?php if($session->is_signed_in()) { redirect("index.php"); } ?>

<?php

if (isset($_POST['submit'])) {
  
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  
  // method to check the database for user
  $user_found = User::verify_user($email, $password);
  
  if ($user_found) {
    $session->signin($user_found);
    redirect("index.php");
  } else {
    $the_message = "Your username/password combination is incorrect";
  }
  
} else {
  
  $email = "";
  $password = "";
  $the_message = "";
}

?>


<!-- main content -->
<div class="col-md-9 content">

  <!-- Page title -->  
  <div class="dashhead">  
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Admin</h6>
      <h2 class="dashhead-title">Sign in</h2>
    </div>
  </div> <!-- end of page title --> 


  <!-- error message display -->
  <h4 class="bg-danger"><?php echo $the_message; ?></h4>
	
	<!-- user sign-in form -->
  <form id="login-id" action="" method="post">
    <div class="form-group">
	    <label for="email">Email</label>
	    <input type="text" class="form-control" name="email" value="<?php echo htmlentities($email); ?>" >
    </div>
    <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
    </div>
    <div class="form-group">
      <input type="submit" name="submit" value="Sign in" class="btn btn-primary">
    </div>
  </form> <!-- end of form -->

</div> <!-- end of main content -->


<?php require_once("includes/footer.php"); ?>
