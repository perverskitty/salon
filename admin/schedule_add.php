<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
     
<?php

$schedule = new Schedule();
if (isset($_POST['create'])) {  
  if($schedule) {
      $schedule->hairdresser_id = $_POST['hairdresser_id'];
      $schedule->day_id = $_POST['day_id'];
      $schedule->start_time = $_POST['start_time'];
      $schedule->end_time = $_POST['end_time'];
      $schedule->first_date = $_POST['first_date'];
      $schedule->last_date = $_POST['last_date'];
    
      if ($schedule->save()) { redirect("schedules.php"); }
  }
}

?>
     
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Create schedule</h2>
        </div>
      </div> <!-- end of dash title -->  
     
     
      <!-- error message display -->
      <h4 class="bg-danger"></h4>
	
	    <!-- add service form -->
      <form id="login-id" action="" method="post">
        <div class="form-group">
            <label for="hairdresser_id">Hairdresser</label>
            <input type="text" class="form-control" name="hairdresser_id">
        </div>
        <div class="form-group">
            <label for="day_id">Day</label>
            <input type="text" class="form-control" name="day_id">
        </div>
        <div class="form-group">
            <label for="start_time">Start time</label>
            <input type="text" class="form-control" name="start_time">
        </div>
        <div class="form-group">
            <label for="end_time">End time</label>
            <input type="text" class="form-control" name="end_time">
        </div>
        <div class="form-group">
          <label for="first_date">First date</label>
          <input type="text" class="form-control" name="first_date">
        </div>
        <div class="form-group">
          <label for="last_date">Last date</label>
          <input type="text" class="form-control" name="last_date">
        </div>
        <div class="form-group">
          <input class="btn btn-outline-primary" type="submit" name="create" value="Create">
        </div>
      </form> <!-- end of add service form -->
     

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>