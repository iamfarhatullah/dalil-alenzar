<?php  
	if (isset($_POST['login'])) {	
		require_once ("connection.php");
		session_start();
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);	
		$query = "SELECT * FROM tbl_admin WHERE admin_username='$username' AND admin_password='$password'";
		$rs = mysqli_query($conn,$query);	
		if(mysqli_num_rows($rs) == 0){
			header("location: login.php?msg=1");
		}else{	
			$_SESSION["username"] = $username;
			header("location: index.php");
		}
	}
?>