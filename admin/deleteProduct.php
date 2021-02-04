<?php  
	require_once("connection.php");
	$id = $_GET['id'];
	$sqlImage = "SELECT product_image FROM tbl_products WHERE product_ID=$id";
	$resultImage = mysqli_query($conn, $sqlImage);
	if (mysqli_num_rows($resultImage)>0) {
		$row = mysqli_fetch_assoc($resultImage);
		$fileName = $row['product_image'];
	}
	$sql = "DELETE FROM tbl_products WHERE product_ID=$id";
	$result = mysqli_query($conn, $sql);
	if ($result && unlink($fileName)) {
		header("location: products.php?msg=1 Record Deleted");
	}else{
		header("location: products.php?msg=Record Not Deleted");
	}

?>