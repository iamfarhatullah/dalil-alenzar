<?php   
require_once("./connection.php");
$sql = "SELECT * FROM tbl_products ORDER by product_ID desc";
$result = mysqli_query($conn, $sql);
$no = 1;

echo "<div class='table-responsive table-style'>";
	echo "<h3>Products <a href='addProduct.php' class='btn btn-sm btn-success pull-right'>Add new product</a></h3>";
	echo "<br>";
if (mysqli_num_rows($result) > 0) {

	echo "<table id='mytable' class='table table-bordred table-striped'>";    
	    echo "<thead>";   
	        echo "<th>S.no</th>";          			
			echo "<th>Image</th>";					
			echo "<th>Name</th>";					
			echo "<th>Description</th>";
			echo "<th>Unit Price</th>";					
			echo "<th>Action</th>";					
	    echo "</thead>";        		
	echo "<tbody>";
	while ($rows = mysqli_fetch_assoc($result)) {
		$productID = $rows['product_ID'];
		$productNameEN = $rows['product_name_en'];
		$productDescriptionEN = $rows['product_description_en'];
		$productNameAR = $rows['product_name_ar'];
		$productDescriptionAR = $rows['product_description_ar'];
		$productUnitPrice = $rows['product_unit_price'];
		$productImage = $rows['product_image'];
	echo"<tr>
			<td>".$no."</td>
			<td><img src='".$productImage."' class='img-responsive' width='50px' height='80px'></td>
			<td>".$productNameEN."</td>
			<td>".$productDescriptionEN."</td>
			<td class='text-right'>".$productUnitPrice."</td>
			
			<td><a href='editProduct.php?id=".$productID."' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></a>
			<a href='deleteProduct.php?id=".$productID."' onclick='return confirmDelete()' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>
			<!--<td><a href='".$productImage."' target='_blank'>Image</a></td>-->
		</tr>";
	$no++;
	}
	echo "</tbody>";
	
}else{
	echo "No product available";
}
	echo "</div>";
?>
