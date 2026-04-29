<?php
require_once "Database.php" ;
class Login
{
    private $conn ;
    private $table = "login" ;

    public $id ;
    public $mail ;
    public $password ;

    public function __construct($db) 
    {
        $this->conn = $db ;
    }

    public function create()
    {
        $sql = "insert into {$this->table} (
                                            mail ,
                                            password 
                                            )
                values 
                (
                 :mail ,
                 :password 
                ) " ;
        $stmt =  $this->conn->prepare($sql) ;
        return $stmt->execute([
                                'mail' => $this->mail ,
                                'password' => $this->password 
                              ]);
    }


    

    public function read()
    {
        $sql = "select * from {$this->table}";
        $box = $this->conn->query($sql);
        return $box->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_by_mail($mail)
    {
        $sql = "select * from {$this->table} where mail = :mail ";
        $lign = $this->conn->prepare($sql);
        $lign->execute(["mail" => $mail]);
        return $lign->fetch(PDO::FETCH_ASSOC);
    }

    public function delete()
    {
        $sql = "delete from {$this->table} where id = :id";
        $box = $this->conn->prepare($sql);
        return $box->execute(['id' => $this->id]);
    }

    public function update()
    {
        $sql = "update {$this->table} set mail = :mail ,
                                          password = :password where id = :id";
        $line = $this->conn->prepare($sql);
        return $line->execute([
                               "id" => $this->id ,
                               "mail" => $this->mail,
                               "password" => $this->password
                               ]);
    }
}
?>