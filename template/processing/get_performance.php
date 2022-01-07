<?php
require 'db_config.php';


$pupilId = $_GET['pupil'];

$get_pupil = mysqli_query($conn_db, "SELECT * FROM pupils WHERE pupil_id='$pupilId' ");
$pupil_row = mysqli_fetch_array($get_pupil);

$query = mysqli_query($conn_db, "SELECT * FROM marks WHERE pupil_id='$pupilId' ");

if (!$query) {

	echo "Error :".mysqli_error($conn_db);
}else{
	if (mysqli_num_rows($query) == null || mysqli_num_rows($query) == 0) {
		echo '<div class="row">
         		<div class="col-md-3 mx-1 my-2 ">
         			<img src="../../images/default.jpg" class="shadow-sm" style="height: 10rem">
         		</div>
         		<div class="col-md-3 mx-1 my-2">Class : '.$pupil_row["class"].'</div>
         		<div class="col-md-3 mx-1 my-2">Names : '.$pupil_row["pupil_name"].'</div>
         	</div>';
         	
		echo '<div class="card">
         		<div class="card-header">The subject scores</div>
         		<div class="card-body">
         		<div class="row">';

        echo "<h4 class='p-3'>Pupils Performance data no found</h4>";

        echo '</div>
         	</div>
         </div>
        </div>';
	}else{
		echo '<div class="row">
         		<div class="col-md-3 mx-1 my-2 ">
         			<img src="../../images/default.jpg" class="shadow-sm" style="height: 10rem">
         		</div>
         		<div class="col-md-3 mx-1 my-2">Class : '.$pupil_row["class"].'</div>
         		<div class="col-md-3 mx-1 my-2">Names : '.$pupil_row["pupil_name"].'</div>
         	</div>';

		echo '<div class="card">
         		<div class="card-header">The subject scores</div>
         		<div class="card-body">
         		<div class="row">';
         		while ($row = mysqli_fetch_array($query)) {
         			echo '<div class="col-md-2">
         			<h5>Term'.$row['term'].'</h5>
					<h4 class="card-header bg-primary text-white">'.$row["sub"].' '.' '.' [Test'.$row['testnum'].']</h4>
					<ul class="nav">
						<li>'.' '.$row["score"].'</li>
					</ul>
					</div>';
         		}

        echo '</div>
         	</div>
         </div>
        </div>';

	}
}

?>

         	
				
				<!-- <div class="col-md-2">
					<h4 class="card-header bg-primary text-white">Mathematics</h4>
					<ol>
						<li>hello</li>
						<li>hello</li>
					</ol>
				</div>
				<div class="col-md-2">
					<h4 class="card-header bg-primary text-white">Mathematics</h4>
					<ol>
						<li>hello</li>
						<li>hello</li>
					</ol>
				</div>
				<div class="col-md-2">
					<h4 class="card-header bg-primary text-white">Mathematics</h4>
					<ol>
						<li>hello</li>
						<li>hello</li>
					</ol>
				</div>
				<div class="col-md-2">
					<h4 class="card-header bg-primary text-white">Mathematics</h4>
					<ol>
						<li>hello</li>
						<li>hello</li>
					</ol>
				</div>
				<div class="col-md-2">
					<h4 class="card-header bg-primary text-white">Mathematics</h4>
					<ol>
						<li>hello</li>
						<li>hello</li>
					</ol>
				</div>
				<div class="col-md-2">
					<h4 class="card-header bg-primary text-white">Mathematics</h4>
					<ol>
						<li>hello</li>
						<li>hello</li>
					</ol>
				</div>
				<div class="col-md-2">
					<h4 class="card-header bg-primary text-white">Mathematics</h4>
					<ol>
						<li>hello</li>
						<li>hello</li>
					</ol></div>
				<div class="col-md-2">
					<h4 class="card-header bg-primary text-white">Mathematics</h4>
					<ol>
						<li>hello</li>
						<li>hello</li>
					</ol>
				</div>   -->
         		