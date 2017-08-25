<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1) { redirect("index.php"); } ?>
     
<?php

$service = new Service();
if (isset($_POST['create'])) {  
  if($service) {
      $service->name = $_POST['name'];
      $service->duration = $_POST['duration'];
      $service->category_id = $_POST['category_id'];
      $service->cost = $_POST['cost'];
    
      if ($service->save()) { redirect("services.php"); }
  }
}

?>
     
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Create service</h2>
        </div>
      </div> <!-- end of dash title -->  
     
     
      <!-- error message display -->
      <h4 class="bg-danger"></h4>
	
	    <!-- add service form -->
      <form id="login-id" action="" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <select class="form-control" name="duration">
              <option selected>Open this select menu</option>
              <option value="00:30:00">00:30</option>
              <option value="01:00:00">01:00</option>
              <option value="01:30:00">01:30</option>
              <option value="02:00:00">02:00</option>
              <option value="02:30:00">02:30</option>
              <option value="03:00:00">03:00</option>
              <option value="03:30:00">03:30</option>
              <option value="04:00:00">04:00</option>
              <option value="04:30:00">04:30</option>
              <option value="05:00:00">05:00</option>
            </select>
        </div>
        <fieldset class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio1" value="1">
            Mens
            </label>
            </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio2" value="2">
            Ladies
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio3" value="3">
            Childrens
            </label>
            </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio4" value="4">
            Unisex
            </label>
          </div>
        </fieldset>
        <div class="form-group">
          <label for="cost">Cost</label>
          <input type="text" class="form-control" name="cost">
        </div>
        <div class="form-group">
          <input class="btn btn-outline-primary" type="submit" name="create" value="Create">
        </div>
      </form> <!-- end of add service form -->
     

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>