<?php  
  require_once("connection.php");
  
  $order_ID = $_GET['order_ID'];
  $sql = "DELETE FROM tbl_orders WHERE order_ID='$order_ID'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $deleteOrderDetailRecord = "DELETE FROM `tbl_orderdetail` WHERE `fk_order_ID`='$order_ID'";
    $resultOrderDetailRecord = mysqli_query($conn, $deleteOrderDetailRecord);
    if ($resultOrderDetailRecord) {
        $msg = "and the data inside the Order Detail also deleted";
    }else{
        $msg = "but the data inside the Order Detail not deleted";
    }
    header("location: invoices.php?dltInvoice=Invoice deleted ");
  }else{
    header("location: invoices.php?dltInvoiceErr=Error occured while deleting Invoice.");
  }
  
  ?>