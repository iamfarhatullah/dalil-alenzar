<?php 
	require_once( "connection.php");
	if (isset($_POST['submitEmployee'])) {
		$employeeName = $_POST['employeeName'];
		$employeeDesignation = $_POST['employeeDesignation'];
		$employeeImage = $_FILES['employeeImage']['name'];
		$employeeDescription = $_POST['employeeDescription'];
		$randNumbers = rand(1000, 9999);
		$target = "employeeImages/";
		$new_name = $target.time()."-".rand(1000, 9999)."-".$employeeImage;
		$sql = "INSERT INTO tbl_employees(employee_name, employee_designation, employee_image, employee_description) VALUES ('$employeeName', '$employeeDesignation', '$new_name', '$employeeDescription')";
		$result = mysqli_query($conn, $sql);
			if (move_uploaded_file($_FILES['employeeImage']['tmp_name'], $new_name) && $result) {
				header("location: employees.php?msg=Employee Added");
			}else{
				header("location: addEmployee.php?msgErr=An error occured while uploading.");
			}
		mysqli_close($conn);
	}
?>