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

				<!-- dash, profile, appointments, doctors, services, users, logs -->

				<!-- dashboard -->
				<ul class="nav nav-tabs my_nav">
					<li class="nav-item">
						<a class="nav-link <?php echo $active_dashboard ?>" href="admin_dashboard.php">Dashboard</a>
					</li>
				</ul>

				<!-- profie admin -->
				<ul class="nav nav-tabs my_nav">
					<li class="nav-item">
						<a class="nav-link <?php echo $active_profile ?>" href="admin_profile.php">Profile</a>
					</li>
				</ul>

				<!-- appointments | view appointments -->
				<ul class="nav nav-tabs my_nav">
					<li class="nav-item">
						<a class="nav-link <?php echo $active_appointments ?>" href="view_appointments.php">Appointments</a>
					</li>
				</ul>

				<!-- doctors | edit doctors -->
				<ul class="nav nav-tabs my_nav">
					<li class="nav-item">
						<a class="nav-link <?php echo $active_doctors ?>" href="edit_doctors.php">Doctors</a>
					</li>
				</ul>

				<!-- services | edit services -->
				<ul class="nav nav-tabs my_nav">
					<li class="nav-item">
						<a class="nav-link <?php echo $active_services ?>" href="edit_services.php">Services</a>
					</li>
				</ul>

				<!-- users | edit users -->
				<ul class="nav nav-tabs my_nav">
					<li class="nav-item">
						<a class="nav-link <?php echo $active_users ?>" href="edit_users.php">Users</a>
					</li>
				</ul>

				<!-- logs -->
				<ul class="nav nav-tabs my_nav">
					<li class="nav-item">
						<a class="nav-link <?php echo $active_logs ?>" href="logs.php">Logs</a>
					</li>
				</ul>


			</div>
			<div class="col-md-6 d-flex justify-content-end" style="background-color: red;">
				<!-- IF SET CONDITION FOR BUTTONS -->
				<button type="button" class="btn btn-primary me-2 mt-2 mb-2">Log-Out</button>
			</div>
		</div>
	</div>

	<!-- end header -->