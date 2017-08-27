<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2) { redirect("index.php"); } ?>
     
<?php

$sql = "SELECT * FROM users WHERE ";
$sql .= "role_id = 1 OR role_id = 2 ";
$sql .= "ORDER BY first_name";
$hairdressers = Hairdresser::find_by_query($sql);

$services = Service::find_all();

$sql = "SELECT * FROM users WHERE ";
$sql .= "role_id = 3 ";
$sql .= "ORDER BY first_name";
$clients = Client::find_by_query($sql);

$client_booking = new Booking();
if (isset($_POST['create'])) {  
  if($client_booking) {
      $client_booking->hairdresser_id = $_POST['hairdresser_id'];
      $client_booking->activity_id = 1;
      $client_booking->booking_date = $_POST['booking_date'];
      $client_booking->start_time = $_POST['start_time'];
      $client_booking->end_time = $_POST['end_time'];
      $client_booking->booking_text = $_POST['booking_text'];
    
      if ($client_booking->save()) { redirect("bookings_clients.php"); }
  }
}

?>
     
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Create client booking</h2>
        </div>
      </div> <!-- end of dash title -->  
     
     
      <!-- error message display -->
      <?php Message::display(); ?>
	
	    <!-- add service form -->
      <form id="login-id" action="" method="post">
        <div class="form-group">
            <label for="hairdresser_id">Hairdresser</label>
            <select class="form-control" name="hairdresser_id">
              <option selected>No preference</option>
              <?php foreach ($hairdressers as $hairdresser) : ?>
              <option value="<?php echo $hairdresser->id; ?>"><?php echo $hairdresser->first_name." ".$hairdresser->last_name; ?></option>
              <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="booking_date">Date</label>
            <input type="text" class="form-control" data-date-format="yyyy-mm-dd" data-provide="datepicker" name="booking_date">
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
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
        <div class="form-group">
            <label for="client_id">Client</label>
            <select class="form-control" name="client_id">
              <option selected>Open this select menu</option>
              <?php foreach ($clients as $client) : ?>
              <option value="<?php echo $client->id; ?>"><?php echo $client->first_name." ".$client->last_name; ?></option>
              <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
          <label for="booking_text">Notes</label>
          <textarea class="form-control" name="booking_text" rows="3"></textarea>
        </div>
        <div class="form-group">
          <input class="btn btn-outline-primary" type="submit" name="create" value="Create">
        </div>
      </form> <!-- end of add service form -->
     

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>