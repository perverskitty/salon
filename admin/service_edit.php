<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
     
<?php

if(empty($_GET['id'])) {
  redirect("services.php");
} else {
  
  $service = Service::find_by_id($_GET['id']);
  
  if (isset($_POST['update'])) {
    if($service) {
      $service->name = $_POST['name'];
      $service->duration = $_POST['duration'];
      $service->category_id = $_POST['category_id'];
      $service->cost = $_POST['cost'];
      
      if ($service->save()) { redirect("services.php"); }
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
          <h2 class="dashhead-title">Update service</h2>
        </div>
      </div> <!-- end of dash title -->  
      
                  
      <!-- error message display -->
      <h4 class="bg-danger"></h4>
	
	    <!-- update service form -->
      <form id="login-id" action="" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $service->name; ?>">
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" class="form-control" name="duration" value="<?php echo $service->duration; ?>">
        </div>
        <fieldset class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <?php if($service->category_id == 1) : ?>
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio1" value="1" checked>
            <?php else : ?>
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio1" value="1">
            <?php endif; ?>
            Mens
            </label>
            </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <?php if($service->category_id == 2) : ?>
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio2" value="2" checked>
            <?php else : ?>
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio2" value="2">
            <?php endif; ?>
            Ladies
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <?php if($service->category_id == 3) : ?>
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio3" value="3" checked>
            <?php else : ?>
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio3" value="3">
            <?php endif; ?>
            Childrens
            </label>
            </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
            <?php if($service->category_id == 4) : ?>
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio4" value="4" checked>
            <?php else : ?>
            <input class="form-check-input" type="radio" name="category_id" id="categoryRadio4" value="4">
            <?php endif; ?>
            Unisex
            </label>
          </div>
        </fieldset>
        <div class="form-group">
	        <label for="cost">Cost</label>
	        <input type="text" class="form-control" name="cost" value="<?php echo $service->cost; ?>">
        </div>        
        <div class="form-group">
          <a class="btn btn-outline-danger" href="service_delete.php?id=<?php echo $service->id; ?>">Delete</a>
          <input class="btn btn-outline-primary" type="submit" name="update" value="Update">
        </div>
      </form> <!-- end of update service form -->
     

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>