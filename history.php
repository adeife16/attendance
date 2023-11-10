<?php 
	$title = "History";
	require_once 'header.php';
?>
<div class="row">
  <div class="col-md-12">
    <h1>Attendance History</h1>
  </div>
</div>
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <form class="form">
                      <div class="form-group">
                        <span>Course:  </span>
                        <select class="" id="course" name="course">
                        </select>
                      </div>
                      <div class="form-group">
                      	<span>Date</span>
                      	<input type="date" id="date" name="" class="form-control">
                      </div>
                      <div class="form-group ml-2">
                        <button class="btn btn-success" id="search">Search</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<div class="row">
	<div class="col-md-8">
		<h5>Attendance Summary</h5>
		<div class="summary">
			
		</div>
	</div>
	<div class="col-md-12">
		<table class="table table-striped">
			<tr>
				<th>Matric No.</th>
				<th>Full Name</th>
				<th>Status</th>
			</tr>
			<tbody id="proData">
				<tr><td colspan="3" align="center"><h4 class="text-danger">No Attendance Record Found</h4></td></tr>
			</tbody>
		</table>
	</div>
</div>


<?php 
	require_once 'footer.php';
?>