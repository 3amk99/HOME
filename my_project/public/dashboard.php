<?php
session_start();

if (!isset($_SESSION['user_id'])) 
{
    header("Location: login.php");
    exit;
}

echo "Welcome " . $_SESSION['username'] . "<br>";

if ($_SESSION['role'] === 'admin') 
{
    echo "You are ADMIN 👑<br>";
    echo "<a href='admin_panel.php'>Go to Admin Panel</a>";

    echo "
    <button>
     <a href='../admin/add_box.php'>add_box</a>
    </button>" ;

    echo "
    <button>
     <a href='../admin/add_class.php'>add_class</a>
    </button>" ;

    echo "
    <button>
     <a href='../admin/add_student.php'>add_student</a>
    </button>" ;

    echo "
    <button>
     <a href='../admin/student_space.php'>student_space</a>
    </button>" ;
} 
else 
{
    echo "You are USER 👤<br>";
}
?>
