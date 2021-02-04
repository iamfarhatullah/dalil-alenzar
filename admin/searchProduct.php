<?php
require_once ("connection.php");
	if(isset($_POST['searchProduct'])){
		$name = $_POST['searchProduct'];
		$sql ="SELECT * FROM tbl_products WHERE product_name_en LIKE '$name%'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_array($result)){
				$productNameEN = $row['product_name_en'];
				echo "<p>".$productNameEN."</p>";
			}
		} else {
			echo "No record";
		}
	}
?>