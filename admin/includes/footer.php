    </div> <!-- end of row -->
  </div> <!-- end of container -->


  <!-- Example modal -->
  <div id="docsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Example modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p>You're looking at an example modal in the dashboard theme.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cool, got it!</button>
      </div>
    </div>
  </div>
</div>

<!-- JS links -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/tether.min.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/tablesorter.min.js"></script>
<script src="assets/js/tablesorter.pager.js"></script>
<script src="assets/js/toolkit.js"></script>
<script src="assets/js/application.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  google.charts.load("current", {packages:["timeline"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    
    <?php
    
    $date_today = date("Y-m-d");
    
    $sql = "SELECT * FROM open_times WHERE ";
    $sql .= "role_id=1 OR role_id=2 ";
    $open_times = Open_time::find_by_query($sql);
    
    $sql = "SELECT * FROM bookings WHERE ";
    $sql .= "booking_date = '2017-08-30'";
    $bookings = Booking::find_by_query($sql);
    
    ?>
  
    var container = document.getElementById('example3.1');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'string', id: 'Hairdresser' });
    dataTable.addColumn({ type: 'string', id: 'Booking' });
    dataTable.addColumn({ type: 'date', id: 'Start' });
    dataTable.addColumn({ type: 'date', id: 'End' });
    dataTable.addRows([
      
      <?php foreach ($bookings as $booking) : ?>
      
      <?php
      
        $start = explode(':', $booking->start_time);
        $end = explode(':', $booking->end_time);
        $name = Hairdresser::name($booking->hairdresser_id);
        $activity = Activity::name($booking->activity_id);
        $start_hours = $start[0];
        $start_mins = $start[1];
        $end_hours = $end[0];
        $end_mins = $end[1];
      
        echo "[ '". $name ."', '". $activity ."', new Date(0, 0, 0, ". $start_hours .", ". $start_mins .", 0), new Date(0, 0, 0, " .$end_hours. ", ". $end_mins .", 0) ],"; 
      
      ?>
                            
      <?php endforeach; ?>
      
    ]);

    var options = {
      //timeline: { colorByRowLabel: true }
    };
    
    chart.draw(dataTable, options);
  }
  
  $(window).resize(function(){
    drawChart();
  });
</script>
  
</body> <!-- end of body -->

</html>

