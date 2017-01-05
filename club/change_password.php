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
    'password' => array(
                  'required'  => true,
                  'min'       => 3,
                ),
    'new_password' => array(
                  'required'  => true,
                  'min'       => 3,
                ),
    'password_verify' => array(
                  'required'  => true,
                  'match'       => 'new_password'
                )
  ));

  if($validation->passed()){

    if(password_verify(Input::get('password'),$user_data['password'])){

      $_club->update_club(array(
        'password' => password_hash(Input::get('new_password'),PASSWORD_DEFAULT)
      ),$user_data['club_id']);

      Redirect::to('profile');

    }else{
      echo "<script>alert('Wrong password!')</script>";
    }

  }//end valodation
  else {
    $errors = $validation->errors();
  }
}//end submit

require_once "../templates/header_club.php";
 ?>

<h2>Hai <?php echo $user_data['username'];?></h2>

<div class="row">
  <div class="col-lg-12">
    <h2 style="text-align:center">Change Password</h2>
    <form action="change_password.php" method="post">
      <div class="col-lg-6 fontLora col-md-offset-3">

        <div class="form-group">
          <label>Password</label>
          <input class="form-control" placeholder="Password" name="password" type="password">
        </div>

        <div class="form-group">
          <label>New Password</label>
          <input class="form-control" placeholder="Password" name="new_password" type="password">
        </div>

        <div class="form-group">
          <label>Re-Password</label>
          <input class="form-control" placeholder="Re-Password" name="password_verify" type="password">
        </div>


        <div class="form-group">
          <input type="submit" name="submit" value="Change Password" class="btn btn-default">
        </div>




      </div>
    </form>
  </div>
</div>

 <?php
require_once "../templates/footer_student.php";
  ?>
