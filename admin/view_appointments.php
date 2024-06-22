<?php
$title = 'Admin - View Appointments';
$active_appointments = 'active';
include_once('header.php');
?>

<body>

  <div class="my-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <h1>View Appointments</h1>
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
                <th scope="col">Patient</th>
                <th scope="col">Procedure</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Request Image</th>
                <th scope="col">Status</th>
                <th scope="col">Completed</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="tbodyAppointments">

            </tbody>
          </table>
        </div>
      </div>
      <!-- end table -->
      <!-- start image modal -->
      <div class="modal fade" id="mod_ReqImg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mod_ReqImgLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="mod_ReqImgLabel"></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="imgBody" class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- end image modal -->
      <!-- start approve modal -->
      <div class="modal fade" id="mod_Approve" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mod_ApproveLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="mod_ApproveLabel">Approve this appointment?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label for="approve_user_input" class="form-label">Type <b>APPROVE</b> to approve <span id="approvePatientName"></span>'s <span id="approveAppointmentName"></span> appointment.</label>
              <input type="text" id="approve_user_input" class="form-control" required="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button id="btnApprove" data-appointment-id="" type="button" class="btn btn-success">Approve</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end approve modal -->

      <!-- start reject modal -->
      <div class="modal fade" id="mod_Reject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mod_RejectLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="mod_RejectLabel">Reject this appointment?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label for="reject_user_input" class="form-label">Type <b>REJECT</b> to reject <span id="rejectPatientName"></span>'s <span id="rejectAppointmentName"></span> appointment.</label>
              <input type="text" id="reject_user_input" class="form-control" required="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button id="btnReject" data-appointment-id="" type="button" class="btn btn-danger">Reject</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end reject modal -->
    </div>
  </div>

  <script>
    $(document).ready(function() {
      loadAppointments();
      // READ APPOINTMENTS
      function loadAppointments() {
        $.ajax({
          type: 'GET',
          url: 'handles/appointments/read_appointments.php',
          dataType: 'JSON',
          success: function(response) {
            console.log(response);

            $('#tbodyAppointments').empty();

            response.data.forEach(function(data) {
              let statusColor = '';
              switch (data.status) {
              case 'PENDING':
                statusColor = '#3399ff';
                break;
              case 'CANCELLED':
                statusColor = '#ff9900';
                break;
              case 'REJECTED':
                statusColor = '#ff0000';
                break;
              case 'APPROVED':
                statusColor = '#009933';
                break;
              case 'undefined':
                statusColor = '#FFC0CB';
                break;
              default:
                statusColor = '#000000';
              }

              let completedColor = '';
              switch (data.completed) {
              case 'NO':
                completedColor = '#ff0000';
                break;
              case 'YES':
                completedColor = '#009933';
                break;
              case 'undefined':
                completedColor = '#FFC0CB';
                break;
              default:
                completedColor = '#000000';
              }

              const isChecked = data.completed === 'YES' ? 'checked' : '';
              const read_appointments_html = `
              <tr>
              <th scope="row"><small>${data.appointment_id}</small></th>
              <td><small>${data.first_name} ${data.last_name}</small></td>
              <td><small>${data.service_name}</small></td>
              <td><small>${data.formatted_date}</small></td>
              <td><small>${data.formatted_time}</small></td>
              <td data-appointment-id='${data.appointment_id}'>
              <button id='callReqImg' type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#mod_ReqImg'>View Image</button>
              </td>
              <td style='color: ${statusColor};'><small>${data.status}</small></td>
              <td data-appointment-id='${data.appointment_id}' style='color: ${completedColor};'>
              <small class="completed-text">${data.completed}</small>
              <input type="checkbox" class="cbxCompleted" data-completed-yes="YES" data-completed-no="NO" ${isChecked} />
              </td>
              <td data-appointment-id='${data.appointment_id}' data-full-name="${data.first_name} ${data.last_name}" data-appointment-name="${data.service_name}">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end text-center">
              <button id='callReject' data-bs-toggle="modal" data-bs-target="#mod_Reject" type='button' class='btn btn-danger btn-sm'>Reject</button>
              <button id='callApprove' data-bs-toggle="modal" data-bs-target="#mod_Approve" type='button' class='btn btn-success btn-sm'>Approve</button>
              </div>
              </td>
              </tr>
              `;
              $('#tbodyAppointments').append(read_appointments_html);
            });
          },
          error: function(error) {
            console.log("ERROR", error);
          }
        });
  } // END FUNCTION

  // GET IMAGE
  $('#tbodyAppointments').on('click', '#callReqImg', function() {
    var appointment_id = $(this).closest("td").data('appointment-id');
    console.log("console click", appointment_id);
    $.ajax({
      type: 'GET',
      url: 'handles/appointments/get_image.php',
      dataType: 'JSON',
      data: { appointment_id: appointment_id },
      success: function(response) {
        if (response.status === "success") {
          $('#imgBody').html(`<img src="data:image/png;base64,${response.data.request_image}" class="img-fluid" alt="Request Image">`);
          $('#mod_ReqImg .modal-title').text(`Request Image - ${response.data.first_name} ${response.data.last_name} (${response.data.service_name})`);
          console.log(response);
        } else {
          console.log("Image not found for appointment ID: " + appointment_id);
        }
      },
      error: function(error) {
        console.log(error);
      }
    });
      }); // END GET IMAGE

  // COMPLETED CHECK FUNCTION
  $('#tbodyAppointments').on('change', '.cbxCompleted', function() {
    console.log("CHANGED");
    var checkbox = $(this);
    var isChecked = checkbox.is(':checked');
    var appointment_id = checkbox.closest('td').data('appointment-id');
    var completedYes = checkbox.data('completed-yes');
    var completedNo = checkbox.data('completed-no');
    var completed = isChecked ? completedYes : completedNo;

    $.ajax({
      type: 'POST',
      url: 'handles/appointments/set_completed_appointment.php',
      data: { completed: completed, appointment_id: appointment_id },
      dataType: 'JSON',
      success: function(response) {
        if (response.status === 'success') {
          console.log("SUCCESS CHECKBOX:", response);
          var updatedRow = response.data;
          // Update the completed text and color
          var completedCell = checkbox.closest('td');
          completedCell.find('.completed-text').text(updatedRow.completed);
          completedCell.css('color', updatedRow.completed === 'YES' ? '#009933' : '#ff0000');
          checkbox.prop('checked', updatedRow.completed === 'YES');
        } else {
          console.log("ERROR CHECKBOX:", response);
        }
      },
      error: function(error) {
        console.log("ERROR CHECKBOX:", error);
      }
    });
  });

  // APPROVE APPOINTMENT
  $(document).on('click', '#callApprove', function() {
    var appointment_id = $(this).closest('td').data('appointment-id');
    var patient_name = $(this).closest('td').data('full-name');
    var appointment_name = $(this).closest('td').data('appointment-name');
    console.log(appointment_id, patient_name, appointment_name);

    $('#approvePatientName').text(patient_name);
    $('#approveAppointmentName').text(appointment_name);

    $('#btnApprove').data('appointment-id', appointment_id);

    var approveBTN = $('#btnApprove').data('appointment-id');
    console.log("APPROVE BUTTIN ID!!!!", approveBTN);

  });

  $(document).on('click', '#btnApprove', function() {
    var appointment_id = $(this).data('appointment-id');
    var status = "APPROVED";
    var user_input = $('#approve_user_input').val();

    var data = {
      appointment_id: appointment_id,
      status: status,
      user_input: user_input
    }

    console.log(appointment_id, user_input);

    if (user_input !== 'APPROVE') {
      alert('Please type APPROVE to approve.');
      console.log(appointment_id);
      return;
    }
    $.ajax({
      type: 'POST',
      url: 'handles/appointments/approve_reject_appointment.php',
      data: data,
      dataType: 'JSON',
      success: function(response) {
        console.log("SUCESS APPROVE BTN CLICK",response);
        loadAppointments();
        $('#mod_Approve').modal('hide');
        console.log(response.data.full_name);
        console.log(response.data.service_name);
        console.log(response.data.appointment_date);
        console.log(response.data.appointment_time);
      },
      error: function(error) {
        console.log("ERROR APPROVE BTN CLICK",error);
      }
    });
  });

  // REJECT APPOINTMENT
  $(document).on('click', '#callReject', function() {
    var appointment_id = $(this).closest('td').data('appointment-id');
    var patient_name = $(this).closest('td').data('full-name');
    var appointment_name = $(this).closest('td').data('appointment-name');
    console.log(appointment_id, patient_name, appointment_name);

    $('#rejectPatientName').text(patient_name);
    $('#rejectAppointmentName').text(appointment_name);

    $('#btnReject').data('appointment-id', appointment_id);

    var rejectBTN = $('#btnReject').data('appointment-id');
    console.log("REJECT BUTTIN ID!!!!", rejectBTN);

  });

  $(document).on('click', '#btnReject', function() {
    var appointment_id = $(this).data('appointment-id');
    var status = "REJECTED";
    var user_input = $('#reject_user_input').val();

    var data = {
      appointment_id: appointment_id,
      status: status,
      user_input: user_input
    }

    console.log(appointment_id, user_input);

    if (user_input !== 'REJECT') {
      alert('Please type REJECT to reject.');
      console.log(appointment_id);
      return;
    }
    $.ajax({
      type: 'POST',
      url: 'handles/appointments/approve_reject_appointment.php',
      data: data,
      dataType: 'JSON',
      success: function(response) {
        console.log("SUCESS REJECT BTN CLICK",response);
        loadAppointments();
        $('#mod_Reject').modal('hide');
        console.log(response.data.full_name);
        console.log(response.data.service_name);
        console.log(response.data.appointment_date);
        console.log(response.data.appointment_time);
      },
      error: function(error) {
        console.log("ERROR REJECT BTN CLICK",error);
      }
    });
  });


});
</script>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>