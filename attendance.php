<?php 
	$title = "Attendance";
	require_once 'header.php';
?>
<div class="row">
  <div class="col-md-12">
    <h1>Take Attendance</h1>
  </div>
</div>
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
              <div class="card-body text-center">
                <div class="row justify-content-center">
                  <div class="col-md-12">
                    <form class="form form-inline">
                      <div class="form-group">
                        <span>Course:  </span>
                        <select class="" id="course" name="course">
                        </select>
                      </div>
                      <div class="form-group ml-2">
                        <button class="btn btn-success" id="generate">Generate</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <div class="card">
              <div class="row p-3">
                <table class=" table table-striped table">
                    <thead>
                  <tr>
                    <th>Matric. No.</th>
                    <th>Name</th>
                    <th>Attendance</th>
                  </tr>
                    </thead>
                    <tbody id="result">
                      
                    </tbody>
                </table>
              </div>
              <div class="row p-3 justify-content-end">
                <button class="btn btn-success float-right" id="submit" value="9"><i class="fas fa-save"></i>Submit</button>
              </div>
        </div>
      </div>
    </div>
<?php 
	require_once 'footer.php';
?>