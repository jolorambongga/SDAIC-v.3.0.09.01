<?php
$title = 'Edit Services';
$active_doctors = 'active';
include_once('header.php');
?>

<body>

  <div class="my-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <h1>Edit Doctors</h1>
        </div>
      </div>
      <!-- add button -->
      <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-primary mt-3 mb-3 float-end" data-bs-toggle="modal"
          data-bs-target="#modAddDoctor">Add Doctor</button>
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
                <th scope="col">Doctor Name</th>
                <th scope="col">Available Date</th>
                <th scope="col">Available Time</th>
                <th scope="col">Contact</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="tbodyDoctors">

            </tbody>
          </table>
        </div>
      </div>
      <!-- end table -->
      <!-- add doctor modal -->
      <form id="frmAddDoctor">
        <div class="modal fade" id="modAddDoctor" tabindex="-1" aria-labelledby="modAddDoctorLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modAddDoctorLabel">Add New Doctor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- doctor first_name, middle_name, last_name, contact, avail_date, avail_time, action -->
                <!-- start doctor name -->
                <label for="first_name" class="form-label">Doctor's First Name</label>
                <input type="text" id="first_name" class="form-control" required>
                <pre></pre>
                <label for="middle_name" class="form-label">Doctor's Middle Name</label>
                <input type="text" id="middle_name" class="form-control">
                <pre></pre>
                <label for="last_name" class="form-label">Doctor's Last Name</label>
                <input type="text" id="last_name" class="form-control" required>
                <pre></pre>
                <!-- end doctor name -->
                <!-- start doctor contact -->
                <label for="contact" class="form-label">Doctor's Contact</label>
                <input type="number" id="contact" class="form-control" required>
                <pre></pre>
                <!-- end doctor contact -->
                <!-- start avail_date -->
                <label for="avail_date" class="form-label">Doctor's Available Date</label>
                <div id="avail_date" class="btn-group w-100" role="group">
                  <input type="checkbox" class="btn-check" id="day_sun" autocomplete="off" data-day="Sunday">
                  <label class="btn btn-outline-primary" for="day_sun">Sun</label>

                  <input type="checkbox" class="btn-check" id="day_mon" autocomplete="off" data-day="Monday">
                  <label class="btn btn-outline-primary" for="day_mon">Mon</label>

                  <input type="checkbox" class="btn-check" id="day_tues" autocomplete="off" data-day="Tuesday">
                  <label class="btn btn-outline-primary" for="day_tues">Tues</label>

                  <input type="checkbox" class="btn-check" id="day_wed" autocomplete="off" data-day="Wednesday">
                  <label class="btn btn-outline-primary" for="day_wed">Wed</label>

                  <input type="checkbox" class="btn-check" id="day_thurs" autocomplete="off" data-day="Thursday">
                  <label class="btn btn-outline-primary" for="day_thurs">Thurs</label>

                  <input type="checkbox" class="btn-check" id="day_fri" autocomplete="off" data-day="Friday">
                  <label class="btn btn-outline-primary" for="day_fri">Fri</label>

                  <input type="checkbox" class="btn-check" id="day_sat" autocomplete="off" data-day="Saturday">
                  <label class="btn btn-outline-primary" for="day_sat">Sat</label>
                </div>
                <pre></pre>
                <!-- end avail date -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Add Doctor</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- end modal -->
    </div>
  </div>

  <!-- start time modal -->
  <div class="modal fade" id="modSelectTime" tabindex="-1" aria-labelledby="modSelectTimeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modSelectTimeLabel">Select Available Time</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3">
            <label class="input-group-text" for="start_time">Start Time</label>
            <select class="form-select" id="start_time_modal">
              <option selected>Select Start Time...</option>
              <optgroup label="AM">
                <option value="9:00 AM">9:00 AM</option>
                <option value="10:00 AM">10:00 AM</option>
                <option value="11:00 AM">11:00 AM</option>
              </optgroup>
              <optgroup label="PM">
                <option value="12:00 PM">12:00 PM</option>
                <option value="1:00 PM">1:00 PM</option>
                <option value="2:00 PM">2:00 PM</option>
                <option value="3:00 PM">3:00 PM</option>
                <option value="4:00 PM">4:00 PM</option>
                <option value="5:00 PM">5:00 PM</option>
              </optgroup>
            </select>
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="end_time">End Time</label>
            <select class="form-select" id="end_time_modal">
              <option selected>Select End Time...</option>
              <optgroup label="AM">
                <option value="10:00 AM">10:00 AM</option>
                <option value="11:00 AM">11:00 AM</option>
              </optgroup>
              <optgroup label="PM">
                <option value="12:00 PM">12:00 PM</option>
                <option value="1:00 PM">1:00 PM</option>
                <option value="2:00 PM">2:00 PM</option>
                <option value="3:00 PM">3:00 PM</option>
                <option value="4:00 PM">4:00 PM</option>
                <option value="5:00 PM">5:00 PM</option>
                <option value="6:00 PM">6:00 PM</option>
              </optgroup>
            </select>
          </div>
          <input type="hidden" id="current_day">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success" id="save_time">Save</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end time modal -->

  <!-- start jQuery script -->
  <script>
    $(document).ready(function () {
      console.log('ready');
      
      var currentDayCheckbox = null; // Declare a variable to store the current checkbox

    // Handle checkbox change event to show the modal
      $('#avail_date .btn-check').change(function () {
        if ($(this).is(':checked')) {
          var day = $(this).data('day');
            currentDayCheckbox = $(this); // Set the currentDayCheckbox to the checkbox that triggered the event

            $('#current_day').val(day);
            $('#modSelectTimeLabel').text('Select Available Time for ' + day);
            new bootstrap.Modal($('#modSelectTime')).show();
          }
        });

    // Save the selected time
      $('#save_time').click(function () {
        var day = $('#current_day').val();
        var start_time = $('#start_time_modal').val();
        var end_time = $('#end_time_modal').val();

        if (start_time && end_time) {
          $('<input>').attr({
            type: 'hidden',
            id: 'start_time_' + day,
            name: 'start_time_' + day,
            value: start_time
          }).appendTo('#frmAddDoctor');

          $('<input>').attr({
            type: 'hidden',
            id: 'end_time_' + day,
            name: 'end_time_' + day,
            value: end_time
          }).appendTo('#frmAddDoctor');

          $('#modSelectTime').modal('hide');
        } else {
          alert('Please select both start and end times.');
        }
      });

    // UNCHECK CHECK GROUP
      $('#modSelectTime').on('hidden.bs.modal', function () {
        var day = $('#current_day').val();
        if (!$('#start_time_' + day).length || !$('#end_time_' + day).length) {
            currentDayCheckbox.prop('checked', false); // Uncheck the checkbox if start and end times are not set
          }
          $('#start_time_modal').val('Select Start Time...');
          $('#end_time_modal').val('Select End Time...');
        });
      

      // CREATE DOCTOR
      $('#frmAddDoctor').submit(function (e) {
        e.preventDefault();

        var first_name = $('#first_name').val();
        var middle_name = $('#middle_name').val();
        var last_name = $('#last_name').val();
        var contact = $('#contact').val();

        var avail_dates = [];
        $('#avail_date .btn-check:checked').each(function () {
          var day = $(this).data('day');
          var start_time = $('#start_time_' + day).val();
          var end_time = $('#end_time_' + day).val();
          avail_dates.push({ day: day, start_time: start_time, end_time: end_time });
        });

        var doctor_data = {
          first_name: first_name,
          middle_name: middle_name,
          last_name: last_name,
          contact: contact,
          avail_dates: JSON.stringify(avail_dates)
        };

        $.ajax({
          type: 'POST',
          url: 'handles/doctors/add_doctor.php',
          data: doctor_data,
          success: function (response) {
            console.log('ADD DOCTOR RESPONSE:', response);
          },
          error: function (error) {
            console.log('ADD DOCTOR ERROR:', error);
          }
        });
      });


      // CLOSE MODAL FUNCTION
      function closeModal() {
        $('#modAddDoctor .btn-close').click();
        $('#modEditDoctor .btn-close').click();
        $('#modDeleteDoctor .btn-close').click();
        clearFields();
      } // END CLOSE MODAL FUNCTION

      // CLEAR FIELDS FUNCTION
      function clearFields() {
        $('#first_name').val('');
        $('#middle_name').val('');
        $('#last_name').val('');
        $('#contact').val('');
        $('#avail_date input[type="hidden"]').remove();
        $('#avail_date .btn-check').prop('checked', false);
      } // END CLEAR FIELDS FUNCTION

      // ON CLOSE MODAL
      $('#modAddDoctor').on('hidden.bs.modal', function () {
        clearFields();
      });

      $('#modEditDoctor').on('hidden.bs.modal', function () {
        clearFields();
      });

      $('#modDeleteDoctor').on('hidden.bs.modal', function () {
        clearFields();
      }); // END ON CLOSE MODAL

    }); // END READY
  </script>

  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>
