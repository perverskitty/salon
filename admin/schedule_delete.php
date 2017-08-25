<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1) { redirect("index.php"); } ?>
 
<?php

if (empty($_GET['id'])) {
  redirect("schedules.php");
  
}

$schedule = Schedule::find_by_id($_GET['id']);

if ($schedule) {
  $schedule->delete();
  redirect("schedules.php");
} else {
  redirect("schedules.php");
}

?>