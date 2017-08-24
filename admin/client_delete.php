<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
 
<?php

if (empty($_GET['id'])) {
  redirect("clients.php");
  
}

$client = User::find_by_id($_GET['id']);

if ($client) {
  $client->delete();
  redirect("clients.php");
} else {
  redirect("clients.php");
}

?>