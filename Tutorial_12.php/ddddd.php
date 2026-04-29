<?php
require_once "conf.php";

// ✅ make sure id exists
if (!isset($_GET['value_update'])) {
    die("ID not found");
}

// ✅ set article id
$article->id = $_GET['value_update'];

// ✅ (important) get current article data (you MUST have this method)
$data_dyal_article = $article->get_by_id($article->id);

if (isset($_POST['button_update'])) {

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];

    // ✅ upload photo
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {

        // safer filename
        $name = time() . "_" . $_FILES['photo']['name'];
        $temporary_name = $_FILES['photo']['tmp_name'];

        $upload = "upload/";
        $Normal_path = $upload . basename($name);

        move_uploaded_file($temporary_name, $Normal_path);

        $article->photo = $Normal_path;

    } else {
        // keep old photo
        $article->photo = $_POST['old_photo'];
    }

    // ✅ update in database
    $article->update();

    header("Location: show.php");
    exit;
}
?>

<form method="POST" enctype="multipart/form-data">

    <input type="hidden" name="old_photo" value="<?php echo $data_dyal_article['photo']; ?>"><br>

    <input type="text" name="title" 
        value="<?php echo $data_dyal_article['title']; ?>"><br>

    <textarea name="content" cols="40" rows="5"><?php echo $data_dyal_article['content']; ?></textarea><br>

    <img src="<?php echo $data_dyal_article['photo']; ?>" width="100"><br>

    <input type="file" name="photo"><br>

    <button type="submit" name="button_update">
        update
    </button>

</form>







