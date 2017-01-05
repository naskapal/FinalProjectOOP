<?php

require('../config.php');

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}
$user_data = $_club->club_details_profile(Session::get('username'));
$errors = array();

if(Input::get('submit')){

  $validation = new Validation;

  $validation = $validation->check(array(
    'club_name'    => array(
                  'required'  => true,
                  'min'       => 3,
                ),
    'username' => array(
                  'required'  => true,
                  'min'       => 3,
                )
  ));

  if($validation->passed()){

    if($name = $_FILES['image']['name'] == null){
        $name = $user_data['imagepath'];
    }else {
      $name = $_FILES['image']['name'];
      $asal = $_FILES['image']['tmp_name'];
    }
    move_uploaded_file($asal,'../assets/img/club/'.$name);

      $_club->update_club(array(
        'club_name' => Input::get('club_name'),
        'username' => Input::get('username'),
        'club_desc' => Input::get('club_desc'),
        'imagepath' => $name
      ),$user_data['club_id']);

      Redirect::to('profile');

  }//end valodation
  else {
    $errors = $validation->errors();
  }
}//end submit

require_once $_SERVER['DOCUMENT_ROOT']."/templates/header_club.php";
 ?>

<div class="row">
  <div class="col-lg-12">
    <h2 style="text-align:center">Edit Profile</h2>
    <form action="edit_profile.php" method="post" enctype="multipart/form-data">
      <div class="col-lg-6 fontLora col-md-offset-3">

        <div class="form-group">
          <label>Club Name</label>
          <input class="form-control"  name="club_name" type="text" value="<?php echo $user_data['club_name'] ?>">
        </div>

        <div class="form-group">
          <label>Username</label>
          <input class="form-control"  name="username" type="text" value="<?php echo $user_data['username'] ?>">
        </div>

        <div class="form-group">
          <label>Club Description</label>
          <input class="form-control" name="club_desc" type="text" value="<?php echo $user_data['club_desc'] ?>">
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
require_once $_SERVER['DOCUMENT_ROOT']."/templates/footer_student.php";
  ?>
