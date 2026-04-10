<?php

class category
{
    private $conn ;
    private $table ;

    public $id ;
    public $name ;

    public function __construct($db)
    {
        $this->conn = $db ;
    }
    public function creat()
    {
        $sql = "insert into {$this->table} (name) values (:name)" ;
        $lign = $this->conn->prepare($sql) ;
        return $lign->execute(["name" => $this->name]) ;
    }
    public function past()
    {
     $sql = "select * from {$this->conn}" ;
     $lign = $this->conn->query($sql) ;
     return $lign->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete()
    {
        $sql = "select from {$this->table} where id = :id" ;
        $lign = $this->conn->prepare($sql);
        return $lign->execute(["id" => $this->id]);
    }
}
?>