<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2) { redirect("index.php"); } ?>
     
<?php

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 15;
$items_total_count = Booking::count_all() - Client_booking::count_all() - Guest_booking::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM bookings WHERE ";
$sql .= "activity_id = 3 OR ";
$sql .= "activity_id = 4 OR ";
$sql .= "activity_id = 5 OR ";
$sql .= "activity_id = 6 OR ";
$sql .= "activity_id = 7 ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";

$other_bookings = Booking::find_by_query($sql);

?>
      
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Other bookings</h2>
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
            <?php if($session->user_role == 1) : ?>
            <button type="button" class="btn btn-outline-primary" onclick="window.location='booking_other_add.php'">
              <span class="icon icon-plus"></span> Add other booking
            </button>
            <?php endif; ?>
          </div>
        </div>
      </div> <!-- end of dash table -->

     
      <!-- Dash table header and data rows -->
      <div class="table-responsive">
        <table class="table table-hover" data-sort="table" id="other-booking-table">
          <thead>
            <tr>
              <?php if($session->user_role == 1) : ?>
              <th></th>
              <?php endif; ?>
              <th>Id</th>
              <th>Date</th>
              <th>Time</th>
              <th>Hairdresser</th>
              <th>Activity</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($other_bookings as $other_booking) : ?>
            <tr>
              <?php if($session->user_role == 1) : ?>
              <td><a href="client_edit.php?id=<?php echo $other_booking->id; ?>"><span class="icon icon-edit"></span></a></td>
              <?php endif; ?>
              <td><?php echo $other_booking->id; ?></td>
              <td><?php echo date("D, j M Y", strtotime($other_booking->booking_date)); ?></td>
              <td><?php echo substr($other_booking->start_time, 0, 5)." - ".substr($other_booking->end_time, 0, 5); ?></td>
              <td><?php echo Hairdresser::name($other_booking->hairdresser_id); ?></td>
              <td><?php echo Activity::name($other_booking->activity_id); ?></td>
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
            echo "<li class='page-item'><a class='page-link' href='bookings_other.php?page={$paginate->previous()}' aria-label='Previous'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a></li>";
          }
           
          for ($i=1; $i <= $paginate->total_pages(); $i++) {
            if($i == $paginate->current_page) {
              echo "<li class='page-item active'><a class='page-link' href='bookings_other.php?page={$i}'>{$i}</a></li>";
            } else {
              echo "<li class='page-item'><a class='page-link' href='bookings_other.php?page={$i}'>{$i}</a></li>";
            }
          } 
            
          if ($paginate->total_pages() > 1) {
            if ($paginate->has_next()) {
              echo "<li class='page-item'><a class='page-link' href='bookings_other.php?page={$paginate->next()}' aria-label='Next'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";
            }
          }
          
          ?>  
            
          </ul>
        </nav>
      </div> <!-- end of pagination -->

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>