<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 3) { redirect("index.php"); } ?>     

<?php

$client = User::find_by_id($session->user_id);

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
       
      <!-- title --> 
      <div class="dashhead">
        <div class="dashhead-titles">
          <h3 class="dashhead-title">Welcome <?php echo $session->user_fname; ?></h3>
        </div>
      </div>
      
      <!-- hr -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Active bookings</h3>
      </div>
      
      <?php if ($bookings) : ?>
      
      <!-- table -->
      <div class="table-responsive">
        <table class="table table-hover" data-sort="table">
          <thead>
            <tr>
              <th></th>
              <th>Date</th>
              <th>Day</th>
              <th>Time</th>
              <th>Service</th>
              <th>Hairdresser</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($bookings as $booking) : ?>
            <tr>
              <td><a href="clients.delete_booking.php?id=<?php echo $booking->id; ?>"><span class="icon icon-trash"></span></a></td>
              <td><?php echo date("j M Y", strtotime($booking->booking_date)); ?></td>
              <td><?php echo date("D", strtotime($booking->booking_date)); ?></td>
              <td><?php echo substr($booking->start_time, 0, 5); ?></td>
              <td><?php echo Service::name($booking->service_id); ?></td>
              <td><?php echo Hairdresser::name($booking->hairdresser_id); ?></td>
            </tr>                
          <?php endforeach; ?>
          </tbody>
        </table>
      </div> 
      
      <?php else : ?>
      
      <!-- list -->
      <div class="list-group mb-3">
        <a class="list-group-item justify-content-between">
          <span>You have no active bookings</span>
          <span class="text-muted"><?php echo date("l j M Y", strtotime($date_today)); ?></span>
        </a>    
      </div>
     <?php endif; ?> 
     
      <!-- button -->
      <div class="flextable-item flextable-primary">
        <button type="button" class="btn btn-outline-primary" onclick="window.location='clients.add.booking.php'">
          Book haircut
        </button>
      </div> 

      <!-- hr -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Account summary</h3>
      </div>
      
      <!-- row lists -->
      <div class="row">
        <div class="col-md-6 mb-5">
          <div class="list-group mb-3">
            <h6 class="list-group-header">Contact Details</h6>
            <li class="list-group-item justify-content-between">
              <span>Name</span>
              <span class="ml-a"><?php echo $client->first_name." ".$client->last_name; ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Mobile</span>
              <span class="ml-a"><?php echo $client->tel; ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Email</span> 
              <span class="ml-a"><?php echo $client->email; ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Hairdresser</span>
              <span class="ml-a">
              <?php if (!empty($client->hairdresser_id)) {
                      echo Hairdresser::name($client->hairdresser_id);
                    } else {
                      echo 'none';
                    } ?>
              </span>
            </li>
          </div>
          <a href="index_update.php" class="btn btn-outline-primary px-3">Edit account</a>
        </div>
  
        <div class="col-md-6 mb-5">
          <div class="list-group mb-3">
            <h6 class="list-group-header">Booking Stats</h6>
            <li class="list-group-item justify-content-between">
              <span>Active bookings</span>
              <span class="ml-a"><?php echo $count_active; ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>All bookings</span>
              <span class="ml-a"><?php echo $count_all; ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Average duration</span> 
              <span class="ml-a">90 mins</span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Average cost</span>
              <span class="ml-a">£30.00</span>
            </li>
          </div>
          <a href="index_history.php" class="btn btn-outline-primary px-3">All bookings</a>
        </div>   
      </div>
      
      
      <!-- hr -->
      <div class="hr-divider mt-2 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Stats</h3>
      </div>
      
      <!-- stat cards -->
      <div class="row statcards mb-3">
        <!-- card -->
        <div class="col-md-6 col-xl-6 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-success">
            <div class="p-3">
              <span class="statcard-desc">Active Bookings</span>
              <h2 class="statcard-number"><?php echo $count_active; ?></h2>
            </div>
          </div>
        </div>
        <!-- card -->
        <div class="col-md-6 col-xl-6 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-info">
            <div class="p-3">
              <span class="statcard-desc">All Bookings</span>
              <h2 class="statcard-number"><?php echo $count_all; ?></h2>
            </div>
          </div>
        </div> 
      </div>
      
    </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>