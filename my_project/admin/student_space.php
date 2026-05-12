<?php

require_once "..config/config.php";

$boxes = $box->getAll();

?>

<form method="GET">

    <select name="box_id">

        <?php foreach ($boxes as $b) { ?>

            <option value="<?php echo $b['id']; ?>">

                <?php echo $b['name']; ?>

            </option>

        <?php } ?>

    </select>

    <button>
        Select Box
    </button>

</form>

<?php

if (isset($_GET['box_id']))
{
    $classes = $schoolclass->get_By_id_Box($_GET['box_id']);

    foreach ($classes as $class)
    {
        ?>

        <a href="?box_id=<?php echo $_GET['box_id']; ?>&class_id=<?php echo $class['id']; ?>">
            <button type="button">
                <?php echo $class['name']; ?>
            </button>
        </a>

        <?php
    }
}
?>