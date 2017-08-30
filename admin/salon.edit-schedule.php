<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2 && $session->user_role != 3) { redirect("signout.php"); } ?> 
<?php if($session->user_role == 3) { redirect("clients.index.php"); } ?>
<?php if($session->user_role == 2) { redirect("salon.index.php"); } ?>
     
<?php

if(empty($_GET['id'])) {
  redirect("salon.schedules.php");
} else {
  
  $schedule = Schedule::find_by_id($_GET['id']);
  
  $hairdresser = Hairdresser::find_by_id($schedule->hairdresser_id);
  
  if (isset($_POST['update'])) {
    if($schedule) {
      $schedule->hairdresser_id = $_POST['hairdresser_id'];
      $schedule->day_id = $_POST['day_id'];
      $schedule->start_time = $_POST['start_time'];
      $schedule->end_time = $_POST['end_time'];
      $schedule->first_date = $_POST['first_date'];
      $schedule->last_date = $_POST['last_date'];
      
      if ($schedule->save()) { redirect("salon.schedules.php"); }
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
          <h2 class="dashhead-title">Update schedule</h2>
        </div>
      </div> <!-- end of dash title -->  
      
                  
      <!-- error message display -->
      <h4 class="bg-danger"></h4>
	
	    <!-- update schedule form -->
      <form id="login-id" action="" method="post">
        <div class="form-group">
            <label for="hairdresser_id">Hairdresser</label>
            <input type="text" class="form-control" name="hairdresser_id" value="<?php echo $hairdresser->first_name." ".$hairdresser->last_name; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="day_id">Day</label>
            <input type="text" class="form-control" name="day_id" value="<?php echo $schedule->day_id; ?>">
        </div>
        <div class="form-group">
            <label for="start_time">Start time</label>
            <input type="text" class="form-control" name="start_time" value="<?php echo $schedule->start_time; ?>">
        </div>
        <div class="form-group">
            <label for="end_time">End time</label>
            <input type="text" class="form-control" name="end_time" value="<?php echo $schedule->end_time; ?>">
        </div>
        <div class="form-group">
          <label for="first_date">First date</label>
          <input type="text" class="form-control" name="first_date" value="<?php echo $schedule->first_date; ?>">
        </div>
        <div class="form-group">
          <label for="last_date">Last date</label>
          <input type="text" class="form-control" name="last_date" value="<?php echo $schedule->last_date; ?>">
        </div>        
        <div class="form-group">
          <a class="btn btn-outline-danger" href="salon.delete-schedule.php?id=<?php echo $schedule->id; ?>">Delete</a>
          <input class="btn btn-outline-primary" type="submit" name="update" value="Update">
        </div>
      </form> <!-- end of update schedule form -->
     

    </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>