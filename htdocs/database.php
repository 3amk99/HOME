<?php
 class Database
 {
    private $root = "root" ;
    private $name = "something" ;
    private $password = "baba123" ;
    private $host = "localhost" ;

    public $conn ;
    public function connexion()
    {
        $this->conn = NULL ;
        try
        {
            $this->conn = new PDO 
            (
                "mysql:host" . $this->host .
                ";dbname" . $this->name .
                ";charunset=utf8" ,
                $this->root ,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e)
        {
            echo "Error: " .$e->getMessage();
        }
        return $this->conn ;
    }
 }
?>