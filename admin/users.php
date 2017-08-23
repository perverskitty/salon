<?php include("includes/header.php"); ?>
     
<?php if(!$session->is_signed_in()) { redirect("signin.php"); } ?>
    
<?php

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 10;
$items_total_count = User::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM users ";
$sql .= "LIMIT {$paginate->items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";

$users = User::find_by_query($sql);

?>
      
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      <!-- Dash title -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Admin</h6>
          <h2 class="dashhead-title">All users</h2>
        </div>
      </div> <!-- end of dash title -->  
      
      
      <!-- Dash table search -->
      <div class="flextable table-actions">
        <div class="flextable-item flextable-primary">
          <div class="btn-toolbar-item input-with-icon">
            <input type="text" class="form-control input-block" placeholder="Search users">
            <span class="icon icon-magnifying-glass"></span>
          </div>
        </div>
      </div> <!-- end of dash table search -->

     
      <!-- Dash table header and data rows -->
      <div class="table-responsive">
        <table class="table" data-sort="table">
          <thead>
            <tr>
              <th></th>
              <th>Id</th>
              <th>First name</th>
              <th>Last name</th>
              <th>Role</th>
              <th>Email</th>
              <th>Tel</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($users as $user) : ?>
            <tr>
              <td><a href="#"><span class="icon icon-edit"></span></a></td>
              <td><?php echo $user->id; ?></td>
              <td><?php echo $user->first_name; ?></td>
              <td><?php echo $user->last_name; ?></td>
              <td><?php echo $user->role_id; ?></td>
              <td><?php echo $user->email; ?></td>
              <td><?php echo $user->tel; ?></td>
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
            echo "<li class='page-item'><a class='page-link' href='users.php?page={$paginate->previous()}' aria-label='Previous'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a></li>";
          }
           
          for ($i=1; $i <= $paginate->total_pages(); $i++) {
            if($i == $paginate->current_page) {
              echo "<li class='page-item active'><a class='page-link' href='users.php?page={$i}'>{$i}</a></li>";
            } else {
              echo "<li class='page-item'><a class='page-link' href='users.php?page={$i}'>{$i}</a></li>";
            }
          } 
            
          if ($paginate->total_pages() > 1) {
            if ($paginate->has_next()) {
              echo "<li class='page-item'><a class='page-link' href='users.php?page={$paginate->next()}' aria-label='Next'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";
            }
          }
          
          ?>  
            
          </ul>
        </nav>
      </div> <!-- end of pagination -->

      </div> <!-- end of main content -->
      
<?php include("includes/footer.php"); ?>