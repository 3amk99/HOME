<?php
require_once "../config/config.php";

if($_POST)
{
    $attendance->save($_POST['student_id'] , $_POST['status']);
}
?>