<?php

session_start();

// load class
spl_autoload_register(function($class){
  require_once $_SERVER['DOCUMENT_ROOT'].'/classes/'.$class.'.php';
});

$_db = new Database();
$_admin = new Admin();
$student = new Student();
$_club = new Club();
$_event = new Event();
$_ticket = new Ticket();
 ?>
