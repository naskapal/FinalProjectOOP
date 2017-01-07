<?php
if(!$_admin->is_LoggedIn()){
    header('location: index.php');
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
