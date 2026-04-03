<?php
require_once "article.php" ;
require_once "category.php" ;

$database = new database() ;
$connexion = $database->connexion();

$article = new article($connexion) ;
$category = new category($connexion);
?>