<?php
require_once "config.php" ;
if(isset($_GET['value_update']))
{
 $data_dyal_article = $article->get_by_id($_GET['value_update']) ;
}
?>
<?php
 if(isset($_POST['button_update']))
 {
    $article->id = $_POST['id'] ;
    $article->title = $_POST['title'] ;
    $article->content = $_POST['content'] ;
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === 0)
    {
     $name = time() ."_". preg_replace("/[^a-zA-Z0-9.]/" , "_",$_FILES['photo']['name']) ;
     $tmp_name = $_FILES['photo']['tmp_name'];
     $upload = "upload/";
     $normal = $upload . basename($name);
     move_uploaded_file($tmp_name , $normal  );
     $article->photo = $normal ;
    }
    else
    {
        $article->photo = $_POST['old_photo'] ;
    }
    $article->update();
   header("Location: show.php" );
 }
?>

<form method="POST" enctype="multipart/form-data">
 <input type="hidden" name="id" value="<?php echo $data_dyal_article['id'] ; ?>" ><br>
 <input type="hidden" name="old_photo" value="<?php echo $data_dyal_article['photo'] ; ?>"><br>
 <input type="text" name="title" value="<?php echo $data_dyal_article['title'] ; ?>"><br>
 <textarea name="content" col="40" rows="5"><?php echo  $data_dyal_article['content'] ; ?></textarea><br>
 <img src="<?php echo $data_dyal_article['photo'] ; ?>" width="100"><br>
 <input type="file" name="photo"><br>
 <button type="submit" name="button_update">
   update
 </button>
</form>