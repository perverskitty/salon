<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2) { redirect("index.php"); } ?>
     
<?php

$sql = "SELECT * FROM users WHERE ";
$sql .= "role_id = 1 OR role_id = 2 ";
$sql .= "ORDER BY first_name";
$hairdressers = Hairdresser::find_by_query($sql);

$client = new Client();
if (isset($_POST['create'])) {  
  if($client) {
      $client->first_name = $_POST['first_name'];
      $client->last_name = $_POST['last_name'];
      $client->gender = $_POST['gender'];
      $client->tel = $_POST['tel'];
      $client->role_id = 3;
      $client->hairdresser_id = $_POST['hairdresser_id'];
      $client->email = $_POST['email'];
      $client->password = $_POST['password'];
    
      if ($client->save()) { redirect("clients.php"); }
  }
}

?>
     
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Create client</h2>
        </div>
      </div> <!-- end of dash title -->  
     
     
      <!-- error message display -->
      <h4 class="bg-danger"></h4>
	
	    <!-- add client form -->
      <form id="login-id" action="" method="post">
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" name="first_name">
        </div>
        <div class="form-group">
            <label for="last_Name">Last name</label>
            <input type="text" class="form-control" name="last_name">
        </div>
        <fieldset class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <input class="form-check-input" type="radio" name="gender" id="clientGenderRadio1" value="1">
            Male
            </label>
            </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <input class="form-check-input" type="radio" name="gender" id="clientGenderRadio2" value="2">
            Female
            </label>
          </div>
        </fieldset>
        <div class="form-group">
          <label for="tel">Phone</label>
          <input type="text" class="form-control" name="tel" value="">
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
        <div class="form-group">
	        <label for="email">Email</label>
	        <input type="text" class="form-control" name="email" value="">
        </div>
        <div class="form-group">
	        <label for="password">Password</label>
	        <input type="password" class="form-control" name="password" value="">
        </div>
        <div class="form-group">
          <input class="btn btn-outline-primary" type="submit" name="create" value="Create">
        </div>
      </form> <!-- end of add client form -->
     

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>