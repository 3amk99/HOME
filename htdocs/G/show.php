<?php
session_start();
include "db.php";
$sql = "SELECT * FROM users ORDER BY id DESC ";
$result = $conn->query($sql);

if (isset($_POST['delete_button']))
{
  $id = (int)$_POST['id'];
  $sql = "DELETE FROM users WHERE id = $id";
  if($conn->query($sql) === true)
  {
     header("Location: show.php");
     exit ;
  }
  else
  {
      echo "Error: " . $conn->error ;
  }
}

if(isset($_POST['delete_button_group_users']))
{
 $id = (int)$_POST['groupe_users_id'] ;
 $sql = "delete from Group_users where id = $id ";
 if($conn->query($sql))
 {
   SESSION_DESTROY() ;
   header("Location: show.php");
   exit;
 }
 else
 {
    echo "Error: " . $conn->error ;
 }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Show User</title>
</head>
<body style="background : gray ;" >

<?php
    if(isset($_SESSION['groupe_id']))
    {
        $groupe_id = $_SESSION['groupe_id'] ;
        $sql = "select name_group from Group_users where id = $groupe_id " ;
        $name_groupe = $conn->query($sql);
        if(!($name_groupe))
        {
            echo "Error: " . $conn->error ;
        }
        $name_groupe_holder = $name_groupe->fetch_assoc();
        if($name_groupe_holder !== NULL)
        {
            $name_groupe_holder_final = $name_groupe_holder['name_group'];
            echo "<h2>" . "$name_groupe_holder_final" . "</h2>" ;
        }
        
        echo "<form method = 'POST'>
                <input type = 'hidden' name = 'groupe_users_id' value = '" . $groupe_id . "'>
                <button type = 'submit' name = 'delete_button_group_users' >
                    Delete Groupe
                </button>
              </form>";
    }
  
while ($user = $result->fetch_assoc())
{
    echo "<h3>" . $user['name'] . "</h3>";
    echo "<img src='uploads/" . $user['photo'] . "' width='100'><br>";


        echo "
        <form method='POST'>
            <input type='hidden' name='id' value='" . $user['id'] . "'>

            <button type='submit' name='delete_button'>
                Delete
            </button>
        </form>
    <hr>";
}
?>

<br><br>
<a href="login.php">Back</a>

</body>
</html>