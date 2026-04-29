<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['id_user']))
{
    die("You must login first");
}

if (isset($_GET['article_id']))
{
    $login_id = $_SESSION['id_user'];
    $article_id = $_GET['article_id'];

    $like->Add_like($login_id, $article_id);
}

// go back to article
header("Location: SINGLE-ARTICLE.php?id=" . $article_id);
exit;