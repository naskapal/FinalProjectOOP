<?php
require('../config.php');

if(!$_admin->is_LoggedIn()){
    header('location: index.php');
}

$dataEvent      = $_event->event_details(Input::get('eventID'));
$eventDate = $dataEvent['date'];
$currentDate = date("Y-m-d");
$format = "Y-m-d";
$date1  = DateTime::createFromFormat($format, $eventDate);
$date2  = DateTime::createFromFormat($format, $currentDate);



if (Input::get('eventID')!= null) {
  if($date1 > $date2){
    echo "<script> alert('Event Still Active'); location.href = 'admin-page.php?cek=event';
    </script>";
  }else{
  if($_admin->delete_event(Input::get('eventID')))
  {
    echo "<script> alert('Delete Success'); location.href = 'admin-page.php?cek=event';
    </script>";
  }
}
}

 ?>
