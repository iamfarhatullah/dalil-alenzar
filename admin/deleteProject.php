<?php  
	require_once("connection.php");
	$id = $_GET['id'];
	$sql = "DELETE FROM tbl_projects WHERE project_ID=$id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header("location: projects.php?msg=1 Record Deleted");
	}else{
		header("location: projects.php?msg=Record Not Deleted");
	}

?>