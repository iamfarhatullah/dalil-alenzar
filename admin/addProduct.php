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
              <h3> Add Product <span>Control Panel</span></h3>
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
      					<h3 class="box-title">Add Product</h3>

      					<form action="submitProduct.php" method="post" enctype="multipart/form-data">
	      					<div class="row">
	      						<div class="col-md-4 col-sm-6">
	      							<label>Product Name (EN) *</label>
	      							<input type="text" maxlength="50" class="setup-input" name="productNameEN" placeholder="Type in English" required>
	      						</div>
	      						<div class="col-md-4 col-sm-6">
	      							<label>Product Name (AR) *</label>
	      							<input type="text" maxlength="50" class="setup-input" name="productNameAR" placeholder="Type in Arabic" required>
	      						</div>
	      						<div class="col-md-4 col-sm-6">
	      							<label>Product Unit Price *</label>
	      							<input type="number" class="setup-input" name="productUnitPrice" placeholder="Product Unit Price" required>
	      						</div>
	      						<div class="col-md-12 col-sm-6">
	      							<label>Product Image *</label>	
	      							<input type="file" class="setup-input" name="productImage" placeholder="Product Image" required>
	      						</div>
	      						<div class="col-md-6 col-sm-6">
	      							<label>Product Description (EN) *</label>
	      							<textarea rows="5" class="setup-input" name="productDescriptionEN" placeholder="Type in English" required></textarea>
	      						</div>
	      						<div class="col-md-6 col-sm-6">
	      							<label>Product Description (AR) *</label>
	      							<textarea rows="5" class="setup-input" name="productDescriptionAR" placeholder="Type in Arabic" required></textarea>
	      						</div>
	      					</div>
	      					<div class="row">
	      						<div class="col-md-3">
	      							<input type="submit" value="Submit" name="submitProduct" class="submit-btn">
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