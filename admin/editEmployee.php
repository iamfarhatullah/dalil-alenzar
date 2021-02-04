<?php include 'include/startSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Add New Product</title>		
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
              <h3> Edit Employee <span>Control Panel</span></h3>
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
    				<div class="setup-box"> 
      					<h3 class="box-title">Edit Employee</h3>
                <?php   
              require_once("connection.php");
              $e_id = $_GET['id'];
              $sql = "SELECT * FROM tbl_employees WHERE employee_ID=$e_id";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                $rows = mysqli_fetch_assoc($result); 
                  $employeeID = $rows['employee_ID'];
                  $employeeName = $rows['employee_name'];
                  $employeeDesignation = $rows['employee_designation'];
                  $employeeImage = $rows['employee_image'];
                  $employeeDescription = $rows['employee_description'];
                  ?>

                  <form action="updateEmployee.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-4 col-sm-6">
                      <label>Employee Name *</label>
                      <input type="hidden" name="employeeID" value="<?php echo $e_id; ?>">
                      <input type="text" maxlength="30" class="setup-input" value="<?php echo $employeeName; ?>" name="employeeName" placeholder="Employee Name" required>
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
                      <input type="hidden" name="employeeImageOld" value="<?php echo $employeeImage; ?>">
                      <input type="file" class="setup-input" name="employeeImageNew" placeholder="Employee Image">
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <label>Employee Description *</label>
                      <textarea rows="7" class="setup-input" name="employeeDescription" placeholder="Add Description" required><?php echo $employeeDescription; ?></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <input type="submit" value="Submit" name="updateEmployee" class="submit-btn">
                    </div>
                  </div>
                </form>
              <?php  
                }else{
                  //header("location: employees.php");
                }
              ?>
      					
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