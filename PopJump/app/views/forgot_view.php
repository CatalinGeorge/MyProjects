
<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no">

  <meta name="google-site-verification" content="QLg2tQn5YX9L73ut83wW6I8P16pgpWW6L2gRtYSNqCg" />
  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

  <!-- Lainside-categ compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Lainside-categ compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  <!-- AngularJS -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/angular.js"></script>
</head>

<body ng-app="socialsApp" ng-controller="mainCtrl">
  <?php if($this->session->flashdata('message')) { ?>
  <div class="alert alert-warning fixed-right">
    <?php echo $this->session->flashdata('message'); ?>
  </div>
  <script>
  $(".alert").fadeTo(7000, 500).slideUp(500, function(){
             $(".alert").slideUp(1000);
              });
  </script>
<?php } ?>

  <div class="bg-light full-height clearfix home_content" style="padding-top:5%;">

<div class="container p30 mb50 clearfix">
              <!-- Login -->
			      <?php echo form_open('home/recover_send'); ?>
                    <div class="col-md-4 col-md-offset-4 bg-white box-shadow p0">
                       <div class="ptb20">
                          <h4 class="up text-left fw600 mt0 text-gray pl15 loginScreen">recover your password</h4>
                          <div class="row">
                            <div class="col-md-12 mt10 mb20 no-focus">
                              <input type="text" placeholder="Email" name="email"  class="font-12 ptb10 plr20 full-width text-gray border-gray2 round-small" >
                            </div>
                           <div class="center ptb10">
														 <input  name="submit" type="submit" value="recover" class="cap text-white font-12  round filled-button-orange single-link-w bg-orange">
                           </div>
                          </div>
                        </div>
                        <a href="<?php echo base_url(); ?>" class="block center ptb30">Back</a>
                    </div>

									</form>
            </div><!-- end row -->








</body>
</html>
