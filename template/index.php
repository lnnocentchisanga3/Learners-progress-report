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
    </div>
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-sm-6 mb-4 mb-xl-0">
							<div class="d-lg-flex align-items-center bg-white shadow my-2 p-2 col-md-5">
								<div class="py-3">
									<h3 class="text-primary font-weight-bold mb-2">Hi, Admin [<?php echo $_SESSION['user_log_id']; ?>] welcome back!</h3>
									<h6 class="font-weight-normal mb-2 text-primary">Last login was at <?php echo $log_row['log_time'];  ?>.</h6>
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
                      <p class="card-title mb-2">Number of Users Registered</p>
                      <?php
                      $total_no_Teachers = "SELECT * FROM users";

                      $num_teachers = mysqli_query($conn_db, $total_no_Teachers);


                      $total_num = mysqli_num_rows($num_teachers);

                      mysqli_close($conn_db);
                      ?>
											<h2 class="text-dark mb-2 font-weight-bold"><?php echo $total_num; ?></h2>
										</div>
									</div>
								</div>


								<div class="col-lg-4 d-flex grid-margin stretch-card">
									<div class="card ">
										<div class="card-body">
                      <h4 class="card-title mb-2">Total number of classes</h4>
											 <?php
                        require "./processing/db_config.php";
                      $total_no_classes = "SELECT * FROM class";

                      $num_classes = mysqli_query($conn_db, $total_no_classes);


                      $total_num1 = mysqli_num_rows($num_classes);

                      mysqli_close($conn_db);
                      ?>
                      <h2 class="text-dark mb-2 font-weight-bold"><?php echo $total_num1; ?></h2>
										</div>
									</div>
								</div>


								<div class="col-lg-4 d-flex grid-margin stretch-card">
									<div class="card ">
										<div class="card-body">
                      <h4 class="card-title mb-2">Total number of Pupils</h4>
                      <?php
                       require "./processing/db_config.php";
                       
                      $total_no_pupils = "SELECT * FROM pupils";

                      $num_pupils = mysqli_query($conn_db, $total_no_pupils);

                      $total_num2 = mysqli_num_rows($num_pupils);

                      mysqli_close($conn_db);  
                       ?>

                        <h2 class="text-dark mb-2 font-weight-bold"><?php echo $total_num2; ?></h2>
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
                                  <a href="./pages/forms/add_teacher.php" class="btn btn-primary col-md-3 mx-1"><i class="mdi mdi-account-plus p-2"></i>Add a Teacher</a>
                                 <!-- <button class="btn btn-primary col-md-3 mx-1"><i class="mdi mdi-account-plus p-2"></i>Assign a Class</button> -->
                                 <a href="./pages/forms/manage_lessons.php" class="btn btn-primary col-md-3 mx-1"><i class="mdi mdi-calendar-multiple p-2"></i>Manage Lessons</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

										



                    	<div class="d-flex align-items-center justify-content-between">
												<h4 class="card-title mb-2 text-uppercase">Teachers Registered</h4>
												<div class="dropdown">
													<a href="index.php" class="text-success btn btn-link  px-1"><i class="mdi mdi-refresh"></i></a>
													<a href="#" class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none" data-bs-toggle="dropdown" id="settingsDropdownsales">
														<i class="mdi mdi-dots-horizontal"></i></a>
														
												</div>
											</div>
											<div>

                        <input type="text" id="myInput" class="form-control my-3" onkeyup="myFunction()" placeholder="Search for a Teacher by their ID.." title="Type in a name" style="border: 1px solid dodgerblue; border-radius: 2rem;">

                        <div class="table-responsive" style="height: 36rem;">
                        <table class="table table-bordered table-striped table-hover rounded" id="teacherTable">
                          <thead class="bg-primary text-white">
                            <tr>
                              <th>User ID</th>
                               <th>Fullnames</th>

                              <th>User type</th>
                              <th>Phone</th>
                              <th>Status</th>
                              <th>Edit / Delete / Assign Class / Activate / Deactivate</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php
                             require "./processing/db_config.php";

                             $get_teachers = "SELECT * FROM users";

                               $query_get_teachers = mysqli_query($conn_db, $get_teachers);

                             if ($query_get_teachers) {

                               if (mysqli_num_rows($query_get_teachers) == null || mysqli_num_rows($query_get_teachers) == 0) {
                                 echo '<tr>
                                      <td>Empty</td>
                                      <td>Empty</td>

                                      <td>Empty</td>
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

                                      <td>'.$row_get_teachers["user_type"].'</td>
                                      <td>'.$row_get_teachers["phone"].'</td>
                                      <td>'.$row_get_teachers["status"].'</td>
                                      <td>';
                                      if ($row_get_teachers["status"] == "offline") {
                                       echo '<a href="#" class="btn btn-primary rounded-0 mx-1">Activate </a>';
                                      }else{
                                        echo '<a href="#" class="btn btn-danger text-white  rounded-0 mx-1">Deactivate </a>';
                                      }
                                  echo '<a href="#" class="btn btn-success rounded-0">Edit <i class="mdi mdi-border-color"></i></a>
                                       <button class="btn btn-warning rounded-0" value="'.$row_get_teachers["user_log_id"].'"  data-toggle="modal" data-target="#childDetails" onclick="getUserId(this.value)">Assign a Class</button>
                                      <a href="#" class="btn btn-danger rounded-0">Delete <i class="mdi mdi-delete-forever"></i></a>
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
								</div>
							</div>
						</div>

            <!-- Search script num 1 -->
            <script>
            function myFunction() {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("teacherTable");
              tr = table.getElementsByTagName("tr");
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }       
              }
            }
            </script>
            <!-- End of search script -->



						<div class="col-sm-4 flex-column d-flex stretch-card">
							<div class="row flex-grow">
								<div class="col-sm-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">


                      <div class="col-md-12 row">
                        <div class="container-fluid">
                          <div class="row">
                             <div class="col-md-12">
                               <button  class="btn btn-primary col-md-5 py-2 my-2" data-toggle="modal" data-target="#AddPupilModal"><i class="mdi mdi-account-plus p-2"></i>Add a pupil</button>
                             </div>
                            <!-- <div class="col-md-6"></div>
                            <div class="col-md-6"><button class="btn btn-primary"><i class="mdi mdi-account-plus p-2"></i>Add a Pupil</button></div> -->
                          </div>
                        </div>
                      </div>



                      <h3 class="font-weight-bold text-dark text-uppercase">Pupils Registered</h3>

                      <input type="text" id="addPupilInput" class="form-control my-3" onkeyup="searchPupil()" placeholder="Search for Pupil's names.." title="Type in a name" style="border: 1px solid dodgerblue; border-radius: 2rem;">

                      <div class="table-responsive" style="height: 15rem;">
                        <table class="table table-bordered table-striped table-hover rounded" id="pupilTable">
                        <thead class="bg-primary text-white">
                         <tr>
                            <th>Pupil ID</th>
                          <th>Pupil Names</th>
                          <th>Class </th>
                          <th>Edit / Delete</th>
                         </tr>
                        </thead>


                        <tbody>

                          <?php
                          require "./processing/db_config.php";

                          $get_pupils = "SELECT * FROM pupils ";

                          $num_pupils = mysqli_query($conn_db, $get_pupils);

                          if ($num_pupils) {
                            if (mysqli_num_rows($num_pupils) == null || mysqli_num_rows($num_pupils) == 0) {
                              echo ' <tr>
                                       <td>Empty</td>
                                        <td>Empty</td>
                                        <td>Empty</td>
                                         <td>
                                        Empty                 
                                         </td>
                                         </tr>';
                            }else{
                              while ($row_get_pupils = mysqli_fetch_array($num_pupils)) {
                                echo ' <tr>
                                       <td>'.$row_get_pupils["pupil_id"].'</td>
                                        <td>'.$row_get_pupils["pupil_name"].'</td>
                                        <td>'.$row_get_pupils["class"].'</td>
                                         <td>
                                       <a href="#" class="btn btn-success btn-sm ">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>                
                                         </td>
                                         </tr>';
                              }
                            }
                          }else{
                            echo "Error : ".mysqli_error($conn_db);
                          }
                          mysqli_close($conn_db);


                          ?>

                        </tbody>
                      </table>
                      </div>

                      <!-- Search script num 2 -->
                      <script>
                      function searchPupil(){
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("addPupilInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("pupilTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[1];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }       
                        }
                      }
                      </script>
                      <!-- End of search script -->


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
                            <!-- <a href="" class="btn btn-primary col-md-5 offset-md-5"><i class="mdi mdi-account-plus p-2"></i>Add class</a> -->
                          </div>
                        </div>
                      </div>

                      <h4 class="card-title mb-3 text-uppercase">Registered Classes</h4>

                      <input type="text" id="classInput" class="form-control my-3" onkeyup="classFunction()" placeholder="Search for a class...." title="Type in a name" style="border: 1px solid dodgerblue; border-radius: 2rem;">

                      <div class="table-responsive" style="height: 20rem;">
                        <table class="table table-bordered table-striped table-hover rounded" id="classTable">
                        <thead class="bg-primary text-white">
                          <th>Class ID</th>
                          <th>Class</th>
                          <th>Teacher ID</th>
                          <th>Edit / Delete</th>

                        </thead>

                        <?php
                          require "./processing/db_config.php";

                          $get_class = "SELECT * FROM class";

                          $num_class = mysqli_query($conn_db, $get_class);

                          /*$total_num3 = mysqli_num_rows($num_class);*/


                          if ($num_class) {
                            if (mysqli_num_rows($num_class) == null || mysqli_num_rows($num_class) == 0) {
                              echo ' <tr>
                                       <td>Empty</td>
                                        <td>Empty</td>
                                         <td>
                                        Empty                
                                         </td>
                                         </tr>';
                            }else{
                              while ($row_get_class = mysqli_fetch_array($num_class)) {
                                echo ' <tr>
                                       <td>'.$row_get_class["class_id"].'</td>
                                       <td>'.$row_get_class["class"].'</td>
                                        <td>'.$row_get_class["teacher_id"].'</td>
                                         <td>
                                       <a href="#" class="btn btn-success btn-sm ">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>                
                                         </td>
                                         </tr>';
                              }
                            }
                          }else{
                            echo "Error : ".mysqli_error($conn_db);
                          }
                          mysqli_close($conn_db);

                          ?>
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

				</div>

        <!-- Search script num 3 -->
            <script>
            function classFunction() {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("classInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("classTable");
              tr = table.getElementsByTagName("tr");
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }       
              }
            }
            </script>
            <!-- End of search script -->

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

    <!-- The Modal -->
  <div class="modal fade" id="childDetails">
    <div class="modal-dialog modal-md card">
      <div class="modal-content" id="childDetailsDisplay">
        <div class="card-header">Assign a class</div>
        <div class="modal-body ">
          <label><i class="mdi mdi-account-card-details"></i> User ID</label>
          <input type="text" name="userid" class="form-control my-2" id="userLogId" style="border: 1px solid dodgerblue;">
          <label><i class="mdi mdi-book-open-page-variant"></i> Class</label>
          <input type="text" name="class" class="form-control my-2" id="classAssigned" style="border: 1px solid dodgerblue;" placeholder="Enter the class">

          <button name="Assign" onclick="assingTeacherClass()" class="btn btn-primary my-2">Assign a Class</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger text-white" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


   <!-- The Modal -->
  <div class="modal fade" id="AddPupilModal">
    <div class="modal-dialog modal-md card">
      <div class="modal-content" id="childDetailsDisplay">
        <div class="card-header">Add a Pupil</div>
        <div class="modal-body ">
          <label><i class="mdi mdi-account-card-details"></i>Pupil names</label>
          <input type="text" name="userid" class="form-control my-2" id="pupilNames"  placeholder="Pupil names" style="border: 1px solid dodgerblue;">
          <label><i class="mdi mdi-book-open-page-variant"></i> Class <small>(Select a Class)</small></label>
          <select name="class" class="form-control my-2 py-3" id="classPupil" style="border: 1px solid dodgerblue;">
            <?php
             require "./processing/db_config.php";

            $get_classes = mysqli_query($conn_db, "SELECT * FROM `class`");
            if (!$get_classes) {
              echo "<option>Error : ".mysqli_error($conn_db)."</option>";
            }else{
              while ($row = mysqli_fetch_array($get_classes)) {
              echo "<option>".$row['class']."</option>";
            }
            }

            mysqli_close($conn_db);
            ?>
          </select>

          <button name="Assign" onclick="AddPupil()" class="btn btn-primary my-2"><i class="mdi mdi-content-save-all"></i> Save</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger text-white" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>



    <!-- base:js -->
    <script src="vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
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
     <!-- Online CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- End of Online CDN -->
    <script>
      function getUserId(value){
        document.getElementById('userLogId').value = value;
      }
    </script>
  </body>
</html>
<?php
  }
?>