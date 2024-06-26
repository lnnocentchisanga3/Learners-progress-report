<?php
  session_start();
  require "../../processing/db_config.php";

  if (!$_SESSION['userid']) {
    header("location: ../index.php?login=you_nned_to_login");
  }else{

  $user = $_SESSION['user_log_id'];

  $get_time = mysqli_query($conn_db, "SELECT * FROM logs WHERE user_id = '$user' ORDER BY logid ASC");

  $log_row = mysqli_fetch_array($get_time);

$msgDis = "";

  if (isset($_POST['assignTeacher'])) {

    if (empty($_POST['userid']) || empty($_POST['class_st'] || empty($_POST['subject']))) {
      $msgDis = '<h6 class="bg-danger text-white text-center p-2">Some Fields are EMPTY</h6>'; 
    }else{

      $check_lesson = mysqli_query($conn_db, "SELECT * FROM lessons WHERE class ='$_POST[class_st]' AND subject='$_POST[subject]' ");
      $num = mysqli_num_rows($check_lesson);
      if ($num == null || $num == 0) {

        $convert_class = strtoupper($_POST['class_st']);
        $convert_subject = strtoupper($_POST['subject']);

        $assign_lesson = mysqli_query($conn_db, "INSERT INTO lessons(teacher_id,class,subject) VALUES('$_POST[userid]','$convert_class','$convert_subject')");

    if ($assign_lesson == true) {
      $msgDis = '<h6 class="bg-success text-white text-center p-2">Lesson is assigned successfully</h6>';
    }else{
      $msgDis = '<h6 class="bg-danger text-white text-center p-2">An error occoured. Please try again</h6>';
    }

      }else{
        $msgDis = '<h6 class="bg-danger text-white text-center p-2">That Lesson has been assigned already</h6>';
      }

  }
  }

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
                      <a class="dropdown-item" href="./processing/logout.php?user=<?php echo $_SESSION['user_log_id']; ?>">
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
            <!-- <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              
            </ul> -->
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">

              <?php echo $msgDis;?>
            
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-sm-6 mb-4 mb-xl-0">
							<div class="d-lg-flex align-items-center">
								<div class="py-3">
									<h3 class="text-dark font-weight-bold mb-2">Hi, User [<?php echo $_SESSION['user_log_id']; ?>] welcome back!</h3>
									<h6 class="font-weight-normal mb-2">Last login was at <?php echo $log_row['log_time'];  ?>. <a href="#">View log details</a></h6>
								</div>
								
							</div>
						</div>
						<div class="col-sm-6">
							<div class="d-flex align-items-center justify-content-md-end">
								
								<div class="pe-1 mb-3 mb-xl-0">
										<a href="../../index.php" type="button" class="btn btn-primary btn-icon-text">
                      <i class="mdi mdi-arrow-left-bold btn-icon-append p-2"></i>
											Go Back to Home                          
									</a>
								</div>
								
							</div>
						</div>
					</div>

					<div class="row">

            <div class="col-md-3 grid-margin stretch-card">
              <div class="card shadow">
                <div class="card-body">
                  <h4 class="card-title"><i class="mdi mdi-calendar-multiple"></i> List of Teachers </h4>
                 <!--  <p class="card-description">
                    Basic form layout
                  </p> -->
                  <small style="margin-bottom: 2rem;">(Select a teacher you want to assign a Lesson)</small>
                  <div class="table-responsive" style="height: 30rem;">
                    <table class="table table-bordered table-hover">
                    <thead class="bg-primary text-white">
                      <tr>
                        <th>Teacher ID</th>
                        <th>Names</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                             require "../../processing/db_config.php";

                             $get_teachers = "SELECT * FROM users";

                               $query_get_teachers = mysqli_query($conn_db, $get_teachers);

                             if ($query_get_teachers) {

                               if (mysqli_num_rows($query_get_teachers) == null || mysqli_num_rows($query_get_teachers) == 0) {
                                 echo '<tr>
                                      <td>Empty</td>
                                      <td>Empty</td>
                                      <td>
                                      Empty
                                      Empty
                                    </td>
                                    </tr>';

                               }else{
                                while ($row_get_teachers = mysqli_fetch_array($query_get_teachers)) {

                                 echo '<tr>
                                      <td>'.$row_get_teachers["user_log_id"].'</td>
                                       <td>'.$row_get_teachers["fullnames"].'</td>

                                      <td>';
                                  echo '<button value="'.$row_get_teachers["user_log_id"].'" class="btn btn-primary rounded-0" onclick="getValue(this.value)">Assign a Lesson <i class="mdi mdi-plus"></i></button>
                                    </td>
                                    </tr>';

                               }
                               
                               }
                             }else{
                              echo "Error :".mysqli_error($conn_db);
                             }


                             mysqli_close($conn_db);
                            ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>

            <script>
              function getValue(userid){
                document.getElementById('userId').value = userid;
              }
            </script>

            <div class="col-md-8 grid-margin stretch-card">
              <div class="card shadow">
                <div class="card-body">
                  <h4 class="card-title"><i class="mdi mdi-calendar-multiple"></i> Manage Lessons </h4>
                 <!--  <p class="card-description">
                    Basic form layout
                  </p> -->
                  <form class="form" method="POST">
                    <div class="form-group">
                      <label for="input-group-append"><i class="mdi mdi-account-card-details"></i> Teacher Log Id</label>
                      <input type="text" class="form-control" id="userId" name="userid" placeholder="Teacher log id" readonly required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1"><i class="mdi mdi-paper-cut-vertical"></i> Subject </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="subject" placeholder="Enter the Subject.." required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1"><i class="mdi mdi-home"></i>Class</label>
                      <select class="form-control py-3" name="class_st">
                        <?php
                         require "../../processing/db_config.php";

                         $get_classes = mysqli_query($conn_db, "SELECT * FROM class");
                         while ($row_get_classes = mysqli_fetch_array($get_classes)) {
                           echo '<option>'.$row_get_classes["class"].'</option>';
                         }
                        ?>
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary me-2" name="assignTeacher">Submit <i class="mdi mdi-near-me"></i></button>
                    <button class="btn btn-danger">Cancel <i class="mdi mdi-block-helper"></i></button>
                  </form>
                </div>
              </div>
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
		<!-- container-scroller -->
    <!-- base:js -->
    <script src="vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>
		<script src="vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="vendors/justgage/justgage.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
<?php
  }
?>