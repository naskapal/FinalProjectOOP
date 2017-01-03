<?php

require_once $_SERVER['DOCUMENT_ROOT']."/core/init_inside.php";

if(!$_student->is_LoggedIn()){
    header('location: ../login.php');
}



require_once "../templates/header_student.php";
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

               <img class="img-responsive img-hover center-block" src="<?php echo '../assets/img/profile/'.$profile['studentPhoto'].'.jpg';?>" alt="gambar">

           </div>

           <div class="col-md-8">
               <h3>Profile Information</h3>
               <ul>
                   <li>Name : <?php echo $profile['name']; ?></li>
                   <li>Phone Number : <?php echo $profile['phone']; ?></li>
                   <li>address : <?php echo $profile['address']; ?></li>
                   <li>Wallet Balance : <?php echo $profile['walletBalance']; ?></li>
                   <li>SKKM Point :<?php echo $profile['skkm_point']; ?></li>
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
require_once "../templates/footer_student.php";
  ?>
