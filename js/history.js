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

$("#search").click(function(event) {
	event.preventDefault();
	let course = $("#course").select2("val");
	let date = $("#date").val();
	getHistory(course, date);
});

function getHistory(course, date){
	$.ajax({
		url: 'backend/api/history?getHistory='+course+'&date='+date,
		type: 'GET',
		dataType: 'json'
	})
	.done(function(res){
		if(res.status == 200){
			showHistory(res.data);
		}
		else{
			$("#proData").html('<tr><td colspan="3" align="center"><h4 class="text-danger">No Attendance Record Found</h4></td></tr>')
		}
	})
	.fail(function() {
		console.log("error");
	});
	
}


function showHistory(data){
	let sum = data.summary;
	let details = data.details;
	let div = $("#proData");

	$(".summary").html(`
		<p>Total Number of Students: `+sum.total+`</p>
		<p>Students Present: `+sum.present+`</p>
		<p>Students Absent: `+sum.absent+`</p>
	`);

	div.html("");

	details.forEach((item, index) =>{
		if(item.attendance == "present"){
			color = "text-success"
		}
		else{
			color = "text-danger"
		}
		div.append(`
			<tr>
				<td>`+item.matric+`</td>
				<td>`+item.name+`</td>
				<td><span class="`+color+`">`+item.attendance+`</span></td>
			</tr>
		`);
	})
}