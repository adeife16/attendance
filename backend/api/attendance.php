<?php

require_once '../database.php';

$db = new Database();
$date = date('Y-m-d');

if(isset($_GET['getStudents']) AND $_GET['getStudents'] != "")
{
	$id = $_GET['getStudents'];

	$getCourseDetails = $db->fetchWhere("Courses", "course_id", $id, "department_id, level_id");

	if(!empty($getCourseDetails))
	{
		foreach ($getCourseDetails as $key)
		{
			$level = $key['level_id'];
			$department = $key['department_id'];
		}

		$whereClauses = [
		    ['field' => 'level', 'operator' => '=', 'value' => $level],
		    ['field' => 'department', 'operator' => '=', 'value' => $department]
		 ];

		$getStudents = $db->selectWhere("Students", ["id", "name", "matric"], $whereClauses);

		if(!empty($getStudents))
		{
			echo json_encode(["status" => 200, "data" => $getStudents]);
		}
		else
		{
			echo json_encode(["status" => 500]);
		}
	}
}

if(isset($_POST['newAttendance']) AND $_POST['newAttendance'] != "")
{	

	$data = $_POST['newAttendance'];
	$attendance = $data['attendance'];
	$class = $data['class'];

	// Check if register exists.
	$whereClauses = [
	    ['field' => 'course_id', 'operator' => '=', 'value' => $class],
	    ['field' => 'date_created', 'operator' => '=', 'value' => $date]
	];
	$check = $db->selectWhere("Attendance", ["*"], $whereClauses);

	if(!empty($check))
	{
		echo json_encode(409);
		exit;
	}		
	$presentStudents = [];
	$presentList = [];		

	foreach ($attendance as $key)
	{
		$insertData = [
			"student_id" => $key['userId'],
			"course_id" => $class,
			"attendance" => $key['value'],
			"date_created" => $date,
		];

		if($key['value'] == "present")
		{
			array_push($presentStudents, $key['userId']);
		}

		$insert = $db->insert("Attendance", $insertData);
	}
	if($insert)
	{
		echo json_encode(200);
	}
}
