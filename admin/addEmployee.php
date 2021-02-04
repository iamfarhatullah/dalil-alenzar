<?php include 'include/startSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Add New Employees</title>		
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
              <h3> Add Employees <span>Control Panel</span></h3>
            </div>
            <hr>
          </div>
        </div>
        </div>
    </div>
    <div class="container-fluid">				
        <div class="content-box"> <!-- Page Contents -->

        <div class="row">
  				<div class="col-md-12 col-sm-12 col-xs-12">
  					<?php  
      					if (isset($_GET['msgErr'])) {
      						$msg = $_GET['msgErr'];
      						echo "<div class='callout callout-danger'>";
      						echo "<p>".$msg."</p>";
      						echo "</div>";
      						echo "<br>";
      					}
      					?>
    				<div class="setup-box"> 
      					<h3 class="box-title">Add Employee</h3>
      					<form action="submitEmployee.php" method="post" enctype="multipart/form-data">
	      					<div class="row">
	      						<div class="col-md-4 col-sm-6">
	      							<label>Employee Name *</label>
	      							<input type="text" maxlength="30" class="setup-input" name="employeeName" placeholder="Employee Name" required>
	      						</div>
	      						<div class="col-md-4 col-sm-6">
	      							<label>Select Designation *</label>
	      							<select class="setup-input" name="employeeDesignation" required="required">
	      								<option value="">Select Designation</option>
	      								<option value="Software Engineer">Software Engineer</option>
	      								<option value="Mechanical Engineer">Mechanical Engineer</option>
	      							</select>
	      						</div>
	      						<div class="col-md-4 col-sm-12">
	      							<label>Employee Image *</label>	
	      							<input type="file" class="setup-input" name="employeeImage" placeholder="Employee Image" required>
	      						</div>
	      						<div class="col-md-12 col-sm-12">
	      							<label>Employee Description *</label>
	      							<textarea rows="7" class="setup-input" name="employeeDescription" placeholder="Add Description" required></textarea>
	      						</div>
	      					</div>
	      					<div class="row">
	      						<div class="col-md-3">
	      							<input type="submit" value="Submit" name="submitEmployee" class="submit-btn">
	      						</div>
	      					</div>
      					</form>
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
<script>
	$(document).ready(function(){
    	//$('[data-toggle="tooltip"]').tooltip();   
	});
</script>
</body>
</html>