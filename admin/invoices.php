<?php include 'include/startSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Invoice</title>   
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>﻿
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../font-awesome-5.3.1/css/all.css">
</head>
<body>
<?php include 'include/masterContents.php'; ?>
  <div class="container-fluid">
    <div class="header-box">
      <div class="row">
        <div class="col-md-12">
          <div class="page-title">
            <h3> Invoices <span>Control Panel</span></h3>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">       
    <div class="content-box"> <!-- Page Contents -->
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <?php  
                if (isset($_GET['msg'])) {
                  $msg = $_GET['msg'];
                  echo "<div class='callout callout-primary'>";
                  echo "<p>".$msg."</p>";
                  echo "</div>";
                  echo "<br>";
                }elseif (isset($_GET['msgErr'])) {
                  $msg = $_GET['msgErr'];
                  echo "<div class='callout callout-danger'>";
                  echo "<p>".$msg."</p>";
                  echo "</div>";
                  echo "<br>";
                }
                elseif (isset($_GET['dltInvoice'])) {
                  $msg = $_GET['dltInvoice'];
                  echo "<div class='callout callout-danger'>";
                  echo "<p>".$msg."</p>";
                  echo "</div>";
                  echo "<br>";
                }
                elseif (isset($_GET['dltInvoiceErr'])) {
                  $msg = $_GET['dltInvoiceErr'];
                  echo "<div class='callout callout-warning'>";
                  echo "<p>".$msg."</p>";
                  echo "</div>";
                  echo "<br>";
                }
                ?>            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <div class='table-responsive table-style'>
              <h3>Invoices <a href='clients.php' class='btn btn-sm btn-success pull-right'>Create new</a></h3>
              <br>
              <?php  
                require_once("connection.php");

                $results_per_page = 10; 

                $query = "SELECT * FROM `tbl_orders`";
                $result = mysqli_query($conn, $query);

                $number_of_result = mysqli_num_rows($result); 

                $number_of_page = ceil($number_of_result / $results_per_page);  

                if (!isset($_GET['page']) ) {  
                    $page = 1;  
                } else {  
                    $page = $_GET['page'];  
                }  

                $page_first_result = ($page-1) * $results_per_page; 

                $sql = "SELECT * FROM `tbl_orders` INNER JOIN tbl_clients ON tbl_clients.client_ID = tbl_orders.fk_client_ID order by order_ID desc LIMIT " . $page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                  $sno = 1;
                  while ($rows = mysqli_fetch_assoc($result)) {
                    $clientID = $rows['client_ID'];
                    $clientNameEN = $rows['client_name_en'];
                    $clientNameAR = $rows['client_name_ar'];
                    $clientAddressEN = $rows['client_address_en'];
                    $clientAddressAR = $rows['client_address_ar'];
                    $orderID = $rows['order_ID'];
                    $orderDate = $rows['order_date'];
                    $orderInvoiceNo = $rows['order_invoice_no'];
                    echo '<a href="tcpdf/index.php?invoiceNo='.$orderInvoiceNo.'" target="_blank">
                            <div class="invoice-box">
                            <div class="row">
                              <div class="col-md-3 col-sm-12 col-xs-12">
                                <h4><span>'.$sno.'</span><i class="fas fa-file-invoice invoice-icon"></i> '.$clientNameEN.'</h4>
                              </div>
                              <div class="col-md-7 col-sm-8 col-xs-9">
                                <h5>Inv # '.$orderInvoiceNo.'  '.$clientAddressEN.'</h5>
                              </div>
                              <div class="col-md-2 col-sm-4 col-xs-3">
                                <div class="action-buttons">
                                  <!-- <a href="editInvoice.php?invoiceNo='.$orderInvoiceNo.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-alt"></i></a> -->
                                  <a href="deleteInvoice.php?order_ID='.$orderID.'" onclick="return confirmDelete()" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                          </a>';
                          $sno++;
                  }
                  
                  echo '<nav aria-label="Page navigation example">
              <ul class="pagination justify-content-end">';
                // <li class="page-item disabled">
                //   <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                // </li>
                    for($page = 1; $page<= $number_of_page; $page++) {  
                        echo '<li class="page-item">
                                <a class="page-link" href="invoices.php?page='.$page.'">'.$page.'</a>
                            </li>';
                    }  
                
                // <li class="page-item">
                //   <a class="page-link" href="#">Next</a>
                // </li>
                echo '
              </ul>
            </nav>';
                }else{
                  echo "No Invoice available";
                }
              ?>

          </div>  
        </div>
      </div>
    </div><!-- /Page Contents -->
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
      $('.to-hide').toggle();
      $('[data-toggle="tooltip"]').tooltip();
    });
  });
</script>

</body>
</html>
