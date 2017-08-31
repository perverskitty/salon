<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2 && $session->user_role != 3) { redirect("signout.php"); } ?> 
<?php if($session->user_role == 3) { redirect("clients.index.php"); } ?>
     
<?php

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 15;
$items_total_count = Guest_booking::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM bookings WHERE ";
$sql .= "activity_id = 2 ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";

$guest_bookings = Guest_booking::find_by_query($sql);

?>
      
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Salon Admin</h6>
          <h2 class="dashhead-title">Guest bookings</h2>
        </div>
      </div> <!-- end of dash title -->  
      
      
      <!-- Dash table search -->
      <div class="flextable table-actions">
        <!-- Search bookings input -->
        <div class="flextable-item flextable-primary">
          <div class="btn-toolbar-item input-with-icon">
            <input type="text" class="form-control input-block" placeholder="Search bookings">
            <span class="icon icon-magnifying-glass"></span>
          </div>
        </div> <!-- end of search bookings input -->
        <div class="flextable-item">
          <div class="btn-group">
            <button type="button" class="btn btn-outline-primary" onclick="window.location='salon.add-guest-booking.php'">
              <span class="icon icon-plus"></span> Add
            </button>
          </div>
        </div>
      </div> <!-- end of dash table -->

     
      <!-- Dash table header and data rows -->
      <div class="table-responsive">
        <table class="table table-hover" data-sort="table" id="guest-booking-table">
          <thead>
            <tr>
              <th></th>
              <th>Id</th>
              <th>Date</th>
              <th>Time</th>
              <th>Hairdresser</th>
              <th>Guest</th>
              <th>Service</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($guest_bookings as $guest_booking) : ?>
            <tr>
              <td><a href="salon.edit-guest-booking.php?id=<?php echo $guest_booking->id; ?>"><span class="icon icon-edit"></span></a></td>
              <td><?php echo $guest_booking->id; ?></td>
              <td><?php echo date("D, j M Y", strtotime($guest_booking->booking_date)); ?></td>
              <td><?php echo substr($guest_booking->start_time, 0, 5)." - ".substr($guest_booking->end_time, 0, 5); ?></td>
              <td><?php echo Hairdresser::name($guest_booking->hairdresser_id); ?></td>
              <td><?php echo $guest_booking->guest_name." ".$guest_booking->guest_tel; ?></td>
              <td><?php echo Service::name($guest_booking->service_id); ?></td>
            </tr>                
          <?php endforeach; ?>
          </tbody>
        </table>
      </div> <!-- end of dash table header and data rows -->

     
      <!-- pagination -->
      <div class="text-center">
        <nav>
          <ul class="pagination">
          
          <?php
            
          if ($paginate->has_previous()) {
            echo "<li class='page-item'><a class='page-link' href='salon.guest-bookings.php?page={$paginate->previous()}' aria-label='Previous'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a></li>";
          }
           
          for ($i=1; $i <= $paginate->total_pages(); $i++) {
            if($i == $paginate->current_page) {
              echo "<li class='page-item active'><a class='page-link' href='salon.guest-bookings.php?page={$i}'>{$i}</a></li>";
            } else {
              echo "<li class='page-item'><a class='page-link' href='salon.guest-bookings.php?page={$i}'>{$i}</a></li>";
            }
          } 
            
          if ($paginate->total_pages() > 1) {
            if ($paginate->has_next()) {
              echo "<li class='page-item'><a class='page-link' href='salon.guest-bookings.php?page={$paginate->next()}' aria-label='Next'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";
            }
          }
          
          ?>  
            
          </ul>
        </nav>
      </div> <!-- end of pagination -->

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>