<?php
$title = "INDEX ITO";
$active_new_appointment = "active";
include_once('header.php');
?>  

<div class="my-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-4">
        <h1>Make your new appointment</h1>
      </div>
    </div>
    <!-- start radio -->
    <div class="row justify-content-center">
      <div class="col-4">
        <div class="wrapper">
          <div class="title">Your Procedure</div>
          <div id="box" class="box">
            ..
          </div>
          <form action="submit_appointment.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="appointment-date">Date:</label>
              <input type="date" id="appointment-date" name="appointment-date" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="appointment-time">Time:</label>
              <input type="time" id="appointment-time" name="appointment-time" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="procedure-image">Upload Image:</label>
              <input type="file" id="procedure-image" name="procedure-image" class="form-control-file" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    loadProcedures();
    function loadProcedures() {
      $.ajax({
        type: 'GET',
        url: 'handles/read_services.php',
        dataType: 'json',
        success: function(response) {
          $('#box').empty();
          $.each(response.data, function(key, value){

            var increment = key + 1;

            const procedures = `
            <input type="radio" name="select" id="${value.service_id}" value="${value.service_id}" required>
            <label for="${value.service_id}" class="value-${increment}">
            <div class="select-dots"></div>
            <div class="text">${value.service_name}</div>
            </label>
            `
            $('#box').append(procedures);
          });
        },
        error: function(error) {
          console.log("ERROR SA LOAD PROCEDURES:", error);
        }
      });
    }
  });
</script>

<?php
include_once('footer.php');
?>
