<?php
require_once "Database.php";
class Like
{
    private $conn ;
    private $table = "likes" ;

    public $id ;
    public $login_id ;
    public $article_id ;

    public function __construct($db)
    {
        $this->conn = $db ;
    }

    public function countLikes($article_id)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM {$this->table} WHERE article_id = :article_id");
        $stmt->execute(["article_id" => $article_id]);
        return $stmt->fetchColumn();
    }


    public function Add_like($login_id, $article_id)
    {
        $check = $this->conn->prepare("SELECT * FROM {$this->table} WHERE login_id = :login_id AND article_id = :article_id");
        $check->execute(["login_id" => $login_id,
                         "article_id" => $article_id 
                        ]);

        if (!$check->fetch())
        {
            $stmt = $this->conn->prepare("INSERT INTO {$this->table} 
                                         (
                                          login_id,
                                          article_id 
                                         ) 
                                          VALUES 
                                          (
                                           :login_id,
                                           :article_id
                                          )
                                        ");
            $stmt->execute(["login_id" => $login_id,
                            "article_id" => $article_id 
                           ]);
        }
    }
    

    public function totalLikes($login_id)
    {
        $stmt = $this->conn->prepare("
            SELECT COUNT(*) FROM {$this->table}
            JOIN article ON {$this->table}.article_id = article.id
            WHERE article.login_id_article = :login_id
        ");
        $stmt->execute(["login_id" => $login_id]);
        return $stmt->fetchColumn();
    }
}
?>