<?php

require('../config.php');

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}

$data = $_club->club_details_profile(Session::get('username'));
$clubID = $data['club_id'];


if(Input::get('submit')){

  // memanggil object validasi
  $validation = new Validation;

  $validation = $validation->check(array(
    'eventID' => array(
                  'required'  => true,
                  'min'       => 3,
                  'max'       =>50,
                ),
    'eventName' => array(
                  'required'  => true,
                  'min'       => 3,
                )
  ));


  if($_event->cek_event(Input::get('eventID'))){
      echo "<script>alert('ID already Used!')</script>";
  }else{
        if($validation->passed()){

          $name = $_FILES['image']['name'];
          $asal = $_FILES['image']['tmp_name'];

          move_uploaded_file($asal,$_SERVER['DOCUMENT_ROOT'].'/assets/img/event/'.$name);

          $_event->post_event(array(
            'eventID' => Input::get('eventID'),
            'eventName' => Input::get('eventName'),
            'eventDesc' => Input::get('eventDesc'),
            'clubID' => $clubID,
            'point' => Input::get('point'),
            'imagePath' => $name
          ));

          $count = Input::get('quantity');

          while($count > 0){
            $_event->create_ticket(array(
              'ticketID' => Input::get('eventID').$count,
              'eventID'  => Input::get('eventID'),
              'price'    => Input::get('price')
            ));
            $count--;
          }

          Redirect::to('club_event');
        }else {
          $errors = $validation->errors();
        }
    }
}


require_once "../templates/header_club.php";
 ?>


<!-- start content  -->
 <div class="row">
   <div class="col-lg-12">
     <h2 style="text-align:center">Event Form</h2>
     <form action="add_event.php" method="post" enctype="multipart/form-data">
       <div class="col-lg-6 fontLora col-md-offset-3">
         <div class="form-group">
           <label>Event ID</label>
           <input class="form-control" placeholder="Event ID" name="eventID">
         </div>

         <div class="form-group">
           <label>Event Name</label>
           <input class="form-control" placeholder="Event Name" name="eventName">
         </div>

         <div class="form-group">
           <label>Ticket Quantity</label>
           <input class="form-control" placeholder="Quantity" name="quantity">
         </div>

         <div class="form-group">
           <label>Price</label>
           <input class="form-control" placeholder="Price" name="price">
         </div>

         <div class="form-group">
           <label>Point</label>
           <input class="form-control" placeholder="Point" name="point">
         </div>

         <div class="form-group">
           <label>Poster</label>
           <input type="file" class="form-control"  name="image">
         </div>

         <div class="control-group form-group">
            <div class="controls">
              <label>Description</label>
              <textarea rows="10" cols="100" class="form-control" name="description"  maxlength="999" style="resize:none"></textarea>
            </div>
         </div>

         <div class="form-group">
           <input type="submit" name="submit" value="Post" class="btn btn-default">
           <input type="reset" name="cancel" value="Cancel" class="btn btn-default">
         </div>


       </div>
     </form>
   </div>
 </div>
 <!-- end content -->


 <?php
require_once "../templates/footer_club.php";
  ?>
