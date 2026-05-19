<?php
require_once "../connection/Database.php";
class Attendance
{
    private $conn;
    private $table = "attendance" ;

    public $student_id ;
    public $status ;
    public $today ;

    public function __construct($db)
    {
        $this->conn = $db;
    }



    public function save($student_id, $status ,$today )
    {
        $query = 
        "
        INSERT INTO attendance
        (
            student_id,
            status,
            attendance_date
        )

        VALUES
        (
            :student_id,
            :status,
            :attendance_date
        )
        ";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute
        ([
            ":student_id" => $student_id,
            ":status" => $status,
            ":attendance_date" => $today
        ]);
        echo "saved";
    }


    public function get_Today_Attendance($student_id)
    {
        $today = date("Y-m-d");

        $stmt = $this->conn->prepare("
            SELECT *
            FROM {$this->table}

            WHERE student_id = :student_id

            AND attendance_date = :today

            ORDER BY created_at ASC
        ");

        $stmt->execute([
            ":student_id" => $student_id,
            ":today" => $today
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

