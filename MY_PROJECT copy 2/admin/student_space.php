<?php

require_once "../config/config.php";

$boxes = $box->getAll();

if (isset($_GET['box_id']))
{
    $classes = $schoolclass->get_By_id_Box($_GET['box_id']);

    foreach ($classes as $class)
    {
        ?>
        <a href="?box_id=<?php echo $_GET['box_id']; ?>&class_id=<?php echo $class['id']; ?>">
            <button type="button">
                <?php echo $class['class_name']; ?>
            </button>
        </a>
        <?php
    }
}


if (isset($_GET['class_id']))
{
    $students = $student->getByClass($_GET['class_id']);

    foreach ($students as $s)
    {
        ?>

        <div class="student-bar">            
            <img
            src="../upload/<?php echo $s['photo']; ?>"
                width="80"
            >

            <h3>
                <?php echo $s['name']; ?>
            </h3>

            <p>
                Class:
                <?php echo $s['class_name']; ?>
            </p>

            <p>
                Box:
                <?php echo $s['box_name']; ?>
            </p>
            
            <button
                class="present-btn"
                onclick="saveAttendance(<?php echo $s['id']; ?>, 'present', this)"
            >
                Present
            </button>

            <button
                class="absent-btn"
                onclick="saveAttendance(<?php echo $s['id']; ?>, 'absent', this)"
            >
                Absent
            </button>


            <a href="student_stats.php?id=<?= $s['id'] ?>">
                <button>
                    Statistics
                </button>
            </a>
            
            </div>

        <?php
    }
}
?>

<a href="../public/dashboard.php">
    <button type="button">
        Return to main page 
    </button>
</a>
<form method="GET">

    <select name="box_id">

        <?php foreach ($boxes as $b) { ?>

            <option value="<?php echo $b['id']; ?>">
                  <?php echo $b['box_name']; ?>
            </option>

        <?php } ?>

    </select>

    <button type="submit">
        Select Box
    </button>

</form>
<script>

function saveAttendance(studentId, status, button)
{
        fetch("save_attendance.php",
        {

            method: "POST",

            headers:
            {
                "Content-Type": "application/x-www-form-urlencoded"
            },

            body:
                "student_id=" + studentId +
                "&status=" + status
        })

        .then(response => response.text())
        .then(data =>
        {

            let parent = button.parentElement;

            parent.style.background = "gray";

            if (status === "present")
            {
                parent.style.background = "green";
            }
            else
            {
                parent.style.background = "red";
            }
        });
}

</script>