<?php
session_start() ;
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article</title>
    <link rel="stylesheet" href="single.css">
</head>
<body>

<div class="container">

<?php
require_once "config.php";

if(!isset($_GET['id']))
{
    die("No article selected");
}
$id = $_GET['id'] ;
$data = $article->get_by_id($id);
if(!isset($_SESSION['viewed_'.$id])) //[] it just verify if the the session is true or not !
{
    // $article->addView($id) ;
    $article->addViewWithIP($id);
    $_SESSION['viewed_'.$id] = true;
}


if(!$data)
{
    die("Article not found");
}
?>


<h1><?= $data['title'] ?></h1>

<p><?= $data['content'] ?></p>

<p><small><?= $data['date'] ?></small></p>

<?php if(!empty($data['photo'])): ?>
    <img src="<?= $data['photo'] ?>" width="300">
<?php endif; ?>


<div class="actions">

    <button>
        <a href="delete.php?value=<?= $data['id'] ?>">delete</a>
    </button>

    <button>
        <a href="update.php?value_update=<?= $data['id'] ?>">update</a>
    </button>

</div>

<hr>

<h3>Likes</h3>

<button>
    <a href="Like_Page.php?article_id=<?= $data['id'] ?>">👍 Like</a>
</button>

<h3>Comments</h3>

<form method="POST">
    <textarea name="comment" placeholder="Write a comment..."></textarea>
    <button type="submit">send</button>
</form>

</div>

</body>
</html>