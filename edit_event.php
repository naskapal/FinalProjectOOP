<?php

require_once "../core/init_inside.php";

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}

$id = $_GET['eventID'];
$user_data = $_club->club_details_profile(Session::get('username'));
$event_data = $_event->event_details($id);
$errors = array();

if(Input::get('submit')){

  $validation = new Validation;

  $validation = $validation->check(array(
    'event_name'    => array(
                  'required'  => true,
                  'min'       => 3,
                ),
    'event_desc' => array(
                  'required'  => true,
                  'min'       => 3,
                )
  ));

  if($validation->passed()){

    if($name = $_FILES['image']['name'] == null){
        $name = $event_data['imagePath'];
    }else {
      $name = $_FILES['image']['name'];
      $asal = $_FILES['image']['tmp_name'];
    }
    move_uploaded_file($asal,'../assets/img/event/'.$name);

      $_event->update_event(array(
        'eventName' => Input::get('event_name'),
        'point' => Input::get('point'),
        'eventDesc' => Input::get('event_desc'),
        'imagePath' => $name
      ),$id);

      Redirect::to('club_event');

  }//end valodation
  else {
    $errors = $validation->errors();
  }
}//end submit

require_once "../templates/header_club.php";
 ?>

<div class="row">
  <div class="col-lg-12">
    <h2 style="text-align:center">Edit Event</h2>
    <form action="<?php echo 'edit_event.php?eventID='.$event_data['eventID']; ?>" method="post" enctype="multipart/form-data">
      <div class="col-lg-6 fontLora col-md-offset-3">

        <div class="form-group">
          <label>Event Name</label>
          <input class="form-control"  name="event_name" type="text" value="<?php echo $event_data['eventName'] ?>">
        </div>

        <div class="form-group">
          <label>Point</label>
          <input class="form-control"  name="point" type="text" value="<?php echo $event_data['point'] ?>">
        </div>

        <div class="form-group">
          <label>Event Description</label>
          <input class="form-control" name="event_desc" type="text" value="<?php echo $event_data['eventDesc'] ?>">
        </div>

        <div class="form-group">
          <label>Photo</label>
          <input type="file" class="form-control"  name="image">
        </div>

        <div class="form-group">
          <input type="submit" name="submit" value="Edit Profile" class="btn btn-default">
        </div>




      </div>
    </form>
  </div>
</div>

 <?php
require_once "../templates/footer_student.php";
  ?>
