<?php

require_once '../database.php';

$db = new Database();

if(isset($_GET['getHistory']) AND $_GET['getHistory'] != "")
{
	$course = $_GET['getHistory'];
	$date = $_GET['date'];
	$present = 0;
	$absent = 0;

	$joins = [
    	['type' => 'INNER', 'table' => 'Students', 'on' => 'Attendance.student_id = Students.id'],
	];

	$whereClauses = [
	    ['field' => 'course_id', 'operator' => '=', 'value' => $course],
	    ['field' => 'date_created', 'operator' => '=', 'value' => $date]
	 ];

	$history = $db->selectWhereJoin("Attendance", ["Attendance.attendance","Students.name", "Students.matric"], $joins, $whereClauses);

	if(!empty($history))
	{
		foreach ($history as $key)
		{
			
			if($key["attendance"] == "present")
			{
				$present++;
			}
			else
			{
				$absent++;
			}
		}
		$attendance = ['total' => count($history), 'present' => $present, 'absent' => $absent];
		$data = ["summary" => $attendance, "details" => $history];
		echo json_encode(["status" => 200, "data" => $data]);
		exit;
	}
	else
	{
		echo json_encode(["status" => 500]);
		exit;
	}
}