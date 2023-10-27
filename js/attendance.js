$(document).ready(function() {
	$.ajax({
		url: 'backend/api/course?getall',
		type: 'GET',
		dataType: 'json',
		
	})
	.done(function(res){
		let data = res.data;
		$("#course").html('<option value="">Select Course</option>');
		for(let i in data){
			$("#course").append(`
				<option value="`+data[i].course_id+`">`+data[i].course_name+` (`+data[i].course_code+`)</option>	
			`);
		}
	    $('#course').select2();
	})
	.fail(function() {
		console.log("error");
	});
	
});

$("#generate").click(function(event) {
	event.preventDefault();
	getStudents($("#course").select2("val"));
});

function getStudents(id) {
	$.ajax({
		url: 'backend/api/attendance?getStudents='+id,
		type: 'GET',
		dataType: 'json',
	})
	.done(function(res){
		if(res.status == 200){
			showStudents(res.data);
		}
	})
	.fail(function() {
		console.log("error");
	});
	
}

function showStudents(data) {
	let tr = $("#result");
	tr.html("");
	$("#submit").val($("#course").select2("val"));

	for(let i in data){
		tr.append(`
			<tr>
				<td>
					`+data[i].matric+`
				</td>
				<td>
					`+data[i].name+`
				</td>
				<td>
 					<div class="form-check">
                        <input class="form-check-input" type="radio" name="`+data[i].id+`" id="present" value="present">
                        <label class="form-check-label" for="present">
                            Present
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="`+data[i].id+`" id="absent" value="absent">
                        <label class="form-check-label" for="absent">
                            Absent
                        </label>
                    </div>
				</td>
			</tr>
		`);
	}	
}

$("#submit").click(function(event) {
	event.preventDefault();
	let clas = $(this).val();
	var attendanceData = {}; // Object to store the collected data
	var allInputsChecked = true; // Flag to track if all radio inputs are checked


  // Loop through each table row within the tbody with id 'proData'
  $('#result tr').each(function() {
	    var studentId = $(this).find('input[type="radio"]:checked').attr("name"); // Get the checked radio value
	    var radioValue = $(this).find('input[type="radio"]:checked').val(); // Get the checked radio value

	    if (studentId && radioValue) {
	      // Add the data to the object
	      attendanceData[studentId] = {
	        userId: studentId,
	        value: radioValue
	      };
	    }
	    else {
	      // If any radio input is not checked, set the flag to false
	      allInputsChecked = false;
	    }
	});
	if(!allInputsChecked){
		toastr.error("Please take attendance for all students");
	}
	else{
		let data = {
			attendance: attendanceData,
			class: clas
		}
		console.log(data);
    	submit(data);
	}

});


function submit(data){
	// toastr.info("Please Wait");
	// $("#submit").attr('disabled', 'disabled');
	$.ajax({
		url: 'backend/api/attendance',
		type: 'POST',
		dataType: 'json',
		data: {newAttendance: data},
	})
	.done(function(res){
		if(res == 200){
			toastr.success("Attendance registered");
			setTimeout(function() {
				window.location.reload();
			}, 2000);
		}
		else if(res == 409){
			toastr.error("Attendance already taken today");
		}
	})
	.fail(function() {
		console.log("error");
	});
	
}