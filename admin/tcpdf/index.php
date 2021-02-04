<?php  
include('tcpdf.php');
require_once("../connection.php");
class MYPDF extends TCPDF{
	public function header(){
	// $this->Image('../../img/logo.png',90,12,26,26);
	// $this->Ln(7);
	// $this->SetFont('Helvetica','B',14);
	// $this->Cell(0,5,'DALIL AL-ENZAR',0,0,'L');
	// $this->SetFont('aefurat','B',16);
	// $this->Cell(0,6,'موسسة دليل الانذار لمعدات السلامة ',0,0,'R');
	// $this->Ln();
	// $this->SetFont('Helvetica','B',14);
	// $this->Cell(0,4,'EST. FOR SAFETY EQUIPMENT',0,0,'L');
	// $this->SetFont('aefurat','',12);
	// $this->Cell(0,5,'استيراد و بيع و صيانة و تركيب أجهزة الانذار و الاطفاء ',0,0,'R');
	// $this->Ln(6);
	// $this->SetFont('Helvetica','',9);
	// $this->Cell(0,3,'Importation Sale, Maintenance & Installation of Alarms',0,0,'L');
	// $this->SetFont('aefurat','',12);
	// $this->Cell(0,5,'و جميع أدوات السلامة ',0,0,'R');
	// $this->Ln();
	// $this->SetFont('Helvetica','',9);
	// $this->Cell(0,3,'Fire & Safety Gear',0,0,'L');
	// $this->Ln();
	// $this->SetFont('Helvetica','',9);
	// $this->Cell(0,3,'Sell - Refill - Maintenance - Installation',0,0,'L');
	// $this->SetFont('aefurat','',12);
	// $this->Cell(0,5,'بيع   -صيانة  - تعبية   -يركيب  ',0,0,'R');
	// $this->Ln(5);
	// $this->SetFont('Helvetica','',9);
	// $this->Cell(0,3,'C.R. / 1010227749',0,0,'L');
	// $this->SetFont('aefurat','',12);
	// $this->Cell(0,5,'س . ت 1010227749 ',0,0,'R');
	// $this->Ln(4);
	// $this->SetFont('Helvetica','',9);
	// $this->Cell(0,3,'Licensed. / 707/6/1/3',0,0,'L');
	// $this->SetFont('aefurat','',12);
	// $this->Cell(0,5,' ترخيص دفاعي مدني : 3/1/6/707',0,0,'R');
	// $this->Ln(15);
	// $this->Rect(11,46,187,0.3,'F');
	// $this->Ln(2);
		$this->SetMargins(3,40,3);
	}	
	function ShowClientInfo($conn){
		include '../include/numbersToWords.php';
		$invoiceNo = $_GET['invoiceNo'];
		$sql = "SELECT * FROM `tbl_orders` INNER JOIN tbl_clients ON tbl_clients.client_ID = tbl_orders.fk_client_ID WHERE `order_invoice_no`='$invoiceNo'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {

			while ($row = mysqli_fetch_assoc($result)) {
				$clientID = $row['client_ID'];
				$clientNameEN = $row['client_name_en'];
				$clientNameAR = $row['client_name_ar'];
				$clientAddressEN = $row['client_address_en'];
				$clientAddressAR = $row['client_address_ar'];
				$orderID = $row['order_ID'];
				$orderDate = $row['order_date'];
				$orderVat = $row['order_vat'];
				$orderAdditionalCharges = $row['order_additionalCharges'];
				$orderInvoiceNo = $row['order_invoice_no'];
				//$this->Ln(46);
				$this->SetFont('Helvetica','',11);
				$this->Cell(0,5,'300161477500003',0,0,'L');
				$this->SetFont('Helvetica','',11);
				$this->Cell(0,5,'300161477500003',0,0,'R');
				$this->Ln();
				$this->SetFont('aefurat','',11);
				$this->Cell(0,5,'فاتورة ضريبة',0,0,'C');
				$this->Ln();
				$this->SetFont('Helvetica','',11);
				$this->Cell(0,5,'Vat invoice',0,0,'C');
				$this->Ln(10);
				$this->Cell(0,5,'Date:- '.$orderDate,0,0,'L');
				$this->SetFont('aefurat','',11);
				$this->Cell(0,5,'تاريخ:- '.$orderDate,0,0,'R');
				$this->Ln(7);
				$this->SetFont('Helvetica','',11);
				$this->Cell(0,5,'Invoice no.'.$orderInvoiceNo,0,0,'L');
				$this->SetFont('aefurat','',11);
				$this->Cell(0,5,'رقم الفاتورة.'.$orderInvoiceNo,0,0,'R');
				$this->Ln(7);
				$this->SetFont('Helvetica','',11);
				$this->Cell(0,5,'To, '.$clientNameEN,0,0,'L');
				$this->SetFont('aefurat','',11);
				$this->Cell(0,5,$clientNameAR,0,0,'R');
				$this->Ln(7);
				$this->SetFont('Helvetica','',11);
				$this->Cell(0,5,$clientAddressEN,0,0,'L');
				$this->SetFont('aefurat','',11);
				$this->Cell(0,5,$clientAddressAR,0,0,'R');
				$this->Ln(7);
				// $this->Cell(0,5,'11442',0,0,'L');
				// $this->Ln(7);
				$this->SetFont('Helvetica','',11);
				$this->Cell(0,5,'300004438500003',0,0,'L');
				$this->Cell(0,5,'300004438500003',0,0,'R');
				$this->Ln(10);
				$sqlOrderDetail = "SELECT * FROM `tbl_orderdetail` INNER JOIN tbl_orders ON tbl_orders.order_ID = tbl_orderdetail.fk_order_ID INNER JOIN tbl_products ON tbl_products.product_ID = tbl_orderdetail.fk_product_ID WHERE fk_order_ID='$orderID'";
				$resultOrderDetail = mysqli_query($conn, $sqlOrderDetail);
				if (mysqli_num_rows($resultOrderDetail)>0) {
					$this->SetFont('Helvetica','B',10);
					$this->Cell(10,5,'','LTR',0,'C');
					$this->Cell(80,5,'','LTR',0,'C');
					$this->Cell(13,5,'','LTR',0,'C');
					$this->Cell(33,5,'','LTR',0,'C');
					$this->Cell(50,5,'','LTR',0,'C');
					$this->Ln();
					$this->Cell(10,5,'s.no','LR',0,'C');
					$this->Cell(80,5,'Description','LR',0,'C');
					$this->Cell(13,5,'Qty','LR',0,'C');
					$this->Cell(33,5,'Unit price','LRB',0,'C');
					$this->Cell(50,5,'Total price','LRB',0,'C');
					$this->Ln();
					$this->Cell(10,5,'','LRB',0,'C');
					$this->Cell(80,5,'','LRB',0,'C');
					$this->Cell(13,5,'','LRB',0,'C');
					$this->Cell(33,5,'SR','LRB',0,'C');
					$this->Cell(25,5,'SR','LRB',0,'C');
					$this->Cell(25,5,'Vat','LRB',0,'C');
					$this->Ln();
					$serialNo = 1;
					$vatPercent = $orderVat;
					$totalAmount = 0;
					$totalVat = 0;
					while ($rows = mysqli_fetch_assoc($resultOrderDetail)) {
						$orderDetailID = $rows['order_detail_ID'];
						$orderDetailQuantity = $rows['order_detail_quantity'];
						$productID = $rows['product_ID'];
						$productNameEN = $rows['product_name_en'];
						$productNameAR = $rows['product_name_ar'];
						$productImage = $rows['product_image'];
						$productUnitPrice = $rows['product_unit_price'];
						$singleItemPrice = $productUnitPrice*$orderDetailQuantity;
						$singleItemVat = ($singleItemPrice/100)*$vatPercent;
						
						$this->SetFont('Helvetica','',9);
						$this->Cell(10,10,$serialNo,'LRB',0,'C');
						$this->Cell(80,10,$productNameEN,'LRB',0,'C');
						$this->Cell(13,10,$orderDetailQuantity.' pcs','LRB',0,'C');
						$this->Cell(33,10,$productUnitPrice,'LRB',0,'C');
						$this->Cell(25,10,$singleItemPrice,'LRB',0,'C');
						$this->Cell(25,10,$singleItemVat,'LRB',0,'C');
						$this->Ln();
						$totalAmount = $totalAmount + $singleItemPrice;
						$totalVat = $totalVat + $singleItemVat;
						$serialNo++;
					}
					$this->Cell(10,10,'','LRB',0,'C');
					$this->Cell(80,10,'','LRB',0,'C');
					$this->Cell(46,10,'Amount:-','LRB',0,'C');
					$this->Cell(25,10,$totalAmount,'LRB',0,'C');
					$this->Cell(25,10,'','LRB',0,'C');
					$this->Ln();
					$this->Cell(90,10,'','LRB',0,'C');
					$this->Cell(46,10,'Vat '.$vatPercent.'%:-','LRB',0,'C');
					$this->Cell(25,10,$totalVat,'LRB',0,'C');
					$this->Cell(25,10,'','LRB',0,'C');
					$this->Ln();
					$this->Cell(90,10,'','LRB',0,'C');
					$this->Cell(46,10,'Add. Charges:-','LRB',0,'C');
					$this->Cell(25,10,$orderAdditionalCharges,'LRB',0,'C');
					$this->Cell(25,10,'','LRB',0,'C');
					$this->Ln();
					$this->Cell(136,10,'Total amount: '.convertNumber($totalAmount+$orderAdditionalCharges),'LRB',0,'L');
					$this->Cell(25,10,$totalAmount+$orderAdditionalCharges,'LRB',0,'C');
					$this->Cell(25,10,'','LRB',0,'C');
					$this->Ln(20);	
				} else {}
			}
		} else {}
		$this->SetFont('Helvetica','',11);
		$this->Cell(0,3,'We would like to thank you and assure you our commitment of providing you with our quality service to',0,0,'L');
		$this->Ln();	
		$this->Cell(0,6,'your maximum satisfaction',0,0,'L');
		$this->Ln();
		$this->Cell(0,9,'Dalil alenzar est. for safety equipment\'s',0,0,'L');
		$this->Ln();
	}
	function footer(){
		$this->SetY(-15);
		$this->Ln(20);
		// $this->SetFont('Helvetica','B',9);
		// $this->Cell(0,4,'Saudi Arabia - By Wandering - Industrial Razoor - Riyadh 11511 P.O. Box 40653 - Tel.:011 4951309 - Fax 011 43884136',0,0,'C');
		// $this-> Ln(4);
		// $this->Cell(0,4,'daleelalarm@gmail.com',0,0,'C');
	}
}
$pdf = new MYPDF('P','mm','A4',true,'UTF-8',false);
// set document information
$pdf->SetAuthor('Dalil Al-Enzar');
$pdf->SetTitle('Invoice');
$pdf->SetSubject('Dalil Al-Enzar');
$pdf->AddPage();
$pdf->ShowClientInfo($conn);
$pdf->Output();
?>