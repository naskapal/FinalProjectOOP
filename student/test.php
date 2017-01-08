<?php

require('../config.php');

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}

if(Session::exist('profile')){
  echo Session::flash('profile');
}

$user_data = $student->get_data(Session::get('username'));


require_once "../templates/header_student.php";
 ?>

<h2>Hai <?php echo $user_data['username'];?></h2>

<?php
$datuk = date("d_m_y");
$format = "d_m_y";
$date1  = DateTime::createFromFormat($format, "03_01_10");
$date2  = DateTime::createFromFormat($format, $datuk);

var_dump($date1);
var_dump($date2);
// echo $date2;

var_dump($date1 > $date2);

?>

 <?php
require_once "../templates/footer_student.php";
  ?>
