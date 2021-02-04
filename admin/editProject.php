<?php include 'include/startSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Edit Project</title>		
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
              <h3> Edit Project <span>Control Panel</span></h3>
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
      					<h3 class="box-title">Edit Project</h3>
                <?php   
              require_once("connection.php");
              $p_id = $_GET['id'];
              $sql = "SELECT * FROM tbl_projects WHERE project_ID=$p_id";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                $rows = mysqli_fetch_assoc($result); 
                  $projectID = $rows['project_ID'];
                  $projectName = $rows['project_name'];
                  $projectDescription = $rows['project_description'];
                  $projectTotalAmount = $rows['project_total_amount'];
                  $projectConsumption = $rows['project_consumption'];
                  $projectDate = $rows['project_date'];
                  ?>

                  <form action="updateProject.php" method="post">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <label>Name</label>
                      <input type="hidden" name="projectID" value="<?php echo $projectID; ?>">
                      <input type="text" class="setup-input" name="projectName" value="<?php echo $projectName; ?>" placeholder="Project Name" required>
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <label>Total Amount</label>
                      <input type="number" maxlength="50" class="setup-input" name="projectTotalAmount" value="<?php echo $projectTotalAmount; ?>" placeholder="Project total amount" required>
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <label>Consumption</label>
                      <input type="number" maxlength="50" class="setup-input" name="projectConsumption" value="<?php echo $projectConsumption; ?>" placeholder="Project consumption" required>
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <label>Project Date</label>
                      <input type="date" class="setup-input" name="projectDate" value="<?php echo $projectDate; ?>" required>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <label>Description</label>
                      <textarea rows="5" class="setup-input" name="projectDescription" placeholder="Project Description" required><?php echo $projectDescription; ?></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <input type="submit" value="Submit" name="updateProject" class="submit-btn">
                    </div>
                  </div>
                </form>
              <?php  
                }else{
                  header("location: projects.php");
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