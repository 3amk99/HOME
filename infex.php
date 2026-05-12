<?php
$message_status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "badrereste2003@gmail.com";

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message_status = "Invalid email!";
    } else {
        $subject = "New Message from Portfolio";
        $fullMessage = "From: $email\n\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $fullMessage, $headers)) {
            $message_status = "Message sent successfully!";
        } else {
            $message_status = "Error sending message.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Badreddine Hammam</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;}

body{
    font-family:Arial;
    background:#0b0b0b;
    color:#eee;
}

/* NAV */
nav{
    position:fixed;
    width:100%;
    padding:15px 40px;
    background:rgba(0,0,0,0.7);
    display:flex;
    justify-content:space-between;
}

nav h1{color:#00ffcc;}

/* HERO */
.hero{
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content:center;
    padding:40px;
}

.hero span{color:#00ffcc;}

.btn{
    margin-top:20px;
    padding:12px;
    background:#00ffcc;
    border:none;
    cursor:pointer;
}

/* SECTIONS */
section{
    padding:80px 40px;
}

h3{
    margin-bottom:20px;
    color:#00ffcc;
}

/* GRID */
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
}

.card{
    background:#151515;
    padding:20px;
    border-radius:10px;
}

/* CONTACT */
form{
    max-width:400px;
    display:flex;
    flex-direction:column;
    gap:10px;
}

input, textarea{
    padding:10px;
    background:#111;
    border:none;
    color:#fff;
}

.status{
    margin-top:10px;
    color:#00ffcc;
}
</style>
</head>

<body>

<nav>
    <h1>Badreddine</h1>
</nav>

<div class="hero">
    <h2>Hello, I'm <span>Badreddine Hammam</span></h2>
    <p>I build real systems with discipline.</p>
</div>

<section>
    <h3>Skills</h3>
    <div class="grid">
        <div class="card">C Programming</div>
        <div class="card">Linux</div>
        <div class="card">PHP & MySQL</div>
        <div class="card">JavaScript</div>
    </div>
</section>

<section>
    <h3>Projects</h3>
    <div class="grid">
        <div class="card">Blog System</div>
        <div class="card">Weather App</div>
        <div class="card">API Store</div>
        <div class="card">Online Library</div>
    </div>
</section>

<!-- CONTACT -->
<section>
    <h3>Contact Me</h3>

    <form method="POST">
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit" class="btn">Send</button>
    </form>

    <div class="status">
        <?php echo $message_status; ?>
    </div>
</section>

</body>
</html>