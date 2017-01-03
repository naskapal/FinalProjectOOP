<?php

require_once $_SERVER['DOCUMENT_ROOT']."/core/init_inside.php";

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}



require_once $_SERVER['DOCUMENT_ROOT']."/templates/header_club.php";
 ?>

<!-- content -->

<!-- Page Content -->
   <div class="container">

       <!-- Page Heading/Breadcrumbs -->
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Profile
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

               <img class="img-responsive img-hover center-block" src="<?php echo '../assets/img/club/'.$profile['imagepath'].'.png'; ?>" alt="gambar">

           </div>

           <div class="col-md-8">
               <h3>Profile Information</h3>
               <ul>
                   <li>Name : <?php echo $profile['club_name']; ?></li>
                   <li>Description : <?php echo $profile['club_desc']; ?></li>
               </ul>
           </div>

       </div>
       <!-- /.row -->
   <hr>
       <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-3 col-md-offset-6">
                    <a class="btn btn-lg btn-default btn-block" href="change_password.php">Change Password</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-lg btn-default btn-block" href="edit_profile.php">Edit Profile</a>
                </div>
            </div>
        </div>


       <hr>




   </div>
   <!-- /.container -->





<!-- end content -->
 <?php
require_once $_SERVER['DOCUMENT_ROOT']."/templates/footer_club.php";
  ?>
