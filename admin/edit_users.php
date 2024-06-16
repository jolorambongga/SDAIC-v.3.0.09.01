<?php
$title = 'Edit Services';
$active_users = 'active';
include_once('header.php');
?>

<body>

  <div class="my-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <h1>Edit Users</h1>
        </div>
      </div>
      <!-- add button -->
      <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-primary mt-3 mb-3 float-end">IDK YET</button>
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
                <th scope="col">Patient</th>
                <th scope="col">Procedure</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="tbodyUsers">

            </tbody>
          </table>
        </div>
      </div>
      <!-- end table -->
    </div>
  </div>

  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>