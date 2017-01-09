<?php
  require_once "config.php";
  require MYFOLDER_PATH . '/swiftmailer-5.x/lib/swift_required.php';

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
      'email' => array(
                    'required'  => true,
                    'min'       => 3,
                  )
    ));

    if($validation->passed()){
      $row = $_db->get_info("student", "username", Input::get('username'));
      if ($row != null)
      {
        $strings = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    		$generatedCode = '';
    		$length = 12;
    		for ($i = 0; $i < ($length);  $i++)
    		{
    			$generatedCode .= $strings[rand(0, 35)];
    		}
        $newPass = array('password' => password_hash($generatedCode,PASSWORD_DEFAULT));
        $_db->update("student", $newPass , Input::get('username'), "username");
        $_mail->sendTest(Input::get('username'),$generatedCode,Input::get('email'));
      }
      else
      {
        echo "cannot find matched email and username";
      }
      }

      else {
      $errors = $validation->errors();
    }
  }


  require_once "templates/header.php";
 ?>


<div class="row">
  <div class="col-lg-12">
    <h2 style="text-align:center">Forgot Password</h2>
    <form action="forget_pass.php" method="post">
      <div class="col-lg-4 fontLora col-md-offset-4">
        <div class="form-group">

        <div class="form-group">
          <label>Username</label>
          <input class="form-control" placeholder="Username" name="username">
        </div>

        <div class="form-group">
          <label>Email</label>
          <input class="form-control" placeholder="Email" name="email" type="text">
        </div>


        <div class="form-group">
          <input type="submit" name="submit" value="Send" class="btn btn-default">
          <input type="reset" name="cancel" value="Cancel" class="btn btn-default">
        </div>


      </div>
    </form>
  </div>
</div>



 <?php
 require_once "templates/footer.php";
  ?>
