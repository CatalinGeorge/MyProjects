<html>
<head>

  <meta name="viewport" content="width=device-width, user-scalable=no">
  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

  <!-- Lainside-categ compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- AngularJS -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

  <!-- Lainside-categ compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  <script src="<?php echo base_url(); ?>assets/js/angular.js"></script>


</head>

<body ng-app="socialsApp" ng-controller="mainCtrl">

        <div class="bg-dark hidden-xs">
          <div class="container">
            <div class="ptb20 clearfix">
              <a href="<?php echo base_url(); ?>main" class="up text-white fw600 letter-spacing3 single-link-w">
                <img src="<?php echo base_url(); ?>assets/img/popjump-logo-w.png" height="40">
              </a>

              <div class="float-right hidden-xs">
                <a href="<?php echo base_url(); ?>admin/admin_panel" class="up text-white font-12 fw600 round mr10 filled-button-orange single-link-wd">Dashboard</a>
                <a href="<?php echo base_url(); ?>admin/go/users" class="up text-white font-12 fw600 round mr10 filled-button-orange single-link-wd">Users</a>
                <a href="<?php echo base_url(); ?>admin/go/platforms" class="up text-white font-12 fw600 round mr10 filled-button-orange single-link-wd">Platforms</a>
                <a href="<?php echo base_url(); ?>home" class="up text-white font-12 fw600 round mr10 filled-button-orange single-link-wd">Main website</a>

              </div>

              <div class="visible-xs">
                  <div class="text-right"><button type="button" style="margin-top:-25px;" class="inline btn bg-transparent" data-toggle="collapse" data-target="#demo"><img src="https://png.icons8.com/small/25/ffffff/menu.png"></button></div>
                  <div id="demo" class="collapse center full-width">
                    <a href="<?php echo base_url(); ?>admin/admin_panel" class="mt10 mb10 up text-white font-12 fw600 round mr10 filled-button-orange single-link-wd">Dashboard</a><br>
                    <a href="<?php echo base_url(); ?>admin/go/users" class="up text-white font-12 fw600 round mr10 filled-button-orange single-link-wd">Users</a>
                    <a href="<?php echo base_url(); ?>admin/go/platforms" class="mb10 up text-white font-12 fw600 round mr10 filled-button-orange single-link-wd">Platforms</a><br>
                    <a href="<?php echo base_url(); ?>home" class="mb10 up text-white font-12 fw600 round mr10 filled-button-orange single-link-wd">Main website</a><br>

                  </div>
              </div>

            </div>
          </div>
        </div>
