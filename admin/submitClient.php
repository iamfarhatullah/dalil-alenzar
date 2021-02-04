<?php 
	require_once( "connection.php");
	if (isset($_POST['submitClient'])) {
		$clientNameEN = $_POST['clientNameEN'];
		$clientNameAR = $_POST['clientNameAR'];
		$clientAddressEN = $_POST['clientAddressEN'];
		$clientAddressAR = $_POST['clientAddressAR'];
		$clientContract = $_FILES['clientContract']['name'];
		
		if (!empty($clientContract)) {
			if ($_FILES['clientContract']['type'] == 'application/pdf') {
				$clientContract = str_replace(' ', '-', $clientContract);
				$target = "contracts/";
				$clientContractPath = $target.time()."-".$clientContract;
				$sql = "INSERT INTO tbl_clients(client_name_en, client_name_ar, client_address_en, client_address_ar, client_contract) VALUES ('$clientNameEN', '$clientNameAR', '$clientAddressEN', '$clientAddressAR', '$clientContractPath')";
				$result = mysqli_query($conn, $sql);
				if ($result && move_uploaded_file($_FILES['clientContract']['tmp_name'], $clientContractPath)) {
					header("location: clients.php?msg=Client Added");
				}else{
					header("location: addClient.php?msgErr=An error occured while uploading.");
				}	
			} else {
				header('location: addClient.php?msgErr=please upload PDF file');
			}
			
			

		} else {
			
			$sql = "INSERT INTO tbl_clients(client_name_en, client_name_ar, client_address_en, client_address_ar) VALUES ('$clientNameEN', '$clientNameAR', '$clientAddressEN', '$clientAddressAR')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				header("location: clients.php?msg=Client Added");
			}else{
				header("location: addClient.php?msgErr=An error occured while uploading.");
			}
		}
		
	}
?>