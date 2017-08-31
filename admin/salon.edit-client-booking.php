<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2 && $session->user_role != 3) { redirect("signout.php"); } ?> 
<?php if($session->user_role == 3) { redirect("clients.index.php"); } ?>
     
<?php

if(empty($_GET['id'])) {
  redirect("salon.client-bookings.php");
} else {
    
  $booking = Client_booking::find_by_id($_GET['id']);
  
  if (isset($_POST['update'])) {
    if($booking) {
      $booking->booking_text = $_POST['booking_text'];
        
      if ($booking->save()) { redirect("salon.client-bookings.php"); }
    }
  }  
}

?>
    
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      <!-- title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Salon Admin</h6>
          <h2 class="dashhead-title">Update booking</h2>
        </div>
      </div>
      
      <!-- delete button -->
      <div class="text-right">
        <a class="btn btn-outline-danger" href="salon.delete-client-booking.php?id=<?php echo $booking->id; ?>">
        <span class="icon icon-trash"></span>
        Delete</a>
      </div>
     
      <!-- hr -->
      <div class="hr-divider mt-4 mb-3">
        <h3 class="hr-divider-content hr-divider-heading">Summary</h3>
      </div>
 
      <!-- list -->
      <div class="list-group mb-3">
        <li class="list-group-item justify-content-between">
          <span>Activity</span>
          <span class="ml-a"><?php echo Activity::name($booking->activity_id); ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Hairdresser</span>
          <span class="ml-a"><?php echo Hairdresser::name($booking->hairdresser_id); ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Date</span> 
          <span class="ml-a"><?php echo date("l j M Y", strtotime($booking->booking_date)); ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Time</span>
          <span class="ml-a"><?php echo substr($booking->start_time, 0, 5)." - ".substr($booking->end_time, 0, 5); ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Service</span>
          <span class="ml-a"><?php echo Service::name($booking->service_id); ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Client</span>
          <span class="ml-a"><?php echo Client::name($booking->client_id); ?></span>
        </li>
      </div>
      
      <!-- error message display -->
      <?php Message::display(); ?>
      
      <!-- hr -->
      <div class="hr-divider mt-5 mb-3">
        <h3 class="hr-divider-content hr-divider-heading">Change note here</h3>
      </div>
      
	    <!-- form -->
      <form action="" method="post">
        <div class="form-group">
          <label for="booking_text">Notes</label>
          <textarea class="form-control" name="booking_text" rows="3"><?php echo $booking->booking_text; ?></textarea>
        </div>
        <div class="flextable-item flextable-primary">
          <button type="button" class="btn btn-outline-primary" onclick="window.location='salon.client-bookings.php'">Cancel</button>
        </div> 
        <div class="flextable-item flextable-primary">
          <button type="submit" class="btn btn-outline-success" name="update">Update</button>
        </div>
      </form>
     
      </div> <!-- end of content -->
      
<?php include("includes/footer.php"); ?>