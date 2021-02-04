<?php  
require_once("connection.php");
if (isset($_POST['updateEmployee'])) {
	$employeeID = $_POST['employeeID'];
	$employeeName = $_POST['employeeName'];
    $employeeDesignation = $_POST['employeeDesignation'];
    $employeeDescription = $_POST['employeeDescription'];
    $employeeImageOld = $_POST['employeeImageOld'];
    $employeeImageNew;
    $employeeImageFinal;
    $newFile = 0;

    if (empty($_FILES['employeeImageNew']['name'])) {
        $employeeImageFinal = $employeeImageOld;
    } else {
        $employeeImageNew = $_FILES['employeeImageNew']['name'];
        $employeeImageNew = str_replace(' ', '-', $employeeImageNew);
        $target = "employeeImages/";
        $employeeImageNewPath = $target.time()."-".$employeeImageNew;    
        $employeeImageFinal = $employeeImageNewPath;
        $newFile = 1;
    }

    $sql = "UPDATE tbl_employees SET employee_ID='".$employeeID."',employee_name='".$employeeName."',employee_designation='".$employeeDesignation."',employee_image='".$employeeImageFinal."',employee_description='".$employeeDescription."' WHERE employee_ID='".$employeeID."'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if ($newFile) {
            move_uploaded_file($_FILES['employeeImageNew']['tmp_name'], $employeeImageNewPath);
            unlink($employeeImageOld);
        }
    	header("location: employees.php?updateMsg=Employee updated successfully");
    } else {
    	header("location: employees.php?updateMsgErr=Employee not updated");
    }
    
    
} else {
	echo "string";
}

?>