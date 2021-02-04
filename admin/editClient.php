<?php include 'include/startSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Edit Client</title>		
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
              <h3> Edit Client <span>Control Panel</span></h3>
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
      					<h3 class="box-title">Edit Client</h3>
                <?php   
              require_once("connection.php");
              $c_id = $_GET['id'];
              $sql = "SELECT * FROM tbl_clients WHERE client_ID=$c_id";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result); 
                    $client_ID = $row['client_ID'];
                    $client_name_en = $row['client_name_en'];
                    $client_name_ar = $row['client_name_ar'];
                    $client_address_en = $row['client_address_en'];
                    $client_address_ar = $row['client_address_ar'];
                    $client_contract = $row['client_contract'];
                  ?>

      					<form action="updateClient.php" method="post" enctype="multipart/form-data">
	      					<div class="row">
	      						<div class="col-md-6 col-sm-6">
	      							<label>Name (In English)*</label>
                      <input type="hidden" name="client_ID" value="<?php echo $client_ID; ?>">
	      							<input type="text" maxlength="50" class="setup-input" name="clientNameEN" value="<?php echo $client_name_en; ?>" placeholder="Type in English" required>
	      						</div>
	      						<div class="col-md-6 col-sm-6">
	      							<label>Name (In Arabic)*</label>
	      							<input type="text" maxlength="50" class="setup-input" name="clientNameAR" value="<?php echo $client_name_ar; ?>" placeholder="Type in Arabic" required>
	      						</div>
	      						<div class="col-md-6 col-sm-6">
	      							<label>Address (In English)*</label>
	      							<input type="text" maxlength="100" class="setup-input" name="clientAddressEN" value="<?php echo $client_address_en; ?>" placeholder="Type in English" required>
	      						</div>
	      						<div class="col-md-6 col-sm-6">
	      							<label>Address (In Arabic)*</label>
	      							<input type="text" maxlength="100" class="setup-input" name="clientAddressAR" value="<?php echo $client_address_ar; ?>" placeholder="Type in Arabic" required>
	      						</div>
                    <div class="col-md-12 col-sm-12">
                      <label>Client Contract</label>
                      <input type="hidden" name="clientContractOld" value="<?php echo $client_contract; ?>">
                      <input type="file" class="setup-input" name="clientContractNew">
                    </div>
	      					</div>
	      					<div class="row">
	      						<div class="col-md-3">
	      							<input type="submit" value="Submit" name="updateClient" class="submit-btn">
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