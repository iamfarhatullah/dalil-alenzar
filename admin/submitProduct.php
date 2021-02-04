<?php 
	require_once( "connection.php");
	if (isset($_POST['submitProduct'])) {
		$productNameEN = $_POST['productNameEN'];
		$productNameAR = $_POST['productNameAR'];
		$productDescriptionEN = $_POST['productDescriptionEN'];
		$productDescriptionAR = $_POST['productDescriptionAR'];
		$productUnitPrice = $_POST['productUnitPrice'];
		$productImage = $_FILES['productImage']['name'];
		$randNumbers = rand(1000, 9999);
		$target = "productImages/";
		$new_name = $target.time()."-".rand(1000, 9999)."-".$productImage;
		$sql = "INSERT INTO tbl_products(product_name_en, product_name_ar, product_description_en, product_description_ar, product_image, product_unit_price) VALUES ('$productNameEN', '$productNameAR', '$productDescriptionEN', '$productDescriptionAR', '$new_name', '$productUnitPrice')";
		$result = mysqli_query($conn, $sql);
			if (move_uploaded_file($_FILES['productImage']['tmp_name'], $new_name) && $result) {
				header("location: products.php?msg=Product added");
			}else{
				header("location: addProduct.php?msgErr=An error occured while uploading");
			}
		mysqli_close($conn);
	}

?>