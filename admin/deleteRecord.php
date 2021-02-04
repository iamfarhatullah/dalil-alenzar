<?php  
require_once("connection.php");

if (isset($_GET['orderDetailID'])) {
	$orderDetailID = $_GET['orderDetailID'];
	$sql = "DELETE FROM tbl_orderdetail WHERE order_detail_ID='$orderDetailID'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "deleted successfully";
	} else {
		echo "not deleted";
	}
	

} else {
	# code...
}





?>