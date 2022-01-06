<div class="col-md-12 ">
	<div class="container-fluid">
		<div class="row">
			<div class="card col-md-7 offset-md-3">
	<div class="card-header">
		<h4><i class="mdi mdi-folder-account p-2"></i> My classes</h4>
	</div>
	<div class="card-body">

		 <input type="text" id="addPupilInput" class="form-control my-3" onkeyup="searchPupil()" placeholder="Search for Pupil's names.." title="Type in a name" style="border: 1px solid dodgerblue; border-radius: 2rem;">

                      <div class="table-responsive" style="height: 20rem;">
                        <table class="table table-bordered table-striped table-hover rounded" id="pupilTable">
                        <thead class="bg-primary text-white">
                         <tr>
                            <th>Pupil ID</th>
                          <th>Pupil Names</th>
                          <th>Class </th>
                          <th>Print Results / View Performance</th>
                         </tr>
                        </thead>


                        <tbody>

                          <?php
                          require "../../processing/db_config.php";

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
                                      
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewResultsModal"><i class="mdi mdi-chart-line btn-icon-append p-2"></i> View Performance</button>                
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
                      <script >
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
					</div>
				</div>
			</div>
		</div>
	</div>

 <!-- View results modal -->
   <!-- The Modal -->
  <div class="modal fade" id="viewResultsModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><i class="mdi mdi-chart-line btn-icon-append p-2"></i> Performance</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="card">
         	<div class="row">
         		<div class="col-md-3 mx-1 my-2 ">
         			<img src="../../images/faces/face1.jpg" class="shadow-sm" style="height: 10rem">
         		</div>
         		<div class="col-md-3 mx-1 my-2">Class : 10 N</div>
         		<div class="col-md-3 mx-1 my-2">Names : Mercy Nambeya</div>
         	</div>
         	<div class="card">
         		<div class="card-header">The subject scores</div>
         		<div class="card-body">
         		<div class="row">
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
				</div>  
         		</div>
         	</div>
         </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        	<button type="button" class="btn btn-success" ><i class="mdi mdi-printer btn-icon-append p-2"></i> Print</button>
          <button type="button" class="btn btn-danger text-white" data-dismiss="modal"><i class="mdi mdi-close-circle-outline btn-icon-append p-2"></i> Close</button>
        </div>
        
      </div>
    </div>
  </div>
  

    <!-- End of resulsts modal -->


 