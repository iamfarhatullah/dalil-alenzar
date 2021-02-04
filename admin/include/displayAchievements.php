<?php  
require_once("./connection.php");
$sql = "SELECT * FROM tbl_achievements ORDER by achievement_ID desc";
$result = mysqli_query($conn, $sql);
$no = 1;
echo "<div class='table-responsive table-style'>";
	echo "<h3>Achievements <a href='addAchievement.php' class='btn btn-sm btn-success pull-right'>Add new</a></h3>";
	echo "<br>";
if (mysqli_num_rows($result) > 0) {
	echo "<table id='mytable' class='table table-bordred table-striped'>";    
	    echo "<thead>";   
	        echo "<th>S.no</th>";      			
			echo "<th>Title (EN)</th>";					
			echo "<th>Title (AR)</th>";
			echo "<th>PDF</th>";				
			echo "<th>Action</th>";					
	    echo "</thead>";        		
	echo "<tbody>";
	while ($rows = mysqli_fetch_assoc($result)) {
		$achievement_ID = $rows['achievement_ID'];
		$achievement_title_en = $rows['achievement_title_en'];
		$achievement_title_ar = $rows['achievement_title_ar'];
		$achievement_pdf = $rows['achievement_pdf'];
		if ($achievement_pdf == null) {
			$achievement_pdf = "--";
		} else {
			$achievement_pdf = "<a href=".$achievement_pdf." target='_blank'>View Details</a>";
		}
	echo"<tr>
			<td>".$no."</td>
			<td>".$achievement_title_en."</td>
			<td>".$achievement_title_ar."</td>
			<td>".$achievement_pdf."</td>
			<td><a href='editAchievement.php?id=".$achievement_ID."' class='btn btn-info btn-xs'><i class='fa fa-pen'></i></a>
			<a href='deleteAchievement.php?id=".$achievement_ID."' onclick='return confirmDelete()' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>
		</tr>";
	$no++;
	echo "</tbody>";
	}
}else{
	echo "No Achievements available";
}
	echo "</div>";
?>