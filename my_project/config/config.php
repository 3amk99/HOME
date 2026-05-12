<?php
require_once "../classes/User.php" ;
require_once "../classes/Box.php" ;
require_once "../classes/SchoolClass.php" ;
require_once "../classes/Student.php" ;
$data = (new Database())->connect() ;
$user = new User($data);
$box = new Box($data);
$schoolclass = new SchoolClass($data);
$student = new Student($data);
?>