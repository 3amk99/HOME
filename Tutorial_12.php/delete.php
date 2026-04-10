<?php
require_once "config.php" ;
if(isset($_GET['value']))
{
 $article->id = $_GET['value'] ;
 $article->delete();
}
header("Location: show.php");
?>