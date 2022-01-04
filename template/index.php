<?php
  session_start();
  require "./processing/db_config.php";

  if (!$_SESSION['userid']) {
    header("location: ../index.php?login=you_nned_to_login");
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
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/" />
  </head>
  <body>
    <div class="container-scroller">



    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">
              <li class="nav-item ms-0 me-5 d-lg-flex d-none">
                <a href="#" class="nav-link horizontal-nav-left-menu"><i class="mdi mdi-format-list-bulleted"></i></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell mx-0"></i>
                  <span class="count bg-success">2</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                          <i class="mdi mdi-information mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">Application Error</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          Just now
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-warning">
                          <i class="mdi mdi-settings mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">Settings</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          Private message
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-info">
                          <i class="mdi mdi-account-box mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">New user registration</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          2 days ago
                        </p>
                    </div>
                  </a>
                </div>
              </li>
              
            </ul>
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
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              
            </ul>
        </div>
      </nav>
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
								<div class="ms-lg-5 d-lg-flex d-none">
										<button type="button" class="btn bg-white btn-icon">
											<i class="mdi mdi-view-grid text-success"></i>
									</button>
										<button type="button" class="btn bg-white btn-icon ms-2">
											<i class="mdi mdi-format-list-bulleted font-weight-bold text-primary"></i>
										</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="d-flex align-items-center justify-content-md-end">
								
								<div class="pe-1 mb-3 mb-xl-0">
										<button type="button" class="btn btn-primary btn-icon-text">
											Help
											<i class="mdi mdi-help-circle-outline btn-icon-append"></i>                          
									</button>
								</div>
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8 flex-column d-flex stretch-card">
							<div class="row">


								<div class="col-lg-4 d-flex grid-margin stretch-card">
									<div class="card">
										<div class="card-body ">
											<h2 class="text-dark mb-2 font-weight-bold">18,39</h2>
											<p class="pb-0 mb-0">Number of Teachers Registered</p>
										</div>
									</div>
								</div>


								<div class="col-lg-4 d-flex grid-margin stretch-card">
									<div class="card ">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">6475</h2>
											<h4 class="card-title mb-2">Total number of classes</h4>
										</div>
									</div>
								</div>


								<div class="col-lg-4 d-flex grid-margin stretch-card">
									<div class="card ">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">3479</h2>
											<h4 class="card-title mb-2">Total number of Pupils</h4>
                      <?php
                      $total_no_pupils = "SELECT * FROM teachers";
                      $num_pupils = mysqli_query($conn_db, $total_no_pupils);

                      $total_num = mysqli_num_rows($num_pupils);

                      mysqli_close($conn_db);  
                       ?>
										</div>
									</div>
								</div>


							</div>
							<div class="row">
								<div class="col-sm-12 grid-margin d-flex stretch-card">
									<div class="card">
										<div class="card-body">
                      
                      <div class="col-md-12">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="container-fluid">
                                <div class="row">
                                  <button class="btn btn-primary col-md-3 mx-1"><i class="mdi mdi-account-plus "></i>Add a Teacher</button>
                                 <button class="btn btn-primary col-md-3 mx-1"><i class="mdi mdi-account-plus "></i>Assign a Class</button>
                                 <button class="btn btn-primary col-md-3 mx-1"><i class="mdi mdi-account-plus "></i>Assign a Subject</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

										



                    	<div class="d-flex align-items-center justify-content-between">
												<h4 class="card-title mb-2">Teachers Registered</h4>
												<div class="dropdown">
													<a href="#" class="text-success btn btn-link  px-1"><i class="mdi mdi-refresh"></i></a>
													<a href="#" class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none" data-bs-toggle="dropdown" id="settingsDropdownsales">
														<i class="mdi mdi-dots-horizontal"></i></a>
														
												</div>
											</div>
											<div>


                        <table class="table table-bordered table-striped table-hover rounded">
                          <thead class="bg-primary text-white">
                            <tr>
                              <th>User ID</th>
                              <th>Classes</th>
                              <th>Subjects</th>

                              <th>User type</th>
                              <th>Phone</th>
                              <th>Edit / Delete</th>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>
                              <td>LPR2468</td>
                              <td>8 B</td>
                              <td>Civics</td>

                              <td>Subject Teacher</td>
                              <td>98795875443</td>
                              <td>
                                <a href="#" class="btn btn-success">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
												
                      </div>

										</div>
									</div>
								</div>
							</div>
						</div>



						<div class="col-sm-4 flex-column d-flex stretch-card">
							<div class="row flex-grow">
								<div class="col-sm-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">


                      <div class="col-md-12">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6"><button class="btn btn-primary"><i class="mdi mdi-account-plus p-2"></i>Add a Pupil</button></div>
                          </div>
                        </div>
                      </div>



                      <h3 class="font-weight-bold text-dark">Pupils Registered</h3>

                      <table class="table table-bordered table-striped table-hover rounded">
                        <thead class="bg-primary text-white">
                         <tr>
                            <th>Pupil ID</th>
                          <th>Subject</th>
                          <th>Class ID</th>
                          <th>Class Teacher ID</th>
                          <th>Edit / Delete</th>
                         </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td>100</td>
                          <td>Eng</td>
                          <td>11 C</td>
                          <td>1</td>
                          <td>
                             <a href="#" class="btn btn-success btn-sm ">Edit</a>
                             <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </td>
                          </tr>
                        </tbody>
                      </table>


										</div>
									</div>
								</div>
								<div class="col-sm-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
                      <div class="col-md-12">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6"><button class="btn btn-primary"><i class="mdi mdi-account-plus p-2"></i>Add classes</button></div>
                          </div>
                        </div>
                      </div>

                      <h4 class="card-title mb-0">Registered Classes</h4>
                      <table class="table table-bordered table-striped table-hover rounded">
                        <thead class="bg-primary text-white">
                          <th>Class ID</th>
                          <th>Teacher ID</th>
                          <th>Edit / Delete</th>

                        </thead>

                        <tr>
                          <td>2</td>
                          <td>2023</td>
                          <td>
                             <a href="#" class="btn btn-success btn-sm ">Edit</a>
                             <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </td>
                        </tr>
                      </table>

										</div>
									</div>
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