<?php require_once("includes/init.php"); ?>

<?php if ($session->is_signed_in()) { redirect("index.php"); } ?>

<?php

if (isset($_POST['submit'])) {
  
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  
  // method to check the database for user
  $user_found = User::verify_user($email, $password);
  
  if ($user_found) {
    $session->login($user_found);
    redirect("index.php");
  } else {
    $the_message = "The email/password combination was not found";
  }
  
} else {
  
  $email = "";
  $password = "";
}

?>