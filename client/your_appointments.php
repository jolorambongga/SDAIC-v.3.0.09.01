<?php
$title = "YOUR APPOINTMENTS ITO";
$active_index = "";
$active_profile = "";
$active_your_appointments = "active";
$active_new_appointment = "";
include_once('header.php');
include_once('handles/auth.php');
checkAuth();
?>  

<div class="my-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-4">
        <h1>Your active appointments</h1>
      </div>
    </div>
    <!-- add button -->
    <div class="row">
      <div class="col-12">
        <button id="btnAddNewAppointment" type="button" class="btn btn-primary mt-3 mb-3 float-end">ADD NEW APPOINTMENT</button>
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
              <th scope="col">Procedure Name</th>
              <th scope="col">Appointment Date</th>
              <th scope="col">Appointment Time</th>
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
  </div>
</div>

<script>
  $(document).ready(function() {
    loadAppointments();
    // READ APPOINTMENTS
    function loadAppointments() {
      var user_id = "<?php echo($_SESSION['user_id']);?>";
      console.log("USER ID: (your appointments load)::", user_id);
      $.ajax({
        type: 'GET',
        url: 'handles/read_appointments.php',
        data: {user_id: user_id},
        dataType: 'JSON',
        success: function(response) {
          console.log(response);
          $('#tbodyAppointments').empty();
          response.data.forEach(function(data){
            let statusColor = '';
            switch (data.status) {
              case 'PENDING':
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
            const read_appointments_html = `
            <tr>
            <th scope="row"><small>${data.appointment_id}</small></th>
            <td><small>${data.service_name}</small></td>
            <td><small>${data.appointment_date}</small></td>
            <td><small>${data.appointment_time}</small></td>
            <td data-appointment-id='${data.appointment_id}'>
              <button id='callReqImg' type='button' class='btn btn-warning btn-sm'data-bs-toggle='modal' data-bs-target='#mod_ReqImg '>View Image</button>
            </td>
            <td style='color: ${statusColor};'><small>${data.status}</small></td>
            <td style='color: ${completedColor};'><small>${data.completed}</small></td>
            <td>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end text-center">
                <button id='edit' type='button' class='btn btn-success btn-sm'>Edit</button>
                <button id='delete' type='button' class='btn btn-danger btn-sm'>Delete</button>
              </div>
            </td>
            </tr>
            `
            $('#tbodyAppointments').append(read_appointments_html);
          });
        },
        error: function(error) {
          console.log(error);
        }
      });
    }

    // GO TO NEW APPOINTMENT
    $('#btnAddNewAppointment').click(function() {
      window.location.href="new_appointment.php";
    });

    // GET IMAGE
    $('#tbodyAppointments').on('click', '#callReqImg', function() {
      var appointment_id = $(this).closest("td").data('appointment-id');
      console.log("console click", appointment_id);
      $.ajax({
        type: 'GET',
        url: '../admin/handles/appointments/get_image.php',
        dataType: 'JSON',
        data: { appointment_id: appointment_id },
        success: function(response) {
          if (response.status === "success") {
            $('#imgBody').html(`<img src="data:image/png;base64,${response.data.request_image}" class="img-fluid" alt="Request Image">`);
            $('#mod_ReqImg .modal-title').text(`Request Image - ${response.data.service_name}`);
            console.log(response);
          } else {
            console.log("Image not found for appointment ID: " + appointment_id);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    });
  });
</script>

<?php
include_once('footer.php');
?>