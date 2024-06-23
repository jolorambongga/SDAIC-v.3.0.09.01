<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'/>
	<link rel='stylesheet' href='../includes/css/my_css.css'/>
	<!-- <link rel='stylesheet' href='../includes/css/my_radio.css'/> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bowser"></script>
	<script src="../admin/script/log_script.js"></script>
	<style>
		.sidebar {
			height: 100%;
			width: 250px;
			position: fixed;
			top: 0;
			left: -250px;
			background-color: #FFD95A;
			overflow-x: hidden;
			transition: 0.5s;
			padding-top: 60px;
		}
		.sidebar a {
			padding: 10px 15px;
			text-decoration: none;
			font-size: 18px;
			color: #4C3D3D;
			display: block;
			transition: 0.3s;
		}
		.sidebar a:hover {
			color: #f1f1f1;
		}
		.sidebar .closebtn {
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 50px;
		}
		#main {
			transition: margin-left .5s;
			padding: 16px;
		}
		.hamburger {
			font-size: 30px;
			cursor: pointer;
		}
	</style>
</head>

<body>
	<!-- Sidebar -->
	<div id="mySidebar" class="sidebar">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="index.php">Homepage</a>
		<?php
		session_start();
		if(isset($_SESSION['user_id'])) {
			echo '
			<a href="profile.php">Profile</a>
			<a href="your_appointments.php">Your Appointments</a>
			<a href="new_appointment.php">New Appointment</a>
			';
		}
		?>
	</div>

	<!-- Main content -->
	<div id="main">
		<div class="container-fluid ms-0 me-0">
			<div class="row">
				<div class="col-12 d-flex justify-content-between align-items-center" style="background-color: #FFD95A;">
					<span class="hamburger" onclick="openNav()">&#9776;</span>
					<a class="navbar-brand" href="index.php" style="color: #4C3D3D;">
						<img src="https://www.logolynx.com/images/logolynx/2a/2ad00c896e94f1f42c33c5a71090ad5e.png" alt="Logo" width="30" height="auto" class="d-inline-block align-text-top">
						STA. MARIA DIAGNOSTIC AND IMAGING CENTER
					</a>
					<div>
						<?php
						if(isset($_SESSION['user_id'])) {
							echo '<button id="btnLogout" type="button" class="btn btn-mydark me-2 mt-2 mb-2">Log-Out</button>';
						} else {
							echo '<button id="btnRegister" type="button" class="btn btn-mydark me-2 mt-2 mb-2">Register</button>';
							echo '<button id="btnLogin" type="button" class="btn btn-mydark me-2 mt-2 mb-2">Log-In</button>';
						}
						?>
					</div>
				</div>
			</div>
		</div>


		<!-- end header -->
