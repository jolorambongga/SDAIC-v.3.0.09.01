<?php
$title = "INDEX ITO";
$active_new_appointment = "active";
include_once('header.php');
?>  

<div class="my-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h1 class="text-start">Make your new appointment</h1>
      </div>
    </div>
    <!-- start radio -->
    <div class="row justify-content-center bg-danger p-3 p-md-5">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="wrapper">
          <div class="title">Your Procedure</div>
          <div id="box" class="box">
            <!-- Content will be loaded here by jQuery -->
          </div>
        </div>
        <!-- end radio -->
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
            <input type="radio" name="select" id="${value.service_id}">
            <label for="${value.service_id}" class="value-${increment}">
              <div class="select-dots"></div>
              <div class="text">${value.service_name}</div>
            </label>
            `;
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
