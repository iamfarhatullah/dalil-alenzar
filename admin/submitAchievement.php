<?php 
	require_once( "connection.php");
	if (isset($_POST['submitAchievement'])) {
		$title_en = $_POST['title_en'];
		$title_ar = $_POST['title_ar'];
		$achievement_pdf = $_FILES['achievement_pdf']['name'];
		$achievement_pdf = str_replace(' ', '-', $achievement_pdf);
		$target = "achievements/";
		$achievement_pdf = $target.time()."-".rand(1000, 9999)."-".$achievement_pdf;
		$sql = "INSERT INTO tbl_achievements(achievement_title_en, achievement_title_ar, achievement_pdf) VALUES ('$title_en', '$title_ar', '$achievement_pdf')";
		$result = mysqli_query($conn, $sql);
			if (move_uploaded_file($_FILES['achievement_pdf']['tmp_name'], $achievement_pdf) && $result) {
				header("location: achievements.php?msg=Achievement Added");
			}else{
				header("location: addAchievement.php?msgErr=An error occured while uploading.");
			}
		mysqli_close($conn);
	}
?>