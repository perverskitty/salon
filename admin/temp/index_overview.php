<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <title>Overview &middot;</title>
  
  <!-- Styling links -->
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

<body>
 
  <div class="container">
    <div class="row">
      
      <!-- Sidebar navigation -->
      <div class="col-md-3 sidebar">
        <nav class="sidebar-nav">
         
          <!-- sidebar header and logo non-collapsable -->
          <div class="sidebar-header">
            <button class="nav-toggler nav-toggler-md sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-md">
              <span class="sr-only">Toggle nav</span>
            </button>
            <a class="sidebar-brand img-responsive" href="index.php">
              <span class="icon icon-scissors sidebar-brand-icon"></span>
            </a>
          </div> <!-- end of sidebar header and logo non-collapsable -->

          <!-- sidebar search and list of links collapsable -->
          <div class="collapse nav-toggleable-md" id="nav-toggleable-md">
            <form class="sidebar-form">
              <input class="form-control" type="text" placeholder="Search...">
              <button type="submit" class="btn-link">
                <span class="icon icon-magnifying-glass"></span>
              </button>
            </form>
            
            <ul class="nav nav-pills nav-stacked flex-column">
              <li class="nav-header">Dashboards</li>
              <li class="nav-item">
                <a class="nav-link active" href="index.html">Overview</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="order-history/index.html">Order history</a>
              </li>
              <li class="nav-item">
                <a class="nav-link "href="fluid/index.html">Fluid layout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="icon-nav/index.html">Icon nav</a>
              </li>
              <li class="nav-header">More</li>
              <li class="nav-item">
                <a class="nav-link "href="docs/index.html">Toolkit docs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://getbootstrap.com" target="blank">Bootstrap docs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="index-light/index.html">Light UI</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#docsModal" data-toggle="modal">
                  Example modal
                </a>
              </li>
            </ul>
            <hr class="visible-xs mt-3">
          </div> <!-- end of sidebar search and list of links collapsable -->
          
        </nav>
      </div> <!-- end of sidebar navigation -->
      
      <!-- main content -->
      <div class="col-md-9 content">
       
      
      <!-- Dash title and datepicker --> 
      <div class="dashhead">
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
      </div> <!-- end of dash title and datepicker -->
      
      <!-- horizontal rule -->
      <hr class="mt-3">

      <!-- Three doughnut graphs -->
      <div class="row text-center mt-5">
  
        <!-- First doughnut graph -->
        <div class="col-md-4 mb-4 mb-md-3">
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
          <h4>New vs Returning</h4>
        </div> <!-- end of first doughnut graph -->
  
        <!-- Second doughnut graph -->
        <div class="col-md-4 mb-4 mb-md-3">
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
          <h4>New vs Recurring</h4>
        </div> <!-- end of second doughnut graph -->
  
        <!-- Third doughnut graph -->
        <div class="col-md-4 mb-4 mb-md-3">
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
          <h4>Direct vs Referrals</h4>
        </div> <!-- end of Third doughnut graph -->
  
      </div> <!-- end of three doughnut graphs -->


      <!-- Quick stats horizontal rule -->
      <div class="hr-divider mt-5 mb-3">
        <h3 class="hr-divider-content hr-divider-heading">Quick stats</h3>
      </div> <!-- end of quick stats horizontal rule -->
      
      
      <!-- Row of 4 visual stat cards -->
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
  
        <!-- Third stat card -->
        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-info">
            <div class="p-3">
              <span class="statcard-desc">Sign-ups</span>
              <h2 class="statcard-number">
              1,293
                <small class="delta-indicator delta-positive">6.75%</small>
              </h2>
              <hr class="statcard-hr mb-0">
            </div>
            <canvas id="sparkline1" width="378" height="94" class="sparkline"
            data-chart="spark-line"
            data-dataset="[[12,38,32,60,36,54,68]]"
            data-labels="['a', 'b','c','d','e','f','g']"
            style="width: 189px; height: 47px;"></canvas>
          </div>
        </div> <!-- end of third stat card -->
  
        <!-- Fourth stat card -->
        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
          <div class="statcard statcard-warning">
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
            data-dataset="[[43,48,52,58,50,95,100]]"
            data-labels="['a', 'b','c','d','e','f','g']"
            style="width: 189px; height: 47px;"></canvas>
          </div>
        </div> <!-- end of fourth stat card -->
  
      </div> <!-- Row of 4 visual stat cards -->


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
      
    </div> <!-- end of row -->
  </div> <!-- end of container -->


  <!-- Example modal -->
  <div id="docsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Example modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <p>You're looking at an example modal in the dashboard theme.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cool, got it!</button>
        </div>
      </div>
    </div>
  </div>

  
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

