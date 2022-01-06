<?php
  session_start();
  require "../../processing/db_config.php";

  if (!$_SESSION['userid']) {
    header("location: ../../index.php?login=you_nned_to_login");
  }else{

  $user = $_SESSION['user_log_id'];

  $get_time = mysqli_query($conn_db, "SELECT * FROM logs WHERE user_id = '$user' ORDER BY logid ASC");

  $log_row = mysqli_fetch_array($get_time);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Learnes progress report</title>
   <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/" />
  </head>
  <body>
    <div class="container-scroller">



    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
              <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                  <h3 class="text-primary text-uppercase" style="font-weight: bold; font-size: 25.5px;"> Learners Progress Report  <i class="mdi mdi-finance"></i></h3>
              </div>
              <ul class="navbar-nav navbar-nav-right">
                
                  <li class="nav-item dropdown d-lg-flex d-none">
                  <button type="button" class="btn btn-primary btn-sm"><i class="mdi mdi-settings text-white"></i> Settings</button>
                </li>
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name"><?php echo $_SESSION['user_log_id']; ?></span>
                    <span class="online-status"></span>
                    <!-- <img src="images/faces/face28.png" alt="profile"/> -->
                    <i class="mdi mdi-account-circle text-primary" style="font-size: 25px;"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <!-- <a class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                      </a> -->
                      <a class="dropdown-item" href="../../processing/logout.php?user=<?php echo $_SESSION['user_log_id']; ?>">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                      </a>
                  </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
            
        </div>
      </nav>
    </div>
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-sm-6 mb-4 mb-xl-0">
							<div class="d-lg-flex align-items-center bg-white shadow my-2 p-1 col-md-5">
                <div class="py-3">
                  <h3 class="text-primary font-weight-bold mb-2">Hi, <strong class="text-uppercase"><?php echo $_SESSION['fullnames']; ?></strong> welcome back!</h3>
                  <h6 class="font-weight-normal mb-2 text-primary">Last login was at <?php echo $log_row['log_time'];  ?>.</h6>
                </div>
                
              </div>
						</div>
						<div class="col-sm-6 mb-4 mb-xl-0">
							<div class="d-flex align-items-center justify-content-md-center">
								
								<div class="pe-1 mb-3 mb-xl-0">
										<a href="./Teacher.php?get_page=class" type="button" class="btn btn-primary btn-icon-text shadow">
                      <i class="mdi mdi-folder-account p-2"></i>
											My Classes                     
									</a>
								</div>

                <div class="pe-1 mb-3 mb-xl-0">
                    <a href="./Teacher.php?get_page=scores" type="button" class="btn btn-primary btn-icon-text shadow">
                      <i class="mdi mdi-comment-check-outline p-2"></i>
                      Enter the scores                        
                  </a>
                </div>

                <!-- <div class="pe-1 mb-3 mb-xl-0">
                    <a href="./Teacher.php?get_page=performance" type="button" class="btn btn-primary btn-icon-text shadow">
                      <i class="mdi mdi-chart-line btn-icon-append p-2"></i>
                      View pupils Performance                         
                  </a>
                </div> -->
								
							</div>
						</div>
					</div>

					<div class="row">
            <?php
            if (isset($_GET['get_page'])) {
                $page = $_GET['get_page'];

                if ($page == "class") {
                  require 'my_classes.php';
                }elseif ($page == "scores") {
                  require 'my_scores.php';
                }elseif ($page == "performance") {
                  require 'performance.php';
                }


              }else{
                echo '<div class="container-fluid">
                        <div class="col-md-12">
                          <strong class="offset-md-4 text-danger" style="font-size: 3rem;">404 PAGE NOT FOUND</strong>
                        </div>
                      </div>';
              } 
            ?>
          </div>


				</div>
      </div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
          <div class="footer-wrap">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©</a>2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Learners Progress Report</span>
            </div>
          </div>
        </footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>

   </div>


		<!-- container-scroller -->
    <!-- base:js -->
    <script src="../../vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../../js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../vendors/progressbar.js/progressbar.min.js"></script>
		<script src="../../vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="../../vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="../../vendors/justgage/justgage.js"></script>
    <script src="../../js/jquery.cookie.js" type="text/javascript"></script>
    <!-- Custom js for this page-->
    <script src="../../js/dashboard.js"></script>
    <!-- End custom js for this page-->
    <!-- Online CDN -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- End of Online CDN -->

     <script>
      function AddPupil(){
         var pupilNames = document.getElementById('pupilNames').value;
        var classPupil = document.getElementById('classPupil').value;

        var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          window.alert(this.responseText);
        }
      };
      xhttp.open("GET", "processing/addPupil.php?pupil="+pupilNames+"&class="+classPupil, true);
      xhttp.send();

      window.location.reload();
      }

      function assingTeacherClass(){

        var userLogId = document.getElementById('userLogId').value;
        var classAssigned = document.getElementById('classAssigned').value;

        var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          window.alert(this.responseText);
        }
      };
      xhttp.open("GET", "processing/assignClass.php?userId="+userLogId+"&class="+classAssigned, true);
      xhttp.send();

      window.location.reload();
      }

    </script>

  </body>
</html>
<?php
  }
?>