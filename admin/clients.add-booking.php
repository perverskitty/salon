<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2 && $session->user_role != 3) { redirect("signout.php"); } ?>  
<?php if($session->user_role == 1 || $session->user_role == 2) { redirect("salon.index.php"); } ?>
     
<?php
 
$client = Client::find_by_id($session->user_id);
$services = Service::find_all();

date_default_timezone_set("Europe/London");
$date_today = date("Y-m-d");
$time_today = date("H:i:s");
$mon_open ="";
$mon_close = "";
$tue_open ="";
$tue_close = "";
$wed_open ="";
$wed_close = "";
$thu_open ="";
$thu_close = "";
$fri_open ="";
$fri_close = "";
$sat_open ="";
$sat_close = "";
$sun_open ="";
$sun_close = "";

function open_times_by_day_id($day_id, $date) {
  $sql = "SELECT * FROM open_times WHERE ";
  $sql .= "day_id = ". $day_id ." AND ";
  $sql .= "first_date <= '". $date ."' AND ";
  $sql .= "last_date >= '". $date ."'";
  return Open_time::find_by_query($sql);
}

$mon = open_times_by_day_id(2, $date_today);
if ($mon) {
  $times = array_shift($mon);
  $mon_open = substr($times->open_time, 0, 5);
  $mon_close = substr($times->close_time, 0, 5);
}
$tue = open_times_by_day_id(3, $date_today);
if ($tue) {
  $times = array_shift($tue);
  $tue_open = substr($times->open_time, 0, 5);
  $tue_close = substr($times->close_time, 0, 5);
}
$wed = open_times_by_day_id(4, $date_today);
if ($wed) {
  $times = array_shift($wed);
  $wed_open = substr($times->open_time, 0, 5);
  $wed_close = substr($times->close_time, 0, 5);
}
$thu = open_times_by_day_id(5, $date_today);
if ($thu) {
  $times = array_shift($thu);
  $thu_open = substr($times->open_time, 0, 5);
  $thu_close = substr($times->close_time, 0, 5);
}
$fri = open_times_by_day_id(6, $date_today);
if ($fri) {
  $times = array_shift($fri);
  $fri_open = substr($times->open_time, 0, 5);
  $fri_close = substr($times->close_time, 0, 5);
}
$sat = open_times_by_day_id(7, $date_today);
if ($sat) {
  $times = array_shift($sat);
  $sat_open = substr($times->open_time, 0, 5);
  $sat_close = substr($times->close_time, 0, 5);
}
$sun = open_times_by_day_id(1, $date_today);
if ($sun) {
  $times = array_shift($sun);
  $sun_open = substr($times->open_time, 0, 5);
  $sun_close = substr($times->close_time, 0, 5);
}


// the client's hairdresser schedules
$mon_hd_times ="";
$tue_hd_times ="";
$wed_hd_times ="";
$thu_hd_times ="";
$fri_hd_times ="";
$sat_hd_times ="";
$sun_hd_times ="";

function shift_times_by_hairdresser_id($hairdresser_id, $day_id, $date) {
  $sql = "SELECT * FROM schedules WHERE ";
  $sql .= "hairdresser_id = ". $hairdresser_id ." AND ";
  $sql .= "day_id = ". $day_id ." AND ";
  $sql .= "first_date <= '". $date ."' AND ";
  $sql .= "last_date >= '". $date ."'";
  return Schedule::find_by_query($sql);
}

if ($client->hairdresser_id) {
  $mon_schedules = shift_times_by_hairdresser_id($client->hairdresser_id, 2, $date_today);
  if ($mon_schedules) {
    foreach ($mon_schedules as $schedule) {
      $mon_hd_times .= substr($schedule->start_time, 0, 5)." - ".substr($schedule->end_time, 0, 5)."  ";
    }
  }
  $tue_schedules = shift_times_by_hairdresser_id($client->hairdresser_id, 3, $date_today);
  if ($tue_schedules) {
    foreach ($mon_schedules as $schedule) {
      $tue_hd_times .= substr($schedule->start_time, 0, 5)." - ".substr($schedule->end_time, 0, 5)."  ";
    }
  }
  $wed_schedules = shift_times_by_hairdresser_id($client->hairdresser_id, 4, $date_today);
  if ($wed_schedules) {
    foreach ($wed_schedules as $schedule) {
      $wed_hd_times .= substr($schedule->start_time, 0, 5)." - ".substr($schedule->end_time, 0, 5)."  ";
    }
  }
  $thu_schedules = shift_times_by_hairdresser_id($client->hairdresser_id, 5, $date_today);
  if ($thu_schedules) {
    foreach ($thu_schedules as $schedule) {
      $thu_hd_times .= substr($schedule->start_time, 0, 5)." - ".substr($schedule->end_time, 0, 5)."  ";
    }
  }
  $fri_schedules = shift_times_by_hairdresser_id($client->hairdresser_id, 6, $date_today);
  if ($fri_schedules) {
    foreach ($fri_schedules as $schedule) {
      $fri_hd_times .= substr($schedule->start_time, 0, 5)." - ".substr($schedule->end_time, 0, 5)."  ";
    }
  }
  $sat_schedules = shift_times_by_hairdresser_id($client->hairdresser_id, 7, $date_today);
  if ($sat_schedules) {
    foreach ($sat_schedules as $schedule) {
      $sat_hd_times .= substr($schedule->start_time, 0, 5)." - ".substr($schedule->end_time, 0, 5)."  ";
    }
  }
  $sun_schedules = shift_times_by_hairdresser_id($client->hairdresser_id, 1, $date_today);
  if ($sun_schedules) {
    foreach ($sun_schedules as $schedule) {
      $sun_hd_times .= substr($schedule->start_time, 0, 5)." - ".substr($schedule->end_time, 0, 5)."  ";
    }
  } 
}

// find all hairdressers
$sql = "SELECT * FROM users WHERE ";
$sql .= "role_id = 1 OR role_id = 2 ";
$sql .= "ORDER BY first_name";
$hairdressers = Hairdresser::find_by_query($sql);

// form is submitted
if (isset($_POST['submit'])) {  
  
  $booking = new Client_booking();
  
  if($booking) {
    
      if ($client->hairdresser_id) {
        $booking->hairdresser_id = $client->hairdresser_id;
        $booking->booking_date = $_POST['booking_date'];
        $booking->start_time = $_POST['start_time'];
        $booking->activity_id = 1;
        $booking->service_id = $_POST['service_id'];
        $booking->client_id = $client->id;
        
        if ($booking->validate()) {
          if ($booking->save()) { 
          redirect("clients.index.php"); 
          }
        }
      } else {
        
        $booking->booking_date = $_POST['booking_date'];
        $booking->start_time = $_POST['start_time'];
        $booking->activity_id = 1;
        $booking->service_id = $_POST['service_id'];
        $booking->client_id = $client->id;
        
        $service = Service::find_by_id($_POST['service_id']);
        $minutes = minutes($service->duration);
        $end_time = date('H:i:s', strtotime($booking->start_time." + ".$minutes." minutes"));
    
        $day = date("w", strtotime($booking->booking_date));
        $day = $day + 1;
    
        $sql = "SELECT * FROM schedules WHERE ";
        $sql .= "day_id =". $day ." AND ";
        $sql .= "start_time <= '". $booking->start_time ."' AND ";
        $sql .= "end_time > '". $booking->start_time ."' AND ";
        $sql .= "end_time >= '". $end_time ."' AND ";
        $sql .= "first_date <= '". $booking->booking_date ."' AND ";
        $sql .= "last_date >= '". $booking->booking_date ."'";
    
        $result_array = Schedule::find_by_query($sql);
  
        if ($result_array) {
          foreach ($result_array as $result) {
            $booking->hairdresser_id = $result->hairdresser_id;
            if ($booking->validate()) {
              if ($booking->save()) { 
                redirect("clients.index.php"); 
              }
            }
          }
        } else {
          Message::display('All hairdressers unavailable for date/time', 'error');
        }
      
      }
  } }

?>    
     
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      <!-- title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h3 class="dashhead-title">Book haircut</h3>
        </div>
      </div>
      
      <!-- hr -->
      <div class="hr-divider mt-4 mb-3">
        <h3 class="hr-divider-content hr-divider-heading">Please complete all fields</h3>
      </div>
      
      <!-- error message display -->
      <?php Message::display(); ?>
	
	    <!-- form -->
      <form action="" method="post">
        <div class="form-group">
            <label for="booking_date">Date</label>
            <input type="text" class="form-control" data-date-format="yyyy-mm-dd" data-provide="datepicker" name="booking_date">
        </div>
        <div class="form-group">
          <label for="start_time">Time</label>
          <select class="form-control" name="start_time">
            <option selected>Open this select menu</option>
            <option value="10:00:00">10:00</option>
            <option value="10:30:00">10:30</option>
            <option value="11:00:00">11:00</option>
            <option value="11:30:00">11:30</option>
            <option value="12:00:00">12:00</option>
            <option value="12:30:00">12:30</option>
            <option value="13:00:00">13:00</option>
            <option value="13:30:00">13:30</option>
            <option value="14:00:00">14:00</option>
            <option value="14:30:00">14:30</option>
            <option value="15:00:00">15:00</option>
            <option value="15:30:00">15:30</option>
            <option value="16:00:00">16:00</option>
            <option value="16:30:00">16:30</option>
            <option value="17:00:00">17:00</option>
            <option value="17:30:00">17:30</option>
            <option value="18:00:00">18:00</option>
            <option value="18:30:00">18:30</option>
          </select>
        </div>
        <div class="form-group">
          <label for="service_id">Service</label>
          <select class="form-control" name="service_id">
            <option selected>Open this select menu</option>
            <?php foreach ($services as $service) : ?>
            <option value="<?php echo $service->id; ?>"><?php echo $service->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="flextable-item flextable-primary">
          <button type="button" class="btn btn-outline-danger" onclick="window.location='clients.index.php'">Cancel</button>
        </div> 
        <div class="flextable-item flextable-primary">
          <button type="submit" class="btn btn-outline-primary" name="submit">Book</button>
        </div>
      </form>
      
     
      <!-- hr -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Booking Info</h3>
      </div>
      
      <!-- lists -->
      <div class="row">
        <div class="col-md-6 mb-5">
          <div class="list-group mb-3">
            <h6 class="list-group-header">Salon Opening Hours</h6>
            <li class="list-group-item justify-content-between">
              <span>Monday</span>
              <span class="text-muted"><?php echo (($mon_open) ? $mon_open. " - " .$mon_close : "Closed"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Tuesday</span>
              <span class="text-muted"><?php echo (($tue_open) ? $tue_open. " - " .$tue_close : "Closed"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Wednesday</span>
              <span class="text-muted"><?php echo (($wed_open) ? $wed_open. " - " .$wed_close : "Closed"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Thursday</span>
              <span class="text-muted"><?php echo (($thu_open) ? $thu_open. " - " .$thu_close : "Closed"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Friday</span>
              <span class="text-muted"><?php echo (($fri_open) ? $fri_open. " - " .$fri_close : "Closed"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Saturday</span>
              <span class="text-muted"><?php echo (($sat_open) ? $sat_open. " - " .$sat_close : "Closed"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Sunday</span>
              <span class="text-muted"><?php echo (($sun_open) ? $sun_open. " - " .$sun_close : "Closed"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>UK Bank holiday</span>
              <span class="text-muted">Closed</span>
            </li>
          </div>
        </div>
        <div class="col-md-6 mb-5">
          <div class="list-group mb-3">
            <h6 class="list-group-header">Hairdresser : <?php echo (($client->hairdresser_id) ? Hairdresser::name($client->hairdresser_id) : "No preference"); ?></h6>
            <li class="list-group-item justify-content-between">
              <span>Monday</span>
              <span class="text-muted"><?php echo (($mon_hd_times) ? $mon_hd_times : "---"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Tuesday</span>
              <span class="text-muted"><?php echo (($tue_hd_times) ? $tue_hd_times : "---"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Wednesday</span>
              <span class="text-muted"><?php echo (($wed_hd_times) ? $wed_hd_times : "---"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Thursday</span>
              <span class="text-muted"><?php echo (($thu_hd_times) ? $thu_hd_times : "---"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Friday</span>
              <span class="text-muted"><?php echo (($fri_hd_times) ? $fri_hd_times : "---"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Saturday</span>
              <span class="text-muted"><?php echo (($sat_hd_times) ? $sat_hd_times : "---"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>Sunday</span>
              <span class="text-muted"><?php echo (($sun_hd_times) ? $sun_hd_times : "---"); ?></span>
            </li>
            <li class="list-group-item justify-content-between">
              <span>UK Bank holiday</span>
              <span class="text-muted">---</span>
            </li>
          </div>
        </div>
      </div>
   
     
    </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>