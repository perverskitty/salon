<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1) { redirect("index.php"); } ?>
     
<?php

$hairdresser = new Hairdresser();
if (isset($_POST['create'])) {  
  if($hairdresser) {
      $hairdresser->first_name = $_POST['first_name'];
      $hairdresser->last_name = $_POST['last_name'];
      $hairdresser->gender = $_POST['gender'];
      $hairdresser->tel = $_POST['tel'];
      $hairdresser->role_id = $_POST['role_id'];
      $hairdresser->email = $_POST['email'];
      $hairdresser->password = $_POST['password'];
    
      if ($hairdresser->save()) { redirect("hairdressers.php"); }
  }
}

?>
     
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Create hairdresser</h2>
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
            <input class="form-check-input" type="radio" name="gender" id="hairdresserGenderRadio1" value="1">
            Male
            </label>
            </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <input class="form-check-input" type="radio" name="gender" id="hairdresserGenderRadio2" value="2">
            Female
            </label>
          </div>
        </fieldset>
        <div class="form-group">
          <label for="tel">Phone</label>
          <input type="text" class="form-control" name="tel" value="">
        </div>
        <fieldset class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <input class="form-check-input" type="radio" name="role_id" id="hairdresserRoleRadio1" value="2">
            Hairdresser
            </label>
            </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <input class="form-check-input" type="radio" name="role_id" id="hairdresserRoleRadio2" value="1">
            Manager
            </label>
          </div>
        </fieldset>
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