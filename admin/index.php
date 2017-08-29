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

?>     
      
      <!-- main content -->
      <div class="col-md-9 content">
       
      <!-- Dashboard title --> 
      <div class="dashhead">
        <div class="dashhead-titles">
          <h2 class="dashhead-title">Welcome <?php echo $session->user_fname; ?></h2>
        </div>
      </div>
      
      
      <!-- Recent bookings rule -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading"> Recent bookings</h3>
      </div>
      <!-- Recent bookings list -->
      <div class="list-group mb-4">
        <?php if ($bookings) : ?>
        
          <?php foreach ($bookings as $booking) : ?>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span><?php echo Service::name($booking->service_id). " with " .Hairdresser::name($booking->hairdresser_id); ?></span>
              <span class="text-muted"><?php echo substr($booking->start_time, 0, 5). ", " .date("D, j M Y", strtotime($booking->booking_date)); ?></span>
            </a>
          <?php endforeach; ?>
        
        <?php else : ?>
        
          <a class="list-group-item justify-content-between">
            <span>You have no active bookings at this time</span>
            <span class="text-muted"><?php echo substr($time_today, 0, 5) . ", " . date("D, j M Y", strtotime($date_today)); ?></span>
          </a>
        
        <?php endif; ?>       
      </div>
      

      <!-- buttons -->
      <div class="row statcards">
        <!-- Book haircut button -->
        <div class="col-md-6 col-xl-6 mb-3 mb-md-4 mb-xl-0">
          <a href="#">
            <div class="statcard statcard-success">
              <div class="p-3">
                <h5 class="statcard-number">Book haircut</h5>
              </div>
            </div>
          </a>
        </div>
        <!-- View bookings button -->
        <div class="col-md-6 col-xl-6 mb-3 mb-md-4 mb-xl-0">
          <a href="#">
            <div class="statcard statcard-danger">
              <div class="p-3">
                <h5 class="statcard-number">Cancel haircut</h5>
              </div>
            </div>
          </a>
        </div>
      </div> 


      <!-- Account info rule -->
      <div class="hr-divider mt-4 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Your Account</h3>
      </div>
      <!-- Account info list -->
      <div class="list-group mb-4">
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
      
      
      <!-- buttons -->
      <div class="row statcards">
        <!-- Update account button -->
        <div class="col-md-6 col-xl-6 mb-3 mb-md-4 mb-xl-0">
          <a href="#">
            <div class="statcard statcard-primary">
              <div class="p-3">
                <h5 class="statcard-number">Update account</h5>
              </div>
            </div>
          </a>
        </div>
        <!-- Bookings history button -->
        <div class="col-md-6 col-xl-6 mb-3 mb-md-4 mb-xl-0">
          <a href="#">
            <div class="statcard statcard-info">
              <div class="p-3">
                <h5 class="statcard-number">Bookings history</h5>
              </div>
            </div>
          </a>
        </div>
      </div>
      
      
      <!-- Salon Info rule -->
      <div class="hr-divider mt-4 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Salon Info</h3>
      </div>
      
      <!-- Salon info lists -->
      <div class="row">
        <!-- Opening hours list -->
        <div class="col-md-6 mb-5">
            <div class="list-group mb-3">
            <h6 class="list-group-header">Opening Hours</h6>
            <li class="list-group-item justify-content-between">
              <span>Mon, Wed to Sat</span>
              <span class="mr-a text-muted">10:00 to 19:00</span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Tue</span>
              <span class="mr-a text-muted">Closed</span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Sun</span>
              <span class="mr-a text-muted">10:00 to 17:00</span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>UK bank holidays</span>
              <span class="mr-a text-muted">Closed</span>
            </li>
          </div> 
        </div>
  
        <!-- Address & contact list -->
        <div class="col-md-6 mb-5">
          <div class="list-group mb-3">
            <h6 class="list-group-header">Contact Info</h6>
            <li class="list-group-item justify-content-between">
              <span>Address</span>
              <span class="mr-a text-muted">12 Hair St, London SW1 7RS</span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Main</span>
              <span class="mr-a text-muted">0208 450 8686</span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Mobile</span>
              <span class="mr-a text-muted">07797 960 960</span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Email</span>
              <span class="mr-a text-muted">info@hair.com</span>
            </li>
          </div> 
        </div>
        
      </div> <!-- row of lists end -->
      


    </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>