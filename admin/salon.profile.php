<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2 && $session->user_role != 3) { redirect("signout.php"); } ?> 
<?php if($session->user_role == 3) { redirect("clients.index.php"); } ?>
     
<?php
  
$hairdresser = Hairdresser::find_by_id($session->user_id);
  
if (isset($_POST['updateProfile'])) {
  if($hairdresser) {
    $hairdresser->first_name = $_POST['first_name'];
    $hairdresser->last_name = $_POST['last_name'];
    $hairdresser->gender = $_POST['gender'];
    $hairdresser->tel = $_POST['tel'];
    $hairdresser->email = $_POST['email'];
      
    if ($hairdresser->save()) { redirect("salon.index.php"); }
  }
}

if (isset($_POST['updatePassword'])) {
  if($hairdresser) {
    
    if ($_POST['newPassword1'] == '' || $_POST['newPassword2'] == '') {
      Message::setMsg("Please complete both password fields", "error");
    } elseif ($_POST['newPassword1'] != $_POST['newPassword2']) {
      Message::setMsg("The password entered in both fields must match", "error");
    } else {
      $hairdresser->password = $_POST['newPassword1'];  
      if ($hairdresser->update_password()) { redirect("salon.index.php"); }
    }
  }
}

?>
      
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h3 class="dashhead-title">Your account</h3>
        </div>
      </div> <!-- end of dash title -->  
      
      <!-- hr -->
      <div class="hr-divider mt-4 mb-3">
        <h3 class="hr-divider-content hr-divider-heading">Change your profile here</h3>
      </div>
                  
      <!-- error message display -->
      <?php Message::display(); ?>
	
	    <!-- profile form -->
      <form action="" method="post">
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
          <label for="tel">Mobile</label>
          <input type="text" class="form-control" name="tel" value="<?php echo $hairdresser->tel; ?>">
        </div>
        <div class="form-group">
	        <label for="email">Email</label>
	        <input type="text" class="form-control" name="email" value="<?php echo $hairdresser->email; ?>">
        </div>        
        <div class="flextable-item flextable-primary">
          <button type="button" class="btn btn-outline-danger" onclick="window.location='salon.index.php'">Cancel</button>
        </div> 
        <div class="flextable-item flextable-primary">
          <button type="submit" class="btn btn-outline-primary" name="updateProfile">Update</button>
        </div>
      </form>
      
      <!-- hr -->
      <div class="hr-divider mt-5 mb-3">
        <h3 class="hr-divider-content hr-divider-heading">Change your password here</h3>
      </div>
      
	    <!-- password form -->
      <form action="" method="post">
        <div class="form-group">
	        <label for="email">Password</label>
	        <input type="password" class="form-control" name="newPassword1" placeholder="Enter New Password">
        </div>
        <div class="form-group">
	        <input type="password" class="form-control" name="newPassword2" placeholder="Re-type New Password">
        </div>         
        <div class="flextable-item flextable-primary">
          <button type="button" class="btn btn-outline-danger" onclick="window.location='salon.index.php'">Cancel</button>
        </div> 
        <div class="flextable-item flextable-primary">
          <button type="submit" class="btn btn-outline-primary" name="updatePassword">Update</button>
        </div>
      </form>      
     
    </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>