<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
     
<?php


?>
      
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Add client</h2>
        </div>
      </div> <!-- end of dash title -->  
      
      
      <!-- Dash table search and action buttons -->
      <div class="flextable table-actions">
        <!-- Search orders input -->
        <div class="flextable-item flextable-primary">
          <div class="btn-toolbar-item input-with-icon">
            <input type="text" class="form-control input-block" placeholder="Search clients">
            <span class="icon icon-magnifying-glass"></span>
          </div>
        </div> <!-- end of search orders input -->
        <div class="flextable-item">
          <div class="btn-group">
            <button type="button" class="btn btn-outline-primary" onclick="window.location='add_client.php'">
              <span class="icon icon-add-user"></span> Add client
            </button>
          </div>
        </div>
      </div> <!-- end of dash table search and action buttons -->

     


      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>