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

    var container = document.getElementById('example3.1');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'string', id: 'Hairdresser' });
    dataTable.addColumn({ type: 'string', id: 'Booking' });
    dataTable.addColumn({ type: 'date', id: 'Start' });
    dataTable.addColumn({ type: 'date', id: 'End' });
    dataTable.addRows([
      [ 'Peter C', 'Client', new Date(0, 0, 0, 10, 0, 0), new Date(0, 0, 0, 11, 0, 0) ],
      [ 'Peter C', 'Guest', new Date(0, 0, 0, 11, 0, 0), new Date(0, 0, 0, 13, 0, 0) ],
      [ 'Peter C', 'Guest', new Date(0, 0, 0, 15, 0, 0), new Date(0, 0, 0, 17, 0, 0) ],
      [ 'Ludie L', 'Client', new Date(0, 0, 0, 11, 0, 0), new Date(0, 0, 0, 12, 0, 0) ],
      [ 'Ludie L', 'Guest', new Date(0, 0, 0, 13, 0, 0), new Date(0, 0, 0, 16, 0, 0) ],
      [ 'Ludie L', 'Client', new Date(0, 0, 0, 16, 0, 0), new Date(0, 0, 0, 18, 0, 0) ],
      [ 'Marc D', 'Guest', new Date(0, 0, 0, 10, 0, 0), new Date(0, 0, 0, 11, 0, 0) ],
      [ 'Marc D', 'Meet', new Date(0, 0, 0, 11, 0, 0), new Date(0, 0, 0, 12, 0, 0) ],
      [ 'Marc D', 'Client', new Date(0, 0, 0, 15, 0, 0), new Date(0, 0, 0, 16, 0, 0) ],
      [ 'Marc D', 'Client', new Date(0, 0, 0, 17, 0, 0), new Date(0, 0, 0, 19, 0, 0) ],
      [ 'Ginette V', 'Client', new Date(0, 0, 0, 10, 0, 0), new Date(0, 0, 0, 11, 0, 0) ],
      [ 'Ginette V', 'Guest', new Date(0, 0, 0, 11, 0, 0), new Date(0, 0, 0, 13, 0, 0) ],
      [ 'Ginette V', 'Guest', new Date(0, 0, 0, 15, 0, 0), new Date(0, 0, 0, 17, 0, 0) ],
      [ 'Claudie S', 'Client', new Date(0, 0, 0, 11, 0, 0), new Date(0, 0, 0, 12, 0, 0) ],
      [ 'Claudie S', 'Guest', new Date(0, 0, 0, 13, 0, 0), new Date(0, 0, 0, 16, 0, 0) ],
      [ 'Claudie S', 'Client', new Date(0, 0, 0, 16, 0, 0), new Date(0, 0, 0, 18, 0, 0) ],
      [ 'Markita W', 'Guest', new Date(0, 0, 0, 10, 0, 0), new Date(0, 0, 0, 11, 0, 0) ],
      [ 'Markita W', 'Meet', new Date(0, 0, 0, 11, 0, 0), new Date(0, 0, 0, 12, 0, 0) ],
      [ 'Markita W', 'Client', new Date(0, 0, 0, 15, 0, 0), new Date(0, 0, 0, 16, 0, 0) ],
      [ 'Markita W', 'Client', new Date(0, 0, 0, 17, 0, 0), new Date(0, 0, 0, 19, 0, 0) ],
      [ 'Maya S', 'Client', new Date(0, 0, 0, 10, 0, 0), new Date(0, 0, 0, 11, 0, 0) ],
      [ 'Maya S', 'Guest', new Date(0, 0, 0, 11, 0, 0), new Date(0, 0, 0, 13, 0, 0) ],
      [ 'Maya S', 'Guest', new Date(0, 0, 0, 15, 0, 0), new Date(0, 0, 0, 17, 0, 0) ],
      [ 'Era C', 'Client', new Date(0, 0, 0, 11, 0, 0), new Date(0, 0, 0, 12, 0, 0) ],
      [ 'Era C', 'Guest', new Date(0, 0, 0, 13, 0, 0), new Date(0, 0, 0, 16, 0, 0) ],
      [ 'Era C', 'Client', new Date(0, 0, 0, 16, 0, 0), new Date(0, 0, 0, 18, 0, 0) ],
      [ 'Carolyn H', 'Guest', new Date(0, 0, 0, 10, 0, 0), new Date(0, 0, 0, 11, 0, 0) ],
      [ 'Carolyn H', 'Meet', new Date(0, 0, 0, 11, 0, 0), new Date(0, 0, 0, 12, 0, 0) ],
      [ 'Carolyn H', 'Client', new Date(0, 0, 0, 15, 0, 0), new Date(0, 0, 0, 16, 0, 0) ],
      [ 'Carolyn H', 'Client', new Date(0, 0, 0, 17, 0, 0), new Date(0, 0, 0, 19, 0, 0) ],
      [ 'Josiah M', 'Client', new Date(0, 0, 0, 10, 0, 0), new Date(0, 0, 0, 11, 0, 0) ],
      [ 'Josiah M', 'Guest', new Date(0, 0, 0, 11, 0, 0), new Date(0, 0, 0, 13, 0, 0) ],
      [ 'Josiah M', 'Guest', new Date(0, 0, 0, 15, 0, 0), new Date(0, 0, 0, 17, 0, 0) ]
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

