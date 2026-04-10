<?php
class Database
{
  private $host = "localhost" ;
  private $database_name = "tutorial_12" ;
  private $root_name = "root";
  private $password = "baba123" ;

  public $conn ;

  public function connection()
  {
    $this->conn = NULL ;
    try
    {
        $this->conn = 
        new PDO("mysql:host=" . $this->host . 
                ";dbname=" . $this->database_name . 
                ";charset=utf8"  ,
                $this->root_name ,
                $this->password
               );
        $this->conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
        echo "Error: " . $e->getMessage() ; 
    }
    return $this->conn ;
  }
}
?>