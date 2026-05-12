<?php
require_once "../connection/Database.php";
class Attendance
{
    private $conn;

    public $student_id ;
    public $status ;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function save($student_id, $status)
    {
        $query = "
            INSERT INTO attendance
            (student_id, status, attendance_date)

            VALUES
            (:student_id, :status, CURDATE())
        ";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute
        ([
            ":student_id" => $student_id,
            ":status" => $status
        ]);
    }
}