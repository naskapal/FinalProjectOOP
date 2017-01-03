<?php

require_once $_SERVER['DOCUMENT_ROOT']."/core/init_inside.php";

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}
$user_data = $student->get_data(Session::get('username'));
$errors = array();

if(Input::get('submit')){

  $validation = new Validation;

  $validation = $validation->check(array(
    'name'    => array(
                  'required'  => true,
                  'min'       => 3,
                ),
    'address' => array(
                  'required'  => true,
                  'min'       => 3,
                ),
    'phone'   => array(
                  'required'  => true,
                  'min'       => 3
                )
  ));

  if($validation->passed()){

    if($name = $_FILES['image']['name'] == null){
        $name = $user_data['studentPhoto'];
    }else {
      $name = $_FILES['image']['name'];
      $asal = $_FILES['image']['tmp_name'];
    }
    move_uploaded_file($asal,'../assets/img/profile/'.$name);

      $student->update_student(array(
        'name' => Input::get('name'),
        'address' => Input::get('address'),
        'phone' => Input::get('phone'),
        'studentPhoto' => $name
      ),$user_data['nim']);

      Redirect::to('profile');

  }//end valodation
  else {
    $errors = $validation->errors();
  }
}//end submit

require_once "../templates/header_student.php";
 ?>

<h2>Hai <?php echo $user_data['username'];?></h2>

<div class="row">
  <div class="col-lg-12">
    <h2 style="text-align:center">Edit Profile</h2>
    <form action="edit_profile.php" method="post" enctype="multipart/form-data">
      <div class="col-lg-6 fontLora col-md-offset-3">

        <div class="form-group">
          <label>Full Name</label>
          <input class="form-control"  name="name" type="text" value="<?php echo $user_data['name'] ?>">
        </div>

        <div class="form-group">
          <label>Address</label>
          <input class="form-control"  name="address" type="text" value="<?php echo $user_data['address'] ?>">
        </div>

        <div class="form-group">
          <label>Phone Number</label>
          <input class="form-control" name="phone" type="text" value="<?php echo $user_data['phone'] ?>">
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
