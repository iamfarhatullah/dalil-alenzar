<?php include 'include/startSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Edit Product</title>		
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
              <h3> Edit Product <span>Control Panel</span></h3>
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
      					<h3 class="box-title">Edit Product</h3>
                <?php   
              require_once("connection.php");
              $p_id = $_GET['id'];
              $sql = "SELECT * FROM tbl_products WHERE product_ID=$p_id";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                $rows = mysqli_fetch_assoc($result); 
                  $productID = $rows['product_ID'];
                  $productNameEN = $rows['product_name_en'];
                  $productNameAR = $rows['product_name_ar'];
                  $productDescriptionEN = $rows['product_description_en'];
                  $productDescriptionAR = $rows['product_description_ar'];
                  $productUnitPrice = $rows['product_unit_price'];
                  $productImage = $rows['product_image'];
                  ?>

                  <form action="updateProduct.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-4 col-sm-6">
                      <label>Product Name (EN) *</label>
                      <input type="hidden" name="productID" value="<?php echo $productID; ?>">
                      <input type="text" maxlength="50" value="<?php echo $productNameEN; ?>" class="setup-input" name="productNameEN" placeholder="Type in English" required>
                    </div>
                    <div class="col-md-4 col-sm-6">
                      <label>Product Name (AR) *</label>
                      <input type="text" maxlength="50" value="<?php echo $productNameAR; ?>" class="setup-input" name="productNameAR" placeholder="Type in Arabic" required>
                    </div>
                    <div class="col-md-4 col-sm-6">
                      <label>Product Unit Price *</label>
                      <input type="number" class="setup-input" value="<?php echo $productUnitPrice; ?>" name="productUnitPrice" placeholder="Product Unit Price" required>
                    </div>
                    <div class="col-md-12 col-sm-6">
                      <label>Product Image *</label>  
                      <input type="hidden" name="productImageOld" value="<?php echo $productImage ?>">
                      <input type="file" class="setup-input" name="productImage" placeholder="Product Image" >
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <label>Product Description (EN) *</label>
                      <textarea rows="5" class="setup-input" name="productDescriptionEN" placeholder="Type in English" required><?php echo $productDescriptionEN; ?></textarea>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <label>Product Description (AR) *</label>
                      <textarea rows="5" class="setup-input" name="productDescriptionAR" placeholder="Type in Arabic" required><?php echo $productDescriptionAR; ?></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <input type="submit" value="Submit" name="updateProduct" class="submit-btn">
                    </div>
                  </div>
                </form>
              <?php  
                }else{
                  header("location: products.php");
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