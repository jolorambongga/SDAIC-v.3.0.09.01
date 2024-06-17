<?php
$title = 'Edit Services';
$active_logs = 'active';
include_once('header.php');
?>

<body>

  <div class="my-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <h1>View Logs</h1>
        </div>
      </div>
      <!-- add button -->
      <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-primary mt-3 mb-3 float-end btn-sm">IDK YET</button>
        </div>
      </div>
      <!-- end button -->
      <!-- table -->
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped text-end">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
                <th scope="col">Details</th>
                <th scope="col">Device</th>
                <th scope="col">Browser</th>
                <th scope="col">Timestamp</th>
              </tr>
            </thead>
            <tbody id="tbodyLogs">

            </tbody>
          </table>
        </div>
      </div>
      <!-- end table -->
    </div>
  </div>


  <script>
  $(document).ready(function() {
    loadLogs();

    // READ LOGS
    function loadLogs(){
      $.ajax({
        type: 'GET',
        url: 'handles/logs/read_logs.php',
        dataType: 'json',
        success: function(response) {
          console.log("SUCCESS READ LOGS: ", response);
          if(response.status === 'success') {
            var logs = response.data;
            var tbody = $('#tbodyLogs');
            tbody.empty(); // Clear any existing rows

            if(logs.length === 0) {
              var row = '<tr><td colspan="8" class="text-center">No logs available</td></tr>';
              tbody.append(row);
            } else {
              logs.forEach(function(log, index) {
                const read_logs_html = `
                <tr>
                <th scope="row">${log.log_id}</th>
                <th>${log.first_name} ${log.last_name}</th>
                <th>${log.category}</th>
                <th>${log.action}</th>
                <th>${log.details}</th>
                <th>${log.device}</th>
                <th>${log.browser}</th>
                <th>${log.time_stamp}</th>
                </tr>
                `
                tbody.append(row);
              });
            }
          } else {
            console.error("Error in response:", response.message);
            var row = '<tr><td colspan="8" class="text-center">Error fetching logs</td></tr>';
            $('#tbodyLogs').append(row);
          }
        },
        error: function(error) {
          console.log("ERROR READ LOGS:", error);
          var row = '<tr><td colspan="8" class="text-center">Error fetching logs</td></tr>';
          $('#tbodyLogs').append(row);
        }
      });
    }
  });
</script>


  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>