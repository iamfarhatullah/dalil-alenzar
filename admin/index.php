<?php include 'include/startSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Dashboard</title>
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
						<h3><i class="fa fa-tachometer-alt"></i> Dashboard <span>Control Panel</span></h3>
					</div>
					<hr>
				</div>
			</div>
        </div>
    </div>
	<div class="container-fluid">				
		<div class="content-box"> <!-- Page Contents -->
			<?php
    require_once("connection.php");
    $sql= " SELECT count(product_ID) AS total FROM tbl_products";
    $result = mysqli_query($conn, $sql);
    $values = mysqli_fetch_assoc($result);
    $totalProducts = $values['total'];
?>
<?php
    require_once("connection.php");
    $sql= " SELECT count(employee_ID) AS total FROM tbl_employees";
    $result = mysqli_query($conn, $sql);
    $values = mysqli_fetch_assoc($result);
    $totalEmployees = $values['total'];
?>
<?php
    require_once("connection.php");
    $sql= " SELECT count(client_ID) AS total FROM tbl_clients";
    $result = mysqli_query($conn, $sql);
    $values = mysqli_fetch_assoc($result);
    $totalClients = $values['total'];
?>
			<div class="row">
	          <div class="col-md-4 col-sm-6">
	               <div class="widgets">
	                <span class="widgets-span-danger fa-2x fas fa-th-list"></span>
	                <h3 style="color: #95a0a2; padding-bottom: 5px; border-bottom: 1px solid #ddd"><?php 
	                	($totalProducts > 1) ? $product = "Products": $product = "Product";
	                	echo $totalProducts." ".$product;?></h3>
	              </div>
	          </div>
	           <div class="col-md-4 col-sm-6">
	               <div class="widgets">
	                <span class="widgets-span-warning fa-2x fas fa-users-cog"></span>
	                <h3 style="color: #95a0a2; padding-bottom: 5px; border-bottom: 1px solid #ddd"><?php
	                	($totalEmployees > 1) ? $employee = "Employees" : $employee = "Employee";
	                	echo $totalEmployees." ".$employee; ?></h3>
	              </div>
	          </div>
	        	<div class="col-md-4 col-sm-6">
	               <div class="widgets">
	                <span class="widgets-span-success fa-2x fas fa-users"></span>
	                <h3 style="color: #95a0a2; padding-bottom: 5px; border-bottom: 1px solid #ddd"><?php
	                	($totalClients > 1) ? $client = "Clients" : $client = "Client"; 
	                	echo $totalClients." ".$client; ?> </h3>
	              </div>
	          </div>
	        </div>	       
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