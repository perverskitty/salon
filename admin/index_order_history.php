<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <title>Order history &middot;</title>

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
          <a class="sidebar-brand img-responsive" href="../index.html">
            <span class="icon icon-leaf sidebar-brand-icon"></span>
          </a>
        </div>
       
         
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
              <a class="nav-link " href="../index.html">Overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../order-history/index.html">Order history</a>
            </li>
            <li class="nav-item">
              <a class="nav-link "href="../fluid/index.html">Fluid layout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../icon-nav/index.html">Icon nav</a>
            </li>
            <li class="nav-header">More</li>
              <li class="nav-item">
                <a class="nav-link "href="../docs/index.html">Toolkit docs</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="http://getbootstrap.com" target="blank">Bootstrap docs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../index-light/index.html">Light UI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#docsModal" data-toggle="modal">Example modal</a>
            </li>
          </ul>
          <hr class="visible-xs mt-3">
        </div> <!-- end of sidebar search and list of links collapsable -->
        
        
      </nav>
    </div> <!-- end of sidebar navigation --> 
      
      
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title and datepicker -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Dashboards</h6>
          <h2 class="dashhead-title">Order history</h2>
        </div>
        <div class="btn-toolbar dashhead-toolbar">
          <div class="btn-toolbar-item input-with-icon">
            <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
            <span class="icon icon-calendar"></span>
          </div>
        </div>
      </div> <!-- end of dash title and datepicker -->  
      
      
      <!-- Dash table search and action buttons -->
      <div class="flextable table-actions">
        <!-- Search orders input -->
        <div class="flextable-item flextable-primary">
          <div class="btn-toolbar-item input-with-icon">
            <input type="text" class="form-control input-block" placeholder="Search orders">
            <span class="icon icon-magnifying-glass"></span>
          </div>
        </div> <!-- end of search orders input -->
        <div class="flextable-item">
          <div class="btn-group">
            <button type="button" class="btn btn-outline-primary">
              <span class="icon icon-pencil"></span>
            </button>
            <button type="button" class="btn btn-outline-primary">
              <span class="icon icon-erase"></span>
            </button>
          </div>
        </div>
      </div> <!-- end of dash table search and action buttons -->

     
      <!-- Dash table header and data rows -->
      <div class="table-responsive">
        <table class="table" data-sort="table">
          <thead>
            <tr>
              <th><input type="checkbox" class="select-all" id="selectAll"></th>
              <th>Order</th>
              <th>Customer name</th>
              <th>Description</th>
              <th>Date</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10001</a></td>
              <td>First Last</td>
              <td>Admin theme, marketing theme</td>
              <td>01/01/2015</td>
              <td>$200.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10002</a></td>
              <td>Firstname Last</td>
              <td>Admin theme</td>
              <td>01/01/2015</td>
              <td>$100.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10003</a></td>
              <td>Name Another</td>
              <td>Personal blog theme</td>
              <td>01/01/2015</td>
              <td>$100.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10004</a></td>
              <td>One More</td>
              <td>Marketing theme, personal blog theme, admin theme</td>
              <td>01/01/2015</td>
              <td>$300.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10005</a></td>
              <td>Name Right Here</td>
              <td>Personal blog theme, admin theme</td>
              <td>01/02/2015</td>
              <td>$200.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10006</a></td>
              <td>First Last</td>
              <td>Admin theme, marketing theme</td>
              <td>01/01/2015</td>
              <td>$200.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10007</a></td>
              <td>Firstname Last</td>
              <td>Admin theme</td>
              <td>01/01/2015</td>
              <td>$100.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10008</a></td>
              <td>Name Another</td>
              <td>Personal blog theme</td>
              <td>01/01/2015</td>
              <td>$100.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10009</a></td>
              <td>One More</td>
              <td>Marketing theme, personal blog theme, admin theme</td>
              <td>01/01/2015</td>
              <td>$300.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10010</a></td>
              <td>Name Right Here</td>
              <td>Personal blog theme, admin theme</td>
              <td>01/02/2015</td>
              <td>$200.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10011</a></td>
              <td>First Last</td>
              <td>Admin theme, marketing theme</td>
              <td>01/01/2015</td>
              <td>$200.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10012</a></td>
              <td>Firstname Last</td>
              <td>Admin theme</td>
              <td>01/01/2015</td>
              <td>$100.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10013</a></td>
              <td>Name Another</td>
              <td>Personal blog theme</td>
              <td>01/01/2015</td>
              <td>$100.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10014</a></td>
              <td>One More</td>
              <td>Marketing theme, personal blog theme, admin theme</td>
              <td>01/01/2015</td>
              <td>$300.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10015</a></td>
              <td>Name Right Here</td>
              <td>Personal blog theme, admin theme</td>
              <td>01/02/2015</td>
              <td>$200.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10016</a></td>
              <td>First Last</td>
              <td>Admin theme, marketing theme</td>
              <td>01/01/2015</td>
              <td>$200.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10017</a></td>
              <td>Firstname Last</td>
              <td>Admin theme</td>
              <td>01/01/2015</td>
              <td>$100.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10018</a></td>
              <td>Name Another</td>
              <td>Personal blog theme</td>
              <td>01/01/2015</td>
              <td>$100.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10019</a></td>
              <td>One More</td>
              <td>Marketing theme, personal blog theme, admin theme</td>
              <td>01/01/2015</td>
              <td>$300.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="select-row"></td>
              <td><a href="#">#10020</a></td>
              <td>Name Right Here</td>
              <td>Personal blog theme, admin theme</td>
              <td>01/02/2015</td>
              <td>$200.00</td>
          </tbody>
        </table>
      </div> <!-- end of dash table header and data rows -->

     
      <!-- pagination -->
      <div class="text-center">
        <nav>
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div> <!-- end of pagination -->

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

