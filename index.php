<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <?php
		session_start();
        	if(!isset($_SESSION['login_id']))
        	header('location:login.php');
        	//include('./header.php'); 
 	?>
	    
        <title>Movie Seat Booking</title>
        <link src="admin/assets/font-awesome/css/all.js"/>
        <script src="admin/assets/vendor/jquery/jquery.min.js"></script>
        <script src="admin/assets/font-awesome/js/all.js"></script>
       <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Movie Theater Seat Booking</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php?page=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?page=movies">Movies</a></li>
                       <!-- <li class="nav-item"><a class="nav-link" href="login.php?page=login">login</a></li>-->
                    </ul>
                </div>
            </div>
        </nav>
       <?php

       $page = isset($_GET['page']) ? $_GET['page'] : 'home';
       include($page.'.php');
       ?>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted"> Movie Theater Seat Booking System By: Nirav </div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
