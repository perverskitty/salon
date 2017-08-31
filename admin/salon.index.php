<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2 && $session->user_role != 3) { redirect("signout.php"); } ?> 
<?php if($session->user_role == 3) { redirect("clients.index.php"); } ?>

<?php

$hairdresser = Hairdresser::find_by_id($session->user_id);

date_default_timezone_set("Europe/London");
$date_today = date("Y-m-d");
$time_today = date("H:i:s");

$sql = "SELECT * FROM bookings WHERE ";
$sql .= "hairdresser_id = ". $hairdresser->id ." AND ";
$sql .= "booking_date = '". $date_today ."' ";
$sql .= "ORDER BY start_time ASC";
$bookings = Booking::find_by_query($sql);

?>     
      
      <!-- main content -->
      <div class="col-md-9 content">
       
      <!-- title --> 
      <div class="dashhead">
        <div class="dashhead-titles">
          <h3 class="dashhead-title">Welcome <?php echo $hairdresser->first_name; ?></h3>
        </div>
      </div>
      
      <!-- hr -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading"><?php echo date("l j M Y", strtotime($date_today)); ?></h3>
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
              <th>Activity</th>
              <th>Hairdresser</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($bookings as $booking) : ?>
            <tr>
              <td><a href="index_delete.php?id=<?php echo $booking->id; ?>"><span class="icon icon-trash"></span></a></td>
              <td><?php echo date("j M Y", strtotime($booking->booking_date)); ?></td>
              <td><?php echo date("D", strtotime($booking->booking_date)); ?></td>
              <td><?php echo substr($booking->start_time, 0, 5); ?></td>
              <td><?php echo Activity::name($booking->activity_id); ?></td>
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
          <span>You have no bookings today</span>
          <span class="text-muted"><?php echo date("l j M Y", strtotime($date_today)); ?></span>
        </a>    
      </div>
     <?php endif; ?> 
     
      <!-- button -->
      <div class="flextable-item flextable-primary">
        <button type="button" class="btn btn-outline-primary" onclick="window.location='salon.index.php'">
          New Booking
        </button>
      </div>

      <!-- hr -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Account</h3>
      </div>
      
      <!-- list -->
      <div class="list-group mb-3">
        <li class="list-group-item justify-content-between">
          <span>Name</span>
          <span class="ml-a"><?php echo $hairdresser->first_name." ".$hairdresser->last_name; ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Mobile</span>
          <span class="ml-a"><?php echo $hairdresser->tel; ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Email</span> 
          <span class="ml-a"><?php echo $hairdresser->email; ?></span>
        </li>
        <li class="list-group-item justify-content-between">
          <span>Role</span>
          <span class="ml-a"><?php echo Role::name($hairdresser->role_id); ?></span>
        </li>
      </div>
      <div>
        <a href="salon.profile.php" class="btn btn-outline-primary px-3">Your account</a>
      </div>
      
      <!-- hr -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Stats</h3>
      </div>
      
      <!-- stat cards -->
      <div class="row statcards mb-3">
        <div class="col-md-6 col-xl-6 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-success">
            <div class="p-3">
              <span class="statcard-desc">Active Bookings</span>
              <h2 class="statcard-number">6</h2>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-6 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-info">
            <div class="p-3">
              <span class="statcard-desc">All Bookings</span>
              <h2 class="statcard-number">6</h2>
            </div>
          </div>
        </div> 
      </div>

    </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>