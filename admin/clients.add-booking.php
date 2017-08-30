<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2 && $session->user_role != 3) { redirect("signout.php"); } ?>  
<?php if($session->user_role == 1 && $session->user_role == 2) { redirect("salon.index.php"); } ?>
     
<?php

$sql = "SELECT * FROM users WHERE ";
$sql .= "role_id = 1 OR role_id = 2 ";
$sql .= "ORDER BY first_name";
$hairdressers = Hairdresser::find_by_query($sql);

$services = Service::find_all();
$client = Client::find_by_id($session->user_id);

if (isset($_POST['submit'])) {  
    
    // check if salon is open
    $day = date("w", strtotime($_POST['booking_date']));
    $day = $day + 1;
    $sql = "SELECT * FROM open_times WHERE ";
    $sql .= "day_id =". $day ." AND ";
    $sql .= "first_date <= '". $_POST['booking_date'] ."' AND ";
    $sql .= "last_date >= '". $_POST['booking_date'] ."'";
    $open_times = Open_time::find_by_query($sql);
  
    if ($open_times) {
      
      // check if hairdresser is working 
      $sql = "SELECT * FROM schedules WHERE ";
      $sql .= "hairdresser =". $_POST['hairdresser_id'] ." AND ";
      $sql .= "day_id =". $day ." AND ";
      $sql .= "first_date <= '". $_POST['booking_date'] ."' AND ";
      $sql .= "last_date >= '". $_POST['booking_date'] ."'";
      $schedules = Open_time::find_by_query($sql);
      
      if ($schedules) {
        
        // 
        
      } else {
        Message::setMsg("Hairdresser unavailable. Please select a different date.", "error");
      }
      
    } else {
      Message::setMsg("Salon closed. Please select a different date.", "error");
    }
    
}

?>    
     
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Book a haircut</h2>
        </div>
      </div> <!-- end of title -->  
     
     
      <!-- error message display -->
      <?php Message::display(); ?>
	
	    <!-- form -->
      <form action="" method="post">
        <div class="form-group">
            <label for="booking_date">Date</label>
            <input type="text" class="form-control" data-date-format="yyyy-mm-dd" data-provide="datepicker" name="booking_date">
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
            <label for="hairdresser_id">Hairdresser</label>
            <select class="form-control" name="hairdresser_id">
              <option selected>No preference</option>
              <?php foreach ($hairdressers as $hairdresser) : ?>
              <option value="<?php echo $hairdresser->id; ?>"><?php echo $hairdresser->first_name." ".$hairdresser->last_name; ?></option>
              <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group text-right">
              <a href="clients.index.php" class="btn btn-outline-primary">Cancel</a>
              <input class="btn btn-outline-primary text-right" type="submit" name="submit" value="Proceed">
        </div>
      </form> <!-- end of form -->
     

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>