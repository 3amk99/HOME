<?php
require_once "Article.php" ;
require_once "Categories.php" ;






$database = new Database() ;
$connection_2 = $database->connection();





$article = new Article($connection_2);






$categories = new Categories($connection_2);
?>