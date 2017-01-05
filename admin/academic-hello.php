<?php

require('../config.php');
include_once '../assets/academicHeader.php';

if(!$_admin->is_LoggedIn()){
    header('location: index.php');
}

 ?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Academic<small> Welcome Academic</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Academic
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
