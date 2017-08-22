<?php include("includes/header.php"); ?>
      
    <!-- Main content --> 
    <div class="col-md-9 content">
      
      
      <!-- Dash title and datepicker -->  
      <div class="dashhead">  
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Administration</h6>
          <h2 class="dashhead-title">All bookings</h2>
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
      
<?php include("includes/footer.php"); ?>