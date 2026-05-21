<?php

require_once "../config/config.php";

$student_id = $_POST['student_id'];
$status = $_POST['status'];

$attendance_hour = date("H");
$attendance_date = date("Y-m-d");

$attendance->get_Today_Attendance($student_id , $attendance_date , $attendance_hour , $status )
?>