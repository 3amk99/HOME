<?php
require_once "../config/config.php" ;

if (isset($_POST['button_box']))
{
    $box->create($_POST['name']);
    echo "<p id='success-message'>Box added!</p>";
}
?>
<link rel="stylesheet" href="../admin/CSS/add_box.css">
<div id="container">
    <form method="POST" id="box-form">
        <h2 id="title">Add New Box</h2>
        <input id="box-name" name="name" placeholder="Enter box name" required>
        <button type="submit" name="button_box" id="add-button">Add Box</button>
    </form>

    <a href="../public/dashboard.php" id="return-link">Return to Dashboard</a>

</div>

</body>
</html>