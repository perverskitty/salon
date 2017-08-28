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
    dataTable.addColumn({ type: 'string', id: 'Position' });
    dataTable.addColumn({ type: 'string', id: 'Name' });
    dataTable.addColumn({ type: 'date', id: 'Start' });
    dataTable.addColumn({ type: 'date', id: 'End' });
    dataTable.addRows([
      [ 'President', 'George Washington', new Date(1789, 3, 30), new Date(1797, 2, 4) ],
      [ 'President', 'John Adams', new Date(1797, 2, 4), new Date(1801, 2, 4) ],
      [ 'President', 'Thomas Jefferson', new Date(1801, 2, 4), new Date(1809, 2, 4) ],
      [ 'Vice President', 'John Adams', new Date(1789, 3, 21), new Date(1797, 2, 4)],
      [ 'Vice President', 'Thomas Jefferson', new Date(1797, 2, 4), new Date(1801, 2, 4)],
      [ 'Vice President', 'Aaron Burr', new Date(1801, 2, 4), new Date(1805, 2, 4)],
      [ 'Vice President', 'George Clinton', new Date(1805, 2, 4), new Date(1812, 3, 20)],
      [ 'Secretary of State', 'John Jay', new Date(1789, 8, 25), new Date(1790, 2, 22)],
      [ 'Secretary of State', 'Thomas Jefferson', new Date(1790, 2, 22), new Date(1793, 11, 31)],
      [ 'Secretary of State', 'Edmund Randolph', new Date(1794, 0, 2), new Date(1795, 7, 20)],
      [ 'Secretary of State', 'Timothy Pickering', new Date(1795, 7, 20), new Date(1800, 4, 12)],
      [ 'Secretary of State', 'Charles Lee', new Date(1800, 4, 13), new Date(1800, 5, 5)],
      [ 'Secretary of State', 'John Marshall', new Date(1800, 5, 13), new Date(1801, 2, 4)],
      [ 'Secretary of State', 'Levi Lincoln', new Date(1801, 2, 5), new Date(1801, 4, 1)],
      [ 'Secretary of State', 'James Madison', new Date(1801, 4, 2), new Date(1809, 2, 3)]
    ]);

    chart.draw(dataTable);
  }
</script>
  
</body> <!-- end of body -->

</html>

