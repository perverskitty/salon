<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <title>Fluid &middot;</title>
    
  <!-- Style links -->
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
  <link href="assets/css/toolkit-inverse.css" rel="stylesheet">
  <link href="assets/css/application.css" rel="stylesheet">

  <style>
    /* note: this is a hack for ios iframe for bootstrap themes shopify page */
    /* this chunk of css is not part of the toolkit :) */
    body {
      width: 1px;
      min-width: 100%;
      *width: 100%;
    }
  </style>
</head>

<body class="with-top-navbar">
 
 
  <!-- Top navbar navigation menu -->
  <nav class="navbar navbar-toggleable-sm fixed-top navbar-inverse bg-inverse app-navbar">
    <button
      class="navbar-toggler navbar-toggler-right hidden-md-up"
      type="button"
      data-toggle="collapse"
      data-target="#navbarResponsive"
      aria-controls="navbarResponsive"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="../index.html">
      <span class="icon icon-leaf navbar-brand-icon"></span>
      Dashboard
    </a>

    <div class="collapse navbar-collapse mr-auto" id="navbarResponsive">
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../order-history/index.html">Order History</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../fluid/index.html">Fluid layout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../icon-nav/index.html">Icon nav</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../docs/index.html">Docs</a>
        </li>
      </ul>

      <form class="form-inline hidden-sm-down ml-auto">
        <input class="form-control" type="text" data-action="grow" placeholder="Search">
      </form>
    </div>
  </nav> <!-- end of top navbar navigation menu -->


  <!-- fluid and spacious container for page content -->
  <div class="container-fluid container-fluid-spacious">
   
   
    <!-- Page title and datepicker -->
    <div class="dashhead mt-4">
       <div class="dashhead-titles">
        <h6 class="dashhead-subtitle">Dashboards</h6>
        <h2 class="dashhead-title">Overview</h2>
      </div>
      <div class="btn-toolbar dashhead-toolbar">
        <div class="btn-toolbar-item input-with-icon">
          <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
          <span class="icon icon-calendar"></span>
        </div>
      </div>
    </div> <!-- end of page title and datepicker -->

   
    <!-- Quick stats horizontal rule -->
    <div class="hr-divider mt-3 mb-5">
      <h3 class="hr-divider-content hr-divider-heading">Quick stats</h3>
    </div> <!-- end of quick stats horizontal rule -->
    
    
    <!-- Row of 4 visual stat cards -->
    <div class="row statcards">
  
      <!-- first stat card -->
      <div class="col-md-6 col-lg-3 mb-5 mb-md-3">
        <div class="statcard">
          <div class="p-a">
            <span class="statcard-desc">Page views</span>
            <h2 class="statcard-number">
            12,938
              <small class="badge badge-success">5%</small>
            </h2>
          </div>
          <canvas id="sparkline1" width="378" height="94" class="sparkline"
          data-chart="spark-line"
          data-dataset="[[28,68,41,43,96,45,100]]"
          data-dataset-options="[{borderColor: '#1ca8dd', backgroundColor:'rgba(28,168,221,.03)'}]"
          data-labels="['a', 'b','c','d','e','f','g']"
          style="width: 189px; height: 47px;"></canvas>
        </div>
      </div> <!-- end of first stat card -->
  
      <!-- Second stat card -->
      <div class="col-md-6 col-lg-3 mb-5 mb-md-3">
        <div class="statcard">
          <div class="p-a">
            <span class="statcard-desc">Downloads</span>
            <h2 class="statcard-number">
            758
              <small class="badge badge-danger">1.3%</small>
            </h2>
          </div>
          <canvas id="sparkline1" width="378" height="94" class="sparkline"
          data-chart="spark-line"
          data-dataset="[[4,34,64,27,96,50,80]]"
          data-dataset-options="[{borderColor: '#1ca8dd', backgroundColor:'rgba(28,168,221,.03)'}]"
          data-labels="['a','b','c','d','e','f','g']"
          style="width: 189px; height: 47px;"></canvas>
        </div>
      </div> <!-- end of second stat card -->
  
      <!-- Third stat card -->
      <div class="col-md-6 col-lg-3 mb-5 mb-md-3">
        <div class="statcard">
          <div class="p-a">
            <span class="statcard-desc">Sign-ups</span>
            <h2 class="statcard-number">
            1,293
              <small class="badge badge-success">6.75%</small>
            </h2>
          </div>
          <canvas id="sparkline1" width="378" height="94" class="sparkline"
          data-chart="spark-line"
          data-dataset="[[12,38,32,60,36,54,68]]"
          data-dataset-options="[{borderColor: '#1ca8dd', backgroundColor:'rgba(28,168,221,.03)'}]"
          data-labels="['a','b','c','d','e','f','g']"
          style="width: 189px; height: 47px;"></canvas>
        </div>
      </div> <!-- end of third stat card -->
  
      <!-- Fourth stat card -->
      <div class="col-md-6 col-lg-3 mb-5 mb-md-3">
        <div class="statcard">
          <div class="p-a">
            <span class="statcard-desc">Downloads</span>
            <h2 class="statcard-number">
            758
              <small class="badge badge-success">1.3%</small>
            </h2>
          </div>
          <canvas id="sparkline1" width="378" height="94" class="sparkline"
          data-chart="spark-line"
          data-dataset="[[43,48,52,58,50,95,100]]"
          data-dataset-options="[{borderColor: '#1ca8dd', backgroundColor:'rgba(28,168,221,.03)'}]"
          data-labels="['a','b','c','d','e','f','g']"
          style="width: 189px; height: 47px;"></canvas>
        </div>
      </div> <!-- end of fourth stat card -->
  
    </div> <!-- end of row of 4 visual stat cards -->

   
    <!-- horizontal rule with tablist -->
    <div class="hr-divider my-4">
      <ul class="nav nav-pills hr-divider-content hr-divider-nav" role="tablist">
        <li class="nav-item" role="presentation">
          <a href="#sales" class="nav-link active" role="tab" data-toggle="tab" aria-controls="sales">Sales</a>
        </li>
        <li class="nav-item" role="presentation">
          <a href="#inventory" class="nav-link" role="tab" data-toggle="tab" aria-controls="inventory">Inventory</a>
        </li>
        <li class="nav-item" role="presentation">
          <a href="#profit" class="nav-link" role="tab" data-toggle="tab" aria-controls="profit">Profit</a>
        </li>
      </ul>
    </div> <!-- end of horizontal rule with tablist -->
    
    
    <!-- Tablist content -->
    <div class="tab-content">
     
      <!-- First tabpanel content labelled Sales -->
      <div role="tabpanel" class="tab-pane active" id="sales">
        <div class="ex-line-graphs">
          <canvas
          class="ex-line-graph"
          width="600" height="350"
          data-chart="line"
          data-dataset="[[2500, 3300, 2512, 2775, 2498, 3512, 2925, 4275, 3507, 3825, 3445, 3985]]"
          data-labels="['','Aug 29','','','Sept 5','','','Sept 12','','','Sept 19','']"
          data-dark="true">
          </canvas>
        </div>
      </div> <!-- end of first tabpanel content labelled Sales -->
      
      <!-- Second tabpanel content labelled Inventory -->
      <div role="tabpanel" class="tab-pane" id="inventory">
        <div class="ex-line-graphs">
          <canvas
          class="ex-line-graph"
          width="600" height="400"
          data-chart="bar"
          data-dark="true"
          data-labels="['August','September','October','November','December','January','February']"
          data-dataset="[[65, 59, 80, 81, 56, 55, 40], [28, 48, 40, 19, 86, 27, 90]]"
          data-dataset-options="[{label: 'First dataset'}, {label: 'Second dataset'}]">
          </canvas>
        </div>
      </div> <!-- end of second tabpanel content labelled Inventory -->
      
      <!-- Third tabpanel content labelled Profit -->
      <div role="tabpanel" class="tab-pane" id="profit">
        <div class="row ex-graphs text-center">
         
          <div class="col-sm-4 mb-4 mb-sm-0">
            <div class="w-3 mx-auto">
              <canvas
              class="ex-graph"
              width="200" height="200"
              data-chart="doughnut"
              data-dataset="[230, 130]"
              data-dataset-options="{ borderColor: '#252830', backgroundColor: ['#1ca8dd', '#1bc98e'] }"
              data-labels="['Returning', 'New']">
              </canvas>
            </div>
            <strong class="text-muted">Traffic</strong>
            <h3>New vs Returning</h3>
          </div>
          
          <div class="col-sm-4 mb-4 mb-sm-0">
            <div class="w-3 mx-auto">
              <canvas
              class="ex-graph"
              width="200" height="200"
              data-chart="doughnut"
              data-dataset="[330,30]"
              data-dataset-options="{ borderColor: '#252830', backgroundColor: ['#1ca8dd', '#1bc98e'] }"
              data-labels="['Returning', 'New']">
              </canvas>
            </div>
            <strong class="text-muted">Revenue</strong>
            <h3>New vs Recurring</h3>
          </div>
      
          <div class="col-sm-4 mb-4 mb-sm-0">
            <div class="w-3 mx-auto">
              <canvas
              class="ex-graph"
              width="200" height="200"
              data-chart="doughnut"
              data-dataset="[100,260]"
              data-dataset-options="{ borderColor: '#252830', backgroundColor: ['#1ca8dd', '#1bc98e'] }"
              data-labels="['Referrals', 'Direct']">
              </canvas>
            </div>
            <strong class="text-muted">Traffic</strong>
            <h3>Direct vs Referrals</h3>
          </div>
    
        </div>
      </div> <!-- end of third tabpanel content labelled Profit -->
  
    </div> <!-- end of tablist content -->

   
    <!-- Other horizontal rule -->
    <div class="hr-divider mt-5 mb-4">
      <h3 class="hr-divider-content hr-divider-heading">Other</h3>
    </div>
    
    
    <!-- Row of three list groups -->
    <div class="row">      
      
      <!-- First list group labelled Countries -->
      <div class="col-lg-4 mb-5">
        <div class="list-group mb-3">
          <h6 class="list-group-header">
          Countries
          </h6>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span class="list-group-progress" style="width: 62.4%;"></span>
            <span>United States</span>
            <span class="text-muted">62.4%</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span class="list-group-progress" style="width: 15.0%;"></span>
            <span>India</span>
            <span class="text-muted">15.0%</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span class="list-group-progress" style="width: 5.0%;"></span>
            <span>United Kingdom</span>
            <span class="text-muted">5.0%</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span class="list-group-progress" style="width: 5.0%;"></span>
            <span>Canada</span>
            <span class="text-muted">5.0%</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span class="list-group-progress" style="width: 4.5%;"></span>
            <span>Russia</span>
            <span class="text-muted">4.5%</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span class="list-group-progress" style="width: 2.3%;"></span>
            <span>Mexico</span>
            <span class="text-muted">2.3%</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span class="list-group-progress" style="width: 1.7%;"></span>
            <span>Spain</span>
            <span class="text-muted">1.7%</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span class="list-group-progress" style="width: 1.5%;"></span>
            <span>France</span>
            <span class="text-muted">1.5%</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span class="list-group-progress" style="width: 1.4%;"></span>
            <span>South Africa</span>
            <span class="text-muted">1.4%</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span class="list-group-progress" style="width: 1.2%;"></span>
            <span>Japan</span>
            <span class="text-muted">1.2%</span>
          </a>
        </div>
        <a href="#" class="btn btn-outline-primary px-3">All countries</a>
      </div> <!-- end of first list group labelled Countries -->
      
      
      <!-- Second list group labelled Most visited pages -->
      <div class="col-lg-4 mb-5">
        <div class="list-group mb-3">
          <h6 class="list-group-header">
          Most visited pages
          </h6>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span>/ (Logged out)</span>
            <span class="text-muted">3,929,481</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span>/ (Logged in)</span>
            <span class="text-muted">1,143,393</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span>/tour</span>
            <span class="text-muted">938,287</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span>/features/something</span>
            <span class="text-muted">749,393</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span>/features/another-thing</span>
            <span class="text-muted">695,912</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span>/users/username</span>
            <span class="text-muted">501,938</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span>/page-title</span>
            <span class="text-muted">392,842</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span>/some/page-slug</span>
            <span class="text-muted">298,183</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span>/another/directory/and/page-title</span>
            <span class="text-muted">193,129</span>
          </a>
          <a class="list-group-item list-group-item-action justify-content-between" href="#">
            <span>/one-more/page/directory/file-name</span>
            <span class="text-muted">93,382</span>
          </a>
        </div>
        <a href="#" class="btn btn-outline-primary px-3">View all pages</a>
      </div> <!-- end of second list group labelled Most visited pages -->
  
  
      <!-- Third list group labelled Devices and resolutions -->
      <div class="col-lg-4 mb-5">
        <div class="list-group mb-3">
          <h6 class="list-group-header">
          Devices and resolutions
          </h6>
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
        </div>
        <a href="#" class="btn btn-outline-primary px-3">View all pages</a>
      </div> <!-- end of third list group labelled Devices and resolutions -->
    
    </div> <!-- end of row of three list groups -->

  </div> <!-- end of fluid and spacious container for page content -->
    
    
  <!-- JS links -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/tether.min.js"></script>
  <script src="assets/js/chart.js"></script>
  <script src="assets/js/tablesorter.min.js"></script>
  <script src="assets/js/toolkit.js"></script>
  <script src="assets/js/application.js"></script>
  <script>
    // execute/clear BS loaders for docs
    $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
  </script>
  
  
</body> <!-- end of body -->

</html>