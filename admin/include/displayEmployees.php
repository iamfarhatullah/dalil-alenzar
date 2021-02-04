<?php  
require_once("./connection.php");
$sql = "SELECT * FROM tbl_employees ORDER by employee_ID desc";
$result = mysqli_query($conn, $sql);
$no = 1;
echo "<div class='table-responsive table-style'>";
	echo "<h3>Employees <a href='addEmployee.php' class='btn btn-sm btn-success pull-right'>Add new employee</a></h3>";
	echo "<br>";
if (mysqli_num_rows($result) > 0) {
	echo "<table id='mytable' class='table table-bordred table-striped'>";    
	    echo "<thead>";   
	        echo "<th>S.no</th>";    
	        echo "<th>Image</th>";      			
			echo "<th>Name</th>";					
			echo "<th>Designation</th>";					
			echo "<th>Description</th>";					
			echo "<th style='width:70px;'>Action</th>";					
	    echo "</thead>";        		
	echo "<tbody>";
	while ($rows = mysqli_fetch_assoc($result)) {
		$employeeID = $rows['employee_ID'];
		$employeeName = $rows['employee_name'];
		$employeeDesignation = $rows['employee_designation'];
		$employeeImage = $rows['employee_image'];
		$employeeDescription = $rows['employee_description'];
	echo"<tr>
			<td>".$no."</td>
			<td><img src='".$employeeImage."' width='50px'></td>
			<td>".$employeeName."</td>
			<td>".$employeeDesignation."</td>
			<td>".$employeeDescription."</td>
			<td><a href='editEmployee.php?id=".$employeeID."' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></a>
			<a href='deleteEmployee.php?id=".$employeeID."' onclick='return confirmDelete()' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>
		</tr>";
	$no++;
	echo "</tbody>";
	}
}else{
	echo "No Employee available";
}
	echo "</div>";
?>