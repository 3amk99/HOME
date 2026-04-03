<?php
session_start();
include "db.php";
$flag = 0 ;
if(isset($_POST['create_group']))
{
  $group_name = $_POST['group_name'] ;
  $max_students = $_POST['max_number'] ;
  $sql = "insert into Group_users (name_group , max_number) values ('$group_name','$max_students')";

  if(!($conn->query($sql)))
  {
    echo "Error: " . $conn->error;
    echo "$flag";
  } 

}

        if (isset($_POST['send']) ) 
        {
            $groupe_id = $_POST['groupe_id'];
            $sql = "select count(*) as total_students from users where groupe_id = $groupe_id  ";

            $number_students = $conn->query($sql);
            if(!($number_students))
            {
                echo "Error: " . $conn->error;
            }
            $number_students_holder = $number_students->fetch_assoc();
            $numbers_student_result = $number_students_holder['total_students'];


            $sql = "select max_number from Group_users where id = $groupe_id";
            $max = $conn->query($sql) ;
            if(!($max))
            {
                echo "Error: " . $conn->error;
            }
            $max_holder = $max->fetch_assoc();
            $max_students_number = $max_holder['max_number'] ;
            

            if($numbers_student_result >= $max_students_number)
            {
                echo "the class is full";
            }
            else
            {
                
                $_SESSION['groupe_id'] = $groupe_id ;       

                $name = $_POST['name'];

                $photoName = $_FILES['photo']['name'];
                $tmpName   = $_FILES['photo']['tmp_name'];
                $uploadPath = "uploads/" . $photoName;

                move_uploaded_file($tmpName, $uploadPath);
                $sql = "INSERT INTO users (name, photo , groupe_id ) VALUES ('$name', '$photoName' , '$groupe_id')";

                if ($conn->query($sql) === TRUE) 
                {
                    header("Location: show.php");
                    exit;
                }
                else 
                {
                    echo "Error: " . $conn->error;
                    echo "$flag";
                }
            }
        }

if(isset($_POST['delete']))
{
    $sql = "TRUNCATE TABLE users;";
    if ($conn->query($sql) === TRUE) 
    {
        header("Location: login.php");
        exit;
    }
    else 
    {
        echo "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body style="background : gray ;">

<h2>Create groupe </h2>

<form method="POST">
    <input type="text" name="group_name" placeholder="Group name" required>
    <input type="number" name="max_number" placeholder="Max students number" required>
    <button type="submit" name="create_group">
        Create Group
    </button>
</form>

<h2>Enter your name and photo</h2>

<form method="POST" enctype="multipart/form-data">
    Name:<br>
    <input type="text" name="name" required><br><br>

    Photo:<br>
    <input type="file" name="photo" required><br><br>
    <select name="groupe_id">
        <?php
        include "db.php";
        $sql = "select * from Group_users";
        $reult = $conn->query($sql) ;

        while($row = $reult->fetch_assoc() )
        {
            echo "<option value='".$row['id']."'  > ".$row['name_group']." </option>" ;
        }
        ?>
    </select>
    <button type="submit" name="send">send</button>
</form>

<form method="POST">
   <button type="submit" name="delete">delete</button>
</form>


</body>
</html>