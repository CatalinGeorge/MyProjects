
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

    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="57e9d55a-f1f6-40c0-9e2e-48c93c5a0903" type="text/javascript" async></script>

</head>
<script id="CookieDeclaration" src="https://consent.cookiebot.com/57e9d55a-f1f6-40c0-9e2e-48c93c5a0903/cd.js" type="text/javascript" async></script>
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

      <div class="container bg-white box-shadow p30 mb50 clearfix">
          <div class="center ptb30 plr50">
            <img src="<?php echo base_url(); ?>assets/img/popjump-logo-d.png" height="40">
            <h4 class="visible-xs">Everyone Online - Just One Click Away</h4>
            <h1 class="pb20 hidden-xs">Everyone Online - Just One Click Away</h1>
            <p class="lh-30 hidden-xs">Sign up and search for anyone online! Try searching for your friends, family, classmates, workmates, neighbors, your crush, acquaintances, enemies or maybe just someone you have heard of. We allow you to find a persons all social platforms with just one click. Add your social platforms and start growing your audience!</p>
          </div>

            <div class="row">
        <!-- Register -->
      <?php echo form_open('home/create'); ?>
        <div class="col-md-1"></div>
              <div class="col-md-4 p0" ng-show="showRegister">
                 <div class="ptb20">
                    <h4 class="up text-left fw600 mt0 text-gray pl15">create your account</h4>
                    <div class="row">
                      <div class="col-md-12 mt10 no-focus">
                        <input type="text" placeholder="Name" name="first" class="font-12 ptb10 plr20 full-width text-dark border-gray2 bg-white round-small " required>
                      </div>
                        <input type="hidden" placeholder="Last Name" name="last" value="" class="font-12 ptb10 plr20 full-width text-gray border-gray2 round-small" required>
                      <div class="col-md-12 mt10 no-focus">
                        <input type="text" placeholder="Email"   name="email"   class="font-12 ptb10 plr20 full-width text-gray border-gray2 round-small" required>
                      </div>
                      <div class="col-md-12 mt10 no-focus">
                        <input type="password" placeholder="Password" name="pass" class="font-12 ptb10 plr20 full-width text-dark border-gray2 round-small" required>
                      </div>
                      <div class="col-md-12 mt10 no-focus">
                        <input type="password" placeholder="Verify password" name="pass_vrf" class="font-12 ptb10 plr20 full-width text-dark border-gray2 round-small" required>
                      </div>
                      <div class="text-white pl15 pt20">
                        <label>
                          <input type="checkbox" name="remember" class="text-align-top op5" required>&nbsp;
                          <span class="font-12 text-dark"><a href="<?php echo base_url(); ?>terms" >I accept the Terms and Conditions</a></span>
                        </label>
                     </div><br>
                     <div class="center">
                       <input  name="submit" type="submit" value="register" class="cap text-white font-12  round mr10 filled-button-orange single-link-w bg-orange">
                     </div>
                     <a class="center pt30 visible-xs" ng-click="showLoginF()">Already registered</a>
                    </div>
                  </div>
              </div>
							</form>
              <div class="col-md-1 border-right-dark half-height hidden-xs"></div>


              <!-- Login -->
			      <?php echo form_open('home/login'); ?>
              <div class="col-md-1"></div>
                    <div class="col-md-4 p0" ng-show="showLogin">
                       <div class="ptb20">
                          <h4 class="up text-left fw600 mt0 text-gray pl15 loginScreen">login to your account</h4>
                          <div class="row">
                            <div class="col-md-12 mt10 no-focus">
                              <input type="text" placeholder="Email" name="email"  class="font-12 ptb10 plr20 full-width text-gray border-gray2 round-small" >
                            </div>
                            <div class="col-md-12 mtb10 no-focus">
                              <input type="password" placeholder="Password" name="pass" class="font-12 ptb10 plr20 full-width text-gray border-gray2 round-small" >
                            </div>
                           <div class="center pb10">
														 <input  name="submit" type="submit" value="login" class="cap text-white font-12  round filled-button-orange single-link-w bg-orange">
                           </div>
                           <a class="block center pt30 visible-xs" ng-click="showRegisterF()">Don't have an account</a>
                           <a href="<?php echo base_url(); ?>home/forgot" class="block center pt30">Forgot password</a>
                          </div>
                        </div>
                    </div>
									</form>
                  <div class="col-md-1"></div>

            </div><!-- end row -->
      </div>
</div>







</body>
</html>
