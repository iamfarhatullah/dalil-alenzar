<?php 
	require_once( "connection.php");
	if (isset($_POST['submitProject'])) {
		$projectName = $_POST['projectName'];
		$projectDescription = $_POST['projectDescription'];
		$projectTotalAmount = $_POST['projectTotalAmount'];
		$projectConsumption = $_POST['projectConsumption'];
		$projectDate = $_POST['projectDate'];

		$sql = "INSERT INTO tbl_projects(project_name, project_description, project_total_amount, project_consumption, project_date) VALUES ('$projectName', '$projectDescription', '$projectTotalAmount', '$projectConsumption', '$projectDate')";
		$result = mysqli_query($conn, $sql);
			if ($result) {
				header("location: projects.php?msg=Project Added");
			}else{
				header("location: addProject.php?msgErr=An error occured while uploading.");
			}
		mysqli_close($conn);
	}
?>