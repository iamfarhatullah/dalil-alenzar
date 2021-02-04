<?php  
require_once("connection.php");
if (isset($_POST['updateProject'])) {

	$projectID = $_POST['projectID'];
	$projectName = $_POST['projectName'];
    $projectDescription = $_POST['projectDescription'];
    $projectTotalAmount = $_POST['projectTotalAmount'];
    $projectConsumption = $_POST['projectConsumption'];
    $projectDate = $_POST['projectDate'];

    $sql = "UPDATE tbl_projects SET project_ID='".$projectID."',project_name='".$projectName."',project_description='".$projectDescription."',project_total_amount='".$projectTotalAmount."',project_consumption='".$projectConsumption."',project_date='".$projectDate."' WHERE project_ID='".$projectID."'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
    	header("location: projects.php?updateMsg=Project updated successfully");
    } else {
    	header("location: projects.php?updateMsgErr=Project not updated");
    }
    
    
} else {
	header("location:projects.php");
}








?>