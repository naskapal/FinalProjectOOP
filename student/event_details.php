<?php
require('../config.php');

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}

$id         = $_GET['eventID'];
$user_data  = $student->get_data(Session::get('username'));
$data       = $_event->event_details($id);
$ticket     = $_event->ticket_details($id);


if(Input::get('submit'))
{
  $nominal = $_event->get_price($id);
  if(empty($ticket['ticketID']))
  {
    echo "<script>alert('Ticket Sold Out')</script>";
    Redirect::to('event_list');
  }
  else {
    if($student->cek_transaction($user_data['nim'],$data['eventID']))
    {
          echo "<script>alert('You already buy the ticket')</script>";
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

          Redirect::to('profile');
      }else {
        echo "<script>alert('Your Wallet is not enough')</script>";
      }//end cek balance
    }//end cek already buy
  }//end sold out
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
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
               <h3>Club Details</h3>
               <ul>
                   <li>Lorem Ipsum</li>
                   <li>Dolor Sit Amet</li>
                   <li>Consectetur</li>
                   <li>Adipiscing Elit</li>
               </ul>

               <form action="event_details.php?eventID=<?php echo $ticket['eventID'];?>" method="POST">
                 <input type="submit" name="submit" value="Buy Ticket" class="btn btn-default">
               </form>
           </div>

       </div>
       <!-- /.row -->

       <!-- Related Projects Row -->
       <div class="row">

           <div class="col-lg-12">
               <h3 class="page-header">Related Projects</h3>
           </div>

           <div class="col-sm-3 col-xs-6">
               <a href="#">
                   <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
               </a>
           </div>

           <div class="col-sm-3 col-xs-6">
               <a href="#">
                   <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
               </a>
           </div>

           <div class="col-sm-3 col-xs-6">
               <a href="#">
                   <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
               </a>
           </div>

           <div class="col-sm-3 col-xs-6">
               <a href="#">
                   <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
               </a>
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
