<?php
require_once "../core/init_inside.php";

$id=session::get('username');

$profile = $student->student_details($id);

 ?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SCEMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/clean-blog.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SCEMS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="profile.php"  >Profile</a>
                    </li>
                    <li>
                        <a href="club_list.php" >Club</a>
                    </li>
                    <li>
                        <a href="event_list.php" >Event</a>
                    </li>
                    <li>
                        <a href="top_up.php" >Top Up</a>
                    </li>
                    <li>
                        <a href="../logout.php" >Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-color: #9bc7ae;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-2">
                    <div class="site-heading">
<!-- photo -->
                      <!-- <div class="col-md-3 col-sm-6 col-md-offset-3"> -->
                          <div class="panel panel-default text-center col-lg-4 col-sm-6 col-lg-offset-4 clearfix">
                              <div class="panel-heading">
                                  <span class="fa-stack fa-5x">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <img src="<?php echo '../assets/img/profile/'.$profile['studentPhoto'].'.jpg';?>" class="fa fa-stack-1x fa-inverse" alt="Pict"></i>

                                  </span>
                              </div>

                          </div>
                          <div class="col-lg-8 col-lg-offset-2">
                              <hr class="small">
                              <span class="subheading">Hai, <?php echo session::get('username');?></span>
                              <hr class="small">
                          </div>
                      <!-- </div> -->
<!-- end photo -->

                    </div>
                </div>
            </div>
        </div>
    </header>
