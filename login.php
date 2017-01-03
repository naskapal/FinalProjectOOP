<?php
  require_once "core/init.php";

  $errors = array();

  if(Input::get('submit')){

    // memanggil object validasi
    $validation = new Validation;

    $validation = $validation->check(array(
      'username' => array(
                    'required'  => true,
                    'min'       => 3,
                    'max'       =>50,
                  ),
      'password' => array(
                    'required'  => true,
                    'min'       => 3,
                  )
    ));

    if($validation->passed()){
      if($student->cek_name(Input::get('username'))){
        if($student->login_student(Input::get('username'), Input::get('password')))
        {
          session::set('username', Input::get('username'));
          Redirect::to('student/student_page');

        }else{
          echo "<script>alert('Login Failed');</script>";
        }
      }elseif ($_club->cek_name(Input::get('username'))) {
        if($_club->login_club(Input::get('username'), Input::get('password')))
        {
          session::set('username', Input::get('username'));
          Redirect::to('club/club_page');

        }else{
          echo "<script>alert('Login Failed');</script>";
        }
      }
        else{
          echo "<script>alert('Username not registered');</script>";
        }

    }else {
      $errors = $validation->errors();
    }
  }


  require_once "templates/header.php";
 ?>


<div class="row">
  <div class="col-lg-12">
    <h2 style="text-align:center">Login</h2>
    <form action="login.php" method="post">
      <div class="col-lg-4 fontLora col-md-offset-4">
        <div class="form-group">

        <div class="form-group">
          <label>Username</label>
          <input class="form-control" placeholder="Username" name="username">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input class="form-control" placeholder="Password" name="password" type="password">
        </div>


        <div class="form-group">
          <input type="submit" name="submit" value="Login" class="btn btn-default">
          <input type="reset" name="cancel" value="Cancel" class="btn btn-default">
        </div>


      </div>
    </form>
  </div>
</div>



 <?php
 require_once "templates/footer.php";
  ?>
