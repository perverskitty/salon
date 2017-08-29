<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
     
<?php $client = User::find_by_id($session->user_id); ?>

<?php

date_default_timezone_set("Europe/London");
$date_today = date("Y-m-d");
$time_today = date("H:i:s");

$sql = "SELECT * FROM bookings WHERE ";
$sql .= "client_id = ". $session->user_id ." ";
$sql .= "ORDER BY booking_date DESC";
$bookings = Client_booking::find_by_query($sql);

?>     
      
      <!-- main content -->
      <div class="col-md-9 content">
       
      <!-- Dashboard title --> 
      <div class="dashhead">
        <div class="dashhead-titles">
          <h3 class="dashhead-title">Your bookings</h3>
        </div>
      </div>
      
      
      <!-- Recent bookings rule -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Select a booking for details</h3>
      </div>
      
      <!-- Recent bookings list -->
      <div class="list-group mb-4">
<!--        <h6 class="list-group-header">Select a booking for info</h6>-->
        <?php if ($bookings) : ?>
          <?php foreach ($bookings as $booking) : ?>
            <a class="list-group-item list-group-item-action justify-content-between" href="index_view_booking.php?id=<?php echo $booking->id; ?>">
              <span><?php echo Service::name($booking->service_id); ?></span>
              <span class="text-muted"><?php echo substr($booking->start_time, 0, 5). ", " .date("l j M Y", strtotime($booking->booking_date)); ?></span>
            </a>
          <?php endforeach; ?>
        <?php else : ?>
          <a class="list-group-item justify-content-between">
            <span>You have no active bookings at this time</span>
            <span class="text-muted"><?php echo substr($time_today, 0, 5) . ", " . date("D, j M Y", strtotime($date_today)); ?></span>
          </a>
        <?php endif; ?>       
      </div>
      
      <div class="flextable table-actions">
        <div class="flextable-item flextable-primary">
          <button type="button" class="btn btn-outline-primary" onclick="window.location='index.php'">
            <span class="icon icon-chevron-left"></span>Go back
          </button>
        </div> 
      </div>

    </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>