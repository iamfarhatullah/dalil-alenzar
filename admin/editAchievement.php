<?php include 'include/startSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width" />
<meta name="author" content="">
<title>Edit</title>		
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
              <h3> Edit Achievement <span>Control Panel</span></h3>
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
    				<div class="setup-box"> 
      					<h3 class="box-title">Edit Achievement</h3>
                <?php   
              require_once("connection.php");
              $a_id = $_GET['id'];
              $sql = "SELECT * FROM tbl_achievements WHERE achievement_ID=$a_id";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                $rows = mysqli_fetch_assoc($result); 
                  $achievement_ID = $rows['achievement_ID'];
                  $achievement_title_en = $rows['achievement_title_en'];
                  $achievement_title_ar = $rows['achievement_title_ar'];
                  
                  $achievement_pdf = $rows['achievement_pdf'];
                  ?>

                  <form action="updateAchievement.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <label>Title EN *</label>
                      <input type="hidden" name="achievement_ID" value="<?php echo $a_id; ?>">
                      <input type="text" class="setup-input" value="<?php echo $achievement_title_en; ?>" name="achievement_title_en" placeholder="Type in English" required>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <label>Title AR *</label>
                      <input type="text" class="setup-input" value="<?php echo $achievement_title_ar; ?>" name="achievement_title_ar" placeholder="Type in Arabic" required>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <label>Achievement PDF *</label> 
                      <input type="hidden" name="achievement_pdf_old" value="<?php echo $achievement_pdf; ?>">
                      <input type="file" class="setup-input" name="achievement_pdf_new" accept="application/pdf">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <input type="submit" value="Submit" name="updateAchievement" class="submit-btn">
                    </div>
                  </div>
                </form>
              <?php  
                }else{
                  //header("location: employees.php");
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
<script>
	$(document).ready(function(){
    	//$('[data-toggle="tooltip"]').tooltip();   
	});
</script>
</body>
</html>