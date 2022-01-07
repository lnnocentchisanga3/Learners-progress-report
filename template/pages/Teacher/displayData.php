  <?php
  session_start();
require "../../processing/db_config.php";
$id = $_GET['pupil'];
$user = $_SESSION['user_log_id'];

$get_pupils = "SELECT * FROM pupils WHERE pupil_id='$id' ";

$query = mysqli_query($conn_db, $get_pupils);

$row = mysqli_fetch_array($query);


  ?>

  <div class="row">
<div class="col-md-3 mx-1 my-2 ">
 <img src="../../images/default.jpg" class="shadow-sm" style="height: 10rem">
</div>
<div class="col-md-3 mx-1 my-2">Class : <?php echo $row['class']; ?></div>
<div class="col-md-3 mx-1 my-2">Names : <?php echo $row['pupil_name']; ?></div>
</div>
<div class="card">
<div class="card-header">The subject scores</div>
<div class="card-body">
<div class="row" id="pupilDetails">
     <form class="form" method="POST">
        <div class="form-group">
          <label for="input-group-append"><i class="mdi mdi-account-circle"></i>Pupil ID</label>
          <input type="text" name="names" class="form-control" id="pupilId"  value="<?php echo $row['pupil_id']; ?>" readonly>
          <label for="input-group-append"><i class="mdi mdi-account-circle"></i>score</label>
          <input type="number" name="names" class="form-control"  placeholder="Score" id="score" >
        </div>
        <label for="input-group-append"><i class="mdi mdi-account-circle"></i>Subject</label>
          <select class="form-control py-3" id="sub" >
            <?php
            $get = "SELECT * FROM lessons WHERE teacher_id='$user' ";

            $query = mysqli_query($conn_db, $get);

            while ($row1 = mysqli_fetch_array($query)) {
              echo '<option>'.$row1["subject"].'</option>';
            }
            ?>
          </select>
          <label for="input-group-append"><i class="mdi mdi-account-circle"></i>Test Number</label>
          <select class="form-control mb-5 py-3" id="tnum">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
          </select>

          <label for="input-group-append"><i class="mdi mdi-account-circle"></i>Term</label>
          <select class="form-control mb-5 py-3" id="termnum">
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
          
        </div>
        <button type="submit" name="submit_teacher" onclick="addScorePupil()" class="btn btn-primary me-2">Submit <i class="mdi mdi-near-me"></i></button>
        <button class="btn btn-danger" type="reset">reset <i class="mdi mdi-block-helper"></i></button>
      </form>  