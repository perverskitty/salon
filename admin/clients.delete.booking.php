<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 3) { redirect("index.php"); } ?>
 
<?php

if (empty($_GET['id'])) {
  redirect("clients.index.php");
  
}

$booking = Client_booking::find_by_id($_GET['id']);

if ($booking) {
  $booking->delete();
  redirect("clients.index.php");
} else {
  redirect("clients.index.php");
}

?>