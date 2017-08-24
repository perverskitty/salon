<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
 
<?php

if (empty($_GET['id'])) {
  redirect("services.php");
  
}

$service = Service::find_by_id($_GET['id']);

if ($service) {
  $service->delete();
  redirect("services.php");
} else {
  redirect("services.php");
}

?>