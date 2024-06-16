<?php
$title = "PROFILE ITO";
$active_index = "";
$active_profile = "active";
$active_your_appointments = "";
$active_new_appointment = "";
include_once('header.php');
include_once('handles/auth.php');
checkAuth();
?>  

<div class="my-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-4">
        <h1>Your profile</h1>
      </div>
    </div>
  </div>
</div>

<?php
include_once('footer.php');
?>