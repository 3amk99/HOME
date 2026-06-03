<?php
require_once "../config/config.php" ;

// ✨ ADDED BY AI
$classes_result = $schoolclass->getAll();

// ✨ ADDED BY AI
if (isset($_POST['button_student']))
{
    $photo = $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], "../upload/".$photo);

    $student->create($_POST['name'], $photo, $_POST['schoolclass_id']);

    // ✨ ADDED BY AI
    echo "<p id='success-message'>Student added!</p>";
}
?>

<!-- ✨ ADDED BY AI -->
<link rel="stylesheet" href="../admin/CSS/add_student.css">

<div id="page">

<form method="POST" enctype="multipart/form-data" id="student-form">

    <input id="input-name" name="name" placeholder="Student name">

    <input id="input-photo" type="file" name="photo">

    <select id="select-class" name="schoolclass_id">

        <?php foreach ($classes_result as $b) { ?>

            <option value="<?php echo $b['id']; ?>">
                <?php echo $b['class_name']; ?>
            </option>

        <?php } ?>

    </select>

    <button id="btn-add" name="button_student">
        Add Student
    </button>

</form>

<a href="../public/dashboard.php" id="btn-return">
    Return
</a>

</div>