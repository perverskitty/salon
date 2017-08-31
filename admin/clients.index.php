<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2 && $session->user_role != 3) { redirect("signout.php"); } ?>  
<?php if($session->user_role == 1 || $session->user_role == 2) { redirect("salon.index.php"); } ?>   

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
          <h3 class="dashhead-title">Welcome <?php echo $client->first_name; ?></h3>
        </div>
      </div>
      
      <!-- hr -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Open bookings</h3>
      </div>
      
      <?php if ($bookings) : ?>
      
      <!-- table -->
      <div class="table-responsive">
        <table class="table" data-sort="table">
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
              <td><a href="clients.delete-booking.php?id=<?php echo $booking->id; ?>"><span class="icon icon-trash"></span></a></td>
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
          <span>You have no open bookings</span>
          <span class="text-muted"><?php echo date("l j M Y", strtotime($date_today)); ?></span>
        </a>    
      </div>
      <?php endif; ?> 
     
      <!-- button --> 
      <div>
        <a href="clients.add-booking.php" class="btn btn-outline-primary px-3">Book haircut</a>
      </div>
      

      <!-- hr -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Account</h3>
      </div>
      
      <!-- list -->
      <div class="list-group mb-3">
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
      <div>
        <a href="clients.profile.php" class="btn btn-outline-primary px-3">Your account</a>
      </div>

      <!-- hr -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Stats</h3>
      </div>
      
      <!-- cards -->
      <div class="row statcards mb-3">
        <div class="col-md-6 col-xl-6 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-success">
            <div class="p-3">
              <span class="statcard-desc">Open Bookings</span>
              <h2 class="statcard-number"><?php echo $count_active; ?></h2>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-6 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-info">
            <div class="p-3">
              <span class="statcard-desc">All Bookings</span>
              <h2 class="statcard-number"><?php echo $count_all; ?></h2>
            </div>
          </div>
        </div> 
      </div>
      
    </div> <!-- end of content -->
      
<?php include("includes/footer.php"); ?>