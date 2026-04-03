<?php
 require_once "config.php" ;
 if(isset($_POST['send_category_name']))
 {
    $category->name = $_POST['name_category'];
    $category->create();
 }
 if(isset($_POST['send_button']))
 {
    $article->title = $_POST['title_txt'] ;
    $article->contenet = $_POST['contenet_text'] ;
    $article->date = date("y-m-d H:i:s");
    $article->id_categories = $_POST['id_categor'];
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === 0)
    {
        $photo_name = time() . "_" . preg_replace("/[^a-zA-Z0-9]/", "_" ,$_FILES['photo']['name'] ) ;
        $temporary_name_photo = $_FILES['photo']['temp_photo'];
        $upload = "upload/";
        $normal_path = $upload . basename($photo_name);
        move_uploaded_file($temporary_name_photo ,$normal_path );
        $article->photo = $normal_path ;
    }
    else
    {
        $article->photo = NULL ;
    }
    $article->create() ;
 }
?>

    <form method="POST">
     <input type="text" name="name_category">
     <button name="send_category_name">
        Send
     </button>
    </form>





    <form method="POST" enctype="multipart/form-data">
     title:
     <input type="text" name="title_txt">
     content:
     <textarea col ="5" rows="40" name="contenet_text"></textarea>
     photo:
     <input type="file" name="photo">
     <select name="id_category">
       <?php
        $lista = $category->read();
        foreach($lista as $u)
        {
            echo "<option value='" . $u['id'] . "'> " . $u['name'] . " </option>";
        }
       ?>
     </select>
     <button name="send_button">
        send
     </button>
    </form>
