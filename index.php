<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <title>Index Template &middot;</title>
    
    
  <!-- Styling links
  ================================================== -->
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
  <link href="assets/css/toolkit-inverse.css" rel="stylesheet">
  <link href="assets/css/application.css" rel="stylesheet">
  <!-- Carousel styling -->
  <link href="assets/css/carousel.css" rel="stylesheet">

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
 
 
  <!-- Fixed top navbar with collapsing menu
  ================================================== --> 
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

    <a class="navbar-brand" href="index.php">
      <span class="icon icon-scissors navbar-brand-icon"></span>
      Hair Salon
    </a>

    <div class="collapse navbar-collapse mr-auto" id="navbarResponsive">
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Our Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Admin Portal</a>
        </li>
      </ul>

      <form class="form-inline hidden-sm-down ml-auto">
        <input class="form-control" type="text" data-action="grow" placeholder="Search">
      </form>
      
    </div>
  </nav> <!-- end of fixed navbar with collapsing menu --> 

  
  <!-- Carousel with three slides
  ================================================== -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
      
    <div class="carousel-inner" role="listbox">
     
      <div class="carousel-item active">
        <img class="first-slide" src="" alt="First slide">
        <div class="container">
          <div class="carousel-caption d-none d-md-block text-left">
            <h1>Book an appointment online</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
          </div>
        </div>
      </div>
      
      <div class="carousel-item">
        <img class="second-slide" src="" alt="Second slide">
        <div class="container">
          <div class="carousel-caption d-none d-md-block">
            <h1>Learn about our services</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse services</a></p>
          </div>
        </div>
      </div>
        
      <div class="carousel-item">
        <img class="third-slide" src="" alt="Third slide">
        <div class="container">
          <div class="carousel-caption d-none d-md-block text-right">
            <h1>Find information about us</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">About us</a></p>
          </div>
        </div>
      </div>
        
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> <!- end of carousel -->


  <!-- Content section
  ================================================== -->
  
  <!-- Wrap rest of page in a container to center the content. --> 
  <div class="container"> 
    
    <!-- A row of three cards -->
    <div class="row">
      
       <div class="col-sm-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-block">
            <h3 class="card-title">Our Services</h3>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Services</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-block">
            <h3 class="card-title">About Us</h3>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">About Us</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-block">
            <h3 class="card-title">Other Info</h3>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Useful Info</a>
          </div>
        </div>
      </div>
      
    </div> <!-- end of row -->
    
    
    <hr class="featurette-divider">


    <!-- Footer
    ================================================== -->
    <footer>
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>Hair Salon &copy; 2017 &middot; <a href="#"> Privacy </a> &middot; <a href="#"> Terms </a></p>
    </footer>

  </div> <!-- end of main content container -->

    
  <!-- Scripting links 
  ================================================== -->
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
  
  
</body>
</html>