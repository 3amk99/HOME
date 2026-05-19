<?php
require_once "../config/config.php";

if ( isset($_POST['student_id']) && isset($_POST['status']) )
{
    $student_id = $_POST['student_id'];

    $status = $_POST['status'];

    $today = date("Y-m-d");

    $attendance->save($student_id , $status , $today );
    
    echo "saved";
}
?>











<?php

require_once "../config/config.php";

$student_id = $_POST['student_id'];
$status = $_POST['status'];

$current_hour = date("H");
$current_date = date("Y-m-d");



$stmt = $data->prepare("
    SELECT id
    FROM attendance
    WHERE student_id = ?
    AND attendance_date = ?
    AND attendance_hour = ?
");

$stmt->execute([
    $student_id,
    $current_date,
    $current_hour
]);

$attendance = $stmt->fetch();



if ($attendance)
{
    
    $stmt = $data->prepare("
        UPDATE attendance
        SET status = ?
        WHERE id = ?
    ");

    $stmt->execute([
        $status,
        $attendance['id']
    ]);
}
else
{
    
    $stmt = $data->prepare("
        INSERT INTO attendance
        (
            student_id,
            status,
            attendance_date,
            attendance_hour
        )

        VALUES
        (
            ?, ?, ?, ?
        )
    ");

    $stmt->execute([
        $student_id,
        $status,
        $current_date,
        $current_hour
    ]);
}

echo "success";