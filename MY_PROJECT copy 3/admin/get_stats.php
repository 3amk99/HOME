<?php
require_once "config/config.php";

$student_id = $_GET['student_id'];
$type = $_GET['type'];

if ($type == "day")
{
        $stmt = $data->prepare("
        SELECT
            attendance_hour as hour,
            status
        FROM attendance
        WHERE student_id = ?
        AND attendance_hour BETWEEN 8 AND 18
        ORDER BY attendance_hour
    ");

    $stmt->execute([$student_id]);

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $result = [];

    foreach ($rows as $row)
    {

        $present = 0 ;
        $absent = 0 ;

        if ($row['status'] == "present")
        {
            $present = 1 ;
        }
        else
        {
            $absent = 1 ;
        }

        $result[] =
        [
            "hour" => $row['hour'] ,
            "present" => $present ,
            "absent" => $absent
        ];
    }

    echo json_encode($result);

    exit;
}


if ($type == "week") {

    $stmt = $data->prepare("
        SELECT 
            WEEK(created_at) as week,
            COUNT(*) as absent
        FROM attendance
        WHERE student_id = ?
        AND status = 'absent'
        GROUP BY week
        ORDER BY week
    ");

    $stmt->execute([$student_id]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $result = [];

    foreach ($rows as $row) {
        $w = $row['week'];

        if (!isset($result[$w])) {
            $result[$w] = ["week"=>$w, "present"=>0, "absent"=>0];
        }

        $result[$w][$row['status']] = (int)$row['total'];
    }

    echo json_encode(array_values($result));
    exit;
}


if ($type == "month") {

    $stmt = $data->prepare("
        SELECT 
            MONTH(created_at) as month,
            status,
            COUNT(*) as total
        FROM attendance
        WHERE student_id = ?
        GROUP BY month, status
        ORDER BY month
    ");

    $stmt->execute([$student_id]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $result = [];

    foreach ($rows as $row) {
        $m = $row['month'];

        if (!isset($result[$m])) {
            $result[$m] = ["month"=>$m, "present"=>0, "absent"=>0];
        }

        $result[$m][$row['status']] = (int)$row['total'];
    }

    echo json_encode(array_values($result));
    exit;
}