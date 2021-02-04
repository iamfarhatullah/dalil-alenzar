<?php include 'include/startSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Create Invoice</title>		
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
						<h3> Create Invoice <span>Control Panel</span></h3>
					</div>
					<hr>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">				
		<div class="content-box"> <!-- Page Contents -->
			<div class="col-md-12 col-sm-12 col-xs-12">
  				<?php  
      			if (isset($_GET['msg'])) {
      				$msg = $_GET['msg'];
      				echo "<div class='callout callout-warning'>";
      				echo "<p>".$msg."</p>";
      				echo "</div>";
      				echo "<br>";
      			}
      			?>
      		</div>
      		<form action="submitInvoice.php" method="post">
			<?php   
			require_once("./connection.php");
			$todayDate = date("Y-m-d");
			$clientID = $_GET['client_ID'];
			$sqlCient = "SELECT * FROM tbl_clients WHERE client_ID='$clientID'";
			$resultClient = mysqli_query($conn, $sqlCient);
				while ($row = mysqli_fetch_assoc($resultClient)) {
					$clientID = $row['client_ID'];
					$clientNameEN = $row['client_name_en'];
					$clientNameAR = $row['client_name_ar'];
					$clientAddressEN = $row['client_address_en'];
					$clientAddressAR = $row['client_address_ar'];	
							
				}
			?>
        		<div class="col-md-12">
        			<div class="client-info-box">
        				<div class="row">
	        				<div class="col-md-6 col-sm-6 col-xs-6"><br>
	        					<h3>Client Info</h3>
	        				</div>
	        				<div class="col-md-6 col-sm-6 col-xs-6">
	        					<input type="submit" class="submit-btn pull-right" name="submit" value="Save Invoice"/>		
	        				</div>
	        			</div><hr>
	        			<div class="row">
	        				<div class="col-md-6 col-sm-6 col-xs-6">
	        					<p>Name</p>
	        					<h4><?php echo $clientNameEN; ?></h4><br>
	        					<p>Address</p>
	        					<h5><i><?php echo $clientAddressEN; ?></i></h5>
	        				</div>
	        				<div class="col-md-6 col-sm-6 col-xs-6" style="text-align: right;">
	        					<p>اسم</p>
	        					<h4><?php echo $clientNameAR; ?></h4><br>
	        					<p>عنوان</p>
	        					<h5><i><?php echo $clientAddressAR; ?></i></h5>
	        				</div>
	        			</div><br>
	        			<div class="row">
	        				<div class="col-md-3 col-sm-6">
	        					<input type="hidden" class="setup-input disabled" value="<?php echo $clientID; ?>" name="clientID" required>
	        					<label>Invoice No</label>
	        					<input type="text" class="setup-input" placeholder="Enter Invoice no" name="orderInvoiceNo" required>
	        				</div>
	        				<div class="col-md-3 col-sm-6">
	        					<label>VAT %</label>
	        					<input type="number" class="setup-input" value="5" name="orderVat" placeholder="Vat %" required>
	        				</div>
	        				<div class="col-md-3 col-sm-6">
	        					<label>Additional Charges</label>
	        					<input type="number" class="setup-input" value="0" name="additionalCharges" placeholder="Additional Charges" required>
	        				</div>
	        				<div class="col-md-3 col-sm-6">
	        					<label>Date</label>
	        					<input type="date" class="setup-input" value="<?php	echo $todayDate; ?>" name="orderDate" required>
	        				</div>
	        			</div>
        			</div>
        		</div>
				<div class='col-md-12'>
					<div class='client-info-box'>
						<div class="row">
							<div class="col-md-8">
								<h3>Select Items</h3>
							</div>
							<div class="col-md-4"><br>
								<input type="text" name="searchProduct" id="searchProduct" class="setup-input" onkeyup="loaddata();" placeholder="Search Products" style="position: relative;">
								<div id="display_info" class="col-md-11" style="background-color: #fff; position: absolute; z-index: 999; top: 62px; box-shadow: 1px 1px 3px #ccc;"></div>
							</div>
						</div><br>
	<?php
	$sqlProduct = "SELECT * FROM tbl_products";
	$resultProduct = mysqli_query($conn, $sqlProduct);
	if (mysqli_num_rows($resultProduct) > 0) {
		echo "<div class='row'>";
		while ($rows = mysqli_fetch_assoc($resultProduct)) {
			$productID = $rows['product_ID'];
			$productName = $rows['product_name_en'];
			$productDescription = $rows['product_description_en'];
			$productImage = $rows['product_image'];
		echo ' 	<div class="col-md-2 col-sm-4 col-xs-6 nopadding">
	        		<div class="item-box" onselectstart="return false">
	        			<img src="'.$productImage.'" class="img-responsive">
	        			<h3>'.$productName.'</h3>
	        			<table>
	        				<tr>
	        					<td>
	        						<p>Quantity</p>		
	        					</td>
	        					<td>
	        						<input type="number" name="quantity'.$productID.'" value="1" class="item-quantity">	
	        					</td>
	        				</tr>
	        			</table>
	        			<label for="checkbox'.$productID.'"><input type="checkbox" class="item-checkbox" id="checkbox'.$productID.'" name="check_list[]" value="'.$productID.'"> Add to invoice</label>
	        		</div>
	        	</div>';
			}
		echo "</div>";
	}else{
		echo "No product available";
	}
	
?>			
	</div>
</div>

	
				
			</form>
		</div><!-- /Page Contents -->
	</div>
</div>



<script type="text/javascript">
	function loaddata(){
		var name=$('#searchProduct').val();
		if(name){
			$.ajax({
				type: 'post',
				url: 'searchProduct.php',
				data: {
					searchProduct:name,
				},
				success: function (response) {
					$('#display_info').html(response);
				}
			});
		}else{
			$('#display_info').html("Enter here..");
			$('#searchProduct').blur(function() {
				$('#display_info').css("display", "none");
			});
			$('#searchProduct').focus(function() {
				$('#display_info').css("display", "block");
			});
		}
	}
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