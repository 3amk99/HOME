<?php
require_once "Article.php" ;
if(isset($_GET['value_update']))
{
 $article->id = $_GET['value_update'] ;
 $data_dyal_article = $article->update() ;
}
?>
<?php
 if(isset($_POST['button_update']))
 {
    $article->id = $_POST['id'] ;
    $article->title = $_POST['title'] ;
    $article->content = $_POST['content'] ;
    if(isset($_FILE['photo']) && $_FILE['photo']['photo'] === 0)
    {
     $name = time() ."_". preg_replace()
    }

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