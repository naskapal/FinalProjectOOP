<?php
require('config.php');
  require_once MYFOLDER_PATH."/core/init.php";

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
                  ),
      'nim' => array(
                    'min'       => 8,
                    'max'       => 8
                              ),
      'password_verify' => array(
                    'match'       => 'password'
                  )
    ));


    if($student->cek_name(Input::get('username'))){
        echo "<script>alert('Username already Used!')</script>";
    }else{
          if($validation->passed()){

            $name = $_FILES['image']['name'];
            $asal = $_FILES['image']['tmp_name'];

            move_uploaded_file($asal,'assets/img/profile/'.$name);

            $student->register_student(array(
              'NIM' => Input::get('NIM'),
              'name' => Input::get('name'),
              'email' => Input::get('email'),
              'username' => Input::get('username'),
              'password' => password_hash(Input::get('password'),PASSWORD_DEFAULT),
              'address' => Input::get('address'),
              'phone' => Input::get('phone'),
              'walletBalance' => 0,
              'skkm_point' => 0,
              'studentPhoto' => $name
            ));

            Session::flash('profile', 'Welcome to SCEMS, you are succesfully registered');
            Session::set('username', Input::get('username'));
            Redirect::to('student/student_page');
          }else {
            $errors = $validation->errors();
          }
      }
  }


  require_once "templates/header.php";
 ?>


<div class="row">
  <div class="col-lg-12">
    <h2 style="text-align:center">Registration Form</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
      <div class="col-lg-6 fontLora col-md-offset-3">
        <div class="form-group">
          <label>NIM(Student ID)</label>
          <input class="form-control" placeholder="Student ID" name="NIM" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
        </div>

        <div class="form-group">
          <label>Full Name</label>
          <input class="form-control" placeholder="Full Name" name="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input class="form-control" placeholder="Email" name="email">
        </div>

        <div class="form-group">
          <label>Username</label>
          <input class="form-control" placeholder="Username" name="username" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input class="form-control" placeholder="Password" name="password" type="password" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
        </div>

        <div class="form-group">
          <label>Re-Password</label>
          <input class="form-control" placeholder="Re-Password" name="password_verify" type="password" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
        </div>

        <div class="form-group">
          <label>address</label>
          <input class="form-control" placeholder="Address" name="address" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
        </div>

        <div class="form-group">
          <label>Phone</label>
          <input class="form-control" placeholder="Username" name="phone" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
        </div>

        <div class="form-group">
          <label>Photo</label>
          <input type="file" class="form-control"  name="image">
        </div>


        <div class="form-group">
          <input type="submit" name="submit" value="Register" class="btn btn-default">
          <input type="reset" name="cancel" value="Cancel" class="btn btn-default">
        </div>

        <?php if(!empty($errors['username'])){?>
       <div id="errors">

           <li><?php echo $errors['username'];?></li>

       </div>
   <?php }?>


       <?php if(!empty($errors['nim'])){?>
      <div id="errors">

          <li><?php echo "<script>alert('nim must be 8 digit example E1200236')</script>";?></li>

      </div>
   <?php }?>

       <?php if(!empty($errors['password_verify'])){?>
       <div id="errors">

          <li><?php echo "<script>alert('password verify doestn match')</script>";?></li>

       </div>
       <?php }?>




      </div>
    </form>
  </div>
</div>



 <?php
 require_once "templates/footer.php";
  ?>
