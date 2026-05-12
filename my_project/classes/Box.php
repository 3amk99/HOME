<?php
require_once "../connection/Database.php";
class Box 
{
    private $conn;
    private $table = "boxes";
    public $name ;

    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function create($name) 
    {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name) VALUES (:name)");
        return $stmt->execute([":name" => $name]);
    }

    public function getAll() 
    {
        $stmt = $this->conn->prepare("SELECT * FROM boxes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}