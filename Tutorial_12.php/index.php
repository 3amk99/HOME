<?php
require_once "config.php";


if(isset($_POST['create_category']))
{
    $categories->name = $_POST['cetegory_name'];
    $categories->create() ;
}

if(isset($_POST['button_send']))
{
   $article->title = $_POST['title'];
   $article->content = $_POST['content']; 
   $article->date = date("Y-m-d H:i:s");
   $article->id_category = $_POST['id_categories'];
   if(isset($_FILES['photo']) && $_FILES['photo']['error'] === 0 )
   {
        $photo_name = time() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $_FILES['photo']['name']) ;
        $temporary_name = $_FILES['photo']['tmp_name'] ;

        $upload = "upload/" ; 

        $Normal_path = $upload . basename($photo_name);
        
        move_uploaded_file( $temporary_name , $Normal_path);

        $article->photo = $Normal_path ;
   }
   else
   {
     $article->photo = NULL ;
   }
   $article->create();

}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   <form method="POST">
    <h1>add category</h1>
    <input type="text" name="cetegory_name">
    <button type="submit" name="create_category">
        Send 
    </button>
   </form>


    <form method="POST" enctype = "multipart/form-data">
        Title:
        <input type="text" name="title">
        Content:
        <textarea rows ="5" col ="40" name="content" name ="content" ></textarea>
        photo :
        <input type="file" name="photo">
        

        <select name="id_categories">
         <?php
          $list_categories = $categories->read() ;
          foreach($list_categories as $piece)
          {
           echo "<option value='".$piece['id']."'>".$piece['name']."</option>";
          }
         ?>
        </select>
        <button type="submit" name="button_send">
            send
        </button>
    </form>






    <button>
        <a href="show.php">show.php</a>
    </button>
</body>
</html>