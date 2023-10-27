<?php
$web_link = "http://localhost/attendance/";
if(!isset($_SESSION['user_id']))
{
	// header('HTTP/1.0 403 Forbidden');
	header('Location: index');
	exit;
}