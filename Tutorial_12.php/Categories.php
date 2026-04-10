<?php
require_once "Database.php";
class Categories
{
    private $conn ;
    private $table = "categories" ;

    public $id ;



    public $name ;

    public function __construct($db)
    {
        $this->conn = $db ;
    }

    public function create()
    {
        $sql = "insert into {$this->table} (name) values (:name)" ;
        $stmt =  $this->conn->prepare($sql) ;
        return $stmt->execute([ 'name' => $this->name ]);
    }


    public function read()
    {
        $sql = "select * from {$this->table}";
        $box = $this->conn->query($sql);
        return $box->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete()
    {
        $sql = "delete from {$this->table} where id = :id";
        $box = $this->conn->prepare($sql);
        return $box->execute(['id' => $this->id]);
    }
}
?>