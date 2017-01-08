<?php
require('../config.php');

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}

$id         = $_GET['eventID'];
$user_data  = $student->get_data(Session::get('username'));
$data       = $_event->event_details($id);
$ticket     = $_event->ticket_details($id);
$price      = $_event->get_price($id);
$eventDate = $data['date'];
$currentDate = date("Y-m-d");
$format = "Y-m-d";
$date1  = DateTime::createFromFormat($format, $eventDate);
$date2  = DateTime::createFromFormat($format, $currentDate);


if(Input::get('submit'))
{
  if($date1 < $date2){
    echo "<script>alert('Event is Inactive')</script>";
  }else{
        $nominal = $_event->get_price($id);
        if(empty($ticket['ticketID']))
        {
          echo "<script>alert('Ticket Sold Out')</script>";
        }
        else {
          if($student->cek_transaction($user_data['nim'],$data['eventID']))
          {
                echo "<script>alert('You already bought the ticket')</script>";
          }
          else{
            if($user_data['walletBalance'] >= $nominal )
            {
              $point = $_event->get_point($id);

              $student->update_student(array(
                'walletBalance' => $user_data['walletBalance'] - $nominal,
                'skkm_point' => $user_data['skkm_point'] + $point
              ),$user_data['nim']);

              $student->transaction(array(
                'ticketID'  => $ticket['ticketID'],
                'transDate' => date("y,m,d"),
                'nim'       => $user_data['nim'],
                'eventID'   => $data['eventID']
              ));

                $_admin->delete_ticket($ticket['ticketID']);
                echo "<script>alert('Ticket purchase successful'); location.href = 'profile.php';</script>"; //php redirect
                // echo "<script>
                // if(alert('Ticket purchase successful').closed)
                // {
                //   Redirect::to('profile');
                // }
                // </script>";
            }else {
              echo "<script>alert('Your Wallet is not enough')</script>";
            }//end cek balance
          }//end cek already buy
        }//end sold out
      }//end date checker
}

require_once "../templates/header_student.php";
 ?>

<!-- content -->

<!-- Page Content -->
   <div class="container">

       <!-- Page Heading/Breadcrumbs -->
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header"><?php echo $data['eventName'];?>
               </h1>
               <ol class="breadcrumb">
                   <li><a href="index.html">Home</a>
                   </li>
                   <li class="active">Event Details</li>
               </ol>
           </div>
       </div>
       <!-- /.row -->

       <!-- Portfolio Item Row -->
       <div class="row">

           <div class="col-md-8">

               <img class="img-responsive img-hover" src="<?php echo '../assets/img/event/'.$data['imagePath'];?>" alt="">

           </div>

           <div class="col-md-4">
               <h3>Event Description</h3>
               <p class="text-justify"><?php echo $data['desc_detail'];?></p>

               <h3>Event Date</h3>
               <p class="text-justify"><?php

               if($date1 > $date2)
               {
                 echo $data['date'];
               }
               else{
                 echo "Event Inactive";
               }

               ?>
             </p>

                <h3>Ticket Price</h3>
                <p class="text-justify"><?php if(empty($price)) { echo "SOLD OUT"; } else echo "Rp." .$price;?></p>

               <form action="event_details.php?eventID=<?php echo $data['eventID'];?>" method="POST">
                 <input type="submit" name="submit" value="Buy Ticket" class="btn btn-default">
               </form>
           </div>

       </div>
       <!-- /.row -->



       <hr>




   </div>
   <!-- /.container -->





<!-- end content -->
 <?php
require_once "../templates/footer_student.php";
  ?>
