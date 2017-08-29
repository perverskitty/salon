    <div class="col-md-3 sidebar">
      <nav class="sidebar-nav">
       
       
        <!-- sidebar header and logo non-collapsable -->
        <div class="sidebar-header">
          <button class="nav-toggler nav-toggler-md sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-md">
            <span class="sr-only">Toggle nav</span>
          </button>
          <a class="sidebar-brand img-responsive" href="../index.php">
            <span class="icon icon-scissors sidebar-brand-icon"></span>
            Hair Salon
          </a>
        </div>
        
        <?php if($session->is_signed_in()) : ?>
        
        <div class="sidebar-header">
          <h6><?php echo date("D, j M Y"); ?></h6>
        </div>
         
        <!-- sidebar search and list of links collapsable -->
        <div class="collapse nav-toggleable-md" id="nav-toggleable-md">
          
          <ul class="nav nav-pills nav-stacked flex-column">
            <li class="nav-header">Dashboards</li>
            <li class="nav-item">
              <a class="nav-link" href="index.php"><?php echo $session->user_fname."'s Dashboard"; ?></a>
            </li>
            <?php if($session->user_role == 1 || $session->user_role == 2) : ?>
            <li class="nav-item">
              <a class="nav-link" href="overview.php">Salon Dashboard</a>
            </li>
            <li class="nav-header">Admin</li>
            <li class="nav-item">
              <a class="nav-link" href="clients.php">Clients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"href="hairdressers.php">Hairdressers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="schedules.php">Schedules</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="services.php">Services</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="bookings.php">All Bookings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bookings_clients.php">Client Bookings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bookings_guests.php">Guest Bookings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bookings_other.php">Other Bookings</a>
            </li>
            <?php endif; ?>
            <li class="nav-header">My Account</li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php"><?php echo $session->user_fname."'s Account"; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signout.php">Sign Out</a>
            </li>
          </ul>
          <hr class="visible-xs mt-3">
        </div> <!-- end of sidebar search and list of links collapsable -->
        
        <?php endif; ?>
        
      </nav>
    </div> <!-- end of sidebar navigation --> 