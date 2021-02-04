<?php  
require_once("./connection.php");
$sql = "SELECT * FROM tbl_clients ORDER by client_ID desc";
$result = mysqli_query($conn, $sql);
$no = 1;
echo "<div class='table-responsive table-style'>";
	echo "<h3>Clients <a href='addClient.php' class='btn btn-sm btn-success pull-right'>Add new client</a></h3>";
	echo "<br>";
if (mysqli_num_rows($result) > 0) {
	echo "<table id='mytable' class='table table-bordred table-striped'>";    
	    echo "<thead>";   
	        echo "<th>S.no</th>";      			
			echo "<th>Name(EN)</th>";					
			echo "<th>Address(EN)</th>";
			echo "<th>Address(AR)</th>";
			echo "<th>Name(AR)</th>";				
			echo "<th>Contract</th>";				
			echo "<th>Action</th>";					
	    echo "</thead>";        		
	echo "<tbody>";
	while ($rows = mysqli_fetch_assoc($result)) {
		$clientID = $rows['client_ID'];
		$clientNameEN = $rows['client_name_en'];
		$clientNameAR = $rows['client_name_ar'];
		$clientAddressEN = $rows['client_address_en'];
		$clientAddressAR = $rows['client_address_ar'];
		$clientContract = $rows['client_contract'];
		if ($clientContract == null) {
			$contract = "--";
		} else {
			$contract = "<a href=".$clientContract." target='_blank'>Contract Details</a>";
		}
		
	echo"<tr>
			<td>".$no."</td>
			<td>".$clientNameEN."</td>
			<td>".$clientAddressEN."</td>
			<td>".$clientAddressAR."</td>
			<td>".$clientNameAR."</td>
			<td>".$contract."</td>
			<td><a href='createInvoice.php?client_ID=".$clientID."' class='btn btn-primary btn-xs'>Create invoice</a>
			<a href='editClient.php?id=".$clientID."' class='btn btn-info btn-xs'><i class='fa fa-pen'></i></a>
			<a href='deleteClient.php?id=".$clientID."' onclick='return confirmDelete()' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>
		</tr>";
	$no++;
	echo "</tbody>";
	}
}else{
	echo "No client available";
}
	echo "</div>";
?>