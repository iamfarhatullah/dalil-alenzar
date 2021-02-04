<?php include 'include/startSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Projects</title>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>﻿
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../font-awesome-5.3.1/css/all.css">
</head>
<body>
<?php include 'include/masterContents.php'; ?>
	<div class="container-fluid">
		<div class="header-box">
			<div class="row">
				<div class="col-md-12">
					<div class="page-title">
						<h3> Projects <span>Control Panel</span></h3>
					</div>
					<hr>
				</div>
			</div>
        </div>
    </div>
	<div class="container-fluid">				
		<div class="content-box"> <!-- Page Contents -->
			<?php if (isset($_GET['msg'])) {
      						$msg = $_GET['msg'];
      						echo "<div class='callout callout-primary'>";
      						echo "<p>".$msg."</p>";
      						echo "</div>";
      						echo "<br>";
      					}elseif (isset($_GET['updateMsg'])) {
      						$msg = $_GET['updateMsg'];
      						echo "<div class='callout callout-primary'>";
      						echo "<p>".$msg."</p>";
      						echo "</div>";
      						echo "<br>";
      					}elseif (isset($_GET['updateMsgErr'])) {
      						$msg = $_GET['updateMsgErr'];
      						echo "<div class='callout callout-danger'>";
      						echo "<p>".$msg."</p>";
      						echo "</div>";
      						echo "<br>";
      					} ?>
			<?php include 'include/displayProjects.php'; ?>
		</div><!-- /Page Contents -->
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$('.to-hide').toggle();
			$('[data-toggle="tooltip"]').tooltip();
		});
	});
</script>

</body>
</html>