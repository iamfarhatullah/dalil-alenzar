<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Log in to your Account</title>		
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>﻿
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../font-awesome-5.3.1/css/all.css">
</head>
<body>
<div class="container-fluid" id="login-page-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="login-box">
					<img src="../img/dalil.png" class="img-responsive">
					<h3>Log In to your account</h3><br>
					<form action="checkAdmin.php" method="post">
					
						<label>Username</label><br>
						<div class="input-group">
							<span class="input-group-addon noborderradius">
                               	<i class="glyphicon glyphicon-user"></i>
								</span>
                          	<input type="text" class="login-input" name="username" placeholder="Enter Username" autocomplete="off" required>
                        </div><br>
					
						<label>Password</label><br>
						<div class="input-group">
							<span class="input-group-addon noborderradius">
                               	<i class="fa fa-key"></i>
								</span>
                          	<input type="password" class="login-input" name="password" placeholder="Enter Password" autocomplete="off" required>
                        </div><br>
						<?php
						if (isset($_GET['msg'])) {
      						$msg = isset($_GET['msg']);
      						echo "<div class='callout callout-danger'>";
      						echo "<p>Username or password incorrect</p>";
      						echo "</div>";
      						echo "<br>";
      					}
      					?>
						<div class="bottom-line"></div>
						<input type="submit" class="login-btn" name="login" value="Log In">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>