<?php
require_once "Article.php" ;
require_once "Categories.php" ;
require_once "Login.php" ;
require_once "Like.php" ;

$database = new Database() ;
$connection_2 = $database->connection();


$article  =   new Article($connection_2);
$categories = new Categories($connection_2);
$login =      new Login($connection_2);
$like =       new Like($connection_2);
?>