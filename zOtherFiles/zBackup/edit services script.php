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
              $('#dropdown-doctor').val(selectedDoctorId);
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
        var doctor_id = $('#dropdown-doctor').val();

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
            $('#dropdown-doctor').val(selectedDoctorId);
            $('.dropdown-toggle').text(selectedDoctorName).data('doctor-id', selectedDoctorId);

            console.log("GET DOCTOR ID ON EDIT:", doctor_id);
            // ACTUAL UPDATE ^^ ABOVE IS FOR GETTING ONLY
            $('#frmEditService').off('submit').submit(function (e){
              e.preventDefault();
              var service_name = $('#edit_service_name').val();
              var description = $('#edit_description').val();
              var duration = $('#edit_duration').val();
              var cost = $('#edit_cost').val();
              var doctor_id = $('#dropdown-doctor').val();

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
        $('.dropdown-toggle').text('SELECT A DOCTOR');

        $('#edit_service_name').val('');
        $('#edit_description').val('');
        $('#edit_duration').val('');
        $('#edit_cost').val('');
        $('.dropdown-toggle').text('SELECT A DOCTOR');

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