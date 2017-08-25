<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1) { redirect("index.php"); } ?>
     
<?php

if(empty($_GET['id'])) {
  redirect("hairdressers.php");
} else {
  
  $hairdresser = Hairdresser::find_by_id($_GET['id']);
  
  if (isset($_POST['update'])) {
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
}

?>
      
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Update hairdresser</h2>
        </div>
      </div> <!-- end of dash title -->  
      
                  
      <!-- error message display -->
      <h4 class="bg-danger"></h4>
	
	    <!-- update client form -->
      <form id="login-id" action="" method="post">
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" name="first_name" value="<?php echo $hairdresser->first_name; ?>">
        </div>
        <div class="form-group">
            <label for="last_Name">Last name</label>
            <input type="text" class="form-control" name="last_name" value="<?php echo $hairdresser->last_name; ?>">
        </div>
        <fieldset class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <?php if($hairdresser->gender == 1) : ?>
            <input class="form-check-input" type="radio" name="gender" id="hairdresserGenderRadio1" value="1" checked>
            <?php else : ?>
            <input class="form-check-input" type="radio" name="gender" id="hairdresserGenderRadio1" value="1">
            <?php endif; ?>
            Male
            </label>
            </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <?php if($hairdresser->gender == 2) : ?>
            <input class="form-check-input" type="radio" name="gender" id="hairdresserGenderRadio2" value="2" checked>
            <?php else : ?>
            <input class="form-check-input" type="radio" name="gender" id="hairdresserGenderRadio2" value="2">
            <?php endif; ?>
            Female
            </label>
          </div>
        </fieldset>
        <div class="form-group">
          <label for="tel">Phone</label>
          <input type="text" class="form-control" name="tel" value="<?php echo $hairdresser->tel; ?>">
        </div>
        <fieldset class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <?php if($hairdresser->role_id == 2) : ?>
            <input class="form-check-input" type="radio" name="role_id" id="hairdresserRoleRadio1" value="2" checked>
            <?php else : ?>
            <input class="form-check-input" type="radio" name="role_id" id="hairdresserRoleRadio1" value="2">
            <?php endif; ?>
            Hairdresser
            </label>
            </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <?php if($hairdresser->role_id == 1) : ?>
            <input class="form-check-input" type="radio" name="role_id" id="hairdresserRoleRadio2" value="1" checked>
            <?php else : ?>
            <input class="form-check-input" type="radio" name="role_id" id="hairdresserRoleRadio2" value="1">
            <?php endif; ?>
            Manager
            </label>
          </div>
        </fieldset>
        <div class="form-group">
	        <label for="email">Email</label>
	        <input type="text" class="form-control" name="email" value="<?php echo $hairdresser->email; ?>">
        </div>        
        <div class="form-group">
	        <label for="password">Password</label>
	        <input type="password" class="form-control" name="password" value="<?php echo $hairdresser->password; ?>">
        </div>
        <div class="form-group">
          <a class="btn btn-outline-danger" href="hairdresser_delete.php?id=<?php echo $hairdresser->id; ?>">Delete</a>
          <input class="btn btn-outline-primary" type="submit" name="update" value="Update">
        </div>
      </form> <!-- end of update client form -->
     

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>