<?php

session_start();

// load class
spl_autoload_register(function($class){
  require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProjectOOP/classes/'.$class.'.php';
});

$_db = new Database();
$_admin = new Admin();
$_student = new Student();
$_club = new Club();
$_event = new Event();
$_ticket = new Ticket();
$_mail = new Mail();
 ?>
