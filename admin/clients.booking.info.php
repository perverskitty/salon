<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 3) { redirect("index.php"); } ?>
     
<?php

if(empty($_GET['id'])) {
  redirect("clients.all.bookings.php");
} 
$client = User::find_by_id($session->user_id);
$booking = Client_booking::find_by_id($_GET['id']);
$service = Service::find_by_id($booking->service_id);

?>     
      
      <!-- main content -->
      <div class="col-md-9 content">
       
      <!-- Dashboard title --> 
      <div class="dashhead">
        <div class="dashhead-titles">
          <h3 class="dashhead-title">Booking details</h3>
        </div>
      </div>
      
      <!-- Recent bookings rule -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Booking information</h3>
      </div>
      <!-- Booking list -->
      <div class="list-group mb-3">
        <li class="list-group-item justify-content-between">
          <span>Service</span> 
          <span class="ml-a"><?php echo $service->name; ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Hairdresser</span>
          <span class="ml-a"><?php echo Hairdresser::name($booking->hairdresser_id); ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Cost</span> 
          <span class="ml-a"><?php echo "£ ".$service->cost; ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Date</span>
          <span class="ml-a"><?php echo date("l j M Y", strtotime($booking->booking_date)); ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Time</span>
          <span class="ml-a"><?php echo substr($booking->start_time, 0, 5). " - " .substr($booking->end_time, 0, 5); ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Notes</span>
          <span class="ml-a"><?php if (!empty($booking->booking_text)) {
                    echo $booking->booking_text;
                  } else {
                    echo 'None';
                  } ?>
          </span>
        </li>
      </div> 

      <!-- index history button -->
      <div class="flextable table-actions">
        <div class="flextable-item flextable-primary">
          <button type="button" class="btn btn-outline-primary" onclick="window.location='clients.all.bookings.php'">
            <span class="icon icon-chevron-left"></span>Go back
          </button>
        </div> 
      </div>

    </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>