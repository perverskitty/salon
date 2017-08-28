<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2) { redirect("index.php"); } ?>
      
      <!-- main content -->
      <div class="col-md-9 content">
       
      
      <!-- Dash title and datepicker --> 
      <div class="dashhead">
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Dashboards</h6>
          <h2 class="dashhead-title">Salon Dashboard</h2>
        </div>
        <div class="btn-toolbar dashhead-toolbar">
          <div class="btn-toolbar-item input-with-icon">
            <input type="text" value="Select a date" class="form-control" data-provide="datepicker">
            <span class="icon icon-calendar"></span>
          </div>
        </div>
      </div> <!-- end of dash title and datepicker -->
      
  
      <!-- today's date horizontal rule -->
      <div class="hr-divider mt-3 mb-4">
        <h3 class="hr-divider-content hr-divider-heading"><?php echo date("D, j M Y"); ?></h3>
      </div> <!-- end of today's date horizontal rule -->
      
                  
      <!-- Row of 2 visual stat cards -->
      <div class="row statcards">
        <!-- First stat card -->
        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-success">
            <div class="p-3">
              <span class="statcard-desc">Page views</span>
              <h2 class="statcard-number">
              1,293
                <small class="delta-indicator delta-positive">5%</small>
              </h2>
              <hr class="statcard-hr mb-0">
            </div>
            <canvas id="sparkline1" width="378" height="94" class="sparkline"
            data-chart="spark-line"
            data-dataset="[[28,68,41,43,96,45,100]]"
            data-labels="['a','b','c','d','e','f','g']"
            style="width: 189px; height: 47px;">
            </canvas>
          </div>
        </div> <!-- end of first stat card -->
        <!-- Second stat card -->
        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-danger">
            <div class="p-3">
              <span class="statcard-desc">Downloads</span>
              <h2 class="statcard-number">
              758
                <small class="delta-indicator delta-negative">1.3%</small>
              </h2>
              <hr class="statcard-hr mb-0">
            </div>
            <canvas id="sparkline1" width="378" height="94" class="sparkline"
            data-chart="spark-line"
            data-dataset="[[4,34,64,27,96,50,80]]"
            data-labels="['a', 'b','c','d','e','f','g']"
            style="width: 189px; height: 47px;"></canvas>
          </div>
        </div> <!-- end of second stat card -->
      </div> <!-- Row of 2 visual stat cards -->


      <!-- timeline horizontal rule -->
      <div class="hr-divider mt-3 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Timeline</h3>
      </div> <!-- end of timeline horizontal rule -->


      <!-- Google Timeline example3.1 chart -->
      <div class="col-md-12">
          <div class="chart" id="example3.1"></div>
      </div>   
      
      
      <!-- clients and guests horizontal rule -->
      <div class="hr-divider mt-0 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Client and Guest Bookings</h3>
      </div> <!-- end of timeline horizontal rule -->
     
      <!-- List of today's clients and guests -->
      <div class="list-group mb-3">
        <h6 class="list-group-header"><?php echo date("D, j M Y"); ?></h6>
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
      </div> <!-- end of list of today's clients and guests -->
      
      <!-- Button labelled View all devices -->
      <a href="#" class="btn btn-outline-primary px-3">Add client booking</a>
      <a href="#" class="btn btn-outline-primary px-3">Add guest booking</a>
      
      <!-- Hairdresser -->
      <div class="hr-divider mt-5 mb-4">
        <h3 class="hr-divider-content hr-divider-heading">Peter Cheung</h3>
      </div> <!-- end of timeline horizontal rule -->
     
      <!-- List of today's clients and guests -->
      <div class="list-group mb-3">
        <h6 class="list-group-header"><?php echo date("D, j M Y"); ?></h6>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Matt Smith - 09989 456 456</span>
          <span class="text-muted">12:00 to 14:00</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>James Mars - 09932 436 433</span>
          <span class="text-muted">15:00 to 16:00</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Matt Smith - 09989 456 456</span>
          <span class="text-muted">16:00 to 17:00</span>
        </a>
        <a class="list-group-item list-group-item-action justify-content-between" href="#">
          <span>Matt Smith - 09989 456 456</span>
          <span class="text-muted">17:00 to 19:00</span>
        </a>
      </div> <!-- end of list of today's clients and guests -->
      
      <!-- Button labelled View all devices -->
      <a href="#" class="btn btn-outline-primary px-3">View all devices</a>
      <a href="#" class="btn btn-outline-primary px-3">View all devices</a>
      
      <!-- horizontal rule -->
      <hr class="mt-5">
    
    </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>