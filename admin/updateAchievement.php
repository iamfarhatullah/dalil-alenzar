<?php  
require_once("connection.php");
if (isset($_POST['updateAchievement'])) {

    $achievement_ID = $_POST['achievement_ID'];
    $achievement_title_en = $_POST['achievement_title_en'];
    $achievement_title_ar = $_POST['achievement_title_ar'];
    $achievement_pdf_old = $_POST['achievement_pdf_old'];
    $achievement_pdf_new;
    $achievement_pdf_new_final;
    $newFile = 0;

    if (empty($_FILES['achievement_pdf_new']['name'])) {
        $achievement_pdf_new_final = $achievement_pdf_old;
    } else {
        $achievement_pdf_new = $_FILES['achievement_pdf_new']['name'];
        $achievement_pdf_new = str_replace(' ', '-', $achievement_pdf_new);
        $target = "achievements/";
        $achievement_pdf_new_path = $target.time()."-".$achievement_pdf_new;    
        $achievement_pdf_new_final = $achievement_pdf_new_path;
        $newFile = 1;
    }

    $sql = "UPDATE tbl_achievements SET achievement_ID='".$achievement_ID."', achievement_title_en='".$achievement_title_en."', achievement_title_ar='".$achievement_title_ar."', achievement_pdf='".$achievement_pdf_new_final."' WHERE achievement_ID='".$achievement_ID."'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if ($newFile) {
            move_uploaded_file($_FILES['achievement_pdf_new']['tmp_name'], $achievement_pdf_new_path);
            unlink($achievement_pdf_old);
        }
        header("location: achievements.php?updateMsg=Achievement updated successfully");
    } else {
        header("location: achievements.php?updateMsgErr=Achievement not updated");
    }
    
    
} else {
    //echo "string";
}

?>