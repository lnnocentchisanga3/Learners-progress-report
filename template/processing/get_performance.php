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

         		echo '<table class="table table-hover table-striped table-bordered table-responsive">
							<thead class="bg-primary text-white">
								<th>Subject</th>
								<th>Term</th>
								<th>Test 1</th>
								<th>Test 2</th>
								<th>Test 3</th>
								<th>Total Score</th>
								<th>Percentage %</th>
								<th>Actions</th>
							</thead><tbody>';

         		while ($row = mysqli_fetch_array($query)) {

         			$sum = $row["score"] + $row["score_1"] + $row["score_2"];

         			$percent = $sum * 100/300;
         			
							echo '<tr>
								<td>'.$row["sub"].'</td>
								<td>'.$row["term"].'</td>
								<td>'.$row["score"].'</td>
								<td>'.$row["score_1"].'</td>
								<td>'.$row["score_2"].'</td>

								<td>'.$sum.'</td>';
								if ($percent < 50) {
									echo '<td class="bg-danger text-white">'.round($percent,2).'% (need to work hard)</td>';
								}else{
									echo '<td>'.round($percent,2).'%</td>';
								}
								echo '<td>
									
									<a href="#" class="badge badge-danger"><i class="mdi mdi-delete-forever"></i> Delete</a>
								</td>
									</tr>';
         		}

        echo '</tbody>
				</table>
				</div>
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
         		