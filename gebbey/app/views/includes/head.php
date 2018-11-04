<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Classifieds</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Google Material Design Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--Bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/bstrp/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>lib/bstrp/js/bootstrap.min.js"></script>

    <!--CSS Styles-->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/grid.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/style.css">

    <!--Datepicker-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

    <!--Google Maps-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHO4QRr0dE4w5r9OhwG-VEWjao1i8tlQg"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <!--Swiper slider-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>

    <!-- Fontawesome icon library (social icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Lightbox-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>


        <!--JS Scripts-->
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/scripts.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111429552-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-xxx');
        </script>

      </head>
      <body ng-app="clas" ng-controller="clasCtrl">
