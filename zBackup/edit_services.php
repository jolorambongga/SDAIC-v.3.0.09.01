<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'/>
  <link rel='stylesheet' href='../includes/css/my_css.css'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SDAIC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- dashboard -->
          <li class="nav-item">
            <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
          </li>
          <!-- profile -->
          <li class="nav-item">
            <a class="nav-link" href="admin_profile.php">Profile</a>
          </li>
          <!-- view appointments -->
          <li class="nav-item">
            <a class="nav-link" href="view_appointments.php">View Appointments</a>
          </li>
          <!-- edit doctors -->
          <li class="nav-item">
            <a class="nav-link" href="edit_doctors.php">Edit Doctors</a>
          </li>
          <!-- edit services -->
          <li class="nav-item">
            <a class="nav-link active" href="edit_services.php">Edit Services</a>
          </li>
          <!-- edit users -->
          <li class="nav-item">
            <a class="nav-link" href="edit_users.php">Edit Users</a>
          </li>
          <!-- logs -->
          <li class="nav-item">
            <a class="nav-link" href="logs.php">Logs</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="my-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <h1>Edit Services</h1>
        </div>
      </div>
      <!-- add button -->
      <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-primary mt-3 mb-3 float-end" data-bs-toggle="modal"
          data-bs-target="#modAddService">Add Service</button>
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
                <th scope="col">Service Name</th>
                <th scope="col">Description</th>
                <th scope="col">Duration</th>
                <th scope="col">Cost</th>
                <th scope="col">Doctor</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="tbodyServices">

            </tbody>
          </table>
        </div>
      </div>
      <!-- end table -->
      <!-- add service modal -->
      <form id="frmAddService">
        <div class="modal fade" id="modAddService" tabindex="-1" aria-labelledby="modAddServiceLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modAddServiceLabel">Add New Service</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- service name -->
                <label for="service_name" class="form-label">Service Name</label>
                <input type="text" id="service_name" class="form-control">
                <pre></pre>
                <!-- service description -->
                <label for="description" class="form-label">Service Description</label>
                <input type="text" id="description" class="form-control">
                <pre></pre>
                <!-- service duration -->
                <label for="duration" class="form-label">Service Duration</label>
                <input type="text" id="duration" class="form-control">
                <pre></pre>
                <!-- service cost -->
                <label for="cost" class="form-label">Service Cost</label>
                <input type="number" id="cost" class="form-control">
                <pre></pre>
                <!-- service doctor -->
                <label for="doctor_id" class="form-label">Doctor Name</label>
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    (Please Select A Doctor)
                  </button>
                  <ul id="dropdown-menu" class="dropdown-menu">
                    ...
                  </ul>
                </div>
                <pre></pre>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Add Service</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- end modal -->
      <!-- edit service modal -->
      <form id="frmEditService">
        <div class="modal fade" id="modEditService" tabindex="-1" aria-labelledby="modEditServiceLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modEditServiceLabel">Edit Service</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- service name -->
                <label for="edit_service_name" class="form-label">Service Name</label>
                <input type="text" id="edit_service_name" class="form-control">
                <pre></pre>
                <!-- service description -->
                <label for="edit_description" class="form-label">Service Description</label>
                <input type="text" id="edit_description" class="form-control">
                <pre></pre>
                <!-- service duration -->
                <label for="edit_duration" class="form-label">Service Duration</label>
                <input type="text" id="edit_duration" class="form-control">
                <pre></pre>
                <!-- service cost -->
                <label for="edit_cost" class="form-label">Service Cost</label>
                <input type="number" id="edit_cost" class="form-control">
                <pre></pre>
                <!-- service doctor -->
                <label for="edit_doctor_id" class="form-label">Doctor Name</label>
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    (Please Select A Doctor)
                  </button>
                  <ul id="dropdown-menu" class="dropdown-menu">
                    ...
                  </ul>
                </div>
                <pre></pre>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save Changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- end modal -->
      <!-- delete service modal -->
      <form id="frmDeleteService">
        <div class="modal fade" id="modDeleteService" tabindex="-1" aria-labelledby="modDeleteServiceLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modDeleteServiceLabel">Delete Service</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- service name -->
                <label for="delete_user_input" class="form-label">Type <b>*DELETE*</b> to delete this.</label>
                <input type="text" id="delete_user_input" class="form-control">
                <pre></pre>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                <button id="btnDelete" type="button" class="btn btn-danger">Delete</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- end modal -->
    </div>
  </div>

  <script>
    $(document).ready(function(){
      loadServices();
      // LOAD
      function loadServices() {
        $.ajax({
          type: 'GET',
          url: 'handles/services/read_services.php',
          dataType: 'json',
          success: function(response) {
            $('#tbodyServices').empty();
            $.each(response.data, function(key, value) {
              console.log(response);
              // id, service name, description, duration, cost, doctor, action
              const data = `
              <tr>
              <th scope="row">${value.service_id}</th>
              <td>${value.service_name}</td>
              <td>${value.description}</td>
              <td>${value.duration}</td>
              <td>${value.cost}</td>
              <td>${value.doctor_name}</td>
              <td data-service-id="${value.service_id}" data-doctor-id="${value.doctor_id}">
              <div class="d-grid gap-2 d-md-flex justify-content-md-start text-center float-end">
              <button id="callEdit" type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modEditService'>EDIT</button>
              <button id="callDelete" type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modDeleteService'>DELETE</button>
              </div>
              </td>
              </tr>
              `;
              $('#tbodyServices').append(data);
            });
          },
          error: function(error) {
            console.log("ERROR READ SERVICES:", error);
          }
        });
        } // END LOAD

        // GET DOCTORS
        $.ajax({
          type: 'GET',
          url: 'handles/doctors/read_doctors.php',
          dataType: 'json',
          success: function(response) {
            $('.dropdown-menu').empty();
            $.each(response.data, function(key, value) {
              const doctors = `<li data-doctor-id=${value.doctor_id}><button class="dropdown-item" type="button">${value.doctor_name}</button></li>`;
              $('.dropdown-menu').append(doctors);
              $('.dropdown-menu').on('click', '.dropdown-item', function() {
                const selectedDoctorName = $(this).text();
                const selectedDoctorId = $(this).closest("li").data('doctor-id');
                $('#dropdown-menu').val(selectedDoctorId);
                $('.dropdown-toggle').text(selectedDoctorName).data('doctor-id', selectedDoctorId);
                console.log("SELECTED DOCTOR NAME:", selectedDoctorName);
                console.log("SELECTED DOCTOR ID:", selectedDoctorId);
              });
            });
          },
          error: function(error) {
            console.log("ERROR GETTING DOCTORS:", error);
          }
        }); // END GET DOCTORS

        // CREATE SERVICE
        $('#frmAddService').off('submit').submit(function (e){
          e.preventDefault();
          var service_name = $('#service_name').val();
          var description = $('#description').val();
          var duration = $('#duration').val();
          var cost = $('#cost').val();
          var doctor_id = $('#dropdown-menu').val();

          var dataService = {
            service_name: service_name,
            description: description,
            duration: duration,
            cost: cost,
            doctor_id: doctor_id
          }

          $.ajax({
            type: 'POST',
            url: 'handles/services/create_service.php',
            data: dataService,
            dataType: 'json',
            success: function(response) {
              console.log(response);
              loadServices();
              closeModal();
            },
            error: function(error) {
              console.log("ERROR:", error);
            }
          });
        }); // END CREATE SERVICE

        // UPDATE SERVICE
        $(document).on('click', '#callEdit', function() {
          var service_id = $(this).closest("td").data('service-id');
          console.log("SERVICE ID ON EDIT:", service_id);
          $.ajax({
            type: 'GET',
            url: 'handles/services/get_service.php',
            data: {service_id: service_id},
            dataType: 'json',
            success: function(response) {
              var service = response.data[0];
              var service_id = service.service_id;
              var service_name = service.service_name;
              var description = service.description;
              var duration = service.duration;
              var cost = service.cost;
              var doctor_id = service.doctor_id;
              var doctor_name = service.doctor_name;
              $('#edit_service_name').val(service_name);
              $('#edit_description').val(description);
              $('#edit_duration').val(duration);
              $('#edit_cost').val(cost);
              
              const selectedDoctorName = doctor_name;
              const selectedDoctorId = doctor_id;
              $('#dropdown-menu').val(selectedDoctorId);
              $('.dropdown-toggle').text(selectedDoctorName).data('doctor-id', selectedDoctorId);

              console.log("GET DOCTOR ID ON EDIT:", doctor_id);
              // ACTUAL UPDATE ^^ ABOVE IS FOR GETTING ONLY
              $('#frmEditService').off('submit').submit(function (e){
                e.preventDefault();
                var service_name = $('#edit_service_name').val();
                var description = $('#edit_description').val();
                var duration = $('#edit_duration').val();
                var cost = $('#edit_cost').val();
                var doctor_id = $('#dropdown-menu').val();

                var dataService = {
                  service_id: service_id,
                  service_name: service_name,
                  description: description,
                  duration: duration,
                  cost: cost,
                  doctor_id: doctor_id
                }

                $.ajax({
                  type: 'POST',
                  url: 'handles/services/update_service.php',
                  data: dataService,
                  dataType: 'json',
                  success: function(response) {
                    console.log("RESPONSE ON POST UPDATE:", response);
                    loadServices();
                    console.log("DATA SERVICE IN POST UPDATE", dataService);
                    closeModal();
                  },
                  error: function(error) {
                    console.log("POST ERROR ON UPDATE:", error);
                  }
                });
              }); // END CREATE SERVICE
            },
            error: function(error) {
              console.log("GET ERROR ON UPDATE:", error);
            }
          });
        }); // END UPDATE SERVICE

        // DELETE SERVICE
        $(document).on('click', '#callDelete', function() {
          var service_id = $(this).closest("td").data('service-id');
          $(document).on('click', '#btnDelete', function() {
            var user_input = $('#delete_user_input').val();
            var data = {
              service_id: service_id,
              user_input: user_input
            }
            console.log(data);
            $.ajax({
              type: 'POST',
              url: 'handles/services/delete_service.php',
              data: data,
              dataType: 'json',
              success: function(response) {
                console.log(response);
                loadServices();
                closeModal();
              },
              error: function(error) {
                console.log(error);
              }
            });
          });
          console.log("DEL SERVICE ID:", service_id);
        }); // END DELETE SERVICE

        function closeModal() {
          $('#modAddService .btn-close').click();
          $('#modEditService .btn-close').click();
          $('#modDeleteService .btn-close').click();
          clearFields();
        }

        // CLEAR INPUTS
        function clearFields() {
          $('#service_name').val('');
          $('#description').val('');
          $('#duration').val('');
          $('#cost').val('');
          $('.dropdown-toggle').text('(Please Select A Doctor)');

          $('#edit_service_name').val('');
          $('#edit_description').val('');
          $('#edit_duration').val('');
          $('#edit_cost').val('');
          $('.dropdown-toggle').text('(Please Select A Doctor)');

          $('#delete_user_input').val('');
        } // END CLEAR INPUTS

        // CLOSE MODAL
        $('#modAddService').on('hidden.bs.modal', function () {
          clearFields();
        });

        $('#modEditService').on('hidden.bs.modal', function () {
          clearFields();
        });

        $('#modDeleteService').on('hidden.bs.modal', function () {
          clearFields();
        }); // END CLOSE MODALS


      }); // END READY
    </script>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
  </body>

  </html>