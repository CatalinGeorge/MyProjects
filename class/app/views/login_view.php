
<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no">

  <!-- Lainside-categ compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Lainside-categ compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>

<body>
  <div class="account-bg bg blur relative" style="background:url(<?php echo base_url(); ?>assets/img/lion.png)no-repeat center center; background-size:cover;">
    <div class="bg-white op-8 absolute full"></div>
    </div>

    <div class="container relative z-index">
      <div class="col-md-8 col-md-offset-2">

      <div class="row p-t-150">
        <div class="col-md-6 p-0" style="background:url(<?php echo base_url(); ?>assets/img/lion.png)no-repeat center center; background-size:cover;height:459px;">

          <div class="p-50 relative center">
            <!--<img src="https://png.icons8.com/ios/100/ffffff/world-cup-filled.png" class="p-b-20">
            <h2 class="text-white">Hey you!</h2>
            <p class="text-gray p-t-b-20 lh-25">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>-->
          </div>
        </div>
        <div class="col-md-6 bg-white" style="-webkit-box-shadow: -20px 0 30px 0 rgba(0,0,0,0.3); box-shadow: -20px 0 30px 0 rgba(0,0,0,0.3); z-index:999999; position:relative;">
          <div class="p-50">
            <h4 class="p-b-50">Login here</h4>
            <?php echo validation_errors(); ?>
                  <?php echo form_open('account/login'); ?>
            <div class="relative">
              <input type="text" name="email" class="inputText border-bottom3 no-focus" required/>
              <span class="floating-label text-gray">Your email address</span>
            </div>
            <div class="relative m-t-30">
              <input type="password" name="pass" class="inputText border-bottom3 no-focus" required/>
              <span class="floating-label text-gray">Your password</span>
            </div>

            <div class="center m-t-50"><div><input class="btn-outline-b" type="submit" value="sign in"></div></div>

            <p class="p-t-50 center">Don't have an account yet?</p>
            <a href="register.html" class="text-gray op-5 block center">Register</a>
          </form>
          </div>
          <a class="bottom-20 full-width absolute text-gray op-5 center">Forgot password?</a>
        </div>
      </div>

    </div>
    </div>

</body>

</html>
