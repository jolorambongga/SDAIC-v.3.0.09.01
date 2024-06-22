<?php
$title = "SDAIC - New Appointment";
$active_index = "";
$active_profile = "";
$active_your_appointments = "";
$active_new_appointment = "active";
include_once('header.php');
include_once('handles/auth.php');
checkAuth();
?>


<div class="my-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h1 class="text-start">Make your new appointment</h1>
      </div>
    </div>
    <!-- start multi-step form -->
    <div class="row justify-content-center bg- p-3 p-md-5">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="wrapper">
          <form id="appointment-form">
            <!-- Step 1: Select Procedure -->
            <div id="step-1" class="form-step">
              <div class="title">Your Procedure</div>
              <div id="box" class="box mb-3">
                <!-- Content will be loaded here by jQuery -->
              </div>
              <button type="button" class="btn btn-warning next-btn float-end mt-3">Next</button>
            </div>
            
            <!-- Step 2: Upload Image -->
            <div id="step-2" class="form-step" style="display:none;">
              <div class="title">Upload Photo of Your Request</div>
              <div class="box mb-3">
                <input accept="image/jpeg, image/png, image/gif" type="file" name="request_image" id="request_image" class="form-control">              
              </div>
              <button type="button" class="btn btn-warning next-btn float-end mt-3">Next</button>
              <button type="button" class="btn btn-danger prev-btn float-end mt-3 me-2">Previous</button>
            </div>
            
            <!-- Step 3: Select Date and Time -->
            <div id="step-3" class="form-step" style="display:none;">
              <div class="title">Select Date and Time</div>
              <div class="box mb-3">
                <input type="datetime-local" name="appointment_datetime" id="appointment_datetime" class="form-control">
              </div>
              <button type="button" class="btn btn-warning next-btn float-end mt-3">Next</button>
              <button type="button" class="btn btn-danger prev-btn float-end mt-3 me-2">Previous</button>
            </div>
            
            <!-- Step 4: Review and Submit -->
            <div id="step-4" class="form-step" style="display:none;">
              <div class="title">Review and Submit</div>
              <div id="review-box" class="box mb-3">
                <!-- Review content will be populated here -->
              </div>
              <button type="submit" class="btn btn-success float-end mt-3">Submit</button>
              <button type="button" class="btn btn-danger prev-btn float-end mt-3 me-2">Previous</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end multi-step form -->
    <div id="load_spinner" class="d-flex justify-content-center" style="display: none;">
      
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $('#load_spinner').empty();
    console.log('document ready');
    console.log(<?php echo json_encode('USER ID: ' . $_SESSION['user_id']); ?>);
    // Load procedures on page load
    loadProcedures();
    
    function loadProcedures() {
      $.ajax({
        type: 'GET',
        url: 'handles/read_services.php',
        dataType: 'JSON',
        success: function(response) {
          $('#box').empty();
          $.each(response.data, function(key, value){
            var increment = key + 1;
            const procedures = `
            <input type="radio" data-service-name="${value.service_name}" name="select" id="${value.service_id}" value="${value.service_id}">
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
    } // END LOAD PROCEDURES

    // Navigation functions
    $('.next-btn').click(function(){
      var $currentStep = $(this).closest('.form-step');

      // Validate input before proceeding to next step
      if ($currentStep.attr('id') === 'step-1') {
        if ($('#box input[type="radio"]:checked').length === 0) {
          alert('Please select a procedure before proceeding.');
          return; // Prevent further action if not validated
        }
      }
      else if ($currentStep.attr('id') === 'step-2') {
        if ($('#request_image')[0].files.length === 0) {
          alert('Please upload an image before proceeding.');
          return; // Prevent further action if not validated
        }
      }
      else if ($currentStep.attr('id') === 'step-3') {
        if ($('#appointment_datetime').val() === '') {
          alert('Please select a date and time before proceeding.');
          return;
        }
      }

      // Show next step
      $currentStep.hide().next('.form-step').show();

      // If it's the last step (step-4), populate review box
      if ($currentStep.attr('id') === 'step-3') {
        populateReviewBox();
      }
    });


    $('.prev-btn').click(function(){
      $(this).closest('.form-step').hide().prev('.form-step').show();
    });

    function populateReviewBox() {
      var service_id = $('input[name="select"]:checked').val();
      var service_name = $('input[name="select"]:checked').data('service-name');
      var request_image = $('#request_image')[0].files[0];
      var appointment_datetime = $('#appointment_datetime').val();

      var dateParts = appointment_datetime.split('T');
      var appointment_date = formatDate(dateParts[0]);
      var appointment_time = formatTime(dateParts[1]);

      // Populate review box with selected values
      $('#review-box').html(`
        <p><strong>Procedure:</strong> ${service_name}</p>
        
        <p><strong>Image:</strong> ${request_image ? request_image.name : 'No image uploaded'}</p>
        <p><strong>Appointment Date:</strong> ${appointment_date}</p>
        <p><strong>Appointment Time:</strong> ${appointment_time}</p>
        `);
    }

    // Function to format date as "Day, Month Day, Year"
    function formatDate(dateString) {
      var date = new Date(dateString);
      var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      return date.toLocaleDateString('en-US', options);
    }

    // Function to format time as "hh:mm AM/PM"
    function formatTime(timeString) {
      var time = timeString.split(':');
      var hours = parseInt(time[0], 10);
      var minutes = time[1];
      
      var ampm = hours >= 12 ? 'PM' : 'AM';
      hours = hours % 12;
      hours = hours ? hours : 12; // Handle midnight (0 hours)

      return hours + ':' + minutes + ' ' + ampm;
    }

    // Form submit handler
    $('#appointment-form').submit(function(e){
      e.preventDefault();
      
      // appointment_id`, `user_id`, `service_id`, `appointment_date`, `appointment_time`, `request_image`, `notes`, `status`, `time_stamp`

      var service_id = $('input[name="select"]:checked').val();
      var service_name = $('input[name="select"]:checked').data('service-name');
      var request_image = $('#request_image')[0].files[0];
      var appointment_datetime = $('#appointment_datetime').val();

      var dateParts = appointment_datetime.split('T');
      var appointment_date = dateParts[0];
      var appointment_time = dateParts[1];

      var formData = new FormData();
      formData.append('user_id', <?php echo($_SESSION['user_id']);?>);
      formData.append('full_name', "<?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>");
      formData.append('email', "<?php echo($_SESSION['email']);?>");
      formData.append('service_id', service_id);
      formData.append('service_name', service_name);
      formData.append('appointment_date', appointment_date);
      formData.append('appointment_time', appointment_time);
      formData.append('request_image', request_image);

      $.ajax({
        type: 'POST',
        url: 'handles/submit_appointment.php',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#loadSpin').append(`<div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>`);
        },
        success: function(response) {
          console.log(response);
          console.log(formData)
          console.log(<?php echo($_SESSION['user_id']); ?>);
          $('#loadSpin').hide();
          alert('Appointment submitted successfully!');
          // window.location.href="your_appointments.php";
        },
        error: function(error) {
          console.log("ERROR SA SUBMIT APPOINTMENT:", error);
        }
      });

    });
  });
</script>


<?php
include_once('footer_script.php');
?>