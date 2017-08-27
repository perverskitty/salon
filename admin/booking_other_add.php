<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1) { redirect("index.php"); } ?>
     
<?php

$sql = "SELECT * FROM users WHERE ";
$sql .= "role_id = 1 OR role_id = 2 ";
$sql .= "ORDER BY first_name";
$hairdressers = Hairdresser::find_by_query($sql);

if (isset($_POST['create'])) {  
  
  $booking = new Booking();
  if ($booking) {
    $booking->hairdresser_id = $_POST['hairdresser_id'];
    $booking->activity_id = $_POST['activity_id'];
    $booking->booking_date = $_POST['booking_date'];
    $booking->start_time = $_POST['start_time'];
    $booking->end_time = $_POST['end_time'];
    $booking->booking_text = $_POST['booking_text'];
    
    if ($booking->validate()) {
      
      if ($booking->save()) { 
        redirect("bookings_other.php"); 
      }
      
    }
    
  }
}

?>
    

     
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Create other booking</h2>
        </div>
      </div> <!-- end of dash title -->  
     
     
      <!-- error message display -->
      <?php Message::display(); ?>
	
	    <!-- add service form -->
      <form action="" method="post">
       
        <div class="form-group">
            <label for="hairdresser_id">Hairdresser</label>
            <select class="form-control" name="hairdresser_id">
              <option value="">Open this select menu</option>
              <?php foreach ($hairdressers as $hairdresser) : ?>
              <option value="<?php echo $hairdresser->id; ?>"><?php echo $hairdresser->first_name." ".$hairdresser->last_name; ?></option>
              <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="activity_id">Activity</label>
            <select class="form-control" name="activity_id">
              <option selected>Open this select menu</option>
              <option value="3">Staff holiday</option>
              <option value="4">Staff training</option>
              <option value="5">Staff meeting</option>
              <option value="6">Other</option>
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
            <label for="end_time">End time</label>
            <select class="form-control" name="end_time">
              <option selected>Open this select menu</option>
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
              <option value="19:00:00">19:00</option>
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