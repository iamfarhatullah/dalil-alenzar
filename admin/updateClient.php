<?php  
require_once("connection.php");
if (isset($_POST['updateClient'])) {

	$client_ID = $_POST['client_ID'];
	$clientNameEN = $_POST['clientNameEN'];
    $clientNameAR = $_POST['clientNameAR'];
    $clientAddressEN = $_POST['clientAddressEN'];
    $clientAddressAR = $_POST['clientAddressAR'];
    $clientContractOld = $_POST['clientContractOld'];
    $clientContractNew;
    $clientContractFinal;
    $newFile = 0;

    if (empty($_FILES['clientContractNew']['name'])) {
        $clientContractFinal = $clientContractOld;
    } else {
        $clientContractNew = $_FILES['clientContractNew']['name'];
        $clientContractNew = str_replace(' ', '-', $clientContractNew);
        $target = "contracts/";
        $clientContractNewPath = $target.time()."-".$clientContractNew;    
        $clientContractFinal = $clientContractNewPath;
        $newFile = 1;
    }

    $sql = "UPDATE tbl_clients SET client_ID='".$client_ID."', client_name_en='".$clientNameEN."',client_name_ar='".$clientNameAR."',client_address_en='".$clientAddressEN."',client_address_ar='".$clientAddressAR."', client_contract='".$clientContractFinal."' WHERE client_ID='".$client_ID."'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if ($newFile) {
            move_uploaded_file($_FILES['clientContractNew']['tmp_name'], $clientContractNewPath);
            unlink($clientContractOld);
        }
    	header("location: clients.php?updateMsg=Client updated successfully");
    } else {
    	header("location: clients.php?updateMsgErr=Client not updated");
    }
    
    
} else {
	//echo "string";
}

?>