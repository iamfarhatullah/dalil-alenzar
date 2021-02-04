<?php include 'include/startSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Edit Invoice</title>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>﻿
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../font-awesome-5.3.1/css/all.css">
<style type="text/css">
#shopping-cart {
	font-family: Arial;
	color: #211a1a;
	font-size: 14px;
}
#shopping-cart table {
	width: 100%;
	background-color: #F0F0F0;
}
#shopping-cart table, td, th {
	padding: 4px;
  border: 1px solid #ccc;
}
#shopping-cart table td {
	background-color: #FFFFFF;
}	
.tbl-cart th {
	font-weight: normal;
}
.cart-item-image {
	width: 50px;
    height: 50px;
    border-radius: 50%;
    border: #E0E0E0 1px solid;
    padding: 1px;
    vertical-align: middle;
    margin-right: 15px;
}
</style>
</head>
<body>
<?php include 'include/masterContents.php'; ?>
	<div class="container-fluid">
		<div class="header-box">
			<div class="row">
				<div class="col-md-12">
					<div class="page-title">
						<h3><i class="fa fa-tachometer-alt"></i> Edit Invoice <span>Control Panel</span></h3>
					</div>
					<hr>
				</div>
			</div>
        </div>
    </div>
	<div class="container-fluid">				
		<div class="content-box"> <!-- Page Contents -->
			<?php 
		include 'include/numbersToWords.php';
		$invoiceNo = $_GET['invoiceNo'];
		$sql = "SELECT * FROM `tbl_orders` INNER JOIN tbl_clients ON tbl_clients.client_ID = tbl_orders.fk_client_ID WHERE `order_invoice_no`='$invoiceNo'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {

			while ($row = mysqli_fetch_assoc($result)) {
				$clientID = $row['client_ID'];
				$clientNameEN = $row['client_name_en'];
				$clientNameAR = $row['client_name_ar'];
				$clientAddressEN = $row['client_address_en'];
				$clientAddressAR = $row['client_address_ar'];
				$orderID = $row['order_ID'];
				$orderDate = $row['order_date'];
				$orderVat = $row['order_vat'];
				$orderAdditionalCharges = $row['order_additionalCharges'];
				$orderInvoiceNo = $row['order_invoice_no'];
				
				echo '<div class="">
        			<div class="client-info-box">
	        			<div class="row">
	        			<br>
	        				<div class="col-md-6">
	        					<p>Name</p>
	        					<h4>'.$clientNameEN.'</h4><br>
	        					<p>Address</p>
	        					<h5><i>'.$clientAddressEN.'</i></h5>
	        				</div>
	        				<div class="col-md-6" style="text-align: right;">
	        					<p>Name</p>
	        					<h4>'.$clientNameAR.'</h4><br>
	        					<p>Address</p>
	        					<h5><i>'.$clientAddressAR.'</i></h5>
	        				</div>
	        			</div><br>
	        			<div class="row"> 
	        				<div class="col-md-3">
	        					<label>Invoice No</label>
	        					<input type="text" class="setup-input" placeholder="Enter Invoice no" name="orderInvoiceNo" value="'.$orderInvoiceNo.'" required>
	        				</div>
	        				<div class="col-md-3 col-sm-6">
	        					<label>VAT %</label>
	        					<input type="number" class="setup-input" value="'.$orderVat.'" name="orderVat" placeholder="Vat %" required>
	        				</div>
	        				<div class="col-md-3 col-sm-6">
	        					<label>Additional Charges</label>
	        					<input type="number" class="setup-input" value="'.$orderAdditionalCharges.'" name="additionalCharges" placeholder="Additional Charges" required>
	        				</div>
	        				<div class="col-md-3">
	        					<label>Date</label>
	        					<input type="date" class="setup-input" value="'.$orderDate.'" name="orderDate" required>
	        				</div>
	        			</div>
        			</div>
        		</div>';

				$sqlOrderDetail = "SELECT * FROM `tbl_orderdetail` INNER JOIN tbl_orders ON tbl_orders.order_ID = tbl_orderdetail.fk_order_ID INNER JOIN tbl_products ON tbl_products.product_ID = tbl_orderdetail.fk_product_ID WHERE fk_order_ID='$orderID'";
				$resultOrderDetail = mysqli_query($conn, $sqlOrderDetail);
				if (mysqli_num_rows($resultOrderDetail)>0) {
					?>

				<div>
					<div id="shopping-cart">
						<table class="tbl-cart" cellpadding="10" cellspacing="1">
							<tbody>
								<tr>
									<th style="text-align:center;" width="5%">S.No</th>
									<th style="text-align:left;">Name</th>
									
									<th style="text-align:right;" width="5%">Quantity</th>
									<th style="text-align:right;" width="10%">Unit Price</th>
									<th style="text-align:right;" width="10%">Price</th>
									<th style="text-align:center;" width="5%">Remove</th>
								</tr>	
								

					<?php
					$serialNo = 1;
					$vatPercent = 5;
					$totalAmount = 0;
					$totalVat = 0;
					while ($rows = mysqli_fetch_assoc($resultOrderDetail)) {
						$orderDetailID = $rows['order_detail_ID'];
						$orderDetailQuantity = $rows['order_detail_quantity'];
						$productID = $rows['product_ID'];
						$productNameEN = $rows['product_name_en'];
						$productNameAR = $rows['product_name_ar'];
						$productImage = $rows['product_image'];
						$productUnitPrice = $rows['product_unit_price'];
						$singleItemPrice = $productUnitPrice*$orderDetailQuantity;
						$singleItemVat = ($singleItemPrice/100)*$vatPercent;
						?>
								<tr>
									<td style="text-align:center;"><?php echo $serialNo; ?></td>
									<td><img src="<?php echo $productImage ?>" class="cart-item-image"><?php echo $productNameEN; ?></td>
									
									<td style="text-align:right;"><?php echo $orderDetailQuantity; ?></td>
									<td style="text-align:right;"><?php echo $productUnitPrice; ?></td>
									<td style="text-align:right;"><?php echo $singleItemPrice; ?></td>
									<td style="text-align:center;"><a href="deleteRecord.php?invoiceNo=<?php echo $invoiceNo; ?>&orderDetailID=<?php echo $orderDetailID; ?>"><i class="fa fa-trash"></i></a></td>
								</tr>	
								

						<?php
						$totalAmount = $totalAmount + $singleItemPrice;
						$totalVat = $totalVat + $singleItemVat;
						$serialNo++;
					}	
							?>
							<tr>
									<td colspan="2" align="right">Total:</td>
									<td></td>

									<td align="right" colspan="2"><strong><?php echo $totalAmount; ?></strong></td>
									<!-- <td align="right">3</td> -->
									<td></td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
					<?php

				} else {}
			}
		} else {}

			 ?>
			
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