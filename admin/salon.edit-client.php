<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2 && $session->user_role != 3) { redirect("signout.php"); } ?> 
<?php if($session->user_role == 3) { redirect("clients.index.php"); } ?>
     
<?php

if(empty($_GET['id'])) {
  redirect("salon.clients.php");
} else {
  
  $sql = "SELECT * FROM users WHERE ";
  $sql .= "role_id = 1 OR role_id = 2";

  $hairdressers = Hairdresser::find_by_query($sql);
  
  $client = Client::find_by_id($_GET['id']);
  
  if (isset($_POST['update'])) {
    if($client) {
      $client->first_name = $_POST['first_name'];
      $client->last_name = $_POST['last_name'];
      $client->gender = $_POST['gender'];
      $client->tel = $_POST['tel'];
      $client->hairdresser_id = $_POST['hairdresser_id'];
      $client->email = $_POST['email'];
      $client->password = $_POST['password'];
      
      if ($client->save()) { redirect("salon.clients.php"); }
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
          <h2 class="dashhead-title">Update client</h2>
        </div>
      </div> <!-- end of dash title -->  
      
                  
      <!-- error message display -->
      <h4 class="bg-danger"></h4>
	
	    <!-- update client form -->
      <form id="login-id" action="" method="post">
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" name="first_name" value="<?php echo $client->first_name; ?>">
        </div>
        <div class="form-group">
            <label for="last_Name">Last name</label>
            <input type="text" class="form-control" name="last_name" value="<?php echo $client->last_name; ?>">
        </div>
        <fieldset class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <?php if($client->gender == 1) : ?>
            <input class="form-check-input" type="radio" name="gender" id="clientGenderRadio1" value="1" checked>
            <?php else : ?>
            <input class="form-check-input" type="radio" name="gender" id="clientGenderRadio1" value="1">
            <?php endif; ?>
            Male
            </label>
            </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <?php if($client->gender == 2) : ?>
            <input class="form-check-input" type="radio" name="gender" id="clientGenderRadio2" value="2" checked>
            <?php else : ?>
            <input class="form-check-input" type="radio" name="gender" id="clientGenderRadio2" value="2">
            <?php endif; ?>
            Female
            </label>
          </div>
        </fieldset>
        <div class="form-group">
          <label for="tel">Phone</label>
          <input type="text" class="form-control" name="tel" value="<?php echo $client->tel; ?>">
        </div>
        <div class="form-group">
          <label for="hairdresser_id">Hairdresser</label>
          <select class="form-control" name="hairdresser_id">
            <?php if ($client->hairdresser_id == 0) : ?>
           
                <option value="0">No preference</option>
                <?php foreach ($hairdressers as $hairdresser) : ?>
                <option value="<?php echo $hairdresser->id; ?>"><?php echo $hairdresser->first_name." ".$hairdresser->last_name; ?></option>
                <?php endforeach; ?>
            
            <?php else : ?>
            
                <option value="<?php echo $client->hairdresser_id; ?>"><?php echo Hairdresser::name($client->hairdresser_id); ?></option>
                
                <?php foreach ($hairdressers as $hairdresser) : ?>
                    <?php if ($client->hairdresser_id != $hairdresser->id) : ?>
                    <option value="<?php echo $hairdresser->id; ?>"><?php echo $hairdresser->first_name." ".$hairdresser->last_name; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                
                <option value="">No preference</option>
            
            <?php endif; ?>
          </select>
        </div>
        <div class="form-group">
	        <label for="email">Email</label>
	        <input type="text" class="form-control" name="email" value="<?php echo $client->email; ?>">
        </div>        
        <div class="form-group">
	        <label for="password">Password</label>
	        <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
          <?php if($session->user_role == 1) : ?>
          <a class="btn btn-outline-danger" href="salon.delete-client.php?id=<?php echo $client->id; ?>">Delete</a>
          <?php endif; ?>
          <input class="btn btn-outline-primary" type="submit" name="update" value="Update">
        </div>
      </form> <!-- end of update client form -->
     

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>