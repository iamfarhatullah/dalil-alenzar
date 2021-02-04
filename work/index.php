<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Work - Dalil Al-Enzar</title>

  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="robots" content="index, follow">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../font-awesome-5.3.1/css/all.css">
  <link rel="icon" href="../img/logo.png" type="image/png">
  <link rel="canonical" href="http://dalil-alenzar.com/">

  <meta property="og:site_name" content="">
  <meta property="og:url" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="">
  <meta property="og:image" content="">

  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:creator" content="">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:image" content="">

  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <div id="overlay">
    <div class="spinner"></div>
  </div>
  <div class="container-fluid header">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
          <a href="../" class="logo-link">
            <img src="../img/dalil.png" width="240px" class="img-responsive" alt="Dalil Al-Enzar">
          </a>
        </div>
        <div class="col-md-9 col-sm-6 col-xs-6">
          <table class="pull-right">
            <tr>
              <td>
                <div class="hidden-xs">
                  <table class="pull-right header-table">
                    <tr>
                      <td>
                        <i class="phoneAddress-icons fas fa-3x fa-map-marker-alt"></i>
                      </td>
                      <td>
                        <span class="address-title">Location</span><br>
                        <p class="address-text">Riyadh KSA,<br> PO box no 40653</p>
                      </td>
                    </tr>
                  </table>
                </div>
              </td>
              <td>
                <div class="hidden-xs hidden-sm">
                  <table class="pull-left header-table">
                    <tr>
                      <td>
                        <i class="phoneAddress-icons fas fa-3x fa-mobile-alt"></i>
                      </td>
                      <td>
                        <span class="phone-title">Phone</span><br>
                        <p  class="phone-text">
                        +966 500905901<br>+966 504595681
                        </p>
                      </td>
                    </tr>
                  </table>
                </div>
              </td>
              <td>
                <div class="hidden-xs hidden-sm">
                  <table class="pull-right header-table">
                    <tr>
                      <td>
                        <i class="phoneAddress-icons fas fa-3x fa-envelope-open"></i>
                      </td>
                      <td>
                        <span class="address-title">Email</span><br>
                        <p class="address-text"> info@dalil-alenzar.com<br> anwaralhaq51@gmail.com</p>
                      </td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </table>
          <button class="navbar-toggler nav-menu-trigger hidden-lg hidden-md pull-right hidden-sm" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="fa fa-bars"></span>
            </button>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid" id="nav-menu">
    <nav class="container">
      <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../about/">About</a>
        </li>
            <li class="nav-item">
            <a class="nav-link" href="../products/">Products</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="">Work</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="../contact/">Contact</a>
            </li>
        </ul>
    </div>
  </nav>
</div>


<div class="container-fluid" id="home-contents">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-offset-1 col-sm-10">
        <h1 class="title">Our Work</h1>
        <p class="p-b-15">We work with different companies installation of the safety system and yearly maintenance of the safety equipment and fire extinguisher industry and raising these relationships to make it easier for our clients to receive the highest possible quality of services and products.</p>
        
        <br><br><br><br>
        <h2 class="title">Our Clients</h2>
        <p class="p-b-15">We work with different businesses in the safety equipment industry and raising these relationships to make it easier for our clients to receive the highest possible quality of services and products. </p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-offset-1 col-sm-10">
        <div class="">
          <div class="row">
<?php  
require_once("../admin/connection.php");
$sql = "SELECT * FROM tbl_clients order by client_ID desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $client_name = $row['client_name_en'];
    $client_address = $row['client_address_en'];
    $client_contract = $row['client_contract'];
    if ($client_contract != null) {
      $contract = '<a href="../admin/'.$client_contract.'" target="_blank">View contract</a>';
    }else{
      $contract = '<i>No Contract</i>';
    }
    
    echo '<div class="col-md-12">';
    echo '<div class="client-box">';
    echo '<h2 class="client-box-title">'.$client_name.'</h2>';
    echo '<p class="client-box-p">'.$client_address.'</p>';
    echo $contract;
    echo '</div>';
    echo '</div>';
  }
}
?>
            
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<footer class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12 p-b-30">
        <img src="../img/dalil-o.png" width="220" class="img-fluid" alt="Dalil Al-Enzar">
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-2 col-sm-4">
        <div class="footer-nav-box">
          <h3>Navigation</h3>
          <a href="../" title="Home" class="footer-links">
            <span class="fa fa-chevron-right"></span> Home
          </a>
          <a href="../about/" title="About" class="footer-links">
            <span class="fa fa-chevron-right"></span> About
          </a>
           <a href="../products/" title="Products" class="footer-links">
            <span class="fa fa-chevron-right"></span> Products
          </a>
           <a href="" title="Work" class="footer-links">
            <span class="fa fa-chevron-right"></span> Work
          </a>
          <a href="../contact/" title="Contact" class="footer-links">
            <span class="fa fa-chevron-right"></span> Contact
          </a>
        </div>
      </div>
      <div class="col-md-3 col-sm-8">
        <div class="footer-nav-box">
          <h3>Contact Us</h3>
          <p><span class="fa fa-phone"></span>+966 500905901</p>
          <p><span class="fa fa-phone"></span>+966 504595681</p>
          <p><span class="fa fa-envelope"></span> info@dalil-alenzar.com</p>
          <p><span class="fa fa-envelope"></span> anwaralhaq51@gmail.com</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-12"> 
        <div class="footer-address-box">
          <h3>Address</h3>
          <p> Riyadh KSA<br>PO box no 40653</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="../js/script.js"></script>
</body>
</html>