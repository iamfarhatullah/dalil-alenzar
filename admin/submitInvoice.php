<?php  
require_once ("connection.php");

if(isset($_POST['submit'])){
	if (!empty($_POST['check_list'])) {
		$orderDate = $_POST['orderDate'];
		$orderInvoiceNo = $_POST['orderInvoiceNo'];
		$orderAdditionalCharges = $_POST['additionalCharges'];
		$orderVat = $_POST['orderVat'];
		$FkClientID = $_POST['clientID'];
		$checkInvoiceNo = "SELECT * from tbl_orders WHERE order_invoice_no='$orderInvoiceNo'";
		$ResultCheckInvoiceNo = mysqli_query($conn, $checkInvoiceNo);
		if (mysqli_num_rows($ResultCheckInvoiceNo) > 0) {
			header("location: createInvoice.php?client_ID=".$FkClientID."&msg=The Invoice Number Your Entered Already Exist");
		} else {
			$sqlOrder = "INSERT into tbl_orders(order_date, order_vat, order_additionalCharges, order_invoice_no, fk_client_ID) VALUES ('".$orderDate."','".$orderVat."','".$orderAdditionalCharges."','".$orderInvoiceNo."','".$FkClientID."')";
			$resultOrder = mysqli_query($conn, $sqlOrder);
			if ($resultOrder) {
				$sqlOrderID = "SELECT MAX(`order_ID`) AS RecentID FROM tbl_orders";
				$resultOrderID = mysqli_query($conn, $sqlOrderID);
				$row = mysqli_fetch_assoc($resultOrderID);
				$recentOrderID = $row['RecentID'];
				if(!empty($_POST['check_list'])){
					foreach($_POST['check_list'] as $selectedItem){
						$sqlOrderDetail = "INSERT into tbl_orderdetail(order_detail_quantity, fk_order_ID, fk_product_ID) VALUES ('".$_POST['quantity'.$selectedItem]."','".$recentOrderID."','".$selectedItem."')";
						$resultOrderDetail = mysqli_query($conn, $sqlOrderDetail);
						if ($resultOrderDetail) {
							// echo "OrderDatail Done";
						} else {
							// echo "OrderDatail Error";
						}				
					}
				}
				header("location: invoices.php?msg=Invoice Saved Successfully");
			} else {
				header("location: invoices.php?msgErr=An error occured while uploading");
			}
		}
	}else{
		header("location: createInvoice.php?client_ID=".$_POST['clientID']."&msg=Please add items to invoice");
	}
}

?>