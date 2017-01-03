<?php
require('../config.php');
include_once '../assets/adminHeader.php';

  if(!$_admin->is_LoggedIn()){
      header('location: adminLogin.php');
  }
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Administrator<small> Welcome Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Administrator
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
//                        include "../checkAdmin.php";
                        $cek = isset($_GET['cek']) ? $_GET['cek'] : 'telolet';

                        if($cek =="user")
                        {
                            include "view-user.php";
                            }
                        elseif($cek=="event")
                        {
                            include "view-event.php";
                            }
                        elseif($cek=="generate")
                        {
                            include "generate.php";
                            }
                        elseif($cek=="input")
                        {
                            include "form-user.php";
                            }
                        elseif($cek=="trans")
                        {
                            include "view-transaction.php";
                        }
                        else{}
		              ?>
                    </div>
                </div>
                <!-- /.row -->
<?php include_once '../assets/adminFooter.php'; ?>
