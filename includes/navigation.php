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
        <?php if($session->is_signed_in() && $session->user_role == 3) : ?>
        <li class="nav-item">
          <a class="nav-link" href="admin/clients.index.php">Admin Portal</a>
        </li>
        <?php endif; ?>
        
        <?php if($session->is_signed_in() && $session->user_role == 1 || $session->is_signed_in() && $session->user_role == 2) : ?>
        <li class="nav-item">
          <a class="nav-link" href="admin/salon.index.php">Admin Portal</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
    
    <?php if($session->is_signed_in()) : ?>
                   
    <ul class="navbar-nav mr-right">
      <li class="nav-item">
        <a class="btn btn-outline-danger my-2 my-sm-0" href="admin/signout.php">Sign out</a>
      </li>
    </ul>       
                
    <?php else : ?>
                    
    <ul class="navbar-nav mr-right">
      <li class="nav-item">
        <a class="btn btn-outline-primary my-2 my-sm-0" href="admin/signin.php">Sign in</a>
      </li>
    </ul>            
                
    <?php endif; ?>
    
  </nav> <!-- end of fixed navbar with collapsing menu --> 