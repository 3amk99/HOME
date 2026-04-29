<h2>Forgot Password</h2>
<form method="POST">
    <label>Enter your email:</label>
    <input type="text" name="reset_mail" required><br><br>

    <label>New Password:</label>
    <input type="password" name="new_password" required><br><br>

    <button type="submit" name="button_reset">Reset Password</button>
</form>


<?php
if (isset($_POST['button_reset']))
{
    $mail = $_POST["reset_mail"];
    $new_password = $_POST["new_password"];

    $user = $login->get_by_mail($mail);

    if (!$user)
    {
        echo "Email not found ❌";
        exit;
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $login->mail = $mail ;
    $login->password = $hashed_password ;
    $login->update();
    echo "Password updated ✅";
}
?>