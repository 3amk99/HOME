<h2>Sign Up</h2>
<form method="POST">
    <label>Email:</label>
    <input type="text" name="signup_mail" required><br><br>

    <label>Password:</label>
    <input type="password" name="signup_password" required><br><br>

    <button type="submit" name="button_signup">Sign Up</button>
</form>
<?php
if (isset($_POST['button_signup']))
{
    $mail = $_POST["signup_mail"];
    $password = $_POST["signup_password"];

    $existing = $login->get_by_mail($mail);

    if ($existing)
    {
        echo "Email already exists ❌";
        exit;
    }


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $login->mail = $mail ;
    $login->password = $hashed_password ;
    $login->create();

    header("Location: login_page.php");
    exit;
}
?>