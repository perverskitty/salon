<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2 && $session->user_role != 3) { redirect("signout.php"); } ?> 
<?php if($session->user_role == 3) { redirect("clients.index.php"); } ?>
<?php if($session->user_role == 2) { redirect("salon.index.php"); } ?>
     
<?php

if(empty($_GET['id'])) {
  redirect("salon.services.php");
} else {
  
  $service = Service::find_by_id($_GET['id']);
  
  if (isset($_POST['update'])) {
    if($service) {
      $service->name = $_POST['name'];
      $service->duration = $_POST['duration'];
      $service->category_id = $_POST['category_id'];
      $service->cost = $_POST['cost'];
      
      if ($service->save()) { redirect("salon.services.php"); }
    }
  }
}

?>
      
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Salon Admin</h6>
          <h2 class="dashhead-title">Update service</h2>
        </div>
      </div> <!-- title -->  
          
      <!-- delete button -->
      <div class="text-right">
        <a class="btn btn-outline-danger" href="salon.delete-service.php?id=<?php echo $service->id; ?>">
        <span class="icon icon-trash"></span>
        Delete</a>
      </div>
      
      <!-- hr -->
      <div class="hr-divider mt-4 mb-3">
        <h3 class="hr-divider-content hr-divider-heading">Change service details here</h3>
      </div>
                  
      <!-- error message display -->
      <?php Message::display(); ?> 
	
	    <!-- form -->
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
        <div class="flextable-item flextable-primary">
          <button type="button" class="btn btn-outline-primary" onclick="window.location='salon.services.php'">Cancel</button>
        </div> 
        <div class="flextable-item flextable-primary">
          <button type="submit" class="btn btn-outline-success" name="update">Update</button>
        </div>
      </form>
     

      </div> <!-- end of content -->
      
<?php include("includes/footer.php"); ?>