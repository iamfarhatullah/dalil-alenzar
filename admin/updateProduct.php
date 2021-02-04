<?php  
require_once("connection.php");
if (isset($_POST['updateProduct'])) {

	$productID = $_POST['productID'];
	$productNameEN = $_POST['productNameEN'];
    $productNameAR = $_POST['productNameAR'];
    $productUnitPrice = $_POST['productUnitPrice'];
    $productDescriptionEN = $_POST['productDescriptionEN'];
    $productDescriptionAR = $_POST['productDescriptionAR'];
    $productImageOld = $_POST['productImageOld'];
    $productImage = $_FILES['productImage']['name'];
    $productImageFianl;
    
    if (empty($productImage)) {
        $productImageFianl = $productImageOld;
    } else {
        $target = "productImages/";
        $productImage = $target.time()."-".rand(1000, 9999)."-".$productImage;    
        $productImageFianl = $productImage;
    }

    $sql = "UPDATE tbl_products SET product_ID='".$productID."', product_name_en='".$productNameEN."', product_name_ar='".$productNameAR."', product_description_en='".$productDescriptionEN."', product_description_ar='".$productDescriptionAR."', product_image='".$productImageFianl."',product_unit_price='".$productUnitPrice."' WHERE product_ID='".$productID."'";
    $result = mysqli_query($conn, $sql);

    if (!empty($productImage)) {
        move_uploaded_file($_FILES['productImage']['tmp_name'], $productImageFianl);
    }
    
    if ($result) {
    	header("location: products.php?updateMsg=Product updated successfully");
    } else {
    	header("location: products.php?updateMsgErr=Product not updated");
    }
    
    
} else {
	header("location: products.php");
}
?>