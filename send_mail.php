<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "your-email@example.com"; // Put your email here
    $subject = "New Portfolio Message";
    $headers = "From: " . $email;

    if (mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Error: Message could not be sent.";
    }
} else {
    echo "Direct access not allowed.";
}
?>