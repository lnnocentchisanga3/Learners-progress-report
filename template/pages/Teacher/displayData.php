  <?php
  session_start();
require "../../processing/db_config.php";
$id = $_GET['pupil'];
$user = $_SESSION['user_log_id'];

$get_pupils = "SELECT * FROM pupils WHERE pupil_id='$id' ";

$query = mysqli_query($conn_db, $get_pupils);

$row = mysqli_fetch_array($query);


  ?>

  <!-- <div class="row">
<div class="col-md-3 mx-1 my-2 ">
 <img src="../../images/default.jpg" class="shadow-sm" style="height: 10rem">
</div>
<div class="col-md-3 mx-1 my-2">Class : <?php echo $row['class']; ?></div>
<div class="col-md-3 mx-1 my-2">Names : <?php echo $row['pupil_name']; ?></div>
</div> -->
<div class="card">
<div class="card-header">The subject scores</div>
<div class="card-body">
<div class="row" id="pupilDetails">
     <form class="form" method="POST">
        <div class="form-group">
          <label for="input-group-append"><i class="mdi mdi-account-circle"></i>Pupil ID</label>
          <input type="text" name="names" class="form-control my-3" id="pupilId"  value="<?php echo $row['pupil_id']; ?>" readonly>

          <label for="input-group-append"><i class="mdi mdi-account-circle"></i>Subject</label>
          <select class="form-control py-3 my-3" id="sub" >
            <?php
            $get = "SELECT * FROM lessons WHERE teacher_id='$user' ";

            $query = mysqli_query($conn_db, $get);

            while ($row1 = mysqli_fetch_array($query)) {
              echo '<option>'.$row1["subject"].'</option>';
            }
            ?>
          </select>

          <label for="input-group-append"><i class="mdi mdi-account-circle"></i>Term</label>
          <select class="form-control mb-5 py-3 my-3" id="termnum">
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>

          <label for="input-group-append"><i class="mdi mdi-paper-cut-vertical"></i>Test 1</label>
          <input type="number" name="names" class="form-control my-3"  placeholder="Test 1" id="score" >

          <label for="input-group-append"><i class="mdi mdi-paper-cut-vertical"></i>Test 2</label>
          <input type="number" name="names" class="form-control my-3"  placeholder="Test 2" id="score1" >

          <label for="input-group-append"><i class="mdi mdi-paper-cut-vertical"></i>Test 3</label>
          <input type="number" name="names" class="form-control my-3"  placeholder="Test 3" id="score2" >
        </div>
          
        </div>
        <button type="submit" name="submit_teacher" onclick="addScorePupil()" class="btn btn-primary me-2">Submit <i class="mdi mdi-near-me"></i></button>
        <button class="btn btn-danger" type="reset">reset <i class="mdi mdi-block-helper"></i></button>
      </form>  