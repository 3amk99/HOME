<?php 
    session_start();
    require "config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<form method="POST">
    <label for="" id="">Email:</label>
    <input type="text" name="mail" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="button_login">Login</button>
</form>

</body>
</html>

<?php

if (isset($_POST['button_login']))
{
    $mail = $_POST["mail"];
    $password = $_POST["password"];

    $data_mail_psw = $login->get_by_mail($mail) ;

    if (!$data_mail_psw)
    {
        echo "Email not found ";
        exit;
    }

    if (!password_verify($password, $data_mail_psw["password"]))
    {
        echo "Wrong password ❌";
        exit;
    }
    
    $_SESSION["id_user"] = $data_mail_psw["id"] ;
    echo "Login successful ✅";
}
?>
    <button>
        <a href="sign.php">you do not have account ?</a>
    </button>

    <button>
        <a href="forgot_password.php">did you forget the password ?</a>
    </button>
