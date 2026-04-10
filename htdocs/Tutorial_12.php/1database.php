<?php
class Data
{
    private $host = "localhost" ;
    private $root = "root" ;
    private $password = "baba123" ;
    private $databasename = "ph12" ;

    public $conn ;
    public function connexion()
    {
        $this->conn = NULL ;
        try
        {
            $this->conn = new PDO (
                                    "mysql:host=" .$this->host.
                                    ";dbname" .$this->databasename.
                                    ";charset=utf8" ,
                                    $this->password ,
                                    $this->databasename
                                  );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e)
        {
            echo "error:" . $e->getMessage() ;
        }
    }
}
?>