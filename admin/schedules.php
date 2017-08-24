<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
     
<?php

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 20;
$items_total_count = Schedule::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM schedules ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";

$schedules = Schedule::find_by_query($sql);

?>
      
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Schedules</h2>
        </div>
      </div> <!-- end of dash title -->  
      
      
      <!-- Dash table search and action buttons -->
      <div class="flextable table-actions">
        <!-- Search orders input -->
        <div class="flextable-item flextable-primary">
          <div class="btn-toolbar-item input-with-icon">
            <input type="text" class="form-control input-block" placeholder="Search schedules">
            <span class="icon icon-magnifying-glass"></span>
          </div>
        </div> <!-- end of search orders input -->
        <div class="flextable-item">
          <div class="btn-group">
            <button type="button" class="btn btn-outline-primary" onclick="window.location='schedule_add.php'">
              <span class="icon icon-plus"></span> Add schedule
            </button>
          </div>
        </div>
      </div> <!-- end of dash table search and action buttons -->

     
      <!-- Dash table header and data rows -->
      <div class="table-responsive">
        <table class="table table-hover" data-sort="table">
          <thead>
            <tr>
              <th></th>
              <th>Id</th>
              <th>Hairdresser</th>
              <th>Day</th>
              <th>Times</th>
              <th>Period</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($schedules as $schedule) : ?>
            <tr>
              <td><a href="schedule_edit.php?id=<?php echo $schedule->id; ?>"><span class="icon icon-edit"></span></a></td>
              <td><?php echo $schedule->id; ?></td>
              <td><?php echo $schedule->hairdresser_id; ?></td>
              <td><?php echo $schedule->day_id; ?></td>
              <td><?php echo $schedule->start_time." to ".$schedule->end_time; ?></td>
              <td><?php echo $schedule->first_date." to ".$schedule->last_date; ?></td>
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
            echo "<li class='page-item'><a class='page-link' href='schedules.php?page={$paginate->previous()}' aria-label='Previous'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a></li>";
          }
           
          for ($i=1; $i <= $paginate->total_pages(); $i++) {
            if($i == $paginate->current_page) {
              echo "<li class='page-item active'><a class='page-link' href='schedules.php?page={$i}'>{$i}</a></li>";
            } else {
              echo "<li class='page-item'><a class='page-link' href='schedules.php?page={$i}'>{$i}</a></li>";
            }
          } 
            
          if ($paginate->total_pages() > 1) {
            if ($paginate->has_next()) {
              echo "<li class='page-item'><a class='page-link' href='schedules.php?page={$paginate->next()}' aria-label='Next'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";
            }
          }
          
          ?>  
            
          </ul>
        </nav>
      </div> <!-- end of pagination -->

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>