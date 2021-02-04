<?php  
	require_once("connection.php");
	$id = $_GET['id'];
	$sqlDeleteContract = "SELECT * FROM tbl_clients WHERE client_ID=$id";
	$resultDeleteContract = mysqli_query($conn, $sqlDeleteContract);
	while ($row = mysqli_fetch_assoc($resultDeleteContract)) {
		$contractFile = $row['client_contract'];
		unlink($contractFile);
	}
	$sql = "DELETE FROM tbl_clients WHERE client_ID=$id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header("location: clients.php?msg=1 Record Deleted");
	}else{
		header("location: clients.php?msg=Record Not Deleted");
	}
?>