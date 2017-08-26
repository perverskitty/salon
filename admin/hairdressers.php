<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
<?php if($session->user_role != 1 && $session->user_role != 2) { redirect("index.php"); } ?>
     
<?php

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 10;
$items_total_count = User::count_by_role(1) + User::count_by_role(2);

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM users WHERE ";
$sql .= "role_id=1 OR role_id=2 ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";

$hairdressers = Hairdresser::find_by_query($sql);

?>
      
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">Hairdressers</h2>
        </div>
      </div> <!-- end of dash title -->  
      
      
      <!-- Dash table search and action buttons -->
      <div class="flextable table-actions">
        <!-- Search orders input -->
        <div class="flextable-item flextable-primary">
          <div class="btn-toolbar-item input-with-icon">
            <input type="text" class="form-control input-block" placeholder="Search staff">
            <span class="icon icon-magnifying-glass"></span>
          </div>
        </div> <!-- end of search orders input -->
        <div class="flextable-item">
          <div class="btn-group">
            <?php if($session->user_role == 1) : ?>
            <button type="button" class="btn btn-outline-primary" onclick="window.location='hairdresser_add.php'">
              <span class="icon icon-add-user"></span> Add hairdresser
            </button>
            <?php endif; ?>
          </div>
        </div>
      </div> <!-- end of dash table search and action buttons -->

     
      <!-- Dash table header and data rows -->
      <div class="table-responsive">
        <table class="table table-hover" data-sort="table">
          <thead>
            <tr>
              <?php if($session->user_role == 1) : ?>
              <th></th>
              <?php endif; ?>
              <th>Id</th>
              <th>First name</th>
              <th>Last name</th>
              <th>Email</th>
              <th>Tel</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($hairdressers as $hairdresser) : ?>
            <tr>
              <?php if($session->user_role == 1) : ?>
              <td><a href="hairdresser_edit.php?id=<?php echo $hairdresser->id; ?>"><span class="icon icon-edit"></span></a></td>
              <?php endif; ?>
              <td><?php echo $hairdresser->id; ?></td>
              <td><?php echo $hairdresser->first_name; ?></td>
              <td><?php echo $hairdresser->last_name; ?></td>
              <td><?php echo $hairdresser->email; ?></td>
              <td><?php echo $hairdresser->tel; ?></td>
              <td><?php echo Role::name($hairdresser->role_id); ?></td>
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
            echo "<li class='page-item'><a class='page-link' href='hairdressers.php?page={$paginate->previous()}' aria-label='Previous'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a></li>";
          }
           
          for ($i=1; $i <= $paginate->total_pages(); $i++) {
            if($i == $paginate->current_page) {
              echo "<li class='page-item active'><a class='page-link' href='hairdressers.php?page={$i}'>{$i}</a></li>";
            } else {
              echo "<li class='page-item'><a class='page-link' href='hairdressers.php?page={$i}'>{$i}</a></li>";
            }
          } 
            
          if ($paginate->total_pages() > 1) {
            if ($paginate->has_next()) {
              echo "<li class='page-item'><a class='page-link' href='hairdressers.php?page={$paginate->next()}' aria-label='Next'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";
            }
          }
          
          ?>  
            
          </ul>
        </nav>
      </div> <!-- end of pagination -->

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>