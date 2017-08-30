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
         
        <!-- sidebar search and list of links collapsable -->
        <div class="collapse nav-toggleable-md" id="nav-toggleable-md">
          
          <ul class="nav nav-pills nav-stacked flex-column">
            <li class="nav-header">Your account</li>
            
            <?php if($session->user_role == 3) : ?>
            <li class="nav-item">
              <a class="nav-link" href="clients.index.php">Your Homepage</a>
            </li>
            <?php endif; ?>
            
            <?php if($session->user_role == 1 || $session->user_role == 2) : ?>
            <li class="nav-item">
              <a class="nav-link" href="salon.index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="salon.overview.php">Salon Dashboard</a>
            </li>
            <li class="nav-header">Admin</li>
            <li class="nav-item">
              <a class="nav-link" href="salon.clients.php">Clients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"href="salon.hairdressers.php">Hairdressers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="salon.schedules.php">Schedules</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="salon.services.php">Services</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="salon.bookings.php">All Bookings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="salon.bookings_clients.php">Client Bookings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="salon.bookings_guests.php">Guest Bookings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="salon.bookings_other.php">Other Bookings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="salon.profile.php"><?php echo $session->user_fname."'s Account"; ?></a>
            </li>
            <?php endif; ?>
            
            <?php if($session->user_role == 3) : ?>
            <li class="nav-item">
              <a class="nav-link" href="clients.profile.php">Your Account</a>
            </li>
            <?php endif; ?>
            
            <li class="nav-item">
              <a class="nav-link" href="signout.php">Sign Out</a>
            </li>
          </ul>
          <hr class="visible-xs mt-3">
        </div> <!-- end of sidebar search and list of links collapsable -->
        
        <?php endif; ?>
        
      </nav>
    </div> <!-- end of sidebar navigation --> 