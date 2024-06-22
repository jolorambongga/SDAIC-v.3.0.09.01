<footer class="footer bg-dark text-light fixed-bottom">
	<div class="container-fluid ms-0 me-0">
		<div class="row mb-0 mt-0 ms-0 me-0 bg-">
			<div class="col md-6 mt-1 text-start ms-0 me-0 bg-">
				<h5 class="mb-0">Contact Us!</h5>
				<p class="mb-0">Email: spiralctscan2009@gmail.com | Phone: +123 456 7890</p>
			</div>
			<div class="col md-6 mt-1 text-end ms-0 me-0">
				<a href="https://www.facebook.com/spiralctscan2009" class="mb-0" target="_blank"
				style="text-decoration: none; color: #0865FF;">
				<img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_(2019).png"
				alt="Facebook Page" width="18" height="atuo" class="mb-0">
				Sta. Maria Diagnostic and Imaging Center Facebook Page
			</a>
			<p class="mb-0">©
				<?php echo date("Y."); ?> Sta. Maria Diagnostic and Imaging Center
			</p>
		</div>
	</div>
</div>
</footer>

<script>
	$(document).ready(function () {
		$('#btnRegister').click(function () {
			window.location.href="register.php";
		});
		$('#btnLogin').click(function() {
			window.location.href="login.php";
		});
	});
</script>

<?php
include_once('footer_script.php');
?>

</body>

</html>