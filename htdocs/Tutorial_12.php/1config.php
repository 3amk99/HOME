<?php
require "1database.php";
$database = (new database())->connexion() ;
$article = new article($database);
$category = new category($database);
?>