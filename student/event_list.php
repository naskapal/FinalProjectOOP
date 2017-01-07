<?php

require('../config.php');

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}

$result = $_event->event_list();






require_once "../templates/header_student.php";
 ?>

<!-- content -->

<!-- Page Content -->
   <div class="container">

       <!-- Page Heading/Breadcrumbs -->
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Event List
               </h1>
               <ol class="breadcrumb">
                   <li><a href="index.html">Home</a>
                   </li>
                   <li class="active">Event List</li>
               </ol>
           </div>
       </div>
       <!-- /.row -->

       <!-- Projects Row -->
       <div class="row">

          <?php
              if($result ->num_rows > 0){
                while($row = $result->fetch_assoc()){ ?>
                  <div class="col-md-4 img-portofolio">
                      <a href="<?php echo 'event_details.php?eventID='.$row['eventID']; ?>">
                          <img class="img-responsive img-hover" src="<?php echo '../assets/img/event/'.$row['imagePath'];?>" alt="">
                      </a>
                      <h3>
                          <a href="<?php echo 'event_details.php?eventID='.$row['eventID']; ?>"><?php echo $row['eventName']; ?></a>
                      </h3>
                      <p><?php echo $row['eventDesc']; ?></p>
                  </div>

          <?php
                }
              }
          ?>



       </div>
       <!-- /.row -->



       <hr>

       <!-- Pagination -->

       <!-- /.row -->

       <hr>


   </div>
   <!-- /.container -->





<!-- end content -->

 <?php
require_once "../templates/footer_student.php";
  ?>
