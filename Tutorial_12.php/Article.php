<?php
require_once "Database.php";
class Article
{
    private $conn ;
    private $table = "Article" ;

    public $id ;
    public $title ;
    public $content ;
    public $photo ;
    public $date ;
    public $id_category  ;

    public function __construct($db) 
    {
        $this->conn = $db ;
    }

    public function create()
    {
        $sql = "insert into {$this->table} (
                                            title ,
                                            content ,
                                            date ,
                                            photo ,
                                            id_category
                                            )
                values 
                (
                 :title ,
                 :content , 
                 :date , 
                 :photo ,
                 :id_category
                )" ;
        $stmt =  $this->conn->prepare($sql) ;
        return $stmt->execute([
                                'title' => $this->title ,
                                'content' => $this->content ,
                                'date' => $this->date , 
                                'photo' => $this->photo ,
                                'id_category' => $this->id_category 
                              ]);
    }


    

    public function read()
    {
        $sql = "select * from {$this->table}";
        $box = $this->conn->query($sql);
        return $box->fetchAll(PDO::FETCH_ASSOC);
    }



    public function read_By_category($id_category)
    {
        $sql = "select * from {$this->table} where id_category = :id_category " ;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id_category' => $id_category]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function delete()
    {
        $sql = "delete from {$this->table} where id = :id";
        $box = $this->conn->prepare($sql);
        return $box->execute(['id' => $this->id]);
    }

    public function update()
    {
        $sql = "update {$this->table} set title = :title ,
                                          content = :content ,
                                          photo = :photo ,
                                          date = NOW() 
                                          where id = :id";
        $line = $this->conn->prepare($sql);
        return $line->execute([
                               "id" => $this->id ,
                               "title" => $this->title,
                               "content" => $this->content,
                               "photo" => $this->photo
                               ]);
    }
    
}
?>