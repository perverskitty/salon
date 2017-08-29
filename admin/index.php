<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
     
<?php $client = User::find_by_id($session->user_id); ?>

<?php

date_default_timezone_set("Europe/London");
$date_today = date("Y-m-d");
$time_today = date("H:i:s");

$sql = "SELECT * FROM bookings WHERE ";
$sql .= "client_id = ". $session->user_id ." AND ";
$sql .= "booking_date >= '". $date_today ."' ";
$sql .= "ORDER BY booking_date ASC";
$bookings = Client_booking::find_by_query($sql);

$count_active = count($bookings);
$count_all = Client_booking::count_all_by_client_id($session->user_id);

?>     
      
      <!-- main content -->
      <div class="col-md-9 content">
       
      <!-- Dashboard title --> 
      <div class="dashhead">
        <div class="dashhead-titles">
          <h3 class="dashhead-title">Welcome <?php echo $session->user_fname; ?></h3>
        </div>
      </div>
      
      
      <!-- Recent bookings rule -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Select a booking for details</h3>
      </div>
      <!-- Recent bookings list -->
      <div class="list-group mb-3">
      <h6 class="list-group-header">Active Bookings</h6>
        <?php if ($bookings) : ?>
        
          <?php foreach ($bookings as $booking) : ?>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span><?php echo Service::name($booking->service_id). " with " .Hairdresser::name($booking->hairdresser_id); ?></span>
              <span class="text-muted"><?php echo substr($booking->start_time, 0, 5). ", " .date("D, j M Y", strtotime($booking->booking_date)); ?></span>
            </a>
          <?php endforeach; ?>
        
        <?php else : ?>
        
          <a class="list-group-item justify-content-between">
            <span>You have no active bookings</span>
            <span class="text-muted"><?php echo substr($time_today, 0, 5) . ", " . date("D, j M Y", strtotime($date_today)); ?></span>
          </a>
        
        <?php endif; ?>       
      </div>

      <!-- book haircut button -->
      <div class="flextable-item flextable-primary">
        <button type="button" class="btn btn-outline-primary" onclick="window.location='index_add_booking.php'">
          Book haircut
        </button>
      </div> 

      <!-- Account info rule -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Your Account Summary</h3>
      </div>
      
      <!-- Account info list -->
      <div class="list-group mb-3">
        <li class="list-group-item justify-content-between">
          <span>Name</span>
          <span class="ml-a text-muted"><?php echo $client->first_name." ".$client->last_name; ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Mobile</span>
          <span class="ml-a text-muted"><?php echo $client->tel; ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Email</span> 
          <span class="ml-a text-muted"><?php echo $client->email; ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Personal Hairdresser</span>
          <span class="ml-a text-muted">
            <?php if (!empty($client->hairdresser_id)) {
                    echo Hairdresser::name($client->hairdresser_id);
                  } else {
                    echo 'none';
                  } ?>
          </span>
        </li>
      </div> 
      
      <!-- Edit account button -->
      <div class="flextable-item flextable-primary">
        <button type="button" class="btn btn-outline-primary" onclick="window.location='index_update.php'">
          Edit account
        </button>
      </div> 
      
      <!-- Salon Info rule -->
      <div class="hr-divider mt-5 mb-3">
        <h3 class="hr-divider-content hr-divider-heading">Statistics</h3>
      </div>
      
      <!-- Row of cards -->
      <div class="row statcards">
        <!-- First card -->
        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-success">
            <div class="p-3">
              <span class="statcard-desc">Active Bookings</span>
              <h2 class="statcard-number"><?php echo $count_active; ?></h2>
              <hr class="statcard-hr mb-0">
            </div>
          </div>
        </div>
        <!-- Second card -->
        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-info">
            <div class="p-3">
              <span class="statcard-desc">All Bookings</span>
              <h2 class="statcard-number"><?php echo $count_all; ?></h2>
              <hr class="statcard-hr mb-0">
            </div>
          </div>
        </div> 
      </div>
     
      <!-- All bookings button -->
      <div class="flextable-item">
        <button type="button" class="btn btn-outline-primary" onclick="window.location='index_history.php'">
          All bookings 
        </button>
      </div>

    </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>