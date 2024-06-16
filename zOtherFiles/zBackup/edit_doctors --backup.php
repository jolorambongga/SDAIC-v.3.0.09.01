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

                  <input type="checkbox" class="btn-check" id="day_sun" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_sun">Sun</label>

                  <input type="checkbox" class="btn-check" id="day_mon" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_mon">Mon</label>

                  <input type="checkbox" class="btn-check" id="day_tues" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_tues">Tues</label>

                  <input type="checkbox" class="btn-check" id="day_wed" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_wed">Wed</label>

                  <input type="checkbox" class="btn-check" id="day_thurs" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_thurs">Thurs</label>

                  <input type="checkbox" class="btn-check" id="day_fri" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_fri">Fri</label>

                  <input type="checkbox" class="btn-check" id="day_sat" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_sat">Sat</label>
                </div>
                <pre></pre>
                <!-- end avail date -->
                <label for="avail_time" class="form-label">Doctor's Available Time</label>
                <!-- start service start time -->
                <div class="input-group mb-3">
                  <label class="input-group-text" for="start_time">Start Time</label>
                  <select class="form-select" id="start_time">
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
                <!-- end service start time -->
                <!-- start service end time -->
                <div class="input-group mb-3">
                  <label class="input-group-text" for="end_time">End Time</label>
                  <select class="form-select" id="end_time">
                    <option selected>Select End Time...</option>
                    <optgroup label="AM">
                      <option value="9:00 AM">10:00 AM</option>
                      <option value="9:00 AM">11:00 AM</option>
                    </optgroup>
                    <optgroup label="PM">
                      <option value="12:00 PM">12:00 PM</option>
                      <option value="1:00 PM">1:00 PM</option>
                      <option value="2:00 PM">2:00 PM</option>
                      <option value="3:00 PM">3:00 PM</option>
                      <option value="4:00 PM">4:00 PM</option>
                      <option value="5:00 PM">5:00 PM</option>
                      <option value="5:00 PM">6:00 PM</option>
                    </optgroup>
                  </select>
                </div>
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

  <!-- start jQuery script -->
  <script>
    $(document).ready(function () {
      console.log('ready');
      // CREATE DOCTOR
      $('#frmAddDoctor').off('submit').submit(function (e) {
        e.preventDefault();

        var first_name = $('#first_name').val();
        var middle_name = $('#middle_name').val();
        var last_name = $('#last_name').val();
        var contact = $('#contact').val();
        
        var avail_dates = [];
        $('#avail_date .btn-check:checked').each(function () {
          avail_dates.push($(this).next('label').text());
        });


        var avail_start_time = $('#start_time').val();
        var avail_end_time = $('#end_time').val();

        var doctor_data = {
          first_name: first_name,
          middle_name: middle_name,
          last_name: last_name,
          contact: contact,
          avail_dates: avail_dates,
          avail_start_time: avail_start_time,
          avail_end_time: avail_end_time
        }

        // POST
        $.ajax({
          type: 'POST',
          url: 'handles/doctors/add_doctor.php',
          data: doctor_data,
          dataType: 'JSON',
          success: function(response) {
            // console.log(data);
            console.log('ADD DOCTOR RESPONSE:', response);
          },
          error: function(error) {
            console.log('ADD DOCTOR ERROR:', error);
          }
        }); // END POST
      }); // END CREATE DOCTOR

      // CLOSE MODAL FUNCTION
      function closeModal() {
        $('#modAddDoctor .btn-close').click();
        $('#modEditDoctor .btn-close').click();
        $('#modDeleteDoctor .btn-close').click();
        clearFields();
      }


      // CLEAR FIELDS FUNCTION
      function clearFields() {
        $('#first_name').val('');
        $('#middle_name').val('');
        $('#last_name').val('');
        $('#contact').val('');
        $('#avail_date').val('');
        $('#avail_start_time').val('');
        $('#avail_end_time').val('');
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
  <!-- end jQuery script -->

  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>