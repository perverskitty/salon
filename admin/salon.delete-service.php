<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2 && $session->user_role != 3) { redirect("signout.php"); } ?> 
<?php if($session->user_role == 3) { redirect("clients.index.php"); } ?>
<?php if($session->user_role == 2) { redirect("salon.index.php"); } ?>
 
<?php

if (empty($_GET['id'])) {
  redirect("salon.services.php");
  
}

$service = Service::find_by_id($_GET['id']);

if ($service) {
  $service->delete();
  redirect("salon.services.php");
} else {
  redirect("salon.services.php");
}

?>