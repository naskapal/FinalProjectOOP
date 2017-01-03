<?php

require_once $_SERVER['DOCUMENT_ROOT']."/core/init_inside.php";

if(!$_student->is_LoggedIn()){
    header('location: ../login.php');
}
$user_data = $_student->get_data(session::get('username'));
$nominal = $_admin->get_nominal(Input::get('voucher'));


// die($nominal);

$errors = array();

if(Input::get('submit')){

  $validation = new Validation;

  $validation = $validation->check(array(
    'voucher' => array(
                  'required'  => true
                )
  ));


  if($validation->passed()){

    if($_admin->cek_voucher(Input::get('voucher'))){
      $_admin->insert_top_up(array(
        'topupID'       => null,
        'nim'           => $user_data['nim'],
        'wallet_code'   => Input::get('voucher'),
        'nominal'       => $nominal
      ));

      $_student->update_student(array(
        'walletBalance' => $user_data['walletBalance'] + $nominal
      ),$user_data['nim']);

      $_admin->delete_code(Input::get('voucher'));

      Redirect::to('profile');

    }else{
      echo "<script>alert('Wrong Code!')</script>";
    }

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
    <h2 style="text-align:center">Top Up</h2>
    <form action="top_up.php" method="post">
      <div class="col-lg-6 fontLora col-md-offset-3">

        <div class="form-group">
          <label>Top Up</label>
          <input class="form-control" placeholder="Input Voucher Code Here" name="voucher" type="text">
        </div>


        <div class="form-group">
          <input type="submit" name="submit" value="Top Up" class="btn btn-default">
        </div>


      </div>
    </form>
  </div>
</div>

 <?php
require_once "../templates/footer_student.php";
  ?>
