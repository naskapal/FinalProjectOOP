<?php

require('../config.php');

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}

$ticket = $_ticket->ticket_detail(Input::get('transID'));

require_once "../templates/header_student.php";
 ?>

<!-- content -->

<!-- Page Content -->
   <div class="container">

       <!-- Page Heading/Breadcrumbs -->
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Ticket details
               </h1>
               <ol class="breadcrumb">
                   <li><a href="index.html">Home</a>
                   </li>
                   <li class="active">Profile</li>
               </ol>
           </div>
       </div>
       <!-- /.row -->

       <!-- Portfolio Item Row -->
       <div class="row">

           <div class="col-md-4">

               <img class="img-responsive img-hover center-block" src="<?php echo '../assets/img/profile/'.$profile['studentPhoto'];?>" alt="gambar">

           </div>

           <div class="col-md-8">
               <h3>Profile Information</h3>
               <ul>
                   <li>Transaction ID : <?php echo $ticket['transID']; ?></li>
                   <li>Ticket ID : <?php echo $ticket['ticketID']; ?></li>
                   <li>Transaction Date : <?php echo $ticket['transDate']; ?></li>
               </ul>
           </div>

       </div>
       <!-- /.row -->
   <hr>



   <hr>




   </div>
   <!-- /.container -->





<!-- end content -->
 <?php
require_once "../templates/footer_student.php";
  ?>
