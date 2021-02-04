<?php   
require_once("./connection.php");
$sql = "SELECT * FROM tbl_projects ORDER by project_ID desc";
$result = mysqli_query($conn, $sql);
$no = 1;

echo "<div class='table-responsive table-style'>";
	echo "<h3>Projects <a href='addProject.php' class='btn btn-sm btn-success pull-right'>New project</a></h3>";
	echo "<br>";
if (mysqli_num_rows($result) > 0) {

	echo "<table id='mytable' class='table table-bordred table-striped'>";    
	    echo "<thead>";   
	        echo "<th>S.no</th>";          			
			echo "<th>Name</th>";					
			echo "<th style='width:50%'>Description</th>";					
			echo "<th>Total Amount</th>";
			echo "<th>Consumption</th>";
			echo "<th>Kafeel(%)</th>";					
			echo "<th style='width:100px;'>Date</th>";
			echo "<th style='width:70px;'>Action</th>";					
	    echo "</thead>";        		
	echo "<tbody>";
	while ($rows = mysqli_fetch_assoc($result)) {
		$projectID = $rows['project_ID'];
		$projectName = $rows['project_name'];
		$projectDescription = $rows['project_description'];
		$projectTotalAmount = $rows['project_total_amount'];
		$projectConsumption = $rows['project_consumption'];
		$projectDate = date('M d, Y',strtotime($rows['project_date']));
		$projectRemainingAmount = $projectTotalAmount - $projectConsumption;
		$KafeelPercentAge = ($projectRemainingAmount/100)*30;
	echo"<tr>
			<td>".$no."</td>
			<td>".$projectName."</td>
			<td>".$projectDescription."</td>
			<td>".$projectTotalAmount."</td>
			<td>".$projectConsumption."</td>
			<td>".$KafeelPercentAge."</td>
			<td>".$projectDate."</td>
			<td><a href='editProject.php?id=".$projectID."' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></a>
			<a href='deleteProject.php?id=".$projectID."' onclick='return confirmDelete()' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>
		</tr>";
	$no++;
	}
	echo "</tbody>";
	
}else{
	echo "No projects";
}
	echo "</div>";
?>
