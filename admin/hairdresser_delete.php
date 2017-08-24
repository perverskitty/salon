<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
 
<?php

if (empty($_GET['id'])) {
  redirect("hairdressers.php");
  
}

$hairdresser = Hairdresser::find_by_id($_GET['id']);

if ($hairdresser) {
  $hairdresser->delete();
  redirect("hairdressers.php");
} else {
  redirect("hairdressers.php");
}

?>