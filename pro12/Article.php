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
    public $login_id_article  ;
    public $views  ;

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
                                            id_category ,
                                            login_id_article,
                                            views
                                            )
                values 
                (
                 :title ,
                 :content , 
                 :date , 
                 :photo ,
                 :id_category ,
                 :login_id_article ,
                 0
                )" ;
        $stmt =  $this->conn->prepare($sql) ;
        return $stmt->execute([
                                'title' => $this->title ,
                                'content' => $this->content ,
                                'date' => $this->date , 
                                'photo' => $this->photo ,
                                'id_category' => $this->id_category ,
                                'login_id_article' => $this->login_id_article
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



    public function delete($id ,$login_id_article )
    {
        $sql = "delete from {$this->table} where id = :id AND login_id_article = :login_id_article ";
        $box = $this->conn->prepare($sql);
        return $box->execute(['id' => $id ,
                              'login_id_article' => $login_id_article
                            ]);
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
    public function get_by_id($id)
    {
        $sql = "select * from {$this->table} where id = :id";
        $line = $this->conn->prepare($sql); 
        $line->execute(["id" => $id]);
        return $line->fetch(PDO::FETCH_ASSOC);
    }

    // public function addView($id)
    // {
    //     $stmt = $this->conn->prepare("UPDATE {$this->table} SET views = views + 1 WHERE id = :id");
    //     $stmt->execute(["id" => $id]);
    // }

    public function totalViews($login_id_article)
    {
        $stmt = $this->conn->prepare("SELECT SUM(views) FROM {$this->table} WHERE login_id_article = :login_id_article");
        $stmt->execute(["login_id_article" => $login_id_article]);
        return $stmt->fetchColumn();
    }


    public function addViewWithIP($article_id)
    {
            $ip = $_SERVER['REMOTE_ADDR'];

            // check if this IP already viewed this article
            $check = $this->conn->prepare("
                SELECT * FROM article_views 
                WHERE article_id = :article_id AND ip_address = :ip
                                          ");

            $check->execute([
                "article_id" => $article_id,
                "ip" => $ip
                            ]);

            // if NOT viewed before → add view
            if(!$check->fetch())
            {
                // insert into article_views
                $insert = $this->conn->prepare("
                    INSERT INTO article_views (article_id, ip_address)
                    VALUES (:article_id, :ip)
                                              ");

                $insert->execute([
                    "article_id" => $article_id,
                    "ip" => $ip
                                 ]);

                // increment views in Article table
                $update = $this->conn->prepare("
                    UPDATE {$this->table} 
                    SET views = views + 1 
                    WHERE id = :article_id
                                               ");

                $update->execute([
                    "article_id" => $article_id
                                 ]);
            }
        }
}
?>