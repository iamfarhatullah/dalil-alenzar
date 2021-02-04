<?php  
	require_once("connection.php");
	$id = $_GET['id'];
	$sqlPdf = "SELECT achievement_pdf FROM tbl_achievements WHERE achievement_ID=$id";
	$resultPdf = mysqli_query($conn, $sqlPdf);
	if (mysqli_num_rows($resultPdf)>0) {
		$row = mysqli_fetch_assoc($resultPdf);
		$fileName = $row['achievement_pdf'];
	}
	$sql = "DELETE FROM tbl_achievements WHERE achievement_ID=$id";
	$result = mysqli_query($conn, $sql);
	if ($result && unlink($fileName)) {
		header("location: achievements.php?msg=1 Record Deleted");
	}else{
		header("location: achievements.php?msg=Record Not Deleted");
	}
?>