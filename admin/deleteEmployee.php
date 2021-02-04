<?php  
	require_once("connection.php");
	$id = $_GET['id'];
	$sqlImage = "SELECT employee_image FROM tbl_employees WHERE employee_ID=$id";
	$resultImage = mysqli_query($conn, $sqlImage);
	if (mysqli_num_rows($resultImage)>0) {
		$row = mysqli_fetch_assoc($resultImage);
		$fileName = $row['employee_image'];
	}
	$sql = "DELETE FROM tbl_employees WHERE employee_ID=$id";
	$result = mysqli_query($conn, $sql);
	if ($result && unlink($fileName)) {
		header("location: employees.php?msg=1 Record Deleted");
	}else{
		header("location: employees.php?msg=Record Not Deleted");
	}
?>