<?php

// session_start();

// load class
spl_autoload_register(function($class){
  require_once './classes/'.$class.'.php';
});

$_db = new Database();
$student = new Student();
$_club = new Club();
 ?>
