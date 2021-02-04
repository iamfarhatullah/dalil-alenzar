<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
		header("location: login.php");
	}
  
	require_once("connection.php");
	$sessionUsername = $_SESSION["username"];
	$sql = "SELECT * FROM tbl_admin WHERE admin_username='$sessionUsername'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$sessionName = $row['admin_name'];
		}
	}else{
		header("location: login.php");
	}
?>