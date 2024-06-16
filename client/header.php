<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'/>
	<link rel='stylesheet' href='../includes/css/my_css.css'/>
	<link rel='stylesheet' href='../includes/css/my_radio.css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
	<!-- nav bar -->
	<nav class="navbar navbar-expand-lg sticky-md-top shadow-sm" style="background-color: #FFC000;">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php" style="color: black;">
				<img src="https://www.logolynx.com/images/logolynx/2a/2ad00c896e94f1f42c33c5a71090ad5e.png" alt="Logo"
				width="30" height="auto" class="d-inline-block align-text-top">
				STA. MARIA DIAGNOSTIC AND IMAGING CENTER
			</a>
		</div>
	</nav>
	<!-- end nav bar -->

	<!-- header -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 d-flex align-items-end" style="background-color: whitesmoke;">
				<ul class="nav nav-tabs my_nav">
					<li class="nav-item">
						<a class="nav-link <?php echo $active_index ?>" href="index.php">Homepage</a>
					</li>
				</ul>
				<?php
				session_start();

				if(isset($_SESSION['user_id'])) {
					echo '
					<ul class="nav nav-tabs my_nav">
					<li class="nav-item">
					<a class="nav-link ' . $active_profile . '" href="profile.php">Profile</a>
					</li>
					</ul>
					<ul class="nav nav-tabs my_nav">
					<li class="nav-item">
					<a class="nav-link ' . $active_your_appointments . '" href="your_appointments.php">Your Appointments</a>
					</li>
					</ul>
					<ul class="nav nav-tabs my_nav">
					<li class="nav-item">
					<a class="nav-link ' . $active_new_appointment . '" href="new_appointment.php">New Appointment</a>
					</li>
					</ul>';

				} else {
					echo`

					<script>
						window.location.href="index.php";
					</script>
					`;
				}

				?>
			</div>
			<div class="col-md-6 d-flex justify-content-end" style="background-color: hotpink;">
				<!-- IF SET CONDITION FOR BUTTONS -->
				<?php
				if(isset($_SESSION['user_id'])) {
					echo '
					<button id="btnLogout" type="button" class="btn btn-danger me-2 mt-2 mb-2">Log-Out</button>
					';
				} else {
					echo '
					<button id="btnRegister" type="button" class="btn btn-primary me-2 mt-2 mb-2">Register</button>
					<button id="btnLogin" type="button" class="btn btn-primary me-2 mt-2 mb-2">Log-In</button>
					';
				}
				?>
			</div>
		</div>
	</div>

	<!-- end header -->

	<script>
		$(document).ready(function () {
			$('#btnLogout').click(function () {
				$.ajax({
					type: "GET",
					url: "handles/logout_endpoint.php",
					success: function(response) {
						window.location.href="index.php";
						console.log(response);
					},
					error: function(error) {
						console.log(error);
					}
				});
			});
		});
	</script>