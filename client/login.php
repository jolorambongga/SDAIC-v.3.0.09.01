<?php
$title = "SDAIC - Log In";
$active_index = "";
$active_profile = "";
$active_your_appointments = "";
$active_new_appointment = "";
$active_login="active";
include_once('header.php');
include_once('handles/auth.php');
checkLoggedIn();
?>

<link rel="stylesheet" href="../includes/css/my_login.css">

<div class="my-wrapper">
<div class="login-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="login-box">
          <h1 class="text-center mb-4">Log In</h1>
          <form method="post" id="frm_login">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="login" name="login" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-4"></div>
            <div class="form-group">
              <input value="Log In" id="btnLogin" type="submit" class="btn btn-primary btn-block">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>



<script>
  $(document).ready(function() {
    $('#frm_login').submit(function (e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'handles/login_endpoint.php',
        data: {login: $('#login').val(), password: $('#password').val()},
        dataType: 'JSON',
        success: function(response) {
          var user_id = response.data.user_id;
          var category = "USER";
          var action = "LOG IN";
          var affected_data = "NONE";
          // console.log("USER ID:", user_id);
          if(response.status === "success") {            
            logAction(user_id, category, action, affected_data);
            // window.location.href = "new_appointment.php";
          } else {
            console.error("Login failed:", response.message);
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