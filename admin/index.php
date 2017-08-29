<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
      
      <!-- main content -->
      <div class="col-md-9 content">
       
      
      <!-- Dashboard title --> 
      <div class="dashhead">
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Dashboards</h6>
          <h2 class="dashhead-title">Welcome <?php echo $session->user_fname; ?></h2>
        </div>
      </div>
      
      
      <!-- Today date horizontal rule -->
      <div class="hr-divider mt-3 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Actions</h3>
      </div> 
      
  
      <!-- Row of stat cards -->
      <div class="row statcards">
       
        <!-- Book haircut stat card -->
        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
          <a href="#">
            <div class="statcard statcard-success">
              <div class="p-3">
                <h5 class="statcard-number">Book haircut</h5>
              </div>
            </div>
          </a>
        </div>
  
        <!-- Cancel booking stat card -->
        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
          <a href="#">
            <div class="statcard statcard-danger">
              <div class="p-3">
                <h5 class="statcard-number">Cancel haircut</h5>
              </div>
            </div>
          </a>
        </div>
  
        <!-- View bookings stat card -->
        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
          <a href="#">
            <div class="statcard statcard-info">
              <div class="p-3">
                <h5 class="statcard-number">Your bookings</h5>
              </div>
            </div>
          </a>
        </div>
  
        <!-- View account stat card -->
        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
          <a href="#">
            <div class="statcard statcard-warning">
              <div class="p-3">
                <h5 class="statcard-number">Your account</h5>
              </div>
            </div>
          </a>
        </div>
        
      </div> <!-- End of stat cards -->


      <!-- horizontal rule -->
      <hr class="mt-5">


      <!-- A row of two lists -->
      <div class="row">
        
        <!-- First list including button -->
        <div class="col-md-6 mb-5">
         
          <!-- List data labelled Countries -->
          <div class="list-group mb-3">
            <h6 class="list-group-header">Countries</h6>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span class="list-group-progress" style="width: 62.4%;"></span>
              United States
              <span class="ml-a text-muted">62.4%</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span class="list-group-progress" style="width: 15.0%;"></span>
              India
              <span class="ml-a text-muted">15.0%</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span class="list-group-progress" style="width: 5.0%;"></span>
              United Kingdom
              <span class="ml-a text-muted">5.0%</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span class="list-group-progress" style="width: 5.0%;"></span>
              Canada
              <span class="ml-a text-muted">5.0%</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span class="list-group-progress" style="width: 4.5%;"></span>
              Russia
              <span class="ml-a text-muted">4.5%</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span class="list-group-progress" style="width: 2.3%;"></span>
              Mexico
              <span class="ml-a text-muted">2.3%</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span class="list-group-progress" style="width: 1.7%;"></span>
              Spain
              <span class="ml-a text-muted">1.7%</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span class="list-group-progress" style="width: 1.5%;"></span>
              France
              <span class="ml-a text-muted">1.5%</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span class="list-group-progress" style="width: 1.4%;"></span>
              South Africa
              <span class="ml-a text-muted">1.4%</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span class="list-group-progress" style="width: 1.2%;"></span>
              Japan
              <span class="ml-a text-muted">1.2%</span>
            </a>
          </div> <!-- end of list data labelled Countries -->
          <a href="#" class="btn btn-outline-primary px-3">All countries</a>
          
        </div> <!-- end of first list including button -->
  
        <!-- Second list including button -->
        <div class="col-md-6 mb-5">
        
          <!-- List data labelled Most visited pages -->
          <div class="list-group mb-3">
            <h6 class="list-group-header">Most visited pages</h6>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span>/ (Logged out)</span>
              <span class="mr-a text-muted">3,929,481</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span>/ (Logged in)</span>
              <span class="mr-a text-muted">1,143,393</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span>/tour</span>
              <span class="mr-a text-muted">938,287</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span>/features/something</span>
              <span class="mr-a text-muted">749,393</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span>/features/another-thing</span>
              <span class="mr-a text-muted">695,912</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span>/users/username</span>
              <span class="mr-a text-muted">501,938</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span>/page-title</span>
              <span class="mr-a text-muted">392,842</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span>/some/page-slug</span>
              <span class="mr-a text-muted">298,183</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span>/another/directory/and/page-title</span>
              <span class="mr-a text-muted">193,129</span>
            </a>
            <a class="list-group-item list-group-item-action justify-content-between" href="#">
              <span>/one-more/page/directory/file-name</span>
              <span class="mr-a text-muted">93,382</span>
            </a>
          </div> <!-- end of list data labelled Most visited pages -->
          <a href="#" class="btn btn-outline-primary px-3">View all pages</a>
          
        </div> <!-- end of second list including button -->
        
      </div> <!-- end of a row of two lists -->


      <!-- List labelled Devices and resolutions -->
      <div class="list-group mb-3">
        <h6 class="list-group-header">Devices and resolutions</h6>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Desktop (1920x1080)</span>
          <span class="text-muted">3,929,481</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Desktop (1366x768)</span>
          <span class="text-muted">1,143,393</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Desktop (1440x900)</span>
          <span class="text-muted">938,287</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Desktop (1280x800)</span>
          <span class="text-muted">749,393</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Tablet (1024x768)</span>
          <span class="text-muted">695,912</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Tablet (768x1024)</span>
          <span class="text-muted">501,938</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Phone (320x480)</span>
          <span class="text-muted">392,842</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Phone (720x450)</span>
          <span class="text-muted">298,183</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Desktop (2560x1080)</span>
          <span class="text-muted">193,129</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Desktop (2560x1600)</span>
          <span class="text-muted">93,382</span>
        </a>
      </div> <!-- end of list labelled Devices and resolutions -->
      
      <!-- Button labelled View all devices -->
      <a href="#" class="btn btn-outline-primary px-3">View all devices</a>
    
    </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>